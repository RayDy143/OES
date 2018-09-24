
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
            <h4>Evaluation Results</h4>
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
                                            +'<td>'+new Date(response.eval[i].StartingDate).toLocaleDateString()+'</td>'
                                            +'<td>'+((response.eval[i].DateEnded==null)?'TBD':new Date(response.eval[i].DateEnded).toLocaleDateString())+'</td>'
                                            +'<td>'+((response.eval[i].IsActive==0)?'Deactivated':'Active')+'</td>'
                                            +'<td><div data-role="buttongroup" class="mx-auto"><a href="<?php echo base_url('index.php/Evaluation/ViewResults/'); ?>'+response.eval[i].EvaluationID+'" class="button edit small bg-darkBlue fg-white ml-1 mr-1">View Results</a></div></td>'
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
});
</script>
</body>
</html>
