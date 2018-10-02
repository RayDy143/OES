<div class="cell bg-white p-3 ml-4 mr-4" style="overflow:auto">
    <div class="row">
        <a href="javascript:history.back();" class="button stub win-shadow bg-red fg-white"><span class="mif-arrow-left"></span> Go Back</a>
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
            <li class="page-item"><a href="<?php echo base_url('index.php/Scheduler'); ?>" class="page-link">Schedule</a></li>
        </ul>
        <div class="stub ml-auto">
            <button class="button bg-darkBlue fg-white win-shadow" onclick="Metro.dialog.open('#AddNewScheduleDialog')" name="button">Add new schedule</button>
        </div>
    </div>
    <div class="row">
        <div class="stub">
            <h4>Schedule</h4>
        </div>
        <div class="cell">
            <div class="row">
                <div class="cell">
                    <label class="place-right mt-1">Filter by shift:</label>
                </div>
                <div class="stub">
                    <select class="filter" id="cmbFilterShift">
                        <option value="All">All</option>
                        <?php
                            foreach ($shift as $row) {
                                    echo '<option value="'.$row['ShiftID'].'">'.$row['Shift'].'</option>';
                            }
                         ?>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <hr class="row thick bg-black drop-shadow">
    <div class="row">
        <div class="cell">
            <table id="tblSchedule" class="table table-border striped cell-hover cell-border">
                <thead>
                    <tr>
                        <th>Schedule Discription</th>
                        <th>Shift</th>
                        <th>NAS Assigned</th>
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
<div class="dialog" data-role="dialog" id="AddNewScheduleDialog">
    <form action="javascript:" data-role="validator" data-on-validate-form="validateAddSched">
        <div class="dialog-title">Add new schedule.</div>
        <div class="dialog-content">
            <div class="cell form-group">
                <label for="txtAddSchedDescription">Schedule Description</label>
                <input data-validate="required" type="text" name="txtAddSchedDescription" id="txtAddSchedDescription">
            </div>
            <div class="cell form-group">
                <label for="cmbAddSchedShift">Shift</label>
                <select data-role="select" name="cmbAddSchedShift">
                    <?php
                        foreach ($shift as $row) {
                                echo '<option value="'.$row['ShiftID'].'">'.$row['Shift'].'</option>';
                        }
                     ?>
                </select>
            </div>
        </div>
        <div class="dialog-actions">
            <button type="button" class="button bg-darkRed fg-white place-right js-dialog-close">Cancel</button>
            <button type="submit" class="button place-right js-dialog-close">Add</button>
        </div>
    </form>
</div>
<script>
    $(document).ready(function(){
        // $(window).on("load",function(){
        //     $('body').mCustomScrollbar({
        //         scrollButtons:{enable:true},
		// 		mouseWheel:{scrollAmount:188},
		// 		theme:"rounded-dark",
		// 		autoExpandScrollbar:true,
		// 		snapAmount:188,
		// 		snapOffset:65
    	// 	});
        // });
        $("#cmbFilterShift").change(function () {
            getSchedule();
        });
        $("#tblSchedule").DataTable();
        $('#tblSchedule').on('click','button.delete',function () {
            var _strId=$(this).attr('id');
            var _id=_strId.split('Delete')[1];
            Metro.dialog.create({
                title:'Are you sure you want to delete this?',
                content:'This process cant be undone.',
                actions:
                [
                    {
                        caption : "Delete",
                        cls:'alert js-dialog-close',
                        onclick:function() {
                            $.ajax({
                                type:'ajax',
                                method:'POST',
                                url:'<?php echo base_url("index.php/Scheduler/deleteSchedule") ?>',
                                data:{ID:_id},
                                dataType:'json',
                                success:function (response) {
                                    if(response.success){
                                        var infoboxcontent="<p>Successfully deleted.</p>";
                                        Metro.infobox.create(infoboxcontent,'success');
                                        getSchedule();
                                    }else if(response.deleteerror){
                                        var infoboxcontent="<p>You cannot delete a schedule that is currently inused.</p>";
                                        Metro.infobox.create(infoboxcontent,'alert');
                                    }
                                }
                            })
                        }
                    },
                    {
                        caption : "Cancel",
                        cls:'js-dialog-close',
                        onclick:function() {

                        }
                    }
                ]
            })
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
            method:'POST',
            url:'<?php echo base_url("index.php/Scheduler/getSchedule") ?>',
            data:{ID:$("#cmbFilterShift").val()},
            dataType:'json',
            success:function(response){
                if(response.success){
                    var _sched=response.sched;
                    var _html='';
                    var _total=0;
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
                        _html+='<tr>'
                                    +'<td >'+_sched[i].ScheduleDescription+'</td>'
                                    +'<td>'+_sched[i].Shift+'</td>'
                                    +'<td>'+_total+'</td>'
                                    +'<td><div data-role="buttongroup" class="row"><a href="<?php echo base_url(); ?>index.php/Scheduler/Manage/'+_sched[i].ScheduleID+'" class="button edit small cell bg-darkBlue fg-white ml-1 mr-1 mif-pencil"></a><button id="Delete'+_sched[i].ScheduleID+'" class="button delete cell small bg-darkRed fg-white ml-1 mr-1 mif-bin"></button></div></td>'
                              +'</tr>';
                    }
                    if($.fn.DataTable.isDataTable("#tblSchedule")){
                        $("#tblSchedule").DataTable().clear().destroy();
                    }
                    $("#tblSchedule tbody").html(_html);
                    $("#tblSchedule").DataTable();
                }
            },
            error:function(){

            }
        });
    }
    function validateAddSched() {
        $.ajax({
            type:'ajax',
            method:'POST',
            url:'<?php echo base_url("index.php/Scheduler/addSchedule") ?>',
            data:$(this).serialize(),
            dataType:'json',
            success:function(response){
                if(response.success){
                    Metro.dialog.close("#AddNewScheduleDialog");
                    var infoboxcontent="<p>Successfully Added!</p>";
                    Metro.infobox.create(infoboxcontent,"success",{overlay:true});
                    getSchedule();
                }
            },
            error:function() {
                var infoboxcontent="<p>System fatal error!</p>";
                Metro.infobox.create(infoboxcontent,"alert",{overlay:true});
            }
        });
    }
</script>
</body>
</html>
