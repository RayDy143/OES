<div class="cell mr-4 p-5" style="overflow:auto">
    <div class="row">
        <div class="cell">
            <label class="place-right mt-1" for="">Select Schoolyear:</label>
        </div>
        <div class="cell">
            <select data-role="select" class="filter" id="cmbFilterSchoolyear">
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
        <div class="cell">
            <label class="place-right mt-1" for="">Select Month:</label>
        </div>
        <div class="cell">
            <select class="filter" data-role="select" id="cmbFilterMonth">
                <?php
                    if(isset($month)){
                        foreach ($month as $row) {
                            echo '<option value="'.$row['Month'].'">'.$row['Month'].'</td>';
                        }
                    }
                 ?>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="mx-auto print win-shadow pt-5 pl-15 pr-15 pb-10" style="width:768px;" id="ani">
            <div class="printThis">
                <img src="<?php echo base_url('assets/report/banner.png') ?>" style="width:100%;">
                <p class="text-secondary text-center"><strong>Non-Academic Scholars Monthly Allowance</strong></p>
                <p class="text-secondary text-center m-0"><strong>Schoolyear <span id="lblSY"></span> <span id="lblSem"></span> Month of <span id="lblMonth"></span></strong></p>
                <div id="resultContainer">
                    <table id="tblAllowance" class="table table-border compact cell-border mt-5">
                        <thead>
                            <tr>
                                <th>Scholar</th>
                                <th>Absents</th>
                                <th>Lates</th>
                                <th>Undertime</th>
                                <th>Total Deduction</th>
                                <th>Base Allowance</th>
                                <th>Recievable</th>
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
        $('#ani').addClass("ani-flash");
    });
    $(document).ajaxStart(function(){
        $('#loader').data('infobox').open();
    });
    $(document).ajaxComplete(function(){
        $('#loader').data('infobox').close();
    });
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
                        var _deduction=0;
                        var _totalDeduction=0;
                        var _nasAbsents=0;
                        var _naslate=0;
                        var _nasundertime=0;
                        var _nasid=response.nas[i].IDNumber;
                        var _totalMonthDays=0;
                        var _recievable=0;
                        var _tuition=response.nas[i].TuitionFee;
                        $.ajax({
                            type:'ajax',
                            method:'POST',
                            url:'<?php echo base_url("index.php/Nas/getNasAbsents"); ?>',
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
                            url:'<?php echo base_url("index.php/Nas/getNasUndertime"); ?>',
                            data:{IDNumber:$("#IDNumber").val(),Schoolyear:$("#cmbAttendanceSchoolyear").val(),Semester:$("#cmbAttendaceSemester").val(),Month:$("#cmbFilterMonth").val()},
                            dataType:'json',
                            success:function(response) {
                                if(response.success){
                                    if(response.undertime.Undertime==null){

                                    }else{
                                        var _nasundertime=response.undertime.Undertime;
                                    }
                                }
                            }
                        });
                        $.ajax({
                            type:'ajax',
                            method:'POST',
                            url:'<?php echo base_url("index.php/Nas/getNasAbsents"); ?>',
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
                            url:'<?php echo base_url("index.php/MonthlyAllowance/getTotalMonthDays"); ?>',
                            data:{IDNumber:_nasid,Schoolyear:$("#cmbFilterSchoolyear").val(),Semester:$("#cmbFilterSemester").val(),Month:$("#cmbFilterMonth").val()},
                            dataType:'json',
                            async:false,
                            success:function(response) {
                                if(response.success){
                                    _totalMonthDays=response.totalmonthdays.length;
                                }
                            }
                        });
                        _deduction=((_tuition/6)/(_totalMonthDays*4))/60;
                        _totalDeduction=_deduction*(((_nasAbsents*4)*60)+parseFloat(_naslate)+parseFloat(_nasundertime));
                        _recievable=(500-_totalDeduction);
                        _tablecontent+='<tr>'
                                            +'<td>'+response.nas[i].Firstname+' '+response.nas[i].Lastname+'</td>'
                                            +'<td>'+_nasAbsents+' days </td>'
                                            +'<td>'+((_naslate!=null)?_naslate:0)+' minute(s) </td>'
                                            +'<td>'+((_nasundertime!=null)?_nasundertime:0)+' minute(s) </td>'
                                            +'<td> Php. '+_totalDeduction.toFixed(1)+'</td>'
                                            +'<td>Php. 500</td>'
                                            +'<td>'+((_recievable.toFixed(1)<0)?'<strong class="fg-red">Php. '+_recievable.toFixed(1)+'</strong>':'Php. '+_recievable.toFixed(1))+'</td>'
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
</script>
