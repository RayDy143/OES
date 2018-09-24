
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
        <div data-role="progress" id="progress" data-type="line"></div>
        <div class="cell">
            <table class="table table-border cell-border cell-hover" id="tblWorkingDate">
                <thead>
                    <tr>
                        <th>Month</th>
                        <th>Day</th>
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
        <div class="dialog-title">Add new working dates.</div>
        <div class="dialog-content">
            <div class="row" >
                <div class="stub mx-auto">
                    <div data-role="calendar" id="calendar" data-buttons="today, clear" data-multi-select="true"></div>
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
        getWorkingDates();
        function getWorkingDates() {
            $.ajax({
                type:'ajax',
                url:'<?php echo base_url("index.php/Attendance/getWorkingDates") ?>',
                dataType:'json',
                success:function(response) {
                    if(response.success){
                        var _tableContent='';
                        for (var i = 0; i < response.workingdates.length; i++) {
                            _tableContent+='<tr>'
                                                +'<td>'+response.workingdates[i].Month+'</td>'
                                                +'<td>'+response.workingdates[i].Day+'</td>'
                                                +'<td>'+response.workingdates[i].Date+'</td>'
                                                +'<td><button id="Delete'+response.workingdates[i].WorkingDateID+'" class="button delete small bg-darkRed fg-white ml-1 mr-1 mif-bin"></button></div></td>'
                                           +'</tr>';
                        }
                        if($.fn.DataTable.isDataTable("#tblWorkingDate")){
                            $("#tblWorkingDate").DataTable().destroy().clear();
                        }
                        $("#tblWorkingDate tbody").html(_tableContent);
                        $("#tblWorkingDate").DataTable();
                        $("#progress").hide();
                    }
                }
            })
        }
    });
    function validateAddWorkingDate() {
        var calendar = $("#calendar").data('calendar');
        var dates=calendar.getSelected();
        for (var i = 0; i < dates.length; i++) {
            
        }
    }
</script>
</body>
</html>
