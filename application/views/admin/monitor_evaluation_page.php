
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
            <li class="page-item"><a href="#" class="page-link">Monitor</a></li>
            <li class="page-item"><a href="#" class="page-link">Evaluation</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="cell-8">
            <h4>Monitor Evaluation</h4>
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
            <input type="text" value="<?php echo $eval->StartingDate; ?>" readonly name="txtStartingDate" id="txtStartingDate">
        </div>
        <div class="cell-3 m-0 form-group">
            <label for="txtDateEnded">Date Ended</label>
            <input type="text" value="<?php if($eval->DateEnded==null){echo "TBD";}else{echo $eval->DateEnded;} ?>" readonly name="txtDateEnded" id="txtDateEnded">
        </div>
    </div>
    <div class="row mt-3">
        <div class="cell form-group">
            <label>Status: </label>
            <input id="StatusSwitch" type="checkbox" <?php if($eval->IsActive==1){echo "checked";} ?>
       data-role="switch"
       data-cls-switch="mySwitch"
       data-cls-caption="fg-cyan text-bold"
       data-cls-check="bd-cyan myCheck" type="checkbox" data-caption="<?php if($eval->IsActive==0){echo "Deactivated";}else{echo "Active";} ?>">
        </div>
        <div class="stub ml-auto">
            <button type="button" class="button bg-darkBlue fg-white" name="button">End Evaluation</button>
        </div>
    </div>
    <div class="row mt-3">
        <div class="cell">
            Evaluation Log
            <table id="tblEvaluationLog" class="table table-border striped cell-hover">
                <thead>
                    <tr>
                        <th>Evaluator</th>
                        <th>NAS</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>

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
        $("#tblEvaluationLog").DataTable();
        $("#StatusSwitch").change(function () {
            $.ajax({
                type:'ajax',
                method:'POST',
                url:'<?php echo base_url("index.php/Evaluation/changeStatus"); ?>',
                data:{ID:$("#txtEvaluationID").val(),Status:$(this).attr('data-caption')},
                dataType:'json',
                success:function(response) {
                    if(response.success){
                        location.reload();
                    }
                },
                error:function() {

                }
            });
        });
    });
</script>
</body>
</html>
