<div class="cell bg-white p-3 ml-4" style="overflow:auto;">
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
            <li class="page-item"><a href="<?php echo base_url('index.php/Nas'); ?>" class="page-link">NAS</a></li>
            <li class="page-item"><a href="#" class="page-link">Add</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="cell-8">
            <h4>Add new Non-Academic Scholars(NAS)</h4>
        </div>
    </div>
    <hr class="row thick bg-black drop-shadow">
    <div class="row">
        <div class="cell">
            <form id="frmAddNas" action="javascript:" data-role="validator" data-on-validate-form="validateAddNas">
                <div data-role="panel" class="win-shadow mr-3" data-title-caption="Non-Academic Scholars(NAS) Infomation" data-cls-title="bg-darkBlue fg-white" data-collapsible="false">
                    <div class="row">
                        <div class="cell-lg-8 cell-md-12 cell-sm-12">
                            <div class="row">
                                <input type="hidden" name="NasID" id="NasID">
                                <div class="cell-lg-6 cell-md-12 cell-sm-12 form-group">
                                    <label for="IDNumber">ID Number</label>
                                    <input data-validate="required" type="text" data-role="input" id="IDNumber" name="IDNumber">
                                </div>
                                <div class="cell-lg-6 cell-md-12 cell-sm-12 form-group" style="margin:0;">
                                    <label for="Email">Email</label>
                                    <input data-validate="required email" type="text" data-role="input" id="Email" name="Email">
                                </div>
                                <div class="cell-lg-6 cell-md-12 cell-sm-12 form-group">
                                    <label for="Firstname">Firstname</label>
                                    <input data-validate="required" type="text" data-role="input" id="Firstname" name="Firstname">
                                </div>
                                <div class="cell-lg-6 cell-md-12 cell-sm-12 form-group">
                                    <label for="Lastname">Lastname</label>
                                    <input data-validate="required" type="text" data-role="input" id="Lastname" name="Lastname">
                                </div>
                                <div class="cell-lg-6 cell-md-12 cell-sm-12 form-group">
                                    <label for="Middlename">Middlename</label>
                                    <input data-validate="required" type="text" data-role="input" id="Middlename" name="Middlename">
                                </div>
                                <div class="cell-lg-6 cell-md-12 cell-sm-12 form-group">
                                    <label for="ContactNumber">Contact Number</label>
                                    <input data-validate="required" type="number" id="ContactNumber" data-role="input" name="ContactNumber">
                                </div>
                                <div class="cell-lg-12 cell-md-12 cell-sm-12 form-group">
                                    <label for="Address">Address</label>
                                    <textarea data-validate="required" type="text" data-role="textarea" id="Address" name="Address"></textarea>
                                </div>
                                <div class="cell-lg-6 cell-md-12 cell-sm-12 form-group">
                                    <label for="Birthdate">Birthdate</label>
                                    <input data-validate="required" type="text" data-role="datepicker" id="Birthdate" name="Birthdate">
                                </div>
                                <div class="cell-lg-6 cell-md-12 cell-sm-12 form-group">
                                    <label for="Deparment">Select Department</label>
                                    <select data-validate="required" data-role="select" id="Department" name="Department">
                                        <?php
                                            if($dep){
                                                foreach ($dep as $row) {
                                                        echo '<option value="'.$row['DepartmentID'].'">'.$row['DepartmentName'].'</option>';
                                                }
                                            }
                                         ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="cell-lg-4 cell-md-12 cell-sm-12 mt-1">
                            <div class="img-container thumbnail">
                                <img id="imgshow" src="<?php echo base_url("assets/uploads/Picture/default_prof_pic.png"); ?>">
                                <span class="title">
                                    <input type="file" data-validate="required" id="UploadPic" name="UploadPic" data-prepend="Select photo: " class="mt-1" data-role="file" data-caption="Choose file">
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="stub ml-auto mt-2">
                            <button type="button" class="button bg-darkRed fg-white drop-shadow">CANCEL</button>
                            <button type="submit" class="button bg-darkBlue fg-white drop-shadow">ADD NAS</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>

<script>
    $(document).ready(function(){
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
        $("#UploadPic").change(function () {
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#imgshow').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            }
        });
    });
    function validateAddNas(){
        var formData = new FormData( $("#frmAddNas")[0] );
        $.ajax({
            type:'ajax',
            method:'POST',
            url:'<?php echo base_url("index.php/Nas/AddNewNas") ?>',
            data:formData,
            dataType:'json',
            contentType : false,
            processData : false,
            success:function(response){
                if(response.isrecentlydeleted){
                    $('#NasID').val(response.isrecentlydeleted);
                    var formData = new FormData( $("#frmAddNas")[0] );
                    Metro.dialog.create({
                        title:"Record was existed but recently deleted",
                        content:"<p>You can add this as a new record or you may restore this record.",
                        actions:[
                            {
                                caption:"Add as new",
                                cls:"js-dialog-close primary",
                                onclick:function () {
                                    $.ajax({
                                        type:'ajax',
                                        method:'POST',
                                        url:'<?php echo base_url("index.php/Nas/AddAsNew") ?>',
                                        data:formData,
                                        dataType:'json',
                                        contentType : false,
                                        processData : false,
                                        success:function(addasnewresponse){
                                            if(addasnewresponse.success){
                                                var html_content =
                                                "<p>Successfully Added.</p>";
                                                 Metro.infobox.create(html_content,"success",{
                                                     overlay:true
                                                 });
                                            }
                                        },
                                        error:function() {
                                            var html_content =
                                            "<p>System fatal error. Please contact your system administrator.</p>";
                                             Metro.infobox.create(html_content,"alert",{
                                                 overlay:true
                                             });
                                        }
                                    })
                                }
                            },
                            {
                                caption:"Restore",
                                cls:"js-dialog-close primary",
                                onclick:function () {
                                    $.ajax({
                                        type:'ajax',
                                        method:'POST',
                                        url:'<?php echo base_url("index.php/Nas/restoreNas") ?>',
                                        data:{IDNumber:$("#IDNumber").val()},
                                        dataType:'json',
                                        success:function (restoreresponse) {
                                            if(restoreresponse.success){
                                                var html_content =
                                                "<p>Successfully Restored.</p>";
                                                 Metro.infobox.create(html_content,"success",{
                                                     overlay:true
                                                 });
                                            }
                                        },
                                        error:function () {
                                            var html_content =
                                            "<p>System fatal error. Please contact your system administrator.</p>";
                                             Metro.infobox.create(html_content,"alert",{
                                                 overlay:true
                                             });
                                        }
                                    })
                                }
                            },
                            {
                                caption:"Cancel",
                                cls:"js-dialog-close alert"
                            }
                        ]
                    })
                }else{
                    if(response.success){
                        var html_content =
                        "<p>Successfully Added.</p>";
                         Metro.infobox.create(html_content,"success",{
                             overlay:true
                         });
                    }else if(response.duplicateid){
                        var html_content =
                        "<p>ID Number already exist.</p>";
                         Metro.infobox.create(html_content,"alert",{
                             overlay:true
                         });
                    }else if(response.duplicateemail){
                        var html_content =
                        "<p>Email already exist.</p>";
                         Metro.infobox.create(html_content,"alert",{
                             overlay:true
                         });
                    }
                }
            }
        });
    }
</script>
</body>
</html>
