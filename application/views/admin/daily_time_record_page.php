
<div class="cell bg-white p-3 ml-4 mr-6" style="overflow:auto;">
    <div class="row">
        <a href="javascript:history.back();" class="button stub bg-red fg-white"><span class="mif-arrow-left"></span> Go Back</a>
        <div class="stub ml-auto no-visible">
            <div class="row">
                <h5 class="cell mt-3">Days left para defend:</h5>
                <div class="cell" data-role="countdown"  data-date="09/25/2018"
                     data-days="1"
                     data-hours="2"
                     data-minutes="3"
                     data-seconds="4"></div>
            </div>

        </div>
    </div>
    <div class="row">
        <ul class="cell breadcrumbs" style="margin-bottom:0px;">
            <li class="page-item"><a href="<?php echo base_url('index.php/AdminStart'); ?>" class="page-link">Home</a></li>
            <li class="page-item"><a href="#" class="page-link">Manage</a></li>
            <li class="page-item"><a href="#" class="page-link">Attendance</a></li>
            <li class="page-item"><a href="#" class="page-link">DTR</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="cell-8">
            <h4>Daily Time Record</h4>
        </div>
        <div class="stub ml-auto">
            <button type="button" class="button bg-darkBlue fg-white" onclick="Metro.dialog.open('#ImportDTRDialog');" name="button">IMPORT</button>
        </div>
    </div>
    <hr class="row thick bg-black drop-shadow">
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
        <div data-role="progress" id="progress" data-type="line"></div>
        <div class="cell">
            <table class="table table-border cell-border cell-hover mt-3" id="tblDTR">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Date</th>
                        <th>Type</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="dialog" data-role="dialog" id="ImportDTRDialog" style="overflow:auto">
    <form id="frmImportDTR" data-role="validator" data-on-validate-form="validateImportDTR" action="javascript:">
        <div class="dialog-title">Import DTR from excel file.</div>
        <div class="dialog-content">
            <div class="row" >
                <div class="cell-12 form-group">
                    <label for="dtpAddDateYear">Schoolyear</label>
                    <input data-validate="required" data-role="datepicker" id="dtpAddDateYear" name="dtpAddDateYear" data-day="false" data-month="false">
                    <input type="hidden" name="dtpAddEvalYear1" id="dtpAddDateYear1">
                    <input type="hidden" name="txtSY" id="txtSY">
                    <input class="text-center" readonly type="text" id="txtAddDateYear" name="txtAddDateYear" data-day="false" data-month="false">
                    <span class="invalid_feedback">Schoolyear is required.</span>
                </div>
                <div class="cell-12 form-group">
                    <label for="cmbAddSemester">Semester</label>
                    <select data-validate="required" data-role="select" id="cmbAddSemester" name="cmbAddSemester">
                        <?php
                            if(isset($semwork)){
                                foreach ($semwork as $row) {
                                    echo '<option value="'.$row['Semester'].'">'.$row['Semester'].'</option>';
                                }
                            }
                         ?>
                    </select>
                    <span class="invalid_feedback">Semester is required.</span>
                </div>
                <div class="cell-12 form-group">
                    <label for="cmbMonth">Month</label>
                    <select data-role="select" id="cmbMonth">
                        <?php
                            if(isset($monthwork)){
                                foreach ($monthwork as $row) {
                                    echo '<option value="'.$row['Month'].'">'.$row['Month'].'</option>';
                                }
                            }
                         ?>
                    </select>
                </div>
                <input type="hidden" name="Filename" id="txtFilename">
                <div class="cell-12 form-group">
                    <label for="dtrFile">Select excel file.</label>
                    <input type="file" data-role="file" id="dtrFile" name="File">
                </div>
            </div>
        </div>
        <div class="dialog-actions">
            <button type="button" class="button bg-darkRed fg-white js-dialog-close place-right">Cancel</button>
            <button type="submit" class="button bg-darkBlue fg-white place-right">Import</button>
        </div>
    </form>
</div>
</div>
</div>

<script>
    $(document).ready(function() {
        getDTR();
        $("#dtpAddDateYear").change(function() {
            var year=new Date($("#dtpAddDateYear").val());
            $("#dtpAddDateYear1").val(year.getFullYear());
            $("#txtAddDateYear").val(year.getFullYear()+1);
            $("#txtSY").val(year.getFullYear()+"-"+(year.getFullYear()+1));
        });
        $(".filter").change(function() {
            getDTR();
        });
    });
    function validateImportDTR() {
        $("#txtFilename").val($("#dtrFile")[0].files[0].name);
        var importFormData=new FormData($("#frmImportDTR")[0]);
        $.ajax({
            type:'ajax',
            method:'POST',
            url:'<?php echo base_url("index.php/Attendance/CheckIfMonthImportExist"); ?>',
            data:{Schoolyear:$("#txtSY").val(),Semester:$("#cmbAddSemester").val(),Month:$("#cmbMonth").val()},
            dataType:'json',
            success:function(response) {
                if(response.success){
                    var infoboxcontent="<p>You've already import DTR for the month that you have selected. You will not be able to import again for that month.</p>";
                    Metro.infobox.create(infoboxcontent,"alert",{overlay:true});
                }else{
                    $.ajax({
                        type:'ajax',
                        method:'POST',
                        url:'<?php echo base_url("index.php/UserAccounts/uploadExcel") ?>',
                        data:importFormData,
                        contentType: false,
                        processData: false,
                        dataType:'json',
                        success:function(uploadresponse){
                            var _filename=uploadresponse.filename;
                            importExcel({
                                filename:"<?php echo base_url(); ?>assets/uploads/Excel/"+_filename,
                                success:function(response2) {
                                    var _excelData = response2;
                                    var _length = _excelData.length;
                                    for (var i = 0; i < _excelData.length; i++) {
                                        var _excelRow=_excelData[i];
                                        _excelRow.Schoolyear=$("#txtSY").val();
                                        _excelRow.Semester=$("#cmbAddSemester").val();
                                        var date=new Date(_excelRow.DateTime);
                                        var locale = "en-us";
                                        var month=date.toLocaleString(locale, { month: "long" });
                                        _excelRow.Month=month;
                                        var days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
                                        var day=days[date.getDay()];
                                        _excelRow.Day=day;
                                        $.ajax({
                                            type:'ajax',
                                            method:'POST',
                                            async:false,
                                            url:'<?php echo base_url("index.php/Attendance/addDTR") ?>',
                                            data:_excelRow
                                        });
                                    }
                                    $.ajax({
                                        type:'ajax',
                                        method:'POST',
                                        async:false,
                                        url:'<?php echo base_url("index.php/Attendance/checkAbsensces"); ?>',
                                        data:{Schoolyear:$("#txtSY").val(),Semester:$("#cmbAddSemester").val(),Month:$("#cmbMonth").val()}
                                    });
                                }
                            });
                        },
                    });

                }
            }
        });
    }
    function getDTR() {
        $.ajax({
            type:'ajax',
            method:'POST',
            url:'<?php echo base_url("index.php/Attendance/getDTR"); ?>',
            data:{Schoolyear:$("#cmbFilterSchoolyear").val(),Semester:$("#cmbFilterSemester").val(),Month:$("#cmbFilterMonth").val()},
            dataType:'json',
            success:function(response) {
                if(response.success){
                    var _tableContent='';
                    for (var i = 0; i < response.dtr.length; i++) {
                        _tableContent+='<tr>'
                                            +'<td>'+response.dtr[i].IDNumber+'</td>'
                                            +'<td>'+new Date(response.dtr[i].Date).toDateString()+' '+new Date(response.dtr[i].Date).toLocaleTimeString()   +'</td>'
                                            +'<td>'+response.dtr[i].Type+'</td>'
                                      +'</tr>';
                    }
                    if($.fn.DataTable.isDataTable("#tblDTR")){
                        $("#tblDTR").DataTable().clear().destroy();
                    }
                    $("#tblDTR tbody").html(_tableContent);
                    $("#tblDTR").DataTable();
                    $("#progress").hide();
                }
            },
        });

    }
    function importExcel(o) {
        /* set up XMLHttpRequest */
        var url = o.filename;
        var oReq = new XMLHttpRequest();
        oReq.open("GET", url, true);
        oReq.responseType = "arraybuffer";

        oReq.onload = function(e) {
            var arraybuffer = oReq.response;

            /* convert data to binary string */
            var data = new Uint8Array(arraybuffer);
            var arr = new Array();
            for(var i = 0; i != data.length; ++i) arr[i] = String.fromCharCode(data[i]);
            var bstr = arr.join("");

            /* Call XLSX */
            var workbook = XLSX.read(bstr, {type:"binary"});

            /* DO SOMETHING WITH workbook HERE */
            var first_sheet_name = workbook.SheetNames[0];
            /* Get worksheet */
            var worksheet = workbook.Sheets[first_sheet_name];
            var data = XLSX.utils.sheet_to_json(worksheet,{raw:true});
            if (typeof o.success) o.success(data);
        }

        oReq.send();
    }
</script>
</body>
</html>
