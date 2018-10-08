<div class="cell bg-white p-3 ml-4 mr-4" style="overflow:auto">
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
            <li class="page-item"><a href="#" class="page-link">Masterfile</a></li>
            <li class="page-item"><a href="#" class="page-link">Department</a></li>
        </ul>
        <div class="stub ml-auto">
            <button type="button" onclick="Metro.dialog.open('#AddDepartmentDialog');" class="button bg-darkBlue fg-white" name="button">ADD NEW DEPARTMENT</button>
        </div>
    </div>
    <div class="row">
        <div class="stub">
            <h4>Department</h4>
        </div>
        <div class="cell">
            <div class="row">
                <div class="cell">
                    <label class="place-right mt-1">Filter by campus:</label>
                </div>
                <div class="stub">
                    <select class="filter" id="cmbFilterLocation">
                        <option value="All">All</option>
                        <?php
                            foreach ($location as $row) {
                                    echo '<option value="'.$row['LocationID'].'">'.$row['Name'].'</option>';
                            }
                         ?>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <hr class="row thick bg-black drop-shadow">
    <div class="d-flex flex-justify-center" id="activity">
        <div data-role="progress" id="progress" class="mr-3" data-type="line"></div>
    </div>
    <div class="row">
        <div class="cell">
            <div class="row">
                <table id="tblDepartment" class="table table-border striped cell-hover">
                    <thead>
                        <tr>
                            <th>Department Name</th>
                            <th>Location</th>
                            <th>Evaluators</th>
                            <th>NAS</th>
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
<div class="dialog" data-role="dialog" id="AddDepartmentDialog">
    <form data-role="validator" id="frmAddDepartment" method="POST" data-on-validate-form="validateAddDepartment" action="javascript:">
        <div class="dialog-title">
            Add new department
        </div>
        <div class="dialog-content">
            <div class="cell form-group">
                <label for="DepartmentName">Department Name</label>
                <input data-role="input" data-validate="required" type="text" name="DepartmentName" id="DepartmentName">
                <span class="invalid_feedback">Department name is required.</span>
            </div>
            <div class="cell form-group">
                <label for="Location">Location</label>
                <select data-validate="required" data-role="select" id="Location" name="Location">
                    <?php
                        if($location){
                            foreach ($location as $row) {
                                echo '<option value='.$row['LocationID'].'>'.$row['Name'].'</option>';
                            }
                        }
                     ?>
                </select>
                <span class="invalid_feedback">Location is required.</span>
            </div>
            <div class="dialog-actions">
                <button type="button" class="button bg-darkRed fg-white js-dialog-close place-right mb-2">CANCEL</button>
                <button type="submit" class="button bg-darkBlue fg-white place-right mb-2">ADD</button>
            </div>
        </div>
    </form>
</div>
</div>
</div>

<script>
    $(document).ready(function(){
        // $(window).on("load",function(){
        //     $('body').mCustomScrollbar({
        //         scrollButtons:{enable:true,scrollType:"stepped"},
		// 		keyboard:{scrollType:"stepped"},
		// 		mouseWheel:{scrollAmount:188},
		// 		theme:"rounded-dark",
		// 		autoExpandScrollbar:true,
		// 		snapAmount:188,
		// 		snapOffset:65
    	// 	});
        // });
        $("#tblDepartment").DataTable();
        getAllDepartment();
        $('#cmbFilterLocation').change(function () {
            getAllDepartment();
        });
        $("#tblDepartment").on('click','button.delete',function() {
            var _stringID=$(this).attr('id');
            var _id=_stringID.split('Delete')[1];
            if(getTotalDepartmentEvaluator(_id)==0 && getTotalDepartmentNas(_id)==0){
                $.ajax({
                    type:'ajax',
                    method:'POST',
                    url:'<?php echo base_url("index.php/Department/deleteDepartment"); ?>',
                    data:{ID:_id},
                    dataType:'json',
                    success:function(response) {
                        if(response.success){
                            var info_content="<p>Successfully deleted.</p>";
                            Metro.infobox.create(info_content,'success',{overlay:true});
                            getAllDepartment();
                        }
                    },
                    error:function(){
                        var info_content="<p>System error. Please contact you system administrator.</p>";
                        Metro.infobox.create(info_content,'alert',{overlay:true});
                    }
                })
            }else{
                var info_content="<p>Cannot delete a department that is already used.</p>";
                Metro.infobox.create(info_content,'alert',{overlay:true});
            }
        });
    });
    function validateAddDepartment() {
        if(isDepartmentExist($("#DepartmentName").val())){
            var info_content="<p>Department name already used.</p>";
            Metro.infobox.create(info_content,'alert',{overlay:true});
        }else{
            $.ajax({
                type:'ajax',
                method:'POST',
                url:'<?php echo base_url("index.php/Department/AddDepartment"); ?>',
                data:$("#frmAddDepartment").serialize(),
                dataType:'json',
                success:function(response){
                    if(response.success){
                        Metro.dialog.close(".dialog");
                        var info_content="<p>Department Successfully Added</p>";
                        Metro.infobox.create(info_content,'success',{overlay:true});
                        getAllDepartment();
                    }
                },
                error:function() {
                    var info_content="<p>System error. Please contact you system administrator.</p>";
                    Metro.infobox.create(info_content,'alert',{overlay:true});
                }
            });
        }
    }
    function getAllDepartment() {
        $.ajax({
            type:'ajax',
            method:'POST',
            url:'<?php echo base_url("index.php/Department/getAllDepartment") ?>',
            data:{ID:$("#cmbFilterLocation").val()},
            dataType:'json',
            success:function(response) {
                if(response.success){
                    var _department=response.dep;
                    var _tableContent=''
                    for (var i = 0; i < _department.length; i++) {
                        _tableContent+='<tr>'
                                            +'<td>'+_department[i].DepartmentName+'</td>'
                                            +'<td>'+_department[i].Name+'</td>'
                                            +'<td>'+getTotalDepartmentEvaluator(_department[i].DepartmentID)+'</td>'
                                            +'<td>'+getTotalDepartmentNas(_department[i].DepartmentID)+'</td>'
                                            +'<td><div data-role="buttongroup" class="row"><a href="<?php echo base_url(); ?>index.php/Department/Manage/'+_department[i].DepartmentID+'" class="button edit small cell bg-darkBlue fg-white ml-1 mr-1 mif-info"> MANAGE</a><button id="Delete'+_department[i].DepartmentID+'" class="button delete cell small bg-darkRed fg-white ml-1 mr-1 mif-bin"> DELETE</button></div></td>'

                                      +'</tr>'
                    }
                    if($.fn.DataTable.isDataTable("#tblDepartment")){
                        $("#tblDepartment").DataTable().clear().destroy();
                    }
                    $("#tblDepartment tbody").html(_tableContent);
                    $("#tblDepartment").DataTable();
                    $("#progress").hide();
                }
            },
            error:function(){
                var info_content="<p>System error. Please contact you system administrator.</p>";
                Metro.infobox.create(info_content,'alert',{overlay:true});
            }
        })
    }
    function isDepartmentExist($departmentname) {
        var hasExist=false;
        $.ajax({
            type:'ajax',
            method:'POST',
            url:'<?php echo base_url("index.php/Department/getDepartmentExistence"); ?>',
            data:{Department:$departmentname},
            dataType:'json',
            async:false,
            success:function(response){
                if(response.success){
                    hasExist=true;
                }
            }
        });
        return hasExist;
    }
    function getTotalDepartmentEvaluator($id) {
        var totalEvaluator=0;
        $.ajax({
            type:'ajax',
            method:'POST',
            url:'<?php echo base_url("index.php/Department/getDepartmentEvaluator") ?>',
            data:{ID:$id},
            dataType:'json',
            async:false,
            success:function(response){
                if(response.success){
                    if(response.evaluator){
                        totalEvaluator=response.evaluator.length;
                    }
                }
            }
        });
        return totalEvaluator;
    }
    function getTotalDepartmentNas($id) {
        var totalNas=0;
        $.ajax({
            type:'ajax',
            method:'POST',
            url:'<?php echo base_url("index.php/Department/getDepartmentNas"); ?>',
            data:{ID:$id},
            dataType:'json',
            async:false,
            success:function(response){
                if(response.success){
                    if(response.nas){
                        totalNas=response.nas.length;
                    }
                }
            }
        });
        return totalNas;
    }
</script>
</body>
</html>
