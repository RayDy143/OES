<div class="cell mr-4 p-5" style="overflow:auto">
    <div class="row">
        <div class="mx-auto print win-shadow pt-5 pl-15 pr-15 pb-10" style="width:768px;">
            <div class="printThis">
                <img src="<?php echo base_url('assets/report/banner.png') ?>" style="width:100%;">
                <p class="text-secondary text-center"><strong>Non - Academic Scholar Evaluation (<?php echo $evaldata->Semester; ?> <?php echo $evaldata->Schoolyear; ?>)</strong></p>
                <p class="text-secondary text-center m-0"><strong>Scholar: <?php echo $nasprofile->Firstname.' '.$nasprofile->Lastname; ?></strong></p>
                <p>Criteria</p>
                <div id="resultContainer">

                </div>
                <div class="cell m-0">
                    <p class="text-secondary text-right m-0">Total Average: <span id="lblTotaAverage"></span></p>
                    <p class="text-secondary text-right m-0">Total Equivalent Percentage: <span id="lblTotaEqui"></span></p>
                </div>
                <div class="cell">
                    <div class="row">
                        <div class="cell-8">
                            <p>Legend</p>
                            <table class="table compact">
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
                        <div class="cell-4">
                            <p class="text-center text-upper mt-20"><strong><u><?php echo $userprofile->Firstname.' '.$userprofile->Lastname; ?></u></strong></p>
                            <p class="m-0 text-center">Evaluator</p>
                        </div>
                    </div>
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
        getNasEvaluationCategoryResult();
        function getNasEvaluationCategoryResult() {
            $.ajax({
                type:'ajax',
                method:'POST',
                url:'<?php echo base_url("index.php/Evaluation/getNasEvaluationCategoryResult"); ?>',
                dataType:'json',
                success:function(response) {
                    if(response.success)
                    {
                        var totalRating=0;
                        var totalRatingCount=0;
                        var totalEquvalentPercentage=0;
                        var totalEquvalentPercentageCount=0;
                        var _content='';
                        for (var i = 0; i < response.nasevalcat.length; i++) {
                            var _questioncontent='';
                            var Rating=0;
                            var EquvalentPercentage=0;
                            var ratingcount=0;
                            $.ajax({
                                type:'ajax',
                                method:'POST',
                                url:'<?php echo base_url("index.php/Evaluation/getNasEvaluationQuestionResultByCategory"); ?>',
                                data:{ID:response.nasevalcat[i].Category},
                                dataType:'json',
                                async:false,
                                success:function(questionresponse) {
                                    if(questionresponse.success){
                                        for (var i = 0; i < questionresponse.nasevalquestion.length; i++) {
                                            Rating+=parseFloat(questionresponse.nasevalquestion[i].Rating);
                                            totalRating+=parseFloat(questionresponse.nasevalquestion[i].Rating);
                                            totalRatingCount++;
                                            ratingcount++;
                                            _questioncontent+='<tr>'
                                                                    +'<td>'+questionresponse.nasevalquestion[i].Question+'</td>'
                                                                    +'<td>'+questionresponse.nasevalquestion[i].Rating+'</td>'
                                                             +'</tr>';
                                        }
                                    }
                                }
                            });
                            EquvalentPercentage=Rating/ratingcount;
                            totalEquvalentPercentage+=EquvalentPercentage;
                            totalEquvalentPercentageCount++;
                            _content+='<div class="text-secondary mt-3" data-role="panel" data-title-caption="'+((response.nasevalcat[i].Category=="Job Responsibility")?response.nasevalcat[i].Category+' 40%':response.nasevalcat[i].Category+' 30%')+'">'
                                            +'<table class="table table-border cell-border striped cell-hover compact">'
                                                +'<tbody>'
                                                    +_questioncontent
                                                +'</tbody>'
                                            +'</table>'
                                            +'<p class="text-right">Equivalent Percentage: '+EquvalentPercentage.toFixed(1)+'</p>'
                                    +'</div>';
                        }
                        $("#resultContainer").html(_content);
                        $("#lblTotaAverage").text(totalEquvalentPercentage.toFixed(1));
                        $("#lblTotaEqui").text(Math.round((totalEquvalentPercentage/totalEquvalentPercentageCount)*10)/10);
                    }
                }
            });
        }
    });
</script>
