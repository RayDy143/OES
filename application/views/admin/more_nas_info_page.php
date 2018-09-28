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
            <li class="page-item"><a href="#" class="page-link">Masterfile</a></li>
            <li class="page-item"><a href="<?php echo base_url('index.php/Nas'); ?>" class="page-link">NAS</a></li>
            <li class="page-item"><a href="#" class="page-link">NAS Info</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="cell-8">
            <h4><?php echo $nasprofile->Firstname.' '.$nasprofile->Lastname; ?></h4>
        </div>
    </div>
    <hr class="row thick bg-black drop-shadow">
    <div class="row">
        <div class="cell">
            <ul class="tabs-expand-md" data-role="tabs">
                <li><a href="#target_profile">Profile</a></li>
                <li class="<?php if(isset($scheduleactive)){echo $scheduleactive;} ?>"><a href="#target_schedule">Schedule</a></li>
                <li><a href="#target_attendance">Attendance</a></li>
                <li><a href="#target_grades">Grades</a></li>
            </ul>
            <div class="border bd-default p-5">
                <div id="target_profile">
                    <form id="frmUpdateNas" data-interactive-check="true" action="javascript:" data-role="validator" data-on-validate-form="validateUpdateNas">
                        <div class="row">
                            <div class="cell-lg-8 cell-md-12 cell-sm-12">
                                <div class="row">
                                    <input type="hidden" name="NasID" id="txtNasID" value="<?php echo $nasprofile->NasID ?>">
                                    <div class="cell-lg-6 cell-md-12 cell-sm-12 form-group">
                                        <label for="IDNumber">ID Number</label>
                                        <input readonly value="<?php echo $nasprofile->IDNumber ?>" type="text" id="IDNumber" name="IDNumber">
                                    </div>
                                    <div class="cell-lg-6 cell-md-12 cell-sm-12 form-group" style="margin:0;">
                                        <label for="Email">Email</label>
                                        <input data-validate="required email" value="<?php echo $nasprofile->Email ?>" type="text" data-role="input" id="Email" name="Email">
                                    </div>
                                    <div class="cell-lg-6 cell-md-12 cell-sm-12 form-group">
                                        <label for="Firstname">Firstname</label>
                                        <input data-validate="required" type="text" value="<?php echo $nasprofile->Firstname ?>" data-role="input" id="Firstname" name="Firstname">
                                    </div>
                                    <div class="cell-lg-6 cell-md-12 cell-sm-12 form-group">
                                        <label for="Lastname">Lastname</label>
                                        <input data-validate="required" type="text" value="<?php echo $nasprofile->Lastname ?>" data-role="input" id="Lastname" name="Lastname">
                                    </div>
                                    <div class="cell-lg-6 cell-md-12 cell-sm-12 form-group">
                                        <label for="Middlename">Middlename</label>
                                        <input data-validate="required" value="<?php echo $nasprofile->Middlename ?>" type="text" data-role="input" id="Middlename" name="Middlename">
                                    </div>
                                    <div class="cell-lg-6 cell-md-12 cell-sm-12 form-group">
                                        <label for="ContactNumber">Contact Number</label>
                                        <input data-validate="required" type="number" value="<?php echo $nasprofile->ContactNumber ?>" id="ContactNumber" data-role="input" name="ContactNumber">
                                    </div>
                                    <div class="cell-lg-12 cell-md-12 cell-sm-12 form-group">
                                        <label for="Address">Address</label>
                                        <textarea data-validate="required" type="text" data-role="textarea" id="Address" name="Address"><?php echo $nasprofile->Address ?></textarea>
                                    </div>
                                    <div class="cell-lg-6 cell-md-12 cell-sm-12 form-group">
                                        <label for="Birthdate">Birthdate</label>
                                        <input data-validate="required" type="text" data-value="<?php echo $nasprofile->Birthdate ?>" data-role="datepicker" id="Birthdate" name="Birthdate">
                                    </div>
                                    <div class="cell-lg-6 cell-md-12 cell-sm-12 form-group">
                                        <label for="Deparment">Select Department</label>
                                        <input type="hidden" name="" value="">
                                        <select data-validate="required" data-role="select" id="Department" name="Department">
                                            <?php
                                                if($dep){
                                                    foreach ($dep as $row) {
                                                        if($nasprofile->DepartmentID==$row['DepartmentID']){
                                                            echo '<option selected value="'.$row['DepartmentID'].'">'.$row['DepartmentName'].'</option>';
                                                        }else{
                                                            echo '<option value="'.$row['DepartmentID'].'">'.$row['DepartmentName'].'</option>';
                                                        }

                                                    }
                                                }
                                             ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="cell-lg-4 cell-md-12 cell-sm-12 mt-1">
                                <div class="img-container thumbnail">
                                    <img id="imgshow" src="<?php echo base_url("assets/uploads/Picture/").$nasprofile->Filename; ?>">
                                    <span class="title">
                                        <input type="file" id="UploadPic" name="UploadPic" data-prepend="Change photo: " class="mt-1" data-role="file" data-caption="Choose file">
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="stub ml-auto mt-2">
                                <button type="button" class="button bg-darkRed fg-white drop-shadow">CANCEL</button>
                                <button type="submit" class="button bg-darkBlue fg-white drop-shadow">UPDATE INFO</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div id="target_schedule">
                    <?php
                        if($nasschedule==false){
                            echo 'No schedule. Please assign schedule by clicking the assign button.<button id="btnAssign" class="button bg-darkBlue fg-white">Assign</button>';
                        }else{
                            echo '<input type="hidden" id="txtSchedID" value="'.$nasschedule->ScheduleID.'">';
                            echo '<div class="row">';
                            echo '<div class="cell">Schedule Description : '.$nasschedule->ScheduleDescription.'</div>';
                            echo '<div class="stub ml-auto"><button id="btnAssignNew" class="button bg-darkBlue fg-white">Assign new schedule</button></div>';
                            echo '</div>';
                            echo '<div class="row"><div class="cell">Shift : '.$nasschedule->Shift.'</div></div>';
                            echo '<table id="tblDailySchedule" class="table striped table-border win-shadow mt-3" data-role="table" data-pagination="true">';
                                echo '<thead>';
                                    echo '<tr>';
                                        echo '<th>Day</th>';
                                        echo '<th class="sortable-column">Time</th>';
                                    echo '</tr>';
                                echo '</thead>';
                                echo '<tbody class="cell-hover">';
                                    if($dailysched){
                                        foreach ($dailysched as $ds) {
                                            echo '<tr>';
                                                echo '<td>'.$ds["Day"].'</td>';
                                                echo '<td>'.date('h:i a', strtotime(($ds["StartTime"]))).' - '.date('h:i a', strtotime(($ds["EndTime"]))).'</td>';
                                            echo '</tr>';
                                        }
                                    }else{
                                        echo '<tr><td colspan="2">No daily schedule.</td></tr>';
                                    }
                                echo '</tbody>';
                            echo '</table>';
                        }
                     ?>
                </div>
                <div id="target_attendance">
                    <div class="row">
                        <div class="cell-12">
                            <div class="mx-auto"
                                 data-title-caption="DTR"
                                 data-collapsible="true"
                                 data-cls-title="bg-darkBlue fg-white" data-role="panel">
                                 <div class="row">
                                     <div class="cell">
                                         <label class="place-right mt-1" for="">Schoolyear:</label>
                                     </div>
                                     <div class="stub">
                                         <select class="filter" id="cmbAttendanceSchoolyear">
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
                                         <label class="place-right mt-1" for="">Semester :</label>
                                     </div>
                                     <div class="stub">
                                         <select class="filter" id="cmbAttendaceSemester">
                                             <option value="First Semester">First Semester</option>
                                             <option value="Second Semester">Second Semester</option>
                                         </select>
                                     </div>
                                     <div class="cell">
                                         <label class="place-right mt-1" for="">Month:</label>
                                     </div>
                                     <div class="stub">
                                         <select class="filter" id="cmbFilterMonth">
                                             <?php
                                                 if(isset($month)){
                                                     foreach ($month as $row) {
                                                         echo '<option value="'.$row['Month'].'">'.$row['Month'].'</option>';
                                                     }
                                                 }
                                              ?>
                                         </select>
                                     </div>
                                 </div>
                                 <div class="row">
                                     <div class="cell-12">
                                         <strong>Total Number of Lates: <span id="lblNumLates"></span></strong>
                                     </div>
                                     <div class="cell-12">
                                         <strong>Total Number of Absences: <span id="lblNumAbsents"></span></strong>
                                     </div>
                                 </div>
                                 <div class="row">
                                     <div class="cell">
                                         <table id="tblNasAttendance" class="table striped table-border cell-border mt-3">
                                             <thead>
                                                 <tr>
                                                     <th>Date/Time</th>
                                                     <th>Type</th>
                                                 </tr>
                                             </thead>
                                             <tbody>

                                             </tbody>
                                         </table>
                                     </div>
                                 </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="target_grades">
                    <div class="row">
                        <div class="cell">
                            <?php echo $nasprofile->Firstname.' '.$nasprofile->Lastname; ?> Grades
                        </div>
                        <div class="stub ml-auto">
                            <button type="button" onclick="Metro.dialog.open('#ImportNasGradeDialog')" class="button bg-darkBlue fg-white" name="button">Import</button>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="cell">
                            <label class="place-right mt-1" for="">Schoolyear:</label>
                        </div>
                        <div class="cell">
                            <select class="filter" id="cmbShoolyear">
                                <?php
                                    foreach ($gradeschoolyear as $row) {
                                        echo '<option value="'.$row['Schoolyear'].'">'.$row['Schoolyear'].'</option>';
                                    }
                                 ?>
                            </select>
                        </div>
                        <div class="cell">
                            <label class="place-right mt-1" for="">Semester:</label>
                        </div>
                        <div class="cell">
                            <select class="filter" id="cmbSemester">
                                <option value="First Semester">First Semester</option>
                                <option value="Second Semester">Second Semester</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="cell">
                            <table id="tblNasGrade" class="table striped table-border cell-border">
                                <thead>
                                    <tr>
                                        <th>Subject</th>
                                        <th>Grade</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="stub mx-auto">
                            <strong>Average: <span id="lblAve"></span></strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="dialog" data-role="dialog" id="AssignNewScheduleDialog">
    <form data-role="validator" action="javascript:" data-on-validate-form="validateAssignSchedule">
        <div class="dialog-title">Assign <?php echo $nasprofile->Firstname.' '.$nasprofile->Lastname; ?> schedule.</div>
        <div class="dialog-content">
            <input type="hidden" name="NasID" value="<?php echo $nasprofile->NasID; ?>">
            <div class="cell form-group">
                <label for="cmbSchedule">Choose schedule</label>
                <select data-role="select" name="cmbSchedule">
                    <?php
                        foreach ($sched as $row) {
                            echo '<option value="'.$row['ScheduleID'].'">'.$row['ScheduleDescription'].'</option>';
                        }
                    ?>
                </select>
            </div>
        </div>
        <div class="dialog-actions">
            <button type="button" class="button js-dialog-close alert place-right">Close</button>
            <button type="submit" class="button primary place-right">Assign</button>
        </div>
    </form>
</div>
<div class="dialog" data-role="dialog" id="ImportNasGradeDialog">
    <form data-role="validator" action="javascript:" data-on-validate-form="validateNasGradeImport">
        <div class="dialog-title">Import Grade for <?php echo $nasprofile->Firstname.' '.$nasprofile->Lastname; ?></div>
        <div class="dialog-content">
            <div class="cell form-group">
                <label for="dtpImportSchoolyear">Schoolyear</label>
                <input data-validate="required" data-role="datepicker" id="dtpImportYear" name="dtpImportYear" data-day="false" data-month="false">
                <input type="hidden" name="dtpImportYear1" id="dtpImportYear1">
                <input class="text-center" readonly type="text" id="txtImportGradeYear" name="txtImportGradeYear" data-day="false" data-month="false">
                <span class="invalid_feedback">Schoolyear is required.</span>
            </div>
            <div class="cell form-group">
                <label for="cmbImportSemester">Semester</label>
                <select data-validate="required" data-role="select" id="cmbImportSemester" name="cmbImportSemester">
                    <option value="First Semester">First Semester</option>
                    <option value="Second Semester">Second Semester</option>
                </select>
                <span class="invalid_feedback">Semester is required.</span>
            </div>
            <div class="cell form-group">
                <label for="ExcelFile">Excel File</label>
                <input type="file" data-role="file" id="ExcelFile" name="ExcelFile">
            </div>
        </div>
        <div class="dialog-actions">
            <button type="button" class="button alert js-dialog-close place-right">Close</button>
            <button type="submit" class="button primary place-right">Import</button>
        </div>
    </form>
</div>
<div class="dialog" data-role="dialog" id="EditGradeDialog">
    <form data-role="validator" action="javascript:" data-on-validate-form="validateEditGrade">
        <div class="dialog-title">Update Grade.</div>
        <div class="dialog-content">
            <input type="hidden" name="txtUpdateGradeID" id="txtUpdateGradeID">
            <div class="cell form-group">
                <label for="txtUpdateGradeSubject">Subject</label>
                <input data-role="input" type="text" name="txtUpdateGradeSubject" id="txtUpdateGradeSubject">
            </div>
            <div class="cell form-group">
                <label for="txtUpdateGrade">Grade</label>
                <input data-role="input" type="number" name="txtUpdateGrade" id="txtUpdateGrade">
            </div>
        </div>
        <div class="dialog-actions">
            <button type="button" class="button alert js-dialog-close place-right">Close</button>
            <button type="submit" class="button primary place-right">Update</button>
        </div>
    </form>
</div>
</div>
</div>

<script>
    $(document).ready(function() {
        // $(window).on("load",function(){
        //     $('body').mCustomScrollbar({
        //         scrollButtons:{enable:true,scrollType:"stepped"},
		// 		keyboard:{scrollType:"stepped"},
		// 		mouseWheel:{scrollAmount:188},
		// 		theme:"rounded-dark",
		// 		autoExpandScrollbar:true,
		// 		snapAmount:188,
		// 		snapOffset:65
    	// 	});
        // });
        getNasAttendance();
        $("#tblNasGrade").DataTable();
        $("#btnAssign").click(function() {
            Metro.dialog.open("#AssignNewScheduleDialog");
        });
        $("#btnAssignNew").click(function() {
            Metro.dialog.open("#AssignNewScheduleDialog");
        });
        $("#dtpImportYear").change(function() {
            var year=new Date($("#dtpImportYear").val());
            $("#dtpImportYear1").val(year.getFullYear());
            $("#txtImportGradeYear").val(year.getFullYear()+1);
        });
        getNasGrades();
        $(".filter").change(function () {
            getNasGrades();
            getNasAttendance();
        });
        $("#tblNasGrade tbody").on('click','button.edit',function() {
            var _stringId=$(this).attr('id');
            var _id=_stringId.split("Edit")[1];
            var _index=nasgradeData.findIndex(x=>x.NasGradesID==_id);
            $("#txtUpdateGradeID").val(_id);
            $("#txtUpdateGradeSubject").val(nasgradeData[_index].Subject);
            $("#txtUpdateGrade").val(nasgradeData[_index].Grade);
            Metro.dialog.open("#EditGradeDialog");
        });
        $("#tblNasGrade tbody").on('click','button.delete',function() {
            var _stringId=$(this).attr('id');
            var _id=_stringId.split("Delete")[1];
            Metro.dialog.create({
                title:"Are you sure you want to delete this?",
                content:"<p>This process can't be undone</p>",
                actions:[
                    {
                        caption:'Confirm Deletion',
                        cls:"bg-darkRed fg-white js-dialog-close",
                        onclick:function() {
                            $.ajax({
                                type:'ajax',
                                method:'POST',
                                url:'<?php echo base_url("index.php/Nas/deleteGrade") ?>',
                                data:{ID:_id},
                                dataType:'json',
                                success:function(response) {
                                    var html_content ="<p>Successfully Deleted.</p>";
                                     Metro.infobox.create(html_content,"success",{
                                         overlay:true
                                     });
                                     getNasGrades();
                                }
                            });
                        }
                    },
                    {
                        caption:'Cancel',
                        cls:"bg-darkBlue fg-white js-dialog-close"
                    }
                ]
            })

        });
        $("#UploadPic").change(function () {
            if (this.files && this.files[0]) {
                var formData = new FormData( $("#frmUpdateNas")[0] );
                $.ajax({
                    type:'ajax',
                    method:'POST',
                    url:'<?php echo base_url("index.php/Nas/changePicture") ?>',
                    data:formData,
                    dataType:'json',
                    contentType : false,
                    processData : false,
                    success:function(response){
                        if(response.success){
                            var html_content =
                            "<p>Successfully Changed.</p>";
                             Metro.infobox.create(html_content,"success",{
                                 overlay:true
                             });
                        }
                    }
                });
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#imgshow').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            }
        });
    });
    function ExcelDateToJSDate(serial) {
       var utc_days  = Math.floor(serial - 25569);
       var utc_value = utc_days * 86400;
       var date_info = new Date(utc_value * 1000);

       var fractional_day = serial - Math.floor(serial) + 0.0000001;

       var total_seconds = Math.floor(86400 * fractional_day);

       var seconds = total_seconds % 60;

       total_seconds -= seconds;

       var hours = Math.floor(total_seconds / (60 * 60));
       var minutes = Math.floor(total_seconds / 60) % 60;

       return new Date(date_info.getFullYear(), date_info.getMonth(), date_info.getDate(), hours, minutes, seconds);
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
    function validateUpdateNas() {
        $.ajax({
            type:'ajax',
            method:'POST',
            url:'<?php echo base_url("index.php/Nas/updateNasInfo") ?>',
            data:$("#frmUpdateNas").serialize(),
            dataType:'json',
            success:function(response){
                if(response.success){
                    var html_content =
                    "<p>Successfully Updated.</p>";
                     Metro.infobox.create(html_content,"success",{
                         overlay:true
                     });
                }
            }
        });
    }
    function getNasAttendance() {
        $.ajax({
            type:'ajax',
            method:'POST',
            url:'<?php echo base_url("index.php/Nas/getNasAttendance"); ?>',
            data:{IDNumber:$("#IDNumber").val(),Schoolyear:$("#cmbAttendanceSchoolyear").val(),Semester:$("#cmbAttendaceSemester").val(),Month:$("#cmbFilterMonth").val()},
            dataType:'json',
            success:function(response) {
                if(response.success){
                    var _tableContent='';
                    for (var i = 0; i < response.nasattendance.length; i++) {
                        _tableContent+='<tr>'
                                            +'<td>'+new Date(response.nasattendance[i].Date).toDateString()+" "+new Date(response.nasattendance[i].Date).toLocaleTimeString()+'</td>'
                                            +'<td>'+response.nasattendance[i].Type+'</td>'
                                       +'</tr>';
                    }
                    if($.fn.DataTable.isDataTable("#tblNasAttendance")){
                        $("#tblNasAttendance").DataTable().destroy().clear();
                    }
                    $("#tblNasAttendance tbody").html(_tableContent);
                    $("#tblNasAttendance").DataTable();
                }
            }
        });
        $.ajax({
            type:'ajax',
            method:'POST',
            url:'<?php echo base_url("index.php/Nas/getNasLate"); ?>',
            data:{IDNumber:$("#IDNumber").val(),Schoolyear:$("#cmbAttendanceSchoolyear").val(),Semester:$("#cmbAttendaceSemester").val(),Month:$("#cmbFilterMonth").val()},
            dataType:'json',
            success:function(response) {
                if(response.success){
                    $("#lblNumLates").text(response.late);
                }
            }
        });
        $.ajax({
            type:'ajax',
            method:'POST',
            url:'<?php echo base_url("index.php/Nas/getNasAbsents"); ?>',
            data:{IDNumber:$("#IDNumber").val(),Schoolyear:$("#cmbAttendanceSchoolyear").val(),Semester:$("#cmbAttendaceSemester").val(),Month:$("#cmbFilterMonth").val()},
            dataType:'json',
            success:function(response) {
                if(response.success){
                    $("#lblNumAbsents").text(response.absents);
                }
            }
        });
    }
    function validateAssignSchedule() {
        $.ajax({
            type:'ajax',
            method:'POST',
            url:'<?php echo base_url("index.php/Nas/assignSchedule") ?>',
            data:$(this).serialize(),
            dataType:'json',
            success:function(response){
                if(response.success){
                    Metro.dialog.close(".dialog");
                    var html_content =
                    "<p>Successfully Assigned.</p>";
                     Metro.infobox.create(html_content,"success",{
                         overlay:true
                     });
                     window.location.replace("<?php echo base_url('index.php/Nas/Info/').$nasprofile->NasID.'/Schedule';?>");
                }
            }
        });
    }
    function validateNasGradeImport() {
        var _formData=new FormData($(this)[0]);
        $.ajax({
            type:'ajax',
            method:'POST',
            url:'<?php echo base_url("index.php/Nas/uploadExcel"); ?>',
            data:_formData,
            dataType:'json',
            processData: false,
            contentType: false,
            success:function(uploadresponse){
                if(uploadresponse.success){
                    var _filename=uploadresponse.filename;
                    importExcel({
                        filename:"<?php echo base_url(); ?>assets/temp_files/"+_filename,
                        success:function (importresponse) {
                            var excelData=importresponse;
                            var _importedrows=0;
                            var _unimportedrows=0;
                            for (var i = 0; i < excelData.length; i++) {
                                var _excelRow=excelData[i];
                                _excelRow.Schoolyear=$('#dtpImportYear1').val()+'-'+$('#txtImportGradeYear').val();
                                _excelRow.Semester=$("#cmbImportSemester").val();
                                _excelRow.NasID=$("#txtNasID").val();
                                $.ajax({
                                    type:'ajax',
                                    method:'POST',
                                    url:'<?php echo base_url("index.php/Nas/importNasGrade") ?>',
                                    data:_excelRow,
                                    dataType:'json',
                                    async:false,
                                    success:function(response) {
                                        if(response.success){
                                            _importedrows++;
                                        }else{
                                            _unimportedrows++;
                                        }
                                    },
                                    error:function () {
                                        _unimportedrows++;
                                    }
                                });
                            }
                            var infoboxcontent="<p>"+_importedrows+" rows imported successfully. "+_unimportedrows+" failed.</p>";
                            Metro.infobox.create(infoboxcontent,"info",{overlay:true});
                            getNasGrades();
                        }
                    });
                }
            },
            error:function(){

            }
        });
    }
    var nasgradeData=[];
    function getNasGrades() {
        $.ajax({
            type:'ajax',
            method:'POST',
            url:'<?php echo base_url("index.php/Nas/getNasGrade") ?>',
            data:{SY:$("#cmbShoolyear").val(),sem:$("#cmbSemester").val(),id:$("#txtNasID").val()},
            dataType:'json',
            success:function(response){
                if(response.success){
                    var _tableContent='';
                    var _totalGrade=0;
                    var _totalGradeCount=0;
                    nasgradeData=response.nasgrades;
                    for (var i = 0; i < response.nasgrades.length; i++) {
                        _totalGrade=parseFloat(_totalGrade)+parseFloat(response.nasgrades[i].Grade);
                        _totalGradeCount++;
                        _tableContent+='<tr>'
                                             +'<td>'+response.nasgrades[i].Subject+'</td>'
                                             +'<td>'+response.nasgrades[i].Grade+'</td>'
                                             +'<td><div data-role="buttongroup" class="mx-auto"><button id="Edit'+response.nasgrades[i].NasGradesID+'" class="button edit small bg-darkBlue fg-white ml-1 mr-1 mif-info"></button><button id="Delete'+response.nasgrades[i].NasGradesID+'" class="button delete small bg-darkRed fg-white ml-1 mr-1 mif-bin"></button></div></td>'
                                      +'</tr>';
                    }
                    var _ave=(_totalGrade/_totalGradeCount);
                    $("#lblAve").text(_ave);
                    if($.fn.DataTable.isDataTable("#tblNasGrade")){
                        $("#tblNasGrade").DataTable().clear().destroy();
                    }
                    $("#tblNasGrade tbody").html(_tableContent);
                    $("#tblNasGrade").DataTable();
                }
            }
        });
    }
    function validateEditGrade() {
        $.ajax({
            type:'ajax',
            method:'POST',
            url:'<?php echo base_url("index.php/Nas/updateGrade") ?>',
            data:$(this).serialize(),
            dataType:'json',
            success:function(response) {
                if(response.success){
                    Metro.dialog.close("#EditGradeDialog");
                    var infoboxcontent="<p>Successfully Updated.</p>";
                    Metro.infobox.create(infoboxcontent,"success",{overlay:true});
                    getNasGrades();
                }
            }
        });
    }
</script>
</body>
</html>
