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
            <li class="page-item"><a href="#" class="page-link">UserAccounts</a></li>
            <li class="page-item"><a href="#" class="page-link">Add</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="stub">
            <h4>Add User</h4>
        </div>
    </div>
    <hr class="row thick bg-dark drop-shadow">
    <div class="row">
        <div class="cell-lg-6 cell-md-6 cell-sm-12 mx-auto">
              <form action="javascript:" data-interactive-check="true" data-role="validator" data-on-validate-form="submitAddUserForm">
                  <div class="row">
                      <div class="cell-12 form-group">
                          <label for="Usertype">Usertype</label>
                          <select name="Usertype" data-validate="required not=-1" id="UserType">
                              <option value="-1" class="d-none"></option>
                              <?php
                                    foreach ($utype as $row) {
                                        echo '<option value="'.$row['UserTypeID'].'">'.$row['Type'].'</option>';
                                    }
                               ?>
                          </select>
                          <span class="invalid_feedback">
                                Choose type of user.
                          </span>
                      </div>
                      <div class="cell-12 m-0 form-group" id="DepartmentContainer">
                          <label for="Department">Department</label>
                          <select class="" name="Department" id="Department">

                          </select>
                      </div>
                      <div class="cell-12 m-0 form-group">
                          <label for="Email">Email</label>
                          <input data-validate="required email" type="email" data-role="input" name="Email" id="Email">
                          <span class="invalid_feedback">
                                Email is required and must be a valid email.
                          </span>
                      </div>
                  </div>
                  <hr class="thin bg-darkBlue">
                  <div class="row">
                      <div class="cell-12 mt-2 form-group">
                          <button type="button" class="button bg-darkRed fg-white place-right ml-2" name="button">CLEAR</button>
                          <button type="submit" class="button bg-darkBlue fg-white place-right" name="button">ADD</button>
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
        var depdata=[];
        $('#DepartmentContainer').hide();
        $("#UserType").change(function () {
            if($(this).val()=="2"){
                $('#DepartmentContainer').show();
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
                            $("#Department").empty().append(_optioncontent);
                        }
                    },
                    error:function() {
                    }
                });
            }else{
                $('#DepartmentContainer').hide();
                var _optioncontent='<option value="28">Admin</option>';
                $("#Department").empty().append(_optioncontent);
            }
        });
      });
      function submitAddUserForm(){
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
                                 data: {Email:$("#Email").val(),cmbDepartment:$("#Department").val(),UserTypeID:$("#UserType").val()},
                                 dataType:'json',
                                 success:function(response){
                                     if(response.success){
                                         Metro.dialog.close("#demoDialog1");
                                         var html_content =
                                         "<p>Adding of user was successful</p>";
                                          Metro.infobox.create(html_content,"success",{
                                              overlay:true
                                          });
                                          $("#Email").val('');
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
                                      $("#Email").val('');
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
             html_content="<p>This email was already been registered</p>";
              Metro.infobox.create(html_content,"alert",{
                  overlay:true
              });
          }else{
              $.ajax({
                  method:'POST',
                  type:'ajax',
                  url:'<?php echo base_url("index.php/UserAccounts/AddNewUser"); ?>',
                  data: {Email:$("#Email").val(),cmbDepartment:$("#Department").val(),UserTypeID:$("#UserType").val()},
                  dataType:'json',
                  success:function(response){
                      if(response.success){
                          Metro.dialog.close("#demoDialog1");
                          var html_content =
                          "<p>Adding of user was successful</p>";
                           Metro.infobox.create(html_content,"success",{
                               overlay:true
                           });
                           $("#Email").val('');
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
                      if(response.user.IsDeleted=="1"){
                          _res="Deleted";
                      }else if(response.user.IsDeleted="0"){
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
</script>
</body>
</html>
