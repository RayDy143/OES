<div class="cell bg-white p-6 mr-4" style="height:100%;overflow-x:auto;">
    <div class="row">
        <button type="button" class="button bg-red fg-white"><span class="mif-arrow-left"></span> Go Back</button>
    </div>
    <div class="row">
        <ul class="cell breadcrumbs" style="margin-bottom:0px;">
            <li class="page-item"><a href="#" class="page-link">Home</a></li>
            <li class="page-item"><a href="#" class="page-link">User Accounts</a></li>
        </ul>
        <div class="stub">
            <button type="button" name="button" onclick="Metro.dialog.open('#demoDialog1')" class="button bg-darkBlue fg-white">New User</button>
            <button type="button" name="button" class="button bg-darkBlue fg-white">Import</button>
        </div>
    </div>
    <hr class="row thick bg-black">
    <div class="row">
        <div class="stub">
            <h3>User Accounts</h3>
        </div>
        <div class="cell">
            <div class="row">
                <div class="cell">
                    <label class="place-right mt-1" for="">Filter by Role:</label>
                </div>
                <div class="cell">
                    <select data-role="select">
                        <option value="1">Admin</option>
                        <option value="2">Evaluator</option>
                    </select>
                </div>
                <div class="cell">
                    <label class="place-right mt-1" for="">Filter by department:</label>
                </div>
                <div class="cell">
                    <select data-role="select">
                        <?php
                            foreach ($dep as $row) {
                                echo '<option value="'.$row['DepartmentID'].'">'.$row['DepartmentName'].'</option>';
                            }
                         ?>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <hr class="row thick bg-black">
    <div class="row">
        <?php foreach ($user as $row){
            echo '<div class="stub mx-auto" style="width:270px;">';
                echo '<div class="card p-5">';
                    echo '<div class="card-header">';
                        echo '<div class="text-ellipsis">'.$row['Email'].'</div>';
                        echo '<div class="date">'.$row['DepartmentName'].'</div>';
                    echo '</div>';
                    echo '<div class="card-footer">';
                        echo '<button class="button bg-darkBlue fg-white mif-info"></button>';
                        echo '<button class="button alert mif-bin"></button>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        }
        ?>
    </div>
</div>
    <div class="dialog" data-role="dialog" id="demoDialog1">
        <form data-role="validator" id="frmAddUser" data-on-submit="submitForm" action="javascript:">
            <div class="dialog-title">Add new user<hr class="thick bg-black"></div>
            <div class="dialog-content">
                <div class="form-group">
                    <label for="Email">Email</label>
                    <input type="email" name="Email" id="Email" data-validate="email required" placeholder="Enter Email">
                </div>
                <div class="form-group">
                    <label for="">Select Usertype</label>
                    <select data-role="select" id="cmbUserType">
                        <option value="1">Admin</option>
                        <option value="2">Evaluator</option>
                    </select>
                </div>
                <div class="form-group no-visible" id="depContainer">
                    <label for="cmbDepartment">Select Department</label>
                    <select data-role="select"  id="cmbDepartment">
                        <?php
                            foreach ($dep as $row) {
                                echo '<option value="'.$row['DepartmentID'].'">'.$row['DepartmentName'].'</option>';
                            }
                         ?>
                    </select>
                </div>
            </div>
            <div class="dialog-actions">
                <button type="button" class="button alert place-right js-dialog-close">Cancel</button>
                <button type="submit" id="btnAdd" class="button primary place-right">Add</button>
            </div>
        </form>
    </div>
</div>
</div>

<script>
    function submitForm(){
        $.ajax({
            method:'POST',
            type:'ajax',
            url:'<?php echo base_url("index.php/UserAccounts/AddNewUser"); ?>',
            data: {Email:$("#Email").val(),cmbDepartment:$("#cmbDepartment").val(),UserTypeID:$("#cmbUserType").val()},
            dataType:'json',
            success:function(response){
                if(response.success){
                    Metro.dialog.close("#demoDialog1");
                    var html_content =
                    "<p>Adding of user was successful</p>";
                     Metro.infobox.create(html_content,"success",{
                         overlay:true
                     });
                }
            },
            error: function()
            {
                var html_content =
                "<p>Adding of user was unsuccessful</p>";
                 Metro.infobox.create(html_content,"alert",{
                     overlay:true
                 });
            }
        });
    }
    $(document).ready(function(){
        $("#cmbUserType").change(function(){
            if($("#cmbUserType").val()=="2"){
                $("#depContainer").removeClass("no-visible");
            }else{
                 var select = $("#cmbDepartment").data('select');
                 select.val("4");
                 $("#depContainer").addClass("no-visible");

            }
        });
    });
</script>
</body>
</html>
