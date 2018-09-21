
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
            <li class="page-item"><a href="#" class="page-link">Manage</a></li>
            <li class="page-item"><a href="#" class="page-link">Evaluation</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="cell-8">
            <h4>Evaluation</h4>
        </div>
        <div class="stub ml-auto">
            <button type="button" class="button bg-darkBlue fg-white" onclick="Metro.dialog.open('#AddEvaluationDialog')" name="button">ADD NEW</button>
        </div>
    </div>
    <hr class="row thick bg-black drop-shadow">
    <hr class="thick">
    <div class="row">
        <div class="cell">
            <div class="row">
                <table id="tblEvaluation" class="table table-border striped cell-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>School year</th>
                            <th>Semester</th>
                            <th>Starting Date</th>
                            <th>Date ended</th>
                            <th>Status</th>
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
<div class="dialog" data-role="dialog" id="AddEvaluationDialog">
    <form data-role="validator" action="javascript:" data-on-validate-form="validateAddEvaluation">
        <div class="dialog-title">
            Add new evaluation
        </div>
        <div class="dialog-content">
            <div class="cell form-group">
                <label for="cmbAddEvalSchoolyear">Schoolyear</label>
                <input data-validate="required" data-role="datepicker" id="dtpAddEvalYear" name="dtpAddEvalYear" data-day="false" data-month="false">
                <input type="hidden" name="dtpAddEvalYear1" id="dtpAddEvalYear1">
                <input class="text-center" readonly type="text" id="txtAddEvalYear" name="txtAddEvalYear" data-day="false" data-month="false">
                <span class="invalid_feedback">Schoolyear is required.</span>
            </div>
            <div class="cell form-group">
                <label for="cmbAddEvalSemester">Semester</label>
                <select data-validate="required" data-role="select" id="cmbAddEvalSemester" name="cmbAddEvalSemester">
                    <option value="First Semester">First Semester</option>
                    <option value="Second Semester">Second Semester</option>
                </select>
                <span class="invalid_feedback">Semester is required.</span>
            </div>
            <div class="cell form-group">
                <label for="dtpStartingDate">Starting Date</label>
                <input data-role="datepicker" id="dtpStartingDate" name="dtpStartingDate">
            </div>
        </div>
        <div class="dialog-actions">
            <button type="button" class="button bg-darkRed fg-white js-dialog-close place-right mb-2">CANCEL</button>
            <button type="submit" class="button bg-darkBlue fg-white place-right mb-2">ADD</button>
        </div>
</form>
</div>
<div class="dialog" data-role="dialog" id="EditQuestionDialog">
    <form data-role="validator" action="javascript:" data-on-validate-form="validateEditQuestion">
        <div class="dialog-title">
            Update question
        </div>
        <div class="dialog-content">
            <input data-validate="required" type="hidden" name="txtEditQuestionID" id="txtEditQuestionID">
            <div class="cell form-group">
                <label for="txtEditQuestion">Question</label>
                <input data-role="input" data-validate="required" type="text" name="txtEditQuestion" id="txtEditQuestion">
                <span class="invalid_feedback">Question is required.</span>
            </div>
            <div class="cell form-group">
                <label for="cmbEditQuestionCategory">Category</label>
                <select data-validate="required" id="cmbEditQuestionCategory" name="cmbEditQuestionCategory">
                    <?php
                        if($category){
                            foreach ($category as $row) {
                                echo '<option value="'.$row['CategoryID'].'">'.$row['Category'].'</option>';
                            }
                        }
                     ?>
                </select>
                <span class="invalid_feedback">Category is required.</span>
            </div>
        </div>
        <div class="dialog-actions">
            <button type="button" class="button bg-darkRed fg-white js-dialog-close place-right mb-2">CANCEL</button>
            <button type="submit" class="button bg-darkBlue fg-white place-right mb-2">UPDATE</button>
        </div>
</form>
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
        $("#dtpAddEvalYear").change(function() {
            var year=new Date($("#dtpAddEvalYear").val());
            $("#dtpAddEvalYear1").val(year.getFullYear());
            $("#txtAddEvalYear").val(year.getFullYear()+1);
        });
        $("#tblEvaluation").DataTable();
        $("#cmbAddEvalSchoolyear").change(function () {
            if($(this).val()=="Manage"){
                window.location.replace("<?php echo base_url();?>index.php/Evaluation/Schoolyear");
            }
        });
        $("#tblEvaluation tbody").on("click","button.delete",function() {
            var _stringId=$(this).attr('id');
            var _id=_stringId.split("Delete")[1];
            Metro.dialog.create({
                title:"Are you sure you want to delete this record?",
                content:"<p>This process cant be undone</p>",
                actions:[
                    {
                        caption:"Delete",
                        cls:"js-dialog-close bg-darkRed fg-white",
                        onclick:function() {
                            $.ajax({
                                type:"ajax",
                                method:"POST",
                                url:"<?php echo base_url('index.php/Evaluation/deleteEvaluation') ?>",
                                data:{ID:_id},
                                dataType:"json",
                                success:function (response) {
                                    var infoboxcontent="<p>Successfully deleted</p>";
                                    Metro.infobox.create(infoboxcontent,"success",{overlay:true});
                                    getEvaluation();
                                },
                                error:function () {
                                    var infoboxcontent="<p>System fatal error.</p>";
                                    Metro.infobox.create(infoboxcontent,"alert",{overlay:true});
                                }
                            })
                        }
                    },
                    {
                        caption:"Cancel",
                        cls:"js-dialog-close bg-darkBlue fg-white"
                    }
                ]
            })
        });
    });
    getEvaluation();
    function getEvaluation() {
        $.ajax({
            type:'ajax',
            method:'POST',
            url:'<?php echo base_url("index.php/Evaluation/getEvaluation") ?>',
            dataType:'json',
            success:function (response) {
                if(response.success){
                    var _tableContent='';
                    for (var i = 0; i < response.eval.length; i++) {
                        _tableContent+='<tr>'
                                            +'<td>'+response.eval[i].EvaluationID+'</td>'
                                            +'<td>'+response.eval[i].Schoolyear+'</td>'
                                            +'<td>'+response.eval[i].Semester+'</td>'
                                            +'<td>'+response.eval[i].StartingDate+'</td>'
                                            +'<td>'+((response.eval[i].DateEnded==null)?'TBD':response.eval[i].DateEnded)+'</td>'
                                            +'<td>'+((response.eval[i].IsActive==0)?'Deactivated':'Active')+'</td>'
                                            +'<td><div data-role="buttongroup" class="mx-auto"><a href="<?php echo base_url('index.php/Evaluation/Monitor/'); ?>'+response.eval[i].EvaluationID+'" class="button edit small bg-darkBlue fg-white ml-1 mr-1 mif-info"></a><button id="Delete'+response.eval[i].EvaluationID+'" class="button delete small bg-darkRed fg-white ml-1 mr-1 mif-bin"></button></div></td>'
                                      +'</tr>';
                    }
                    if($.fn.DataTable.isDataTable("#tblEvaluation")){
                        $("#tblEvaluation").DataTable().destroy().clear();
                    }
                    $("#tblEvaluation tbody").html(_tableContent);
                    $("#tblEvaluation").DataTable();
                }
            },
            error:function () {
                var infoboxcontent="<p>System fatal error.</p>";
                Metro.infobox.create(infoboxcontent,"alert",{overlay:true});
            }
        });
    }
    function validateAddEvaluation() {
        $.ajax({
            type:'ajax',
            method:'POST',
            url:'<?php echo base_url("index.php/Evaluation/addEvaluation") ?>',
            data:$(this).serialize(),
            dataType:'json',
            success:function (response) {
                if(response.success){
                    var infoboxcontent="<p>Successfully Added.</p>";
                    Metro.infobox.create(infoboxcontent,"success",{overlay:true});
                    Metro.dialog.close(".dialog");
                    getEvaluation();
                }
            },
            error:function () {
                var infoboxcontent="<p>System fatal error.</p>";
                Metro.infobox.create(infoboxcontent,"alert",{overlay:true});
            }
        });
    }
</script>
</body>
</html>
