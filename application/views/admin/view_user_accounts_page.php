<div class="cell bg-white p-3 ml-4" style="overflow:auto;">
    <div class="row">
        <a type="button" href="javascript:history.back();" class="button stub drop-shadow bg-red fg-white"><span class="mif-arrow-left"></span> Go Back</a>
        <div class="stub ml-auto">
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
            <li class="page-item"><a href="<?php echo base_url('index.php/UserAccounts/AddImport'); ?>" class="page-link">UserAccounts</a></li>
            <li class="page-item"><a href="#" class="page-link">View User</a></li>
        </ul>
        <div class="stub">
            <button type="button" name="button" onclick="Metro.dialog.open('#demoDialog1')" class="button drop-shadow bg-darkBlue fg-white">New User</button>
            <button type="button" name="button" class="button bg-darkBlue fg-white drop-shadow">Import</button>
        </div>
    </div>
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
                    <select class="filter" id="cmbFilterUsertype">
                        <option value="All">All</option>
                        <option value="1">Admin</option>
                        <option value="2">Evaluator</option>
                    </select>
                </div>
                <div class="cell">
                    <label class="place-right mt-1">Filter by department:</label>
                </div>
                <div class="cell">
                    <select class="filter" id="cmbFilterDepartment">
                        <option value="All">All</option>
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
    <hr class="row thick bg-black drop-shadow">
    <div class="d-flex flex-justify-center" id="activity">
        <div data-role="progress" id="progress" class="mr-3" data-type="line"></div>
    </div>
    <div class="row" id="userContainer">
        <div class="cell mr-3">
            <table id="tblUsers" class="table table-border striped cell-border cell-hover win-shadow">
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>Email</th>
                        <th>Department</th>
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
                <div class="form-group" id="depContainer">
                    <label for="cmbDepartment">Select Department</label>
                    <select id="cmbDepartment">
                        <?php
                        foreach ($dep as $row) {
                            if($row['DepartmentName']=="Admin"){
                                echo '<option selected value="'.$row['DepartmentID'].'">'.$row['DepartmentName'].'</option>';
                            }else{
                                echo '<option value="'.$row['DepartmentID'].'">'.$row['DepartmentName'].'</option>';
                            }
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
        var _check=checkEmailExistence($("#Email").val());
        if(_check=="Deleted"){
            Metro.dialog.close(".dialog");
            Metro.dialog.create({
               title: "This user was recently registered to this system and have beed deleted!",
               content: "<div>Would you like to add this user as a new user or just restore this user?</div>",
               clsDialog: "bg-red fg-white",
               actions: [
                   {
                       caption: "Add as new",
                       cls: "js-dialog-close",
                       onclick: function(){
                           $.ajax({
                               method:'POST',
                               type:'ajax',
                               url:'<?php echo base_url("index.php/UserAccounts/AddAsNewUser"); ?>',
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
                                        $(".filter").change();

                                   }
                               },
                               error: function()
                               {
                                   var html_content =
                                   "<p>Adding of user was unsuccessful. Please contact your system administrator immediately.</p>";
                                    Metro.infobox.create(html_content,"alert",{
                                        overlay:true
                                    });
                               }
                           });
                       }
                   },
                   {
                       caption: "Restore user",
                       cls: "js-dialog-close",
                       onclick: function(){
                           $.ajax({
                               method:'POST',
                               type:'ajax',
                               url:'<?php echo base_url("index.php/UserAccounts/restoreUser") ?>',
                               dataType:'json',
                               data:{Email:$("#Email").val()},
                               success:function(response){
                                   var html_content =
                                   "<p>Successfully restored.</p>";
                                    Metro.infobox.create(html_content,"success",{
                                        overlay:true
                                    });
                                    $(".filter").change();

                               },
                               error:function(){
                                   var html_content =
                                   "<p>System error. Please immediately contact your system administrator.</p>";
                                    Metro.infobox.create(html_content,"alert",{
                                        overlay:true
                                    });
                               }
                           });
                       }
                   },
                   {
                       caption: "Cancel",
                       cls: "js-dialog-close"
                   }
               ]
           });
       }else if(_check=="Duplicated"){
           html_content="<p>The email you entered was already been registered.</p>";
            Metro.infobox.create(html_content,"success",{
                overlay:true
            });
        }else{
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
                         $(".filter").change();
                    }
                },
                error: function()
                {
                    var html_content =
                    "<p>Adding of user was unsuccessful. Please contact your system administrator immediately.</p>";
                     Metro.infobox.create(html_content,"alert",{
                         overlay:true
                     });
                }
            });
        }
    }
    function getAllUsers() {
        $.ajax({
            type:'ajax',
            method:'POST',
            url:'<?php echo base_url("index.php/UserAccounts/getAllUser"); ?>',
            data:{RoleID:$("#cmbFilterUsertype").val(),DepartmentID:$("#cmbFilterDepartment").val()},
            dataType:'json',
            success:function(response){
                if(response.success){
                    var _user=response.user;
                    var _tableContent='';
                    for (var i = 0; i < _user.length; i++) {
                        _tableContent+='<tr>'
                                            +'<td>'+_user[i].UserID+'</td>'
                                            +'<td>'+_user[i].Email+'</td>'
                                            +'<td>'+_user[i].DepartmentName+'</td>'
                                            +'<td>'+_user[i].Status+'</td>'
                                            +'<td><div data-role="buttongroup" class="row"><button id="Edit'+_user[i].UserID+'" class="button edit small cell bg-darkBlue fg-white ml-1 mr-1">MORE</button><button id="Delete'+_user[i].UserID+'" class="button delete cell small bg-darkRed fg-white ml-1 mr-1">DELETE</button></div></td>'
                                      +'</tr>'
                    }

                    if ($.fn.DataTable.isDataTable("#tblUsers")) {
                      $('#tblUsers').DataTable().clear().destroy();
                    }
                    $("#tblUsers tbody").html(_tableContent);
                    $("#tblUsers").dataTable();
                    $("#progress").remove();
                }
            }
        })
    }
    function checkEmailExistence(email){
        var _res="Available";
        $.ajax({
            type:'ajax',
            method:'POST',
            url:'<?php echo base_url("index.php/UserAccounts/checkEmailExistence"); ?>',
            dataType:'json',
            data:{Email:email},
            async:false,
            success:function(response){
                if(response.success){
                    if(response.user.IsDeleted==1){
                        _res="Deleted";
                    }else{
                        _res="Duplicated";
                    }
                }
            },
            error:function(){
                var html_content =
                "<p>There were some issues on the database you should contact you system administrator.</p>";
                 Metro.infobox.create(html_content,"alert",{
                     overlay:true
                 });
            }
        });
        return _res;
    }
    $(document).ready(function(){
        $("#tblUsers").dataTable();
        $(window).on("load",function(){
            $('body').mCustomScrollbar({
                scrollButtons:{enable:true,scrollType:"stepped"},
				keyboard:{scrollType:"stepped"},
				mouseWheel:{scrollAmount:188},
				theme:"rounded-dark",
				autoExpandScrollbar:true,
				snapAmount:188,
				snapOffset:65
    		});
        });
        getAllUsers();
        var gUserData=[];
        $("body").on("click","button.edit",function(){
            var _stringId=$(this).attr("id");
            var _id=_stringId.split('Edit')[1];
            var _content='';
            $.ajax({
                type:'ajax',
                method:'POST',
                url:'<?php echo base_url("index.php/UserAccounts/getUserAccountInfo"); ?>',
                data:{ID:_id},
                dataType:'json',
                async:false,
                success:function(response){
                    if(response.success){
                        if(response.info.IsFirstLogin==1){
                            var html_content ="<p>The user has not logged in and provided his or her information.</p>";
                             Metro.infobox.create(html_content,"alert",{
                                 overlay:true
                             });
                        }else{
                            _content='<div class="grid">'
                                            +'<div class="row">'
                                                +'<div class="cell">'
                                                    +'<div class="img-container thumbnail rounded mx-auto" style="width:30%">'
                                                        +'<img src="'+'<?php echo base_url("assets/uploads/Picture/") ?>'+response.info.Filename+'">'
                                                    +'</div>'
                                                    +'<hr class="thick bg-darkBlue">'
                                                    +'<strong> Email : '+response.info.Email+'</strong>'
                                                    +'<hr class="thick bg-darkBlue">'
                                                    +'<strong> Name : '+response.info.Firstname+' '+response.info.Middlename+' '+response.info.Lastname+'</strong>'
                                                    +'<hr class="thick bg-darkBlue">'
                                                    +'<strong> Address : '+response.info.Address+'</strong>'
                                                    +'<hr class="thick bg-darkBlue">'
                                                    +'<strong> Birthdate : '+response.info.Birthdate+'</strong>'
                                                    +'<hr class="thick bg-darkBlue">'
                                                    +'<strong> Gender : '+response.info.Gender+'</strong>'
                                                    +'<hr class="thick bg-darkBlue">'
                                                    +'<strong> Contact Number : '+response.info.ContactNumber+'</strong>'
                                                +'</div>'
                                            +'</div>'
                                    +'</div>';
                        }
                    }
                },
                error:function(){

                }
            });
            if(_content!=''){
                Metro.dialog.create({
                    content:_content,
                    actions: [
                        {
                            caption: "Close",
                            cls: "js-dialog-close primary"
                        }
                    ]
                });
            }
        });
        $("body").on("click","button.delete",function(){
            var _stringId=$(this).attr("id");
            var _id=_stringId.split('Delete')[1];
            Metro.dialog.create({
               title: "Are you sure you want to delete this user?",
               content: "<div>This process cant be undone.</div>",
               actions: [
                   {
                       caption: "Delete",
                       cls: "js-dialog-close alert",
                       onclick: function(){
                           $.ajax({
                               method:"POST",
                               type:"ajax",
                               url:'<?php echo base_url("index.php/UserAccounts/deleteUser"); ?>',
                               dataType:"json",
                               data:{ID:_id},
                               success:function(response){
                                   if(response.success){
                                       var html_content ="<p>You have successfully deleted the user.</p>";
                                        Metro.infobox.create(html_content,"success",{
                                            overlay:true
                                        });
                                        $(".filter").change();
                                   }
                               },
                               error:function(){
                                   var html_content="<p>There were some issues in deleteting the user.</p>";
                                    Metro.infobox.create(html_content,"info",{
                                        overlay:true
                                    });
                               }
                           });
                       }
                   },
                   {
                       caption: "Cancel",
                       cls: "js-dialog-close"
                   }
               ]
           });

        });
        $(".filter").change(function () {
            getAllUsers();
        })
        $("#depContainer").hide();
        $("#cmbUserType").change(function(){
            if($("#cmbUserType").val()=="2"){
                $("#depContainer").show();
                $.ajax({
                    type:'ajax',
                    method:'POST',
                    url:'<?php echo base_url("index.php/UserAccounts/getAllDepartment"); ?>',
                    dataType:'json',
                    success:function(response){
                        if(response.success){
                            var _optioncontent='';
                            var _department=response.department;
                            depdata=_department;
                            for (var i = 0; i < _department.length; i++) {
                                _optioncontent+='<option value="'+_department[i].DepartmentID+'">'
                                                    +_department[i].DepartmentName
                                                +'</option>';
                            }
                            $("#cmbDepartment").empty().append(_optioncontent);
                        }
                    },
                    error:function() {

                    }
                });
            }else{
                 var _optioncontent='<option value="4">Admin</option>';
                 $("#cmbDepartment").empty().append(_optioncontent);
                 $("#depContainer").hide();
            }
        });
    });
</script>
</body>
</html>
