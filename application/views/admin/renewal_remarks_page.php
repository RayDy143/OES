<div class="cell mr-4 p-5" style="overflow:auto">
    <div class="row">
        <div class="cell">
            <label class="place-right mt-1" for="">Select Schoolyear:</label>
        </div>
        <div class="cell">
            <select class="filter" id="cmbFilterSchoolyear">
                <?php
                    if(isset($sy)){
                        foreach ($sy as $row) {
                            echo '<option value="'.$row['SY'].'">'.$row['SY'].'</option>';
                        }
                    }
                 ?>
            </select>
        </div>
        <div class="cell">
            <label class="place-right mt-1">Select Semester:</label>
        </div>
        <div class="cell">
            <select class="filter" data-role="select" id="cmbFilterSemester">
                <option value="First Semester">First Semester</option>
                <option value="Second Semester">Second Semester</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="mx-auto print win-shadow pt-5 pl-15 pr-15 pb-10" id="ani" style="width:768px;">
            <div class="printThis">
                <img src="<?php echo base_url('assets/report/banner.png') ?>" style="width:100%;">
                <p class="text-secondary text-center"><strong>Non-Academic Scholars Renewal Remarks</strong></p>
                <p class="text-secondary text-center m-0"><strong>Schoolyear <span id="lblSY"></span> <span id="lblSem"></span></strong></p>
                <div id="resultContainer">
                    <table id="tblAllowance" class="table table-border compact cell-border mt-5">
                        <thead>
                            <tr>
                                <th>Scholar</th>
                                <th>Lacking Hours</th>
                                <th>Lowest Grade</th>
                                <th>Evaluation</th>
                                <th>Remarks</th>
                                <th>No of units.</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="stub ml-auto">
            <button type="button" class="button bg-darkBlue fg-white drop-shadow" id="btnPrint" name="button">Print</button>
        </div>
    </div>
    <div class="info-box" data-role="infobox" id="loader" data-type="warning">
        <div class="info-box-content">
            Loading..
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $("#btnPrint").click(function() {
            $(".printThis").printThis();
        });
        $(".filter").change(function () {
            getNas();
            $('#ani').addClass("ani-flash");
        });
        $(document).ajaxStart(function(){
            $('#loader').data('infobox').open();
        });
        $(document).ajaxComplete(function(){
            $('#loader').data('infobox').close();
        });
        $('#ani').addClass("ani-flash");
        getNas();
        function getNas() {
            $.ajax({
                type:'ajax',
                url:'<?php echo base_url("index.php/MonthlyAllowance/getNas"); ?>',
                dataType:'json',
                success:function(response) {
                    if(response.success){
                        var _tablecontent='';
                        for (var i = 0; i < response.nas.length; i++) {
                            var _nasAbsents=0;
                            var _totalDeduction=0;
                            var _nasAbsents=0;
                            var _naslate=0;
                            var _idnum=response.nas[i].NasID;
                            var _nasid=response.nas[i].IDNumber;
                            var _units=0;
                            var _remarks="";
                            var _lowestgrade=0;
                            var _evaluationmean=0;
                            var _lackingminutes=0;
                            var _nasundertime=0;
                            var _tuition=response.nas[i].TuitionFee;
                            $.ajax({
                                type:'ajax',
                                method:'POST',
                                url:'<?php echo base_url("index.php/RenewRemarks/getNasAbsents"); ?>',
                                data:{IDNumber:_nasid,Schoolyear:$("#cmbFilterSchoolyear").val(),Semester:$("#cmbFilterSemester").val(),Month:$("#cmbFilterMonth").val()},
                                dataType:'json',
                                async:false,
                                success:function(response) {
                                    if(response.success){
                                        _nasAbsents=response.absents;
                                    }
                                }
                            });
                            $.ajax({
                                type:'ajax',
                                method:'POST',
                                url:'<?php echo base_url("index.php/Nas/getNasLate"); ?>',
                                data:{IDNumber:_nasid,Schoolyear:$("#cmbFilterSchoolyear").val(),Semester:$("#cmbFilterSemester").val(),Month:$("#cmbFilterMonth").val()},
                                dataType:'json',
                                async:false,
                                success:function(response) {
                                    if(response.success){
                                        if(response.late.Late!=null){
                                            _naslate=response.late.Late;
                                        }else{
                                            _naslate=0;
                                        }
                                    }
                                }
                            });
                            $.ajax({
                                type:'ajax',
                                method:'POST',
                                async:false,
                                url:'<?php echo base_url("index.php/RenewRemarks/getLowest"); ?>',
                                data:{IDNumber:_idnum,Schoolyear:$("#cmbFilterSchoolyear").val(),Semester:$("#cmbFilterSemester").val(),Month:$("#cmbFilterMonth").val()},
                                dataType:'json',
                                success:function(response) {
                                    if(response.success){
                                        if(response.lowestgrade.Grade!=null){
                                            _lowestgrade=parseFloat(response.lowestgrade.Grade);
                                        }else{
                                            _lowestgrade="<strong class='fg-red'>Pending</strong>";
                                            _remarks="Pending";
                                        }
                                    }
                                }
                            });
                            $.ajax({
                                type:'ajax',
                                method:'POST',
                                async:false,
                                url:'<?php echo base_url("index.php/RenewRemarks/getEvaluation"); ?>',
                                data:{IDNumber:_idnum,Schoolyear:$("#cmbFilterSchoolyear").val(),Semester:$("#cmbFilterSemester").val()},
                                dataType:'json',
                                success:function(response) {
                                    if(response.success){
                                        if(response.evaluationmean.Mean!=null){
                                            _evaluationmean=parseFloat(response.evaluationmean.Mean).toFixed(2);
                                        }else{
                                            _evaluationmean="<strong class='fg-red'>Pending</strong>";
                                            _remarks="Pending";
                                        }
                                    }
                                }
                            });
                            _lackingminutes=(_nasAbsents*(4*60))+parseFloat(_naslate)+parseFloat(_nasundertime);
                            var hour=Math.floor(_lackingminutes/60);
                            var minutes=_lackingminutes%60;
                            if(_lackingminutes<8400&&_lowestgrade<=2.5&& _evaluationmean>=4.1){
                                _remarks="Recommendation for renewal";
                                if(_lackingminutes<=1680&&_lowestgrade<=1.5&&_evaluationmean>=4.6){
                                    _units=24;
                                }
                                _units=21;
                            }
                            if(_lackingminutes>8400||_lowestgrade>2.5||_evaluationmean<4.1){
                                _remarks="Under probation";
                                _units=18;
                            }
                            if(_lowestgrade=="<strong class='fg-red'>Pending</strong>"||_evaluationmean=="<strong class='fg-red'>Pending</strong>"){
                                _remarks="<strong class='fg-red'>Pending</strong>";
                                _units="<strong class='fg-red'>Pending</strong>";
                            }
                            if(_lackingminutes>=12000||_lowestgrade>=3.0||_evaluationmean<=3.5){
                                _remarks="<strong class='fg-red'>Recommendation for termination</strong>";
                            }
                            _tablecontent+='<tr>'
                                                +'<td>'+response.nas[i].Firstname+' '+response.nas[i].Lastname+'</td>'
                                                +'<td>'+hour+' hour(s) '+minutes+' minute(s) </td>'
                                                +'<td>'+((_lowestgrade>=3)?'<strong class="fg-red">'+_lowestgrade+'</span>':_lowestgrade)+'</td>'
                                                +'<td>'+_evaluationmean+'</td>'
                                                +'<td>'+_remarks+'</td>'
                                                +'<td>'+_units+'</td>'
                                          +'</tr>';
                        }
                        $("#tblAllowance tbody").html(_tablecontent);
                        $("#lblSY").text($("#cmbFilterSchoolyear").val());
                        $("#lblSem").text($("#cmbFilterSemester").val());
                        $("#lblMonth").text($("#cmbFilterMonth").val());
                        $('#ani').removeClass("ani-flash");
                    }
                }
            })
        }
    });
</script>
