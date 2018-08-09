<div class="cell bg-white p-3 ml-4">
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
            <li class="page-item"><a href="<?php echo base_url('index.php/Masterfile'); ?>" class="page-link">Masterfile</a></li>
            <li class="page-item"><a href="<?php echo base_url('index.php/Scheduler'); ?>" class="page-link">Scheduler</a></li>
        </ul>
        <div class="stub ml-auto">
            <a href="<?php echo base_url('index.php/Scheduler/Add') ?>" class="button bg-darkBlue fg-white win-shadow" name="button">Add new schedule</a>
        </div>
    </div>
    <div class="row">
        <div class="stub">
            <h3>Scheduler</h3>
        </div>
        <div class="stub ml-auto">
            <input type="text" class="win-shadow" data-role="search">
        </div>
    </div>
    <hr class="row thick bg-black drop-shadow">
    <div class="row bg-light">
        <div class="cell">
            <div class="row" id="schedContainer">
                <span class="mif-spinner2 mif-5x ani-spin mx-auto"></span>
                <!-- <div class="cell-12" data-role="panel" data-title-caption="Title here" data-collapsed="true" data-collapsible="true">

                </div> -->
                <!-- <div class="cell-12" data-role="panel" data-title-caption="Title here" data-collapsed="true" data-collapsible="true">

                </div> -->
            </div>
        </div>
    </div>
</div>
</div>
</div>
<div class="dialog" data-role="dialog" id="RemoveScheduleDialog">
    <div class="dialog-title">Are you sure you want to delete this schedule?</div>
    <div class="dialog-content">
        <p><strong class="fg-red">Warning! </strong>This process cant be undone.</p>
        <input type="hidden" id="txtScheduleID" name="ScheduleID">
    </div>
    <div class="dialog-actions">
        <button type="submit" id="btnDelete" class="button bg-darkRed fg-white place-right">Delete</button>
        <button type="button" class="button place-right js-dialog-close">Abort</button>
    </div>
</div>
<script>
    $(document).ready(function(){
        $(window).on("load",function(){
            $('body').mCustomScrollbar({
                scrollButtons:{enable:true},
				mouseWheel:{scrollAmount:188},
				theme:"rounded-dark",
				autoExpandScrollbar:true,
				snapAmount:188,
				snapOffset:65
    		});
        });
        $('body').on('click','button.delete',function(){
            Metro.dialog.open('#RemoveScheduleDialog');
            var _strid=$(this).attr('id');
            var _id=_strid.split('Delete')[1];
            $('#txtScheduleID').val(_id);

        });
        $("#btnDelete").click(function() {
            $.ajax({
                type:'ajax',
                method:'POST',
                url:'<?php echo base_url("index.php/Scheduler/deleteSchedule") ?>',
                data:{ID:$("#txtScheduleID").val()},
                dataType:'json',
                success:function(response){
                    if(response.deleteerror){
                        var html_content ="<p>The schedule you are trying to delete is currently inused. Please make sure to delete schedule that are not currently in used.</p>";
                         Metro.infobox.create(html_content,"alert",{
                             overlay:true
                         });
                          Metro.dialog.close("#RemoveScheduleDialog");
                    }else if(response.success){
                        var html_content ="<p>Successfully deleted.</p>";
                         Metro.infobox.create(html_content,"success",{
                             overlay:true
                         });
                         Metro.dialog.close("#RemoveScheduleDialog");
                         getSchedule();
                    }
                },error:function(){
                    var html_content ="<p>The schedule you are trying to delete.</p>";
                     Metro.infobox.create(html_content,"alert",{
                         overlay:true
                     });
                }
            });
        });
    });
    getSchedule();
    function tConv24(time24) {
      var ts = time24;
      var H = +ts.substr(0, 2);
      var h = (H % 12) || 12;
      h = (h < 10)?("0"+h):h;  // leading 0 at the left for 1 digit hours
      var ampm = H < 12 ? " AM" : " PM";
      ts = h + ts.substr(2, 3) + ampm;
      return ts;
    };
    function getSchedule() {
        $.ajax({
            type:'ajax',
            url:'<?php echo base_url("index.php/Scheduler/getSchedule") ?>',
            dataType:'json',
            success:function(response){
                if(response.success){
                    var _sched=response.sched;
                    var _html='';
                    var _total=0;
                    $("#schedContainer").empty();

                    for (var i = 0; i < _sched.length; i++) {
                        _total=0;
                        $.ajax({
                            type:'ajax',
                            method:'POST',
                            url:'<?php echo base_url("index.php/Scheduler/getNasScheduleNumber") ?>',
                            data:{ID:_sched[i].ScheduleID},
                            dataType:'json',
                            async:false,
                            success:function(response){
                                if(response.nasschedule){
                                    _total=response.nasschedule.length;
                                }
                            }
                        });
                        var _html1='';
                        $.ajax({
                            type:'ajax',
                            method:'POST',
                            url:'<?php echo base_url("index.php/Scheduler/getDailySched"); ?>',
                            data:{ScheduleID:_sched[i].ScheduleID},
                            dataType:'json',
                            async:false,
                            success:function(response){
                                if(response.success){
                                    var _data=response.dailysched;
                                    for (var i = 0; i < _data.length; i++) {
                                        _html1+='<div class="cell cell-lg-6 cell-md-12 cell-sm-12">'
                                                    +'<div  style="width:100%;" class="mt-4" data-role="panel" data-title-caption="'+_data[i].Day+'" data-collapsible="true">'
                                                        +'<div class="row">'
                                                            +'<input type="hidden" name="ScheduleID" id="ScheduleID" value="">'
                                                                +'<input type="hidden" id="UpdateDay" value="'+_data[i].Day+'"/>'
                                                                +'<div class="cell-lg-6 form-group" style="margin-top:0;">'
                                                                    +'<label for="StartTime">Start Time</label>'
                                                                    +'<input id="UpdateStart'+_data[i].DailyScheduleID+'" readonly class="tpickerStart" type="text" value="'+tConv24(_data[i].StartTime)+'" id="StartTime" name="StartTime">'
                                                                +'</div>'
                                                                +'<div class="cell-lg-6 form-group"  style="margin-top:0;">'
                                                                    +'<label for="">End Time</label>'
                                                                    +'<input id="UpdateEnd'+_data[i].DailyScheduleID+'" readonly class="tpickerStart" value="'+tConv24(_data[i].EndTime)+'" type="text" id="EndTime" name="EndTime">'
                                                                +'</div>'
                                                        +'</div>'
                                                    +'</div>'
                                                +'</div>';
                                    }
                                }
                            },
                            error:function(){

                            }
                        });
                        _html+='<div class="cell-12 mt-3">'
                                   +'<div class="win-shadow" data-cls-title="bg-darkBlue fg-white" data-role="panel" data-title-caption="'+_sched[i].ScheduleDescription+' ('+_sched[i].Shift+')'+'" data-collapsed="true" data-collapsible="true">'
                                        +'<h5>Schedule Information</h5>'
                                        +'<hr class="thick bg-darkBlue">'
                                        +'<div>Schedule description: '+_sched[i].ScheduleDescription+'</div>'
                                        +'<hr class="thick bg-darkBlue">'
                                        +'<div>Shift: '+_sched[i].Shift+'</div>'
                                        +'<hr class="thick bg-darkBlue">'
                                        +'<div>Total number of Non-Academic Scholars assigned in this schedule: '+_total+' </div>'
                                        +'<hr class="thick bg-darkBlue">'
                                        +'<h5>Daily Schedule</h5>'
                                        +'<div class="row">'
                                            +_html1
                                        +'</div>'
                                        +'<button id="Delete'+_sched[i].ScheduleID+'" class="m-2 cell delete drop-shadow place-right button bg-darkRed fg-white">REMOVE THIS SCHEDULE</button>'
                                        +'<a href="'+'<?php echo base_url("index.php/Scheduler/Manage/"); ?>'+_sched[i].ScheduleID+'" class="m-2 cell drop-shadow place-right button bg-darkBlue fg-white">MANAGE SCHEDULE</a>'
                                   +'</div>'
                               +'</div>';
                    }
                    $("#schedContainer").append(_html);
                }
            },
            error:function(){

            }
        });
    }
</script>
</body>
</html>
