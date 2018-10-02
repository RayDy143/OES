<div class="cell mr-4 p-5" style="overflow:auto">
    <div class="row">
        <div class="cell">
            <label class="place-right mt-1" for="">Select Schoolyear:</label>
        </div>
        <div class="cell">
            <select class="filter" id="cmbFilterSchoolyear">
                <?php
                    if(isset($sy)){
                        foreach ($sy as $row) {
                            echo '<option value="'.$row['SY'].'">'.$row['SY'].'</option>';
                        }
                    }
                 ?>
            </select>
        </div>
        <div class="cell">
            <label class="place-right mt-1">Select Semester:</label>
        </div>
        <div class="cell">
            <select class="filter" data-role="select" id="cmbFilterSemester">
                <option value="First Semester">First Semester</option>
                <option value="Second Semester">Second Semester</option>
            </select>
        </div>
        <div class="cell">
            <label class="place-right mt-1" for="">Select Month:</label>
        </div>
        <div class="cell">
            <select class="filter" data-role="select" id="cmbFilterMonth">
                <?php
                    if(isset($month)){
                        foreach ($month as $row) {
                            echo '<option value="'.$row['Month'].'">'.$row['Month'].'</td>';
                        }
                    }
                 ?>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="mx-auto print win-shadow pt-5 pl-15 pr-15 pb-10" style="width:768px;">
            <div class="printThis">
                <img src="<?php echo base_url('assets/report/banner.png') ?>" style="width:100%;">
                <p class="text-secondary text-center"><strong>Non-Academic Scholars Monthly Allowance</strong></p>
                <p class="text-secondary text-center m-0"><strong>Schoolyear <span id="lblSY"></span> <span id="lblSem"></span> Month of <span id="lblMonth"></span></strong></p>
                <div id="resultContainer">
                    <table id="tblAllowance" class="table table-border compact cell-border mt-5">
                        <thead>
                            <tr>
                                <th>Scholar</th>
                                <th>Lacking Minutes</th>
                                <th>Lowest Grade</th>
                                <th>Evaluation</th>
                                <th>Remarks</th>
                                <th>No of units.</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="stub ml-auto">
            <button type="button" class="button bg-darkBlue fg-white drop-shadow" id="btnPrint" name="button">Print</button>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $("#btnPrint").click(function() {
            $(".printThis").printThis();
        });
        $(".filter").change(function () {
            getNas();
        });
    });
</script>
