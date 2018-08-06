        <div class="cell bg-white p-6 mr-4">
            <div class="row">
                <a type="button" href="javascript:history.back();" class="button drop-shadow bg-red fg-white"><span class="mif-arrow-left"></span> Go Back</a>
            </div>
            <div class="row">
                <ul class="cell breadcrumbs" style="margin-bottom:0px;">
                    <li class="page-item"><a href="<?php echo base_url('index.php/AdminStart'); ?>" class="page-link">Home</a></li>
                    <li class="page-item"><a href="#" class="page-link">Masterfile</a></li>
                    <li class="page-item"><a href="<?php echo base_url('index.php/Scheduler'); ?>" class="page-link">Scheduler</a></li>
                    <li class="page-item"><a href="#" class="page-link">Add Schedule</a></li>
                </ul>
            </div>
            <div class="row">
                <div class="stub">
                    <h3>Add Schedule</h3>
                </div>
                <div class="stub ml-auto">
                    <input type="text" class="win-shadow" data-role="search">
                </div>
            </div>
            <hr class="row thick bg-black drop-shadow">
            <div class="row">
                <div class="cell-lg-12 cell-md-12 mx-auto">
                    <form id="frmAddSchedule" action="javascript:" data-on-validate-form="validateAddSchedule" data-role="validator">
                        <div class="row mt-2">
                            <div class="cell-sm-12 cell-md-6 cell-lg-5 form-group mt-4">
                                <label for="Schedule">Schedule Description</label>
                                <input name="Schedule" class="win-" data-validate="required" id="Schedule" type="text" name="Description" data-role="input">
                            </div>
                            <div class="cell-sm-12 cell-md-6 cell-lg-5 form-group">
                                <label for="">Shift</label>
                                <select id="cmbShift" name="Shift" data-validate="required" data-role="select">
                                    <option value="Morning">Morning</option>
                                    <option value="Afternoon">Afternoon</option>
                                </select>
                            </div>
                            <div class="cell mt-4">
                                <div class="row p-3">
                                    <label class="cell-12"></label>
                                    <button type="submit" id="Add" name="button" class="cell-lg-12 cell-md-4 ml-auto button fg-white bg-darkBlue place-right">Add Schedule</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <hr class="row thin bg-darkBlue">
                    <div class="row" id="sched">
                        <div class="cell" id="DailyScedule">
                            <div class="row" id="DailySchedulePanel" data-role="panel" data-title-caption="Dialy Schedule" data-cls-title="bg-darkBlue fg-white" data-cls-panel="win-shadow">
                                <div class="cell-12">
                                    <div class="row">
                                        <strong class="cell" id="lblDailySched">Add schedule for </strong>
                                    </div>
                                    <form id="frmAddDailySched" data-role="validator" action="javascript:" data-on-validate-form="validateDialySched">
                                    <div class="row">
                                        <input type="hidden" name="ScheduleID" id="ScheduleID" value="">
                                            <div class="cell-lg-4 form-group">
                                                <label for="">Day</label>
                                                <select data-role="select" name="Day">
                                                    <option value="Monday">Monday</option>
                                                    <option value="Tuesday">Tuesday</option>
                                                    <option value="Wednesday">Wednesday</option>
                                                    <option value="Thursday">Thursday</option>
                                                    <option value="Friday">Friday</option>
                                                    <option value="Saturday">Saturday</option>
                                                </select>
                                            </div>
                                            <div class="cell-lg-4 form-group" style="margin-top:0;">
                                                <label for="StartTime">Start Time</label>
                                                <input readonly data-role="input" type="text" id="StartTime" name="StartTime">
                                            </div>
                                            <div class="cell-lg-4 form-group"  style="margin-top:0;">
                                                <label for="">End Time</label>
                                                <input readonly data-role="input" type="text" id="EndTime" name="EndTime" name="EndTime">
                                            </div>
                                            <div class="cell mt-2">
                                                <button type="submit" class="button bg-darkBlue fg-white place-right">Add Daily Schedule</button>
                                            </div>
                                    </div>
                                    </form>
                                    <hr class="thick bg-darkBlue">
                                    <div class="row" id="dailyschedcontainer">
                                        <!-- <div class="cell cell-lg-6 cell-md-12">
                                            <div  style="width:100%;" data-cls-title="bg-darkBlue fg-white" data-cls-panel="win-shadow" class="mt-4" data-role="panel" data-title-caption="Monday" data-collapsible="true" data-collapsed="true">

                                            </div>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $("#StartTime").mdtimepicker();
        $("#EndTime").mdtimepicker();
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

                                        getDialySchedule();
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
    function getDialySchedule(){
        $.ajax({
            type:'ajax',
            method:'POST',
            url:'<?php echo base_url("index.php/Scheduler/getDailySched") ?>',
            data:$("#frmAddDailySched").serialize(),
            dataType:'json',
            success:function(response){
                if(response.success){
                    $("#dailyschedcontainer").empty();
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
                                                        +'<button id="UpdateDaily'+_data[i].DailyScheduleID+'" type="submit" class="button update-daily-sched bg-darkBlue fg-white place-right">Update Daily Schedule</button>'
                                                    +'</div>'
                                            +'</div>'
                                        +'</div>'
                                    +'</div>';
                    }
                    $("#dailyschedcontainer").append(_content);
                    $(".tpickerStart").mdtimepicker();

                }
            },
            error:function(){

            }
        });
    }
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
    function validateAddSchedule() {
        $.ajax({
            type:'ajax',
            method:'POST',
            url:'<?php echo base_url("index.php/Scheduler/addSchedule") ?>',
            data:$("#frmAddSchedule").serialize(),
            dataType:'json',
            success:function(response){
                if(response.success){
                    Metro.dialog.create({
                        title:'Successfully created.Would you like to add daily schedule?',
                        actions:[
                            {
                                caption:'Add Daily Schedule',
                                cls:'js-dialog-close fg-white bg-darkBlue',
                                onclick:function(){
                                    $("#DailyScedule").removeClass('no-visible');
                                    $("#ScheduleID").val(response.id);
                                    $("#lblDailySched").text('Add daily schedule for '+$("#Schedule").val()+' ('+$("#cmbShift").val()+')');
                                    id=response.id;
                                }
                            },
                            {
                                caption:'Close',
                                cls:'js-dialog-close fg-white bg-darkRed',
                            }
                        ]

                    });
                }
            },
            error:function(){

            }
        });
    }
</script>
</body>
</html>
