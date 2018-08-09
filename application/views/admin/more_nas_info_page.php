<div class="cell bg-white p-3 ml-4" style="overflow:auto;">
    <div class="row">
        <a type="button" href="javascript:history.back();" class="button stub drop-shadow bg-red fg-white"><span class="mif-arrow-left"></span> Go Back</a>
        <div class="stub ml-auto">
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
            <h4>Non-Academic Scholars Info</h4>
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
                                    <input type="hidden" name="NasID" value="<?php echo $nasprofile->NasID ?>">
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
                            echo 'No schedule. Please assign schedule by clicking the assign button.<a href='.base_url('index.php/Nas/AssignSchedule/').$nasprofile->NasID.' class="button bg-darkBlue fg-white">Assign</a>';
                        }else{
                            echo '<input type="hidden" id="txtSchedID" value="'.$nasschedule->ScheduleID.'">';
                            echo '<div class="row">';
                            echo '<div class="cell">Schedule Description : '.$nasschedule->ScheduleDescription.'</div>';
                            echo '<div class="stub ml-auto"><a href="'.base_url('index.php/Nas/AssignSchedule/').$nasprofile->NasID.'" class="button bg-darkBlue fg-white">Assign new schedule</a></div>';
                            echo '</div>';
                            echo '<div class="row"><div class="cell">Shift : '.$nasschedule->Shift.'</div></div>';
                            echo '<table id="tblSchedule" class="table striped table-border win-shadow mt-3" data-role="table" data-pagination="true">';
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

                </div>
                <div id="target_grades">

                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

<script>
    $(document).ready(function() {
        $(window).on("load",function(){
            $('body').mCustomScrollbar({
                scrollButtons:{enable:true,scrollType:"stepped"},
				keyboard:{scrollType:"stepped"},
				mouseWheel:{scrollAmount:188},
				theme:"rounded-dark",
				autoExpandScrollbar:true,
				snapAmount:188,
				snapOffset:65
    		});
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
        })
    }
</script>
</body>
</html>
