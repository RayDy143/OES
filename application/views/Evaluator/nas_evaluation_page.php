<div class="row" style="height:100%;">
    <div class="cell-4 bg-white win-shadow p-5">
        <div class="row pl-5">
            <div class="cell-4">
                <div class="img-container thumbnail">
                    <img src="<?php echo base_url('assets/Uploads/Picture/').$nasprofile->Filename; ?>">
                </div>
            </div>
            <input type="hidden" id="txtNasID" value="<?php echo $nasprofile->NasID; ?>">
            <div class="cell-8">

                <p>Name : <?php echo $nasprofile->Firstname.' '.$nasprofile->Lastname; ?></p>
                <p>Email : <?php echo $nasprofile->Email; ?></p>
                <p>Address : <?php echo $nasprofile->Address; ?></p>
                <p>Contact Number : <?php echo $nasprofile->ContactNumber; ?></p>
                <p>Department : <?php echo $nasprofile->DepartmentName; ?></p>
            </div>
        </div>
        <hr class="thin bg-darkBlue">
        <div class="row">
            <div class="stub mx-auto">
                <strong>Evaluation Legend</strong>
            </div>
            <div class="cell-12">
                <table class="table table-border striped cell-border cell-hover">
                    <tbody>
                        <tr>
                            <td>5.0</td>
                            <td>Excellent/Most of the time above target.</td>
                        </tr>
                        <tr>
                            <td>4.6 - 4.9</td>
                            <td>Above Satisfactory/Mostly meets target & above target.</td>
                        </tr>
                        <tr>
                            <td>4.1 - 4.5</td>
                            <td>Satisfactory/Meets 86% - 100% of target.</td>
                        </tr>
                        <tr>
                            <td>3.6 - 4.0</td>
                            <td>Below Satisfactory/Meets 70% - 85% of target.</td>
                        </tr>
                        <tr>
                            <td>1.0 - 3.5</td>
                            <td>Unsatisfactory / Seldom meets target.</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="cell-8 bg-dark fg-white p-5" style="overflow:auto;">
        <h4>Evaluation for <?php echo $nasprofile->Firstname.' '.$nasprofile->Lastname; ?>.</h4>
        <div class="row"  id="evalContainer">

        </div>
        <button type="button" class="cell button bg-darkBlue fg-white mt-3 mb-10 place-right" id="btnSubmit">Submit</button>
    </div>
</div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        getCategory();
        function getCategory() {
            $.ajax({
                type:'ajax',
                method:'POST',
                url:'<?php echo base_url('index.php/Evaluator/getCategory'); ?>',
                dataType:'json',
                success:function(response) {
                    if(response.success){
                        var _content='';
                        for (var i = 0; i < response.cat.length; i++) {
                            var _questionContent='';
                            $.ajax({
                                type:'ajax',
                                method:'POST',
                                url:'<?php echo base_url("index.php/Evaluator/getQuestionByCategory"); ?>',
                                data:{ID:response.cat[i].CategoryID},
                                dataType:'json',
                                async:false,
                                success:function(questionresponse) {
                                    if(questionresponse.success){
                                        for (var i = 0; i < questionresponse.question.length; i++) {
                                            _questionContent+='<section>'
                                                                    +'<div class="page-content">'
                                                                        +'<div class="form-group">'
                                                                            +'<label>'+questionresponse.question[i].Question+'</label>'
                                                                            +'<input id="'+questionresponse.question[i].QuestionID+'" class="questions" type="text" data-role="input"/>'
                                                                        +'</div>'

                                                                    +'</div>'
                                                            +'</section>';
                                        }
                                    }
                                },
                                error:function() {

                                }
                            });
                            _content+='<div class="cell-12 mt-3">'
                                            +'<div data-role="panel" data-cls-title="bg-darkBlue fg-white" data-title-caption="'+response.cat[i].Category+'">'
                                                +'<div data-role="wizard" class="wizard-wide-md">'
                                                    +_questionContent
                                                +'</div>'
                                            +'</div>'
                                      +'</div>';
                        }
                        $("#evalContainer").html(_content);
                    }
                },
                error:function() {

                }
            });
        }
        $("#btnSubmit").click(function () {
            var hasEmptyValues=false;
            var dsafs=$( ":text" )
              .map(function() {
                 if(this.value==""){
                     hasEmptyValues=true;
                 }
              });
            if(hasEmptyValues){
                alert("Please make sure to fill out all fields.");
            }else{
                var dsafs=$( ":text" )
                .map(function() {
                   var _qid=this.id;
                   var _rating=this.value;
                });
            }
        });

    });
</script>
</body>
