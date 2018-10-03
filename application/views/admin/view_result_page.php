
<div class="cell bg-white p-3 ml-4 mr-4" style="overflow:auto;">
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
            <li class="page-item"><a href="#" class="page-link">Reports</a></li>
            <li class="page-item"><a href="#" class="page-link">Evaluation</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="cell-8">
            <h4>NAS Evaluation Results</h4>
        </div>
    </div>
    <hr class="row thick bg-black drop-shadow">
    <hr class="thick">
    <div class="row">
        <input type="hidden" name="txtEvaluationID" id="txtEvaluationID" value="<?php echo $eval->EvaluationID; ?>">
        <div class="cell-3 form-group">
            <label for="txtSchoolyear">Schoolyear</label>
            <input type="text" value="<?php echo $eval->Schoolyear; ?>" readonly name="txtSchoolyear" id="txtSchoolyear">
        </div>
        <div class="cell-3 m-0 form-group">
            <label for="txtSemester">Semester</label>
            <input type="text" value="<?php echo $eval->Semester; ?>" readonly name="txtSemester" id="txtSemester">
        </div>
        <div class="cell-3 m-0 form-group">
            <label for="txtStartingDate">Starting Date</label>
            <input type="text" value="<?php echo date('Y-m-d',strtotime($eval->StartingDate)); ?>" readonly name="txtStartingDate" id="txtStartingDate">
        </div>
        <div class="cell-3 m-0 form-group">
            <label for="txtDateEnded">Date Ended</label>
            <input type="text" value="<?php if($eval->DateEnded==null){echo "TBD";}else{echo $eval->DateEnded;} ?>" readonly name="txtDateEnded" id="txtDateEnded">
        </div>
    </div>
    <div class="row mt-3">
        <div class="cell">
            <table id="tblEvaluationResults" data-role="table" class="table table-border striped cell-hover">
                <thead>
                    <tr>
                        <th>NAS</th>
                        <th>Evaluator</th>
                        <th>Mean</th>
                        <th>Mean Interpretation</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        function secure_iterable($var)
                        {
                            return is_iterable($var) ? $var : array();
                        }
                        if(isset($evalres)){
                            foreach (secure_iterable($evalres) as $row) {
                                if($row['Mean']>=1 and $row['Mean']<=3.5){
                                    echo '<tr>';
                                        echo '<td>'.$row['nasFname'].' '.$row['nasLname'].'</td>';
                                        echo '<td>'.$row['userFname'].' '.$row['userLname'].'</td>';
                                        echo '<td>'.$row['Mean'].'</td>';
                                        echo '<td>Unsatisfactory / Seldom meets the target</td>';
                                        echo '<td>'.date('h:i:s a m/d/Y', strtotime($row['Date'])).'</td>';
                                        echo '<td><div data-role="buttongroup" class="mx-auto"><button data-nasid="'.$row['NasID'].'" data-userid="'.$row['UserID'].'" data-evalid="'.$row['EvaluationID'].'"  class="button edit small bg-darkBlue fg-white ml-1 mr-1">View Report</button></div></td>';
                                    echo '</tr>';
                                }else if($row['Mean']>=3.6 and $row['Mean']<=4.0){
                                    echo '<tr>';
                                        echo '<td>'.$row['nasFname'].' '.$row['nasLname'].'</td>';
                                        echo '<td>'.$row['userFname'].' '.$row['userLname'].'</td>';
                                        echo '<td>'.$row['Mean'].'</td>';
                                        echo '<td>Below Satisfactory / Meets 70%-85% if target</td>';
                                        echo '<td>'.date('h:i:s a m/d/Y', strtotime($row['Date'])).'</td>';
                                        echo '<td><div data-role="buttongroup" class="mx-auto"><button data-nasid="'.$row['NasID'].'" data-userid="'.$row['UserID'].'" data-evalid="'.$row['EvaluationID'].'"  class="button edit small bg-darkBlue fg-white ml-1 mr-1">View Report</button></div></td>';
                                }else if($row['Mean']>=4.1 and $row['Mean']<=4.5){
                                    echo '<tr>';
                                        echo '<td>'.$row['nasFname'].' '.$row['nasLname'].'</td>';
                                        echo '<td>'.$row['userFname'].' '.$row['userLname'].'</td>';
                                        echo '<td>'.$row['Mean'].'</td>';
                                        echo '<td>Satisfactory / Meets 86% - 100%</td>';
                                        echo '<td>'.date('h:i:s a m/d/Y', strtotime($row['Date'])).'</td>';
                                        echo '<td><div data-role="buttongroup" class="mx-auto"><button data-nasid="'.$row['NasID'].'" data-userid="'.$row['UserID'].'" data-evalid="'.$row['EvaluationID'].'"  class="button edit small bg-darkBlue fg-white ml-1 mr-1">View Report</button></div></td>';
                                    echo '</tr>';
                                }else if($row['Mean']>=4.6 and $row['Mean']<=4.9){
                                    echo '<tr>';
                                        echo '<td>'.$row['nasFname'].' '.$row['nasLname'].'</td>';
                                        echo '<td>'.$row['userFname'].' '.$row['userLname'].'</td>';
                                        echo '<td>'.$row['Mean'].'</td>';
                                        echo '<td>Above Satisfactory / Mostly meets target & above target</td>';
                                        echo '<td>'.date('h:i:s a m/d/Y', strtotime($row['Date'])).'</td>';
                                        echo '<td><div data-role="buttongroup" class="mx-auto"><button data-nasid="'.$row['NasID'].'" data-userid="'.$row['UserID'].'" data-evalid="'.$row['EvaluationID'].'"  class="button edit small bg-darkBlue fg-white ml-1 mr-1">View Report</button></div></td>';
                                    echo '</tr>';
                                }else if($row['Mean']==5.0){
                                    echo '<tr>';
                                        echo '<td>'.$row['nasFname'].' '.$row['nasLname'].'</td>';
                                        echo '<td>'.$row['userFname'].' '.$row['userLname'].'</td>';
                                        echo '<td>'.$row['Mean'].'</td>';
                                        echo '<td>Excellent/ Most of the time above target</td>';
                                        echo '<td>'.date('h:i:s a m/d/Y', strtotime($row['Date'])).'</td>';
                                        echo '<td><div data-role="buttongroup" class="mx-auto"><button data-nasid="'.$row['NasID'].'" data-userid="'.$row['UserID'].'" data-evalid="'.$row['EvaluationID'].'"  class="button edit small bg-darkBlue fg-white ml-1 mr-1">View Report</button></div></td>';
                                    echo '</tr>';
                                }
                            }
                        }
                     ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>

<script>
    $(document).ready(function(){
        // $(window).on("load",function(){
        //     $('body').mCustomScrollbar({
        //      scrollButtons:{enable:true,scrollType:"stepped"},
		// 		keyboard:{scrollType:"stepped"},
		// 		mouseWheel:{scrollAmount:188},
		// 		theme:"rounded-dark",
		// 		autoExpandScrollbar:true,
		// 		snapAmount:188,
		// 		snapOffset:65
    	// 	});
        // });
        $("#tblEvaluationResults tbody").on('click','button.edit',function() {
            $.ajax({
                type:'ajax',
                method:'POST',
                url:'<?php echo base_url("index.php/Evaluation/setResultsSession"); ?>',
                data:{NasID:$(this).attr("data-nasid"),UserID:$(this).attr("data-userid"),EvalID:$(this).attr("data-evalid")},
                success:function() {
                    window.location="<?php echo base_url('index.php/Evaluation/NasEvaluationResult') ?>"
                }
            });
        });
    });
</script>
</body>
</html>
