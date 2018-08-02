<div class="cell bg-white p-6 mr-4">
    <div class="row">
        <a type="button" href="javascript:history.back();" class="button drop-shadow bg-red fg-white"><span class="mif-arrow-left"></span> Go Back</a>
    </div>
    <div class="row">
        <ul class="cell breadcrumbs" style="margin-bottom:0px;">
            <li class="page-item"><a href="<?php echo base_url('index.php/AdminStart'); ?>" class="page-link">Home</a></li>
            <li class="page-item"><a href="#" class="page-link">Masterfile</a></li>
            <li class="page-item"><a href="#" class="page-link">User Accounts</a></li>
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
    <hr class="row thick bg-black">
    <div class="row" id="userContainer">

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
                    <select data-role="select"  id="cmbDepartment">
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
                     getAllUserAccounts();
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
    function getAllUserAccounts(){
        $.ajax({
            method:"POST",
            type:"ajax",
            url:'<?php echo base_url("index.php/UserAccounts/getAllUser") ?>',
            dataType:"json",
            success:function(response){
                if(response.success){
                    $("#userContainer").empty();
                    var _data=response.user;
                    var _length=_data.length;
                    var _htmlContent='';
                    gUserData=_data;
                    for (var i = 0; i < _length; i++) {
                        if(_data[i].Filename==null){
                            _htmlContent+='<div class="stub mx-auto" style="width:270px;">'
                                            +'<div class="card win-shadow">'
                                                +'<div class="card-header">'
                                                    +'<div class="avatar">'
                                                        +'<img src="'+'<?php echo base_url("assets/uploads/Picture/default_prof_pic.png"); ?>'+'">'
                                                    +'</div>'
                                                    +'<div class="name text-ellipsis">'+_data[i].Email+'</div>'
                                                    +'<div class="date center">'+_data[i].DepartmentName+'</div>'
                                                +'</div>'
                                                +'<div class="card-footer useractions">'
                                                    +'<a href="'+'<?php echo base_url("index.php/UserInfo/index/") ?>'+_data[i].UserID+'" class="button bg-darkBlue fg-white mif-info"> Info</a>'
                                                    +'<button id="Delete'+_data[i].UserID+'" class="button delete alert mif-bin"> Delete</button>'
                                                +'</div>'
                                            +'</div>'
                                        +'</div>';
                        }else{
                            _htmlContent+='<div class="stub mx-auto" style="width:270px;">'
                                            +'<div class="card win-shadow" style="1522725235nancy">'
                                                +'<div class="card-header">'
                                                    +'<div class="avatar">'
                                                        +'<img src="'+'<?php echo base_url("assets/uploads/Picture/"); ?>'+_data[i].Filename+'">'
                                                    +'</div>'
                                                    +'<div class="name text-ellipsis">'+_data[i].Email+'</div>'
                                                    +'<div class="date center">'+_data[i].DepartmentName+'</div>'
                                                +'</div>'
                                                +'<div class="card-footer useractions">'
                                                    +'<a href="'+'<?php echo base_url("index.php/UserInfo/index/") ?>'+_data[i].UserID+'" class="button bg-darkBlue fg-white mif-info"> Info</a>'
                                                    +'<button id="Delete'+_data[i].UserID+'" class="button delete alert mif-bin"> Delete</button>'
                                                +'</div>'
                                            +'</div>'
                                        +'</div>';
                        }

                        $("#userContainer").empty().append(_htmlContent);
                    }
                }
            },
            error:function(){
                var html_content =
                "<p>There were some issues on retreiving data from the database you should contact you system administrator.</p>";
                 Metro.infobox.create(html_content,"alert",{
                     overlay:true
                 });
            }
        });
    }
    function getAllUserAccountsByType(id){
        $.ajax({
            method:"POST",
            type:"ajax",
            url:'<?php echo base_url("index.php/UserAccounts/getUserByType") ?>',
            dataType:"json",
            data:{ID:id},
            success:function(response){
                if(response.success){
                    $("#userContainer").empty();
                    var _data=response.user;
                    var _length=_data.length;
                    var _htmlContent='';
                    gUserData=_data;
                    for (var i = 0; i < _length; i++) {
                        if(_data[i].Filename==null){
                            _htmlContent+='<div class="stub mx-auto" style="width:270px;">'
                                            +'<div class="card win-shadow">'
                                                +'<div class="card-header">'
                                                    +'<div class="avatar">'
                                                        +'<img src="'+'<?php echo base_url("assets/uploads/Picture/default_prof_pic.png"); ?>'+'">'
                                                    +'</div>'
                                                    +'<div class="name text-ellipsis">'+_data[i].Email+'</div>'
                                                    +'<div class="date center">'+_data[i].DepartmentName+'</div>'
                                                +'</div>'
                                                +'<div class="card-footer useractions">'
                                                    +'<a href="'+'<?php echo base_url("index.php/UserInfo/index/") ?>'+_data[i].UserID+'" class="button bg-darkBlue fg-white mif-info"> Info</a>'
                                                    +'<button id="Delete'+_data[i].UserID+'" class="button delete alert mif-bin"> Delete</button>'
                                                +'</div>'
                                            +'</div>'
                                        +'</div>';
                        }else{
                            _htmlContent+='<div class="stub mx-auto" style="width:270px;">'
                                            +'<div class="card win-shadow" style="1522725235nancy">'
                                                +'<div class="card-header">'
                                                    +'<div class="avatar">'
                                                        +'<img src="'+'<?php echo base_url("assets/uploads/Picture/"); ?>'+_data[i].Filename+'">'
                                                    +'</div>'
                                                    +'<div class="name text-ellipsis">'+_data[i].Email+'</div>'
                                                    +'<div class="date center">'+_data[i].DepartmentName+'</div>'
                                                +'</div>'
                                                +'<div class="card-footer useractions">'
                                                    +'<a href="'+'<?php echo base_url("index.php/UserInfo/index/") ?>'+_data[i].UserID+'" class="button bg-darkBlue fg-white mif-info"> Info</a>'
                                                    +'<button id="Delete'+_data[i].UserID+'" class="button delete alert mif-bin"> Delete</button>'
                                                +'</div>'
                                            +'</div>'
                                        +'</div>';
                        }

                        $("#userContainer").empty().append(_htmlContent);
                    }
                }
            },
            error:function(){
                var html_content =
                "<p>There were some issues on retreiving data from the database you should contact you system administrator.</p>";
                 Metro.infobox.create(html_content,"alert",{
                     overlay:true
                 });
            }
        });
    }
    function getAllUserAccountsByTypeAndDepartment(typeid,depid){
        $.ajax({
            method:"POST",
            type:"ajax",
            url:'<?php echo base_url("index.php/UserAccounts/getUserByTypeAndDepartment") ?>',
            dataType:"json",
            data:{TypeID:typeid,DepID:depid},
            success:function(response){
                if(response.success){
                    $("#userContainer").empty();
                    var _data=response.user;
                    var _length=_data.length;
                    var _htmlContent='';
                    gUserData=_data;
                    for (var i = 0; i < _length; i++) {
                        if(_data[i].Filename==null){
                            _htmlContent+='<div class="stub mx-auto" style="width:270px;">'
                                            +'<div class="card win-shadow">'
                                                +'<div class="card-header">'
                                                    +'<div class="avatar">'
                                                        +'<img src="'+'<?php echo base_url("assets/uploads/Picture/default_prof_pic.png"); ?>'+'">'
                                                    +'</div>'
                                                    +'<div class="name text-ellipsis">'+_data[i].Email+'</div>'
                                                    +'<div class="date center">'+_data[i].DepartmentName+'</div>'
                                                +'</div>'
                                                +'<div class="card-footer useractions">'
                                                    +'<a href="'+'<?php echo base_url("index.php/UserInfo/index/") ?>'+_data[i].UserID+'" class="button bg-darkBlue fg-white mif-info"> Info</a>'
                                                    +'<button id="Delete'+_data[i].UserID+'" class="button delete alert mif-bin"> Delete</button>'
                                                +'</div>'
                                            +'</div>'
                                        +'</div>';
                        }else{
                            _htmlContent+='<div class="stub mx-auto" style="width:270px;">'
                                            +'<div class="card win-shadow" style="1522725235nancy">'
                                                +'<div class="card-header">'
                                                    +'<div class="avatar">'
                                                        +'<img src="'+'<?php echo base_url("assets/uploads/Picture/"); ?>'+_data[i].Filename+'">'
                                                    +'</div>'
                                                    +'<div class="name text-ellipsis">'+_data[i].Email+'</div>'
                                                    +'<div class="date center">'+_data[i].DepartmentName+'</div>'
                                                +'</div>'
                                                +'<div class="card-footer useractions">'
                                                    +'<a href="'+'<?php echo base_url("index.php/UserInfo/index/") ?>'+_data[i].UserID+'" class="button bg-darkBlue fg-white mif-info"> Info</a>'
                                                    +'<button id="Delete'+_data[i].UserID+'" class="button delete alert mif-bin"> Delete</button>'
                                                +'</div>'
                                            +'</div>'
                                        +'</div>';
                        }
                        $("#userContainer").empty().append(_htmlContent);
                    }
                }
            },
            error:function(){
                var html_content =
                "<p>There were some issues on retreiving data from the database you should contact you system administrator.</p>";
                 Metro.infobox.create(html_content,"alert",{
                     overlay:true
                 });
            }
        });
    }
    function getAllUserAccountsByDepartment(id){
        $.ajax({
            method:"POST",
            type:"ajax",
            url:'<?php echo base_url("index.php/UserAccounts/getUserByDepartment") ?>',
            dataType:"json",
            data:{ID:id},
            success:function(response){
                if(response.success){
                    var _data=response.user;
                    var _length=_data.length;
                    var _htmlContent='';
                    $("#userContainer").empty();
                    gUserData=_data;
                    for (var i = 0; i < _length; i++) {
                        if(_data[i].Filename==null){
                            _htmlContent+='<div class="stub mx-auto" style="width:270px;">'
                                            +'<div class="card win-shadow">'
                                                +'<div class="card-header">'
                                                    +'<div class="avatar">'
                                                        +'<img src="'+'<?php echo base_url("assets/uploads/Picture/default_prof_pic.png"); ?>'+'">'
                                                    +'</div>'
                                                    +'<div class="name text-ellipsis">'+_data[i].Email+'</div>'
                                                    +'<div class="date center">'+_data[i].DepartmentName+'</div>'
                                                +'</div>'
                                                +'<div class="card-footer useractions">'
                                                    +'<button id="Info'+_data[i].UserID+'" class="button edit bg-darkBlue fg-white mif-info"> Info</button>'
                                                    +'<button id="Delete'+_data[i].UserID+'" class="button delete alert mif-bin"> Delete</button>'
                                                +'</div>'
                                            +'</div>'
                                        +'</div>';
                        }else{
                            _htmlContent+='<div class="stub mx-auto" style="width:270px;">'
                                            +'<div class="card win-shadow" style="1522725235nancy">'
                                                +'<div class="card-header">'
                                                    +'<div class="avatar">'
                                                        +'<img src="'+'<?php echo base_url("assets/uploads/Picture/"); ?>'+_data[i].Filename+'">'
                                                    +'</div>'
                                                    +'<div class="name text-ellipsis">'+_data[i].Email+'</div>'
                                                    +'<div class="date center">'+_data[i].DepartmentName+'</div>'
                                                +'</div>'
                                                +'<div class="card-footer useractions">'
                                                    +'<button id="Info'+_data[i].UserID+'" class="button edit bg-darkBlue fg-white mif-info"> Info</button>'
                                                    +'<button id="Delete'+_data[i].UserID+'" class="button delete alert mif-bin"> Delete</button>'
                                                +'</div>'
                                            +'</div>'
                                        +'</div>';
                        }
                        $("#userContainer").empty().append(_htmlContent);
                    }
                }
            },
            error:function(){
                var html_content =
                "<p>There were some issues on retreiving data from the database you should contact you system administrator.</p>";
                 Metro.infobox.create(html_content,"alert",{
                     overlay:true
                 });
            }
        });
    }
    $(document).ready(function(){
        var gUserData=[];
        getAllUserAccounts();
        $(".filter").change(function(){
            if($("#cmbFilterUsertype").val()=="All" && $("#cmbFilterDepartment").val()=="All"){
                getAllUserAccounts();
            }else{
                if($("#cmbFilterUsertype").val()=="All"){
                    getAllUserAccountsByDepartment($("#cmbFilterDepartment").val());
                }else if($("#cmbFilterDepartment").val()=="All"){
                    getAllUserAccountsByType($("#cmbFilterUsertype").val());
                }else{
                    getAllUserAccountsByTypeAndDepartment($("#cmbFilterUsertype").val(),$("#cmbFilterDepartment").val());
                }
            }
        });
        $("body").on("click","button.delete",function(){
            var _stringId=$(this).attr("id");
            var _id=_stringId.split('Delete')[1];
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
                         getAllUserAccounts();
                    }
                },
                error:function(){
                    var html_content="<p>There were some issues in deleteting the user.</p>";
                     Metro.infobox.create(html_content,"info",{
                         overlay:true
                     });
                }
            });
        });
        $("#depContainer").hide();
        $("#cmbUserType").change(function(){
            if($("#cmbUserType").val()=="2"){
                $("#depContainer").show();
                var select = $("#cmbDepartment").data('select');
                select.val("1");
            }else{
                 var select = $("#cmbDepartment").data('select');
                 select.val("4");
                 $("#depContainer").hide();

            }
        });
    });
</script>
</body>
</html>
