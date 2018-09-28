
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
            <h4>NAS Evaluation Results</h4>
        </div>
    </div>
    <hr class="row thick bg-black drop-shadow">
    <hr class="thick">
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
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>

<script>
    $(document).ready(function(){
        
    });
</script>
</body>
</html>
