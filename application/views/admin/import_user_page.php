<div class="cell bg-white p-3 ml-4 mr-6" style="overflow:auto;">
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
            <li class="page-item"><a href="#" class="page-link">Import</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="stub">
            <h4>Import User Accounts</h4>
        </div>
    </div>
    <hr class="row thick bg-dark drop-shadow">
    <div class="row">
        <div class="cell-lg-12 cell-md-6 cell-sm-12">
          <!-- <div class="mr-4 mt-2" data-role="panel" data-title-caption="Add new user" data-cls-title="bg-darkBlue fg-white">
              <form action="javascript:" data-interactive-check="true" data-role="validator" data-on-validate-form="submitAddUserForm">
                  <div class="row">
                      <div class="cell-4 form-group">
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
                      <div class="cell-4 m-0 form-group" id="DepartmentContainer">
                          <label for="Department">Department</label>
                          <select class="" name="Department" id="Department">

                          </select>
                      </div>
                      <div class="cell-4 m-0 form-group">
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
          </div> -->
        </div>
        <div class="cell-lg-12 cell-md-6 cell-sm-12">
              <form id="frmImport" action="javascript:" data-role="validator" data-on-validate-form="validateImport">
                  <label><strong>Note: Excel file has to be its standard format.</strong></label><label class="row ml-1">(Download Sample:<strong><a href="#">sample.xlxs</a>)</strong></label>
                  <div class="row">
                      <div class="cell-lg-6 form-group">
                          <label for="File">File</label>
                          <input data-validate="required" type="file" data-role="file" name="File" id="File">
                      </div>
                      <div class="cell-6 mt-2 form-group">
                          <button type="button" class="button bg-darkRed fg-white place-right ml-2" name="button">CLEAR</button>
                          <button type="submit" class="button bg-darkBlue fg-white place-right" name="button">IMPORT</button>
                      </div>
                      <input type="hidden" name="Filename" id="txtFilename">
                  </div>
              </form>
              <table id="tblImportUser" class="table table-border stripe cell-border cell-hover">
                  <thead>
                      <tr>
                          <th>Email</th>
                          <th>Department</th>
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
        //             scrollButtons:{enable:true,scrollType:"stepped"},
    	// 			keyboard:{scrollType:"stepped"},
    	// 			mouseWheel:{scrollAmount:188},
    	// 			theme:"rounded-dark",
    	// 			autoExpandScrollbar:true,
    	// 			snapAmount:188,
    	// 			snapOffset:65
    	// 	});
        // });
        $("#tblImportUser").DataTable();
        $('#File').change(function (e) {
             $("#txtFilename").val($("#File")[0].files[0].name);
             var importFormData=new FormData($("#frmImport")[0]);
             $.ajax({
                 type:'ajax',
                 method:'POST',
                 url:'<?php echo base_url("index.php/UserAccounts/uploadTempExcel"); ?>',
                 data:importFormData,
                 contentType: false,
                 processData: false,
                 dataType:'json',
                 success:function(uploadresponse){
                     var _filename=uploadresponse.filename;
                     importExcel({
                         filename:"<?php echo base_url(); ?>assets/temp_files/"+_filename,
                         success:function(excelResponse){
                             var _excelData = excelResponse;
                             var _length = _excelData.length;
                             var _tableContent='';
                             console.log(_excelData);
                             if(_length>0){
                                 for (var i = 0; i < _length; i++) {
                                     _tableContent+='<tr>'
                                                        +'<td>'+_excelData[i].Email+'</td>'
                                                        +'<td>'+_excelData[i].Department+'</td>'
                                                   +'</tr>';
                                 }
                                 if ($.fn.DataTable.isDataTable("#tblImportUser")) {
                                   $('#tblImportUser').DataTable().clear().destroy();
                                 }
                                 $("#tblImportUser tbody").html(_tableContent);
                                 $("#tblImportUser").DataTable();
                             }
                         }
                     })
                 }
             })
        });
      });
      function validateImport(){
          var importFormData=new FormData($("#frmImport")[0]);
          $.ajax({
              type:'ajax',
              method:'POST',
              url:'<?php echo base_url("index.php/UserAccounts/uploadExcel") ?>',
              data:importFormData,
              contentType: false,
              processData: false,
              dataType:'json',
              success:function(uploadresponse){
                  if(uploadresponse.success){
                      var _filename=uploadresponse.filename;
                      $.ajax({
                          type:'ajax',
                          url:'<?php echo base_url("index.php/UserAccounts/getAllDepartment") ?>',
                          dataType:'json',
                          async:false,
                          success:function(depresponse){
                              if(depresponse.success){
                                  var _depdata=depresponse.department;
                                  importExcel({
                                      filename:"<?php echo base_url(); ?>assets/uploads/Excel/"+_filename,
                                      success:function(response2){
                                          var _excelData = response2;
                                          var _length = _excelData.length;
                                          if(_length>0){
                                              var _importedrows=0;
                                              var _unimportedrows=0;
                                              var _importerrors=[];
                                              var _errorcontent='';
                                              for (var i = 0; i < _length; i++) {
                                                  var _excelRow = _excelData[i];
                                                  var grep1=$.grep(_depdata, function(x){ return x.DepartmentName== _excelRow.Department});
                                                  if(grep1.length=="0"){
                                                      _importerrors.push(_excelRow.Email+" Department not found!");
                                                      _unimportedrows++;
                                                      for (var i = 0; i < _importerrors.length; i++) {
                                                          _errorcontent+='<br/>'+_importerrors[i];
                                                      }
                                                      continue;
                                                  }else{
                                                     _excelRow.DepartmentID = grep1[0].DepartmentID;
                                                  }
                                                 var _check=checkEmailExistence(_excelRow.Email);
                                                 if(_check=="Deleted"){
                                                     Metro.dialog.create({
                                                        title: _excelRow.Email+" This user was recently registered to this system and have beed deleted!",
                                                        content: "<div>Would you like to restore this user?</div>",
                                                        clsDialog: "bg-red fg-white",
                                                        actions: [
                                                            {
                                                                caption: "Restore user",
                                                                cls: "js-dialog-close",
                                                                onclick: function(){
                                                                    alert($(this).attr('class'));
                                                                    $.ajax({
                                                                        method:'POST',
                                                                        type:'ajax',
                                                                        url:'<?php echo base_url("index.php/UserAccounts/restoreUser") ?>',
                                                                        dataType:'json',
                                                                        data:{Email:_excelRow.Email},
                                                                        success:function(response){
                                                                            var html_content =
                                                                            "<p>Successfully restored.</p>";
                                                                             Metro.infobox.create(html_content,"success",{
                                                                                 overlay:true
                                                                             });
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
                                                }else if(_check=="Available"){
                                                    $.ajax({
                                                       type:'ajax',
                                                       method:'POST',
                                                       url:'<?php echo base_url("index.php/UserAccounts/importUser") ?>',
                                                       data:_excelRow,
                                                       dataType:'json',
                                                       async:false,
                                                       success:function(addresponse){
                                                           _importedrows++;
                                                       },
                                                       error:function(){

                                                       }
                                                    });
                                                }else{
                                                    _importerrors.push(_excelRow.Email+" already exist!");
                                                    _unimportedrows++;
                                                }
                                            }
                                              _errorcontent='';
                                              for (var i = 0; i < _importerrors.length; i++) {
                                                  _errorcontent+='<br/>'+_importerrors[i];
                                              }
                                              var html_content ="<p>"+_importedrows+" row(s) successfully imported."+_unimportedrows+" row(s) failed.</p>";
                                               Metro.infobox.create(html_content,"info",{
                                                   overlay:true
                                               });
                                          }
                                      }
                                  });
                              }
                          }
                      });
                  }
              }
          });
      }
      function importExcel(o) {
          /* set up XMLHttpRequest */
          var url = o.filename;
          var oReq = new XMLHttpRequest();
          oReq.open("GET", url, true);
          oReq.responseType = "arraybuffer";

          oReq.onload = function(e) {
              var arraybuffer = oReq.response;

              /* convert data to binary string */
              var data = new Uint8Array(arraybuffer);
              var arr = new Array();
              for(var i = 0; i != data.length; ++i) arr[i] = String.fromCharCode(data[i]);
              var bstr = arr.join("");

              /* Call XLSX */
              var workbook = XLSX.read(bstr, {type:"binary"});

              /* DO SOMETHING WITH workbook HERE */
              var first_sheet_name = workbook.SheetNames[0];
              /* Get worksheet */
              var worksheet = workbook.Sheets[first_sheet_name];
              var data = XLSX.utils.sheet_to_json(worksheet,{raw:true});
              if (typeof o.success) o.success(data);
          }

          oReq.send();
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
