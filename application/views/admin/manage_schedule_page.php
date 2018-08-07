<div class="cell bg-white p-6 ml-2">
    <div class="row">
        <a type="button" href="javascript:history.back();" class="button drop-shadow bg-red fg-white"><span class="mif-arrow-left"></span> Go Back</a>
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
            <h3>Manage Schedule </h3>
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
                        <div class="cell">Schedule Description : <?php echo $schedule->ScheduleDescription; ?></div>
                        <button type="button" class="button stub bg-darkBlue fg-white mr-2">EDIT INFO</button>
                    </div>
                    <div>Shift : <?php echo $schedule->Shift; ?><div>
                    <hr class="thick bg-darkBlue">
                    <h5>List of Non Academic Scholars assigned in this schedule.</h5>
                    <table class="table striped table-border cell-border">
                        <thead>
                            <tr>
                                <th>Full name</th>
                            </tr>
                        </thead>
                        <tbody class="cell-hover">
                            <?php
                                if($nasschedule){
                                    foreach($nasschedule as $row) {
                                        echo '<tr>';
                                            echo '<td>'.$row['Firstname'].' '.$row['Lastname'].' '.'</td>';
                                        echo '</tr>';
                                    }
                                }
                             ?>
                        </tbody>
                    </table>
                </div>
                <div id="target_daily_sched">
                    <div class="row">
                        <h5 class="cell">Daily Schedule</h5>
                        <button type="button" onclick="Metro.dialog.open('#AddDailySchedDialog');" class="button mr-2 stub drop-shadow bg-darkBlue fg-white" id="btnAddDaily" name="button">ADD DAILY SCHEDULE</button>
                    </div>
                    <hr class="thick bg-darkBlue">
                    <div class="row" id="dailyschedulecontainer">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div data-role="dialog" class="dialog" id="AddDailySchedDialog">
        <form id="AddDialySchedForm" action="javascript:" data-role="validator" data-on-validate-form="validateDialySched">
            <div class="dialog-title">Add Dialy Schedule</div>
            <div class="dialog-content">
                <div class="row">
                    <input type="hidden" name="ScheduleID" value="<?php echo $schedule->ScheduleID; ?>">
                    <div class="cell-12 form-group">
                        <label for="Day"></label>
                        <select data-role="select" name="Day">
                            <option value="Monday">Monday</option>
                            <option value="Tuesday">Tuesday</option>
                            <option value="Wednesday">Wednesday</option>
                            <option value="Thursday">Thursday</option>
                            <option value="Friday">Friday</option>
                            <option value="Saturday">Saturday</option>
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
                <button type="submit" class="button bg-darkBlue fg-white place-right" name="button">Add</button>
                <button type="button" class="button js-dialog-close bg-darkRed fg-white place-right" name="button">Cancel</button>
            </div>
        </form>
    </div>
</div>
</div>
</div>
<script>
    $(document).ready(function(){
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
        $("#txtStartTime").mdtimepicker();
        $("#txtEndTime").mdtimepicker();
        $('body').on('click','button.update-daily-sched',function(){
            var _stringId=$(this).attr('id');
            var _id=_stringId.split('UpdateDaily')[1];
            var _startTime=$("#UpdateStart"+_id).val();
            var _endTime=$("#UpdateEnd"+_id).val();
            if(_startTime!=""||_endTime!=""){
                Metro.dialog.create({
                    title:'Confirm update',
                    content:'<p>Are you sure you want to update this?',
                    actions:[
                        {
                            caption:'Update',
                            cls:'bg-darkBlue fg-white js-dialog-close',
                            onclick:function(){
                                $.ajax({
                                    type:'ajax',
                                    method:'POST',
                                    url:'<?php echo base_url("index.php/Scheduler/updateDailySched"); ?>',
                                    data:{ID:_id,Start:_startTime,End:_endTime},
                                    dataType:'json',
                                    success:function(response){
                                        var html_content =
                                        "<p>Successfully updated.</p>";
                                         Metro.infobox.create(html_content,"success",{
                                             overlay:true
                                         });
                                    },
                                    error:function(){
                                        var html_content =
                                        "<p>System error. Please contact you system administrator immediately.</p>";
                                         Metro.infobox.create(html_content,"alert",{
                                             overlay:true
                                         });
                                    }
                                });
                            }
                        },
                        {
                            caption:'Close',
                            cls:'bg-darkRed fg-white js-dialog-close'
                        }
                    ]
                });
            }else{
                var html_content =
                "<p>Please dont leave the fields blank.</p>";
                 Metro.infobox.create(html_content,"alert",{
                     overlay:true
                 });
            }
        });
        $('body').on('click','button.delete-daily-sched',function(){
            var _stringId=$(this).attr('id');
            var _id=_stringId.split('DeleteDaily')[1];
            Metro.dialog.create({
                title:'Confirm update',
                content:'<p>Are you sure you want to delete this?',
                actions:[
                    {
                        caption:'Delete',
                        cls:'bg-darkBlue fg-white js-dialog-close',
                        onclick:function(){
                            $.ajax({
                                type:'ajax',
                                method:'POST',
                                url:'<?php echo base_url("index.php/Scheduler/deleteDailySchedule") ?>',
                                data:{ID:_id},
                                dataType:'json',
                                success:function(response){
                                    if(response.success){
                                        var html_content =
                                        "<p>Successfully deleted.</p>";
                                         Metro.infobox.create(html_content,"success",{
                                             overlay:true
                                         });
                                         getDialySchedule();
                                    }
                                },
                                error:function(){
                                    var html_content =
                                    "<p>System error.</p>";
                                     Metro.infobox.create(html_content,"alert",{
                                         overlay:true
                                     });
                                }
                            });
                        }
                    },
                    {
                        caption:'Close',
                        cls:'bg-darkRed fg-white js-dialog-close'
                    }
                ]
            });
        });
    });
    getDialySchedule();
    function tConv24(time24) {
      var ts = time24;
      var H = +ts.substr(0, 2);
      var h = (H % 12) || 12;
      h = (h < 10)?("0"+h):h;  // leading 0 at the left for 1 digit hours
      var ampm = H < 12 ? " AM" : " PM";
      ts = h + ts.substr(2, 3) + ampm;
      return ts;
    };
    function validateDialySched(){
        $.ajax({
            type:'ajax',
            method:'POST',
            url:'<?php echo base_url("index.php/Scheduler/addDailySched") ?>',
            data:$(this).serialize(),
            dataType:'json',
            success:function(response){
                if(response.success){
                    var html_content =
                    "<p>Successfully Added.</p>";
                     Metro.infobox.create(html_content,"success",{
                         overlay:true
                     });
                     getDialySchedule();
                }else if(response.duplicate){
                    var html_content =
                    "<p>The day you are tyring to add already exist.Please select another day.</p>";
                     Metro.infobox.create(html_content,"alert",{
                         overlay:true
                     });
                }
            },
            error:function(){

            }
        });
    }
    function getDialySchedule(){
        $.ajax({
            type:'ajax',
            method:'POST',
            url:'<?php echo base_url("index.php/Scheduler/getDailySched") ?>',
            data:{ScheduleID:$("#lblScheduleID").val()},
            dataType:'json',
            success:function(response){
                if(response.success){
                    $("#dailyschedulecontainer").empty();
                    var _data=response.dailysched;
                    var _content=''
                    for (var i = 0; i < _data.length; i++) {
                        _content+= '<div class="cell cell-lg-6 cell-md-12 cell-sm-12">'
                                        +'<div  style="width:100%;" data-cls-title="bg-darkBlue fg-white" data-cls-panel="win-shadow" class="mt-4" data-role="panel" data-title-caption="'+_data[i].Day+'" data-collapsible="true" data-collapsed="true">'
                                            +'<div class="row">'
                                                +'<input type="hidden" name="ScheduleID" id="ScheduleID" value="">'
                                                    +'<input type="hidden" id="UpdateDay" value="'+_data[i].Day+'"/>'
                                                    +'<div class="cell-lg-6 form-group" style="margin-top:0;">'
                                                        +'<label for="StartTime">Start Time</label>'
                                                        +'<input id="UpdateStart'+_data[i].DailyScheduleID+'" data-role="input" readonly class="tpickerStart" type="text" value="'+tConv24(_data[i].StartTime)+'" id="StartTime" name="StartTime">'
                                                    +'</div>'
                                                    +'<div class="cell-lg-6 form-group"  style="margin-top:0;">'
                                                        +'<label for="">End Time</label>'
                                                        +'<input id="UpdateEnd'+_data[i].DailyScheduleID+'" data-role="input" readonly class="tpickerStart" value="'+tConv24(_data[i].EndTime)+'" type="text" id="EndTime" name="EndTime">'
                                                    +'</div>'
                                                    +'<div class="cell mt-2">'
                                                        +'<button id="UpdateDaily'+_data[i].DailyScheduleID+'" type="submit" class="button update-daily-sched bg-darkBlue fg-white place-right">UPDATE</button>'
                                                        +'<button id="DeleteDaily'+_data[i].DailyScheduleID+'" type="submit" class="button delete-daily-sched bg-darkRed fg-white place-right">DELETE</button>'
                                                    +'</div>'
                                            +'</div>'
                                        +'</div>'
                                    +'</div>';
                    }
                    $("#dailyschedulecontainer").append(_content);
                    $(".tpickerStart").mdtimepicker();

                }
            },
            error:function(){

            }
        });
    }
</script>
</body>
</html>
