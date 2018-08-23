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
            <li class="page-item"><a href="#" class="page-link">Masterfile</a></li>
            <li class="page-item"><a href="#" class="page-link">NAS</a></li>
            <li class="page-item"><a href="#" class="page-link">Assign Schedule</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="stub">
            <h4>Assign Schedule for <?php echo $nasprofile->Firstname.' '.$nasprofile->Lastname; ?></h4>
        </div>
    </div>
    <hr class="row thick bg-black drop-shadow">

    <form id="frmAssignSchedule" action="<?php echo base_url('index.php/Nas/AssignNasSchedule'); ?>" method="post">
    <div class="row">
            <div class="cell-lg-10 cell-md-12 cell-sm-12 form-group">
                <input type="hidden" name="NasID" value="<?php echo $nasprofile->NasID ?>">
                <label for="cmbSchedule">Select Schedule</label>
                <select id="cmbSchedule" data-role="select" name="Schedule">
                    <option value="">Choose Schedule</option>
                    <?php
                        foreach ($sched as $s) {
                            echo '<option value="'.$s['ScheduleID'].'">'.$s['ScheduleDescription'].' - '.$s['Shift'].'</option>';
                        }
                     ?>
                </select>
            </div>
            <div class="cell-lg-2 mt-6 ml-auto">
                <button type="submit" class="button bg-darkBlue fg-white">Assign Schedule</button>
            </div>
    </div>
    </form>
    <div class="row" id="dailyschedcontainer">

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
        $("#cmbSchedule").change(function () {
            $.ajax({
                type:'ajax',
                method:'POST',
                url:'<?php echo base_url("index.php/Scheduler/getDailySched"); ?>',
                data:{ScheduleID:$("#cmbSchedule").val()},
                dataType:'json',
                async:false,
                success:function(response){
                    if(response.success){
                        var _html='';
                        $("#dailyschedcontainer").empty();
                        var _data=response.dailysched;
                        for (var i = 0; i < _data.length; i++) {
                            _html+='<div class="cell cell-lg-6 cell-md-12 cell-sm-12">'
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
                        $("#dailyschedcontainer").append(_html);
                    }
                },
                error:function(){

                }
            });
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
</script>
</body>
</html>
