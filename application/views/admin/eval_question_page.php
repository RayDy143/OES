
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
            <li class="page-item"><a href="#" class="page-link">Question</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="cell-8">
            <h4>Evaluation Question</h4>
        </div>
        <div class="stub ml-auto">
            <button type="button" class="button bg-darkBlue fg-white" onclick="Metro.dialog.open('#AddQuestionDialog')" name="button">ADD</button>
            <a href="<?php echo base_url('index.php/Evaluation/ImportQuestion') ?>" class="button bg-darkBlue fg-white">IMPORT</a>
        </div>
    </div>
    <hr class="row thick bg-black drop-shadow">
    <div class="row">
        <div class="cell">
            <label class="place-right mt-1">Filter by category:</label>
        </div>
        <div class="stub ml-auto">
            <select data-role="select" name="cmbFilterCategory" id="cmbFilterCategory">
                <option value="All">All</option>
                <?php foreach ($category as $row): ?>
                    <option value="<?php echo $row['CategoryID']; ?>"><?php echo $row['Category']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <hr class="thick">
    <div class="row">
        <div class="cell">
            <div class="row">
                <table id="tblQuestion" class="table table-border striped cell-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Question</th>
                            <th>Category</th>
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
<div class="dialog" data-role="dialog" id="AddQuestionDialog">
    <form data-role="validator" action="javascript:" data-on-validate-form="validateAddQuestion">
        <div class="dialog-title">
            Add new question
        </div>
        <div class="dialog-content">
            <div class="cell form-group">
                <label for="txtAddQuestion">Question</label>
                <input data-role="input" data-validate="required" type="text" name="txtAddQuestion" id="txtAddQuestion">
                <span class="invalid_feedback">Question is required.</span>
            </div>
            <div class="cell form-group">
                <label for="cmbAddCategory">Category</label>
                <select data-validate="required" data-role="select" id="cmbAddCategory" name="cmbAddCategory">
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
        $("#tblQuestion").DataTable();
        getQuestion();
        $("#cmbFilterCategory").change(function () {
            getQuestion();
        });
        $("#tblQuestion tbody").on("click","button.delete",function () {
            var _stringID=$(this).attr('id');
            var _id=_stringID.split("Delete")[1];
            Metro.dialog.create({
                title:"Are you sure you want to delete this record?",
                content:"<p>This process cant be undone.</p>",
                actions:[
                    {
                        caption:'Delete',
                        cls:'js-dialog-close bg-darkRed fg-white',
                        onclick:function () {
                            deleteQuestion(_id);
                        }
                    },
                    {
                        caption:'Cancel',
                        cls:'js-dialog-close bg-darkBlue fg-white',
                    }
                ]
            });
        });
        $("#tblQuestion tbody").on("click","button.edit",function () {
            var _stringID=$(this).attr('id');
            var _id=_stringID.split("Edit")[1];
            var _index=_questionData.findIndex(x=>x.QuestionID==_id);
            $("#txtEditQuestionID").val(_questionData[_index].QuestionID);
            $("#txtEditQuestion").val(_questionData[_index].Question);
            $("#cmbEditQuestionCategory").val(_questionData[_index].CategoryID);
            Metro.dialog.open("#EditQuestionDialog");
        });
    });
    var _questionData=[];
    function validateAddQuestion() {
        $.ajax({
            type:'ajax',
            method:'POST',
            url:'<?php echo base_url("index.php/Evaluation/addQuestion"); ?>',
            data:$(this).serialize(),
            dataType:"json",
            success:function (response) {
                if(response.success){
                    var infoboxcontent="<p>Successfully added.</p>";
                    Metro.infobox.create(infoboxcontent,"success",{overlay:true});
                    Metro.dialog.close(".dialog");
                    getQuestion();
                }
            },
            error:function () {
                var infoboxcontent="<p>System Fatal Error.</p>";
                Metro.infobox.create(infoboxcontent,"alert",{overlay:true});
            }
        });
    }
    function validateEditQuestion() {
        $.ajax({
            type:'ajax',
            method:'POST',
            url:'<?php echo base_url("index.php/Evaluation/updateQuestion"); ?>',
            data:$(this).serialize(),
            dataType:"json",
            success:function (response) {
                if(response.success){
                    var infoboxcontent="<p>Successfully Updated.</p>";
                    Metro.infobox.create(infoboxcontent,"success",{overlay:true});
                    Metro.dialog.close("#EditQuestionDialog");
                    getQuestion();
                }
            },
            error:function () {
                var infoboxcontent="<p>System Fatal Error.</p>";
                Metro.infobox.create(infoboxcontent,"alert",{overlay:true});
            }
        });
    }
    function deleteQuestion($id) {
        $.ajax({
            type:'ajax',
            method:'POST',
            url:'<?php echo base_url("index.php/Evaluation/deleteQuestion"); ?>',
            data:{ID:$id},
            dataType:'json',
            success:function (response) {
                if(response.success){
                    var infoboxcontent="<p>Successfully deleted.</p>";
                    Metro.infobox.create(infoboxcontent,"success",{overlay:true});
                    getQuestion();
                }
            },
            error:function () {
                var infoboxcontent="<p>System Fatal Error.</p>";
                Metro.infobox.create(infoboxcontent,"alert",{overlay:true});
            }
        });
    }
    function getQuestion() {
        $.ajax({
            type:'ajax',
            method:'POST',
            url:'<?php echo base_url("index.php/Evaluation/getQuestion"); ?>',
            data:{ID:$("#cmbFilterCategory").val()},
            dataType:'json',
            success:function (response) {
                if(response.success){
                    var _question=response.question;
                    _questionData=_question;
                    var _tableContent='';
                    for (var i = 0; i < _question.length; i++) {
                        _tableContent+='<tr>'
                                            +'<td>'+_question[i].QuestionID+'</td>'
                                            +'<td>'+_question[i].Question+'</td>'
                                            +'<td>'+_question[i].Category+'</td>'
                                            +'<td><div data-role="buttongroup" class="row"><button id="Edit'+_question[i].QuestionID+'" class="button edit small cell bg-darkBlue fg-white ml-1 mr-1 mif-pencil"> EDIT</button><button id="Delete'+_question[i].QuestionID+'" class="button delete cell small bg-darkRed fg-white ml-1 mr-1 mif-bin"> DELETE</button></div></td>'
                                      +'</tr>';
                    }
                    if($.fn.DataTable.isDataTable("#tblQuestion")){
                        $("#tblQuestion").DataTable().clear().destroy();
                    }
                    $("#tblQuestion tbody").html(_tableContent);
                    $("#tblQuestion").DataTable();
                }
            },
            error:function () {
                var infoboxcontent="<p>System Fatal Error.</p>";
                Metro.infobox.create(infoboxcontent,"alert",{overlay:true});
            }
        });
    }
</script>
</body>
</html>
