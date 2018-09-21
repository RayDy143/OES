        <div class="row" style="height:100%;">
            <div class="cell-8 mx-auto bg-white win-shadow p-5" style="overflow:auto;">
                <?php
                    function secure_iterable($var)
                    {
                        return is_iterable($var) ? $var : array();
                    }
                 ?>
                 <?php
                    if(isset($eval)){
                        if($eval==null){
                            echo '<h4>There is no available evaluation as of the moment yet.</h4>';
                        }else{
                            echo '<h4>Evaluation</h4>';
                        }
                    }
                ?>
                <?php foreach (secure_iterable($eval) as $row): ?>
                    <div class="mt-5" data-role="panel" data-cls-title="bg-darkBlue fg-white"
                        data-title-caption="<?php echo "Schoolyear: ".$row['Schoolyear']."(".$row['Semester'].")"; ?>">
                        Evaluate your scholar.
                        <table id="tblEvaluation" data-role="table" data-pagination="true" class="table table-border striped cell-hover">
                            <thead>
                                <tr>
                                    <th>Picture</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach (secure_iterable($nas) as $row): ?>
                                    <tr>
                                        <td><div class="avatar"><img style="width:50px;" src="<?php echo base_url('assets/uploads/Picture/').$row['Filename']; ?>"></div></td>
                                        <td><?php echo $row['Firstname'].' '.$row['Lastname']; ?></td>
                                        <td><button id="Evaluate<?php echo $row['NasID']; ?>" class="button evaluate bg-darkBlue fg-white">Evaluate</button></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#tblEvaluation tbody").on('click','button.evaluate',function() {
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

        });
    </script>
</body>
