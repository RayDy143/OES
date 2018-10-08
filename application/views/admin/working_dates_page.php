
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
            <li class="page-item"><a href="#" class="page-link">Working Dates</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="cell-8">
            <h4>Working Dates</h4>
        </div>
        <div class="stub ml-auto">
            <button type="button" class="button bg-darkBlue fg-white" onclick="Metro.dialog.open('#AddWorkingDateDialog');" name="button">ADD</button>
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
                    if(isset($schoolyear)){
                        foreach ($schoolyear as $row) {
                            echo '<option value="'.$row['Schoolyear'].'">'.$row['Schoolyear'].'</option>';
                        }
                    }
                 ?>
            </select>
        </div>
        <div class="cell">
            <label class="place-right mt-1">Select Semester:</label>
        </div>
        <div class="cell">
            <select class="filter" id="cmbFilterSemester">
                <option value="First Semester">First Semester</option>
                <option value="Second Semester">Second Semester</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div data-role="progress" id="progress" data-type="line"></div>
        <div class="cell">
            <table class="table table-border cell-border cell-hover" id="tblWorkingDate">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="dialog" data-role="dialog" id="AddWorkingDateDialog" style="overflow:auto">
    <form id="frmAddWorkingDate" data-role="validator" data-on-validate-form="validateAddWorkingDate" action="javascript:">
        <div class="dialog-title">Add new working date(s).</div>
        <div class="dialog-content">
            <div class="row" >
                <div class="cell-12 form-group">
                    <label for="dtpAddDateYear">Schoolyear</label>
                    <input data-validate="required" data-role="datepicker" id="dtpAddDateYear" name="dtpAddDateYear" data-day="false" data-month="false">
                    <input data-validate="required" type="hidden" name="dtpAddEvalYear1" id="dtpAddDateYear1">
                    <input data-validate="required" type="hidden" name="txtSY" id="txtSY">
                    <input data-validate="required" class="text-center" readonly type="text" id="txtAddDateYear" name="txtAddDateYear" data-day="false" data-month="false">
                    <span class="invalid_feedback">Schoolyear is required.</span>
                </div>
                <div class="cell-12 form-group">
                    <label for="cmbAddSemester">Semester</label>
                    <select data-validate="required" data-role="select" id="cmbAddSemester" name="cmbAddSemester">
                        <option value="First Semester">First Semester</option>
                        <option value="Second Semester">Second Semester</option>
                    </select>
                    <span class="invalid_feedback">Semester is required.</span>
                </div>
                <div class="stub mx-auto">
                    <div data-role="calendar" data-input-format="yyyy-mm-dd" <?php if ($excludedate): ?>
                        data-exclude="<?php foreach ($excludedate as $row) {
                            echo $row['Date'].',';
                        } ?>"
                    <?php endif; ?> id="calendar" data-buttons="today, clear" data-multi-select="true"></div>
                </div>
            </div>
        </div>
        <div class="dialog-actions">
            <button type="button" class="button bg-darkRed fg-white js-dialog-close place-right">Cancel</button>
            <button type="submit" class="button bg-darkBlue fg-white place-right">Add</button>
        </div>
    </form>
</div>
</div>
</div>

<script>
    $(document).ready(function() {
        $("#tblWorkingDate").DataTable();
        $("#dtpAddDateYear").change(function() {
            var year=new Date($("#dtpAddDateYear").val());
            $("#dtpAddDateYear1").val(year.getFullYear());
            $("#txtAddDateYear").val(year.getFullYear()+1);
            $("#txtSY").val(year.getFullYear()+"-"+(year.getFullYear()+1));
        });
        getWorkingDates();
        $("#tblWorkingDate tbody").on('click','button.delete',function() {
            var _id=$(this).attr('id');
            $.ajax({
                type:'ajax',
                method:'POST',
                url:'<?php echo base_url("index.php/Attendance/removeWorkingDates"); ?>',
                data:{ID:_id},
                dataType:'json',
                success:function(response) {
                    if(response.success){
                        alert("Successfully Deleted!");
                        location.reload();
                    }
                }
            });
        });
        $(".filter").change(function() {
            getWorkingDates();
        });
    });
    function getWorkingDates() {
        $.ajax({
            type:'ajax',
            method:'POST',
            url:'<?php echo base_url("index.php/Attendance/getWorkingDates") ?>',
            data:{SY:$("#cmbFilterSchoolyear").val(),Semester:$("#cmbFilterSemester").val()},
            dataType:'json',
            success:function(response) {
                if(response.success){
                    var _tableContent='';
                    for (var i = 0; i < response.workingdates.length; i++) {
                        _tableContent+='<tr>'
                                            +'<td>'+new Date(response.workingdates[i].Date).toDateString()+'</td>'
                                            +'<td><button id="'+response.workingdates[i].WorkingDateID+'" class="button delete small bg-darkRed fg-white ml-1 mr-1">REMOVE</button></div></td>'
                                       +'</tr>';
                    }
                    if($.fn.DataTable.isDataTable("#tblWorkingDate")){
                        $("#tblWorkingDate").DataTable().destroy().clear();
                    }
                    $("#tblWorkingDate tbody").html(_tableContent);
                    $("#tblWorkingDate").DataTable({"aaSorting": []});
                    $("#progress").hide();
                }
            }
        })
    }
    function validateAddWorkingDate() {
        var calendar = $("#calendar").data('calendar');
        var dates=calendar.getSelected();
        const monthNames = ["January", "February", "March", "April", "May", "June",
                              "July", "August", "September", "October", "November", "December"
                            ];
        var days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
        for (var i = 0; i < dates.length; i++) {
            var date=new Date(dates[i]);
            console.log(date);
            var locale = "en-us";
            var month=date.toLocaleString(locale, { month: "long" });
            var day=days[date.getDay()];
            var schoolyear=$("#txtSY").val();
            $.ajax({
                type:'ajax',
                method:'POST',
                url:'<?php echo base_url("index.php/Attendance/addWorkingDays"); ?>',
                data:{Day:day,Month:month,Date:date.toLocaleDateString(),Schoolyear:schoolyear,Semester:$("#cmbAddSemester").val()},
                dataType:'json',
                success:function(response) {
                    if(response.success){
                        location.reload();
                    }
                }
            });

        }
    }
</script>
</body>
</html>
