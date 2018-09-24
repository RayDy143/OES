        <div class="row" style="height:100%;">
            <div class="cell-8 mx-auto bg-white win-shadow p-5" style="overflow:auto;">

                 <?php
                    if(isset($eval)){
                        if($eval==null){
                            echo '<h4>There is no available evaluation as of the moment yet.</h4>';
                        }else{
                            echo '<h4>Evaluation</h4>';
                        }
                    }
                ?>
                <div id="evalContainer">

                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            $("body").on('click','button.evaluate',function() {
                var _stringID=$(this).attr('id');
                var _id=_stringID.split('Evaluate')[1];
                $.ajax({
                    url:'<?php echo base_url("index.php/Evaluator/evaluateNas") ?>',
                    method:'POST',
                    data:{ID:_id},
                    success:function() {
                        window.location="<?php echo base_url();?>index.php/Evaluator/Evaluate";
                    }
                });
            });
            getActiveEvaluation();
            function getActiveEvaluation() {
                $.ajax({
                    type:'ajax',
                    url:'<?php echo base_url("index.php/Evaluator/getActiveEvaluation") ?>',
                    method:'POST',
                    dataType:'json',
                    success:function(response) {
                        if(response.success){
                            var _content='';
                            var _tablecontent='';
                            for (var i = 0; i < response.activeeval.length; i++) {
                                var evalid=response.activeeval[i].EvaluationID;
                                $.ajax({
                                    type:'ajax',
                                    url:'<?php echo base_url("index.php/Evaluator/getNas"); ?>',
                                    dataType:'json',
                                    async:false,
                                    success:function(response) {
                                        if(response.success){
                                            for (var i = 0; i < response.nas.length; i++) {
                                                var hasEvaluatedNas=false;
                                                $.ajax({
                                                    type:'ajax',
                                                    method:'POST',
                                                    url:'<?php echo base_url("index.php/Evaluator/hasEvaluatedNas"); ?>',
                                                    data:{EvalID:evalid,NasID:response.nas[i].NasID},
                                                    dataType:'json',
                                                    async:false,
                                                    success:function(response) {
                                                        if(response.success){
                                                            hasEvaluatedNas=true;
                                                        }
                                                    }
                                                });
                                                if(hasEvaluatedNas){
                                                    _tablecontent+='<tr>'
                                                                        +'<td><div class="avatar"><img style="width:50px;" src="<?php echo base_url('assets/uploads/Picture/');?>'+response.nas[i].Filename+'"></div></td>'
                                                                        +'<td>'+response.nas[i].Firstname+' '+response.nas[i].Lastname+'</td>'
                                                                        +'<td>Successfully Evaluated.</td>'
                                                                   +'</tr>';
                                                }else{
                                                    _tablecontent+='<tr>'
                                                                        +'<td><div class="avatar"><img style="width:50px;" src="<?php echo base_url('assets/uploads/Picture/');?>'+response.nas[i].Filename+'"></div></td>'
                                                                        +'<td>'+response.nas[i].Firstname+' '+response.nas[i].Lastname+'</td>'
                                                                        +'<td><button id="Evaluate'+response.nas[i].NasID+'" class="button evaluate bg-darkBlue fg-white">Evaluate</button></td>'
                                                                   +'</tr>';
                                                }

                                            }
                                        }
                                    }
                                });
                                _content+='<div class="mt-5" data-role="panel" data-cls-title="bg-darkBlue fg-white" data-title-caption="'+response.activeeval[i].Schoolyear+' ('+response.activeeval[i].Semester+')'+'">'
                                                    +'<table id="tblEvaluation" data-role="table" data-pagination="true" class="table table-border striped cell-hover">'
                                                        +'<thead>'
                                                            +'<tr>'
                                                                +'<th>Picture</th>'
                                                                +'<th>Name</th>'
                                                                +'<th>Action</th>'
                                                            +'</tr>'
                                                        +'</thead>'
                                                        +'<tbody>'
                                                            +_tablecontent
                                                        +'</tbody>'
                                                    +'</table>'
                                               +'</div>';
                            }
                            $("#evalContainer").html(_content);
                        }
                    }
                });
            }
        });
    </script>
</body>
