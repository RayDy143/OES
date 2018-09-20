<div class="cell bg-white p-3 ml-4 mr-4" style="overflow:auto;overflow-x:hidden;">
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
            <li class="page-item"><a href="<?php echo base_url('index.php/Masterfile'); ?>" class="page-link">Masterfile</a></li>
            <li class="page-item"><a href="<?php echo base_url('index.php/Scheduler'); ?>" class="page-link">Scheduler</a></li>
            <li class="page-item"><a href="#" class="page-link">Manage</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="stub">
            <h4>Manage Schedule </h4>
        </div>
    </div>
    <hr class="row thick bg-black drop-shadow">
    <div class="row">
        <div class="cell">
            <ul class="tabs-expand-md" data-role="tabs">
                <li><a href="#target_info">Info</a></li>
                <li><a href="#target_daily_sched">Daily Schedule</a></li>
            </ul>
            <div class="border bd-default p-5">
                <div id="target_info">
                    <input type="hidden" id="lblScheduleID" value="<?php echo $schedule->ScheduleID; ?>">
                    <div class="row">
                        <div class="cell">Schedule Description : <span id="schedDescription"><?php echo $schedule->ScheduleDescription; ?></span> </div>
                        <button type="button" id="btnEditSchedInfo" class="button stub bg-darkBlue fg-white mr-2">EDIT INFO</button>
                    </div>
                    <div>Shift : <span id="schedShift"><?php echo $schedule->Shift; ?></span> </div>
                    <hr class="thick bg-dark">
                    List of Non Academic Scholars assigned in this schedule.
                    <table id="tblNas" class="table striped table-border cell-border">
                        <thead>
                            <tr>
                                <th width="50px">Picture</th>
                                <th>Full name</th>
                                <th>Department</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="cell-hover">
                            <?php
                                if($nasschedule){
                                    foreach($nasschedule as $row) {
                                        echo '<tr>';
                                            echo '<td><div class="avatar"><img style="width:50px;" src="'.base_url('assets/uploads/Picture/').$row['Filename'].'"></div></td>';
                                            echo '<td>'.$row['Firstname'].' '.$row['Lastname'].' '.'</td>';
                                            echo '<td>'.$row['DepartmentName'].'</td>';
                                            echo '<td><div data-role="buttongroup" class="mx-auto"><a href="'.base_url('index.php/Nas/Info/').$row['NasID'].'" class="button edit small bg-darkBlue fg-white ml-1 mr-1 mif-info"></a></div></td>';
                                        echo '</tr>';
                                    }
                                }
                             ?>
                        </tbody>
                    </table>
                    <!-- <p class="text-center h3 text-light">Sort by</p>
                        <div class="d-flex flex-justify-center flex-wrap m-2">
                            <div class="cell-md-4 mt-4">
                                <select data-role="select" data-filter="false" data-prepend="Department:" data-on-change="$('#nas').data('list').filter(this.value)">
                                    <option value="" selected>All</option>
                                    <?php
                                        foreach ($dep as $row) {
                                            echo '<option value="'.$row['DepartmentName'].'">'.$row['DepartmentName'].'</option>';
                                        }
                                     ?>
                                </select>
                            </div>
                        </div>

                        <ul id="nas"
                            data-role="list"
                            data-sort-class="painting-name"
                            data-sort-dir="desc"
                            data-cls-list="unstyled-list row flex-justify-center mt-4"
                            data-cls-list-item="cell-sm-6 cell-md-2"
                            data-show-pagination="true"
                            data-items="12"
                        >
                        <?php
                            foreach ($nasschedule as $row) {
                                echo '<li>';
                                    echo '<figure class="text-center">';
                                        echo '<div class="img-container thumbnail">';
                                            echo '<img src="'.base_url('assets/uploads/Picture/').$row['Filename'].'" alt="Gogen, When is the wedding">';
                                        echo '</div>';
                                        echo '<figcaption class="painting-name">'.$row['Firstname'].' '.$row['Lastname'].'</figcaption>';
                                        echo '<figcaption class="painting-author text-bold">'.$row['DepartmentName'].'</figcaption>';
                                    echo '</figure>';
                                echo '</li>';
                            }
                         ?>
                        </ul> -->
                </div>
                <div id="target_daily_sched">
                    <div class="row">
                        <div class="cell">
                            Daily Schedule
                        </div>
                    </div>
                    <hr class="thick bg-darkBlue">
                    <div class="row" id="dailyschedulecontainer">
                        <div class="cell">
                            <table id="tblDailySchedule" class="table table-border striped cell-hover">
                                <thead>
                                    <tr>
                                        <th>Day</th>
                                        <th>Time</th>
                                        <th>Action</th>
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
    <div data-role="dialog" class="dialog" id="EditDailySchedDialog">
        <form id="EditDailySched" action="javascript:" data-role="validator" data-on-validate-form="validateEditDailySched">
            <div class="dialog-title">Edit Dialy Schedule</div>
            <div class="dialog-content">
                <div class="row">
                    <input type="hidden" name="txtDailyScheduleID" id="txtDailyScheduleID" value="">
                    <div class="cell-12 form-group">
                        <label for="Day"></label>
                        <select name="Day" id="cmbDay">
                            <?php
                                foreach ($day as $row) {
                                    echo '<option value="'.$row['DayID'].'">'.$row['Day'].'</option>';
                                }
                             ?>
                        </select>
                    </div>
                    <div class="cell form-group">
                        <label for="StartDate">Start Date</label>
                        <input data-validate="required" data-role="input" id="txtStartTime" name="StartTime" value="">
                    </div>
                    <div class="cell form-group">
                        <label for="EndDate">End Date</label>
                        <input data-validate="required" data-role="input" id="txtEndTime" name="EndTime" value="">
                    </div>
                </div>
            </div>
            <div class="dialog-actions">
                <button type="submit" class="button bg-darkBlue fg-white place-right" name="button">Update</button>
                <button type="button" class="button js-dialog-close bg-darkRed fg-white place-right" name="button">Cancel</button>
            </div>
        </form>
    </div>
    <div data-role="dialog" class="dialog" id="EditSchedInfo">
        <form id="frmEditSchedDetail" action="javascript:" data-role="validator" data-on-validate-form="validateEditSched">
            <div class="dialog-title">Edit Schedule Details</div>
            <div class="dialog-content">
                <div class="row">
                    <input type="hidden" name="ScheduleID" value="<?php echo $schedule->ScheduleID; ?>">
                    <div class="cell form-group">
                        <label for="txtSchedDes">Schedule Description</label>
                        <input data-validate="required" data-role="input" id="txtSchedDes" name="txtSchedDes">
                    </div>
                    <div class="cell-12 form-group">
                        <label for="ShiftID">Shift</label>
                        <select data-role="select" id="ShiftID" name="ShiftID">
                            <?php
                                foreach ($shift as $row) {
                                    echo '<option value="'.$row['ShiftID'].'">'.$row['Shift'].'</option>';
                                }
                             ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="dialog-actions">
                <button type="submit" class="button bg-darkBlue fg-white place-right" name="button">Update</button>
                <button type="button" class="button js-dialog-close bg-darkRed fg-white place-right" name="button">Cancel</button>
            </div>
        </form>
    </div>
</div>
</div>
</div>
<script>
    $(document).ready(function(){
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
        $("#tblNas").DataTable();
        $("#tblDailySchedule").DataTable();
        getDialySchedule();
        $("#btnEditSchedInfo").click(function () {
            $("#txtSchedDes").val($('#schedDescription').text());
            Metro.dialog.open('#EditSchedInfo');
        });
        $("#txtStartTime").mdtimepicker();
        $("#txtEndTime").mdtimepicker();
        $('#tblDailySchedule tbody').on('click','button.edit',function(){
            var _stringId=$(this).attr('id');
            var _id=_stringId.split('Edit')[1];
            var _index=dailyScheduleData.findIndex(x=>x.DailyScheduleID==_id);
            $("#cmbDay").val(dailyScheduleData[_index].DayID);
            $("#txtDailyScheduleID").val(dailyScheduleData[_index].DailyScheduleID);
            $("#txtStartTime").val(tConv24(dailyScheduleData[_index].StartTime));
            $("#txtEndTime").val(tConv24(dailyScheduleData[_index].EndTime));
            $("#txtStartTime").mdtimepicker();
            $("#txtEndTime").mdtimepicker();
            Metro.dialog.open("#EditDailySchedDialog");
        });
    });
    function tConv24(time24) {
      var ts = time24;
      var H = +ts.substr(0, 2);
      var h = (H % 12) || 12;
      h = (h < 10)?("0"+h):h;  // leading 0 at the left for 1 digit hours
      var ampm = H < 12 ? " AM" : " PM";
      ts = h + ts.substr(2, 3) + ampm;
      return ts;
    };
    function validateEditSched() {
        $.ajax({
            type:'ajax',
            method:'POST',
            url:'<?php echo base_url("index.php/Scheduler/editScheduleDetail") ?>',
            data:$(this).serialize(),
            dataType:'json',
            success:function (response) {
                if(response.success){
                    var infobox_content="<p>Successfully Updated</p>";
                    Metro.infobox.create(infobox_content,'success',{overlay:true});
                    $("#schedDescription").text($("#txtSchedDes").val());
                    $("#schedShift").text($("#ShiftID option:selected").text());
                    Metro.dialog.close("#EditSchedInfo");
                }
            },
            error:function() {
                var infoboxcontent="<p>System fatal error.</p>";
                Metro.infobox.create(infoboxcontent,"alert",{overlay:true});
            }
        })
    }
    function validateEditDailySched() {
        $.ajax({
            type:'ajax',
            method:'POST',
            url:'<?php echo base_url("index.php/Scheduler/updateDailySched") ?>',
            data:{ID:$("#txtDailyScheduleID").val(),Start:$("#txtStartTime").val(),End:$("#txtEndTime").val()},
            dataType:'json',
            success:function (response) {
                if(response.success){
                    var infoboxcontent="<p>Success Updated.</p>";
                    Metro.infobox.create(infoboxcontent,"success",{overlay:true});
                    Metro.dialog.close("#EditDailySchedDialog");
                    getDialySchedule();
                }
            },
            error:function () {
                var infoboxcontent="<p>System fatal error.</p>";
                Metro.infobox.create(infoboxcontent,"alert",{overlay:true});
            }
        })
    }
    var dailyScheduleData=[];
    function getDialySchedule(){
        $.ajax({
            type:'ajax',
            method:'POST',
            url:'<?php echo base_url("index.php/Scheduler/getDailySched") ?>',
            data:{ScheduleID:$("#lblScheduleID").val()},
            dataType:'json',
            success:function(response){
                if(response.success){
                    var _data=response.dailysched;
                    dailyScheduleData=_data;
                    var _content=''
                    for (var i = 0; i < _data.length; i++) {
                        _content+='<tr>'
                                    +'<td>'+_data[i].Day+'</td>'
                                    +'<td>'+tConv24(_data[i].StartTime)+'-'+tConv24(_data[i].EndTime)+'</td>'
                                    +'<td><div data-role="buttongroup" class="mx-auto"><button id="Edit'+_data[i].DailyScheduleID+'" class="button edit small bg-darkBlue fg-white ml-1 mr-1 mif-info"></button></div></td>'
                                 +'</tr>';
                    }
                    if($.fn.DataTable.isDataTable("#tblDailySchedule")){
                        $("#tblDailySchedule").DataTable().clear().destroy();
                    }
                    $("#tblDailySchedule tbody").html(_content);
                    $("#tblDailySchedule").DataTable();
                }
            },
            error:function(){
                var infoboxcontent="<p>System fatal error.</p>";
                Metro.infobox.create(infoboxcontent,"alert",{overlay:true});
            }
        });
    }
</script>
</body>
</html>
