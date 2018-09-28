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
            <li class="page-item"><a href="#" class="page-link">Masterfile</a></li>
            <li class="page-item"><a href="<?php echo base_url('index.php/Department') ?>" class="page-link">Department</a></li>
            <li class="page-item"><a href="#" class="page-link">Manage</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="stub">
            <h4>Manage <?php echo $depinfo->DepartmentName; ?> Department</h4>
        </div>
        <div class="stub ml-auto">
            <button type="button" class="button bg-darkBlue fg-white" name="btnEditDepartment" onclick="Metro.dialog.open('#EditDepartmentDialog')" id="btnEditDepartment">EDIT INFO</button>
        </div>
    </div>
    <hr class="row thick bg-black drop-shadow">
    <div class="row">
        <div class="cell">
            <div class="row">
                <div class="cell-4 form-group">
                    <label for="txtDepName">Department Name</label>
                    <input type="text" readonly name="txtDepName" id="txtDepName" value="<?php echo $depinfo->DepartmentName; ?>">
                </div>
                <div class="cell-4 form-group m-0">
                    <label for="txtDepHead">Department Head</label>
                    <input type="text" readonly name="txtDepHead" id="txtDepHead" value="<?php if($depinfo->Email){ if($depinfo->Firstname){echo $depinfo->Firstname.' '.$depinfo->Lastname;}else{echo $depinfo->Email;} }else{echo "N/A";} ?>">
                </div>
                <div class="cell-4 form-group m-0">
                    <label for="txtLocation">Location</label>
                    <input type="text" readonly name="txtLocation" id="txtLocation" value="<?php echo $depinfo->Name; ?>">
                </div>
            </div>
            <hr class="row thin bg-black">
            <div class="row">
                <div class="cell-12">
                    <strong>List of Evaluator and Scholar belong in this Department.</strong>
                </div>
            </div>
            <div class="row">
                <div class="cell">
                    <table data-role="table" data-pagenation="true" id="tblDepartmentEvaluatorAndScholars" class="table table-border striped cell-hover">
                        <thead>
                            <tr>
                                <th>Picture</th>
                                <th>Name/Email</th>
                                <th>Type</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            function secure_iterable($var)
                            {
                                return is_iterable($var) ? $var : array();
                            }
                             ?>
                            <?php foreach (secure_iterable($depevaluator) as $row): ?>
                                <tr>
                                    <td><div class="avatar"><img style="width:50px;" src="<?php if($row['Filename']){echo base_url('assets/uploads/Picture/').$row['Filename'];}else{echo base_url('assets/uploads/Picture/default_prof_pic.png');} ?>"></div></td>
                                    <td><?php if($row['Firstname']) {echo $row['Firstname'].' '.$row['Lastname'];}else{echo $row['Email'];} ?></td>
                                    <td>Evaluator</td>
                                </tr>
                            <?php endforeach; ?>
                            <?php foreach (secure_iterable($depnas) as $row): ?>
                                <tr>
                                    <td><div class="avatar"><img style="width:50px;" src="<?php if($row['Filename']){echo base_url('assets/uploads/Picture/').$row['Filename'];}else{echo base_url('assets/uploads/Picture/default_prof_pic.png');} ?>"></div></td>
                                    <td><?php if($row['Firstname']) {echo $row['Firstname'].' '.$row['Lastname'];}else{echo $row['Email'];} ?></td>
                                    <td>Scholar</td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="dialog" data-role="dialog" id="EditDepartmentDialog">
        <form data-role="validator" action="javascript:" id="frmEditDepartmentInfo" data-on-validate-form="validateEditDepartment">
            <div class="dialog-title">Edit Department Info</div>
            <div class="dialog-content">
                <div class="row">
                    <input type="hidden" name="txtEditDepartmentID" id="txtEditDepartmentID" value="<?php echo $depid; ?>">
                    <div class="cell-12 form-group">
                        <label for="txtEditDepName">DepartmentName</label>
                        <input type="text" name="txtEditDepName" id="txtEditDepName" value="<?php echo $depinfo->DepartmentName ?>">
                    </div>
                    <div class="cell-12 form-group">
                        <label for="cmbDepartmentHead">Department Head</label>
                        <select data-role="select" name="cmbDepartmentHead" id="cmbDepartmentHead">
                            <option value="">Select Department Head</option>
                            <?php
                                foreach ($depevaluator as $row) {
                                    if($row['Email']==$depinfo->Email){
                                        if($row['Firstname']){
                                            echo '<option selected value="'.$row['Email'].'">'.$row['Firstname'].' '.$row['Lastname'].'</option>';
                                        }else{
                                            echo '<option selected value="'.$row['Email'].'">'.$row['Email'].'</option>';
                                        }
                                    }else{
                                        if($row['Firstname']){
                                            echo '<option value="'.$row['Email'].'">'.$row['Firstname'].' '.$row['Lastname'].'</option>';
                                        }else{
                                            echo '<option value="'.$row['Email'].'">'.$row['Email'].'</option>';
                                        }
                                    }
                                }

                             ?>
                        </select>
                    </div>
                    <div class="cell-12 form-group">
                        <label for="cmbLocation">Location</label>
                        <select data-role="select" name="cmbLocation" id="cmbLocation">
                            <?php
                                foreach ($location as $row) {
                                    if($row['Name']==$depinfo->Name){
                                        echo '<option selected value="'.$row['LocationID'].'">'.$row['Name'].'</option>';
                                    }else{
                                        echo '<option value="'.$row['LocationID'].'">'.$row['Name'].'</option>';
                                    }
                                }

                             ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="dialog-actions">
                <button type="button" class="button bg-darkRed fg-white js-dialog-close place-right">Cancel</button>
                <button type="submit" class="button primary js-dialog-close place-right">Update</button>
            </div>
        </form>
    </div>
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
    });
    function validateEditDepartment() {
        $.ajax({
            type:'ajax',
            method:'POST',
            url:'<?php echo base_url('index.php/Department/EditDepartmentInfo') ?>',
            data:$(this).serialize(),
            dataType:'json',
            success:function (response) {
                if(response.success){
                    var infobox_content="<p>Successfully Updated.</p>";
                    Metro.infobox.create(infobox_content,"success",{overlay:true});
                    Metro.dialog.close('.dialog');
                    location.reload();
                }
            }
        })
    }
</script>
</body>
</html>
