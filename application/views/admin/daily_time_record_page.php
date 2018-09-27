
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
            <li class="page-item"><a href="#" class="page-link">DTR</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="cell-8">
            <h4>Daily Time Record</h4>
        </div>
        <div class="stub ml-auto">
            <button type="button" class="button bg-darkBlue fg-white" onclick="Metro.dialog.open('#ImportDTRDialog');" name="button">IMPORT</button>
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
        <div class="cell">
            <label class="place-right mt-1" for="">Select Month:</label>
        </div>
        <div class="cell">
            <select class="filter" id="cmbFilterMonth">
                <option value="January">January</option>
                <option value="Febuary">February</option>
                <option value="March">March</option>
                <option value="April">April</option>
                <option value="May">May</option>
                <option value="June">June</option>
                <option value="July">July</option>
                <option value="August">August</option>
                <option value="September">September</option>
                <option value="September">October</option>
                <option value="September">November</option>
                <option value="September">December</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div data-role="progress" id="progress" data-type="line"></div>
        <div class="cell">
            <table class="table table-border cell-border cell-hover" id="tblDTR">
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
<div class="dialog" data-role="dialog" id="ImportDTRDialog" style="overflow:auto">
    <form id="frmImportDTR" data-role="validator" data-on-validate-form="validateImportDTR" action="javascript:">
        <div class="dialog-title">Import DTR from excel file.</div>
        <div class="dialog-content">
            <div class="row" >
                <div class="cell-12 form-group">
                    <label for="dtpAddDateYear">Schoolyear</label>
                    <input data-validate="required" data-role="datepicker" id="dtpAddDateYear" name="dtpAddDateYear" data-day="false" data-month="false">
                    <input type="hidden" name="dtpAddEvalYear1" id="dtpAddDateYear1">
                    <input type="hidden" name="txtSY" id="txtSY">
                    <input class="text-center" readonly type="text" id="txtAddDateYear" name="txtAddDateYear" data-day="false" data-month="false">
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
                <div class="cell-12 form-group">
                    <label for="dtrFile">Select excel file.</label>
                    <input type="file" data-role="file">
                </div>
            </div>
        </div>
        <div class="dialog-actions">
            <button type="button" class="button bg-darkRed fg-white js-dialog-close place-right">Cancel</button>
            <button type="submit" class="button bg-darkBlue fg-white place-right">Import</button>
        </div>
    </form>
</div>
</div>
</div>

<script>
    $(document).ready(function() {

    });
</script>
</body>
</html>
