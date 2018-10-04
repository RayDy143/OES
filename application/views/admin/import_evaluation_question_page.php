
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
            <li class="page-item"><a href="#" class="page-link">Question</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="cell-8">
            <h4>Import Evaluation Question</h4>
        </div>
    </div>
    <hr class="row thick bg-black drop-shadow">
    <div class="row">
        <div class="cell">
            <form id="frmImport" action="javascript:" data-role="validator" data-on-validate-form="validateImport">
                <label><strong>Note: Excel file has to be its standard format.</strong></label><label class="row ml-1">(Download Sample:<strong><a href="#">sample.xlxs</a>)</strong></label>
                <div class="row">
                    <div class="cell-lg-6 form-group">
                        <label for="txtFile">File</label>
                        <input data-validate="required" type="file" data-role="file" name="txtFile" id="txtFile">
                    </div>
                    <div class="cell-6 mt-2 form-group">
                        <button type="button" class="button bg-darkRed fg-white place-right ml-2" name="button">CLEAR</button>
                        <button type="submit" class="button bg-darkBlue fg-white place-right" name="button">IMPORT</button>
                    </div>
                    <input type="hidden" name="Filename" id="txtFilename">
                </div>
            </form>
        </div>
    </div>
    <hr class="thick">
    <div class="row">
        <div class="cell">
            <div class="row">
                <table id="tblQuestion" class="table table-border striped cell-hover">
                    <thead>
                        <tr>
                            <th>Question</th>
                            <th>Category</th>
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
    $("#tblQuestion").DataTable();
        $('#txtFile').change(function (e) {
             $("#txtFilename").val($("#txtFile")[0].files[0].name);
             var importFormData=new FormData($("#frmImport")[0]);
             $.ajax({
                 type:'ajax',
                 method:'POST',
                 url:'<?php echo base_url("index.php/Evaluation/uploadTempExcel"); ?>',
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
                             excelData=_excelData;
                             var _length = _excelData.length;
                             var _tableContent='';
                             if(_length>0){
                                 for (var i = 0; i < _length; i++) {
                                     _tableContent+='<tr>'
                                                        +'<td>'+_excelData[i].Question+'</td>'
                                                        +'<td>'+_excelData[i].Category+'</td>'
                                                   +'</tr>';
                                 }
                                 if ($.fn.DataTable.isDataTable("#tblImportUser")) {
                                   $('#tblQuestion').DataTable().clear().destroy();
                                 }
                                 $("#tblQuestion tbody").html(_tableContent);
                                 $("#tblQuestion").DataTable();
                             }
                         }
                     })
                 }
             })
        });
    });
    var excelData=[];
    function validateImport() {
        var importFormData=new FormData($("#frmImport")[0]);
        $.ajax({
            type:'ajax',
            method:'POST',
            url:'<?php echo base_url("index.php/Evaluation/uploadExcel") ?>',
            data:importFormData,
            contentType: false,
            processData: false,
            dataType:'json',
            success:function (uploadresponse) {
                if(uploadresponse.success){
                    $.ajax({
                        type:'ajax',
                        url:'<?php echo base_url("index.php/Evaluation/getCategory") ?>',
                        dataType:'json',
                        async:false,
                        success:function(catresponse){
                            if(catresponse.success){
                                var _catdata=catresponse.category;
                                if(excelData.length>0){
                                    var _importedrows=0;
                                    var _unimportedrows=0;
                                    var _importerrors=[];
                                    var _errorcontent='';
                                    for (var i = 0; i < excelData.length; i++) {
                                        var _excelRow=excelData[i];
                                        var grep1=$.grep(_catdata, function(x){ return x.Category== _excelRow.Category});
                                        if(grep1.length=="0"){
                                            _importerrors.push("Row "+i+" Category not found!");
                                            _unimportedrows++;
                                            for (var i = 0; i < _importerrors.length; i++) {
                                                _errorcontent+='<br/>'+_importerrors[i];
                                            }
                                            continue;
                                        }else{
                                           _excelRow.CategoryID = grep1[0].CategoryID;
                                           $.ajax({
                                              type:'ajax',
                                              method:'POST',
                                              url:'<?php echo base_url("index.php/Evaluation/importQuestions") ?>',
                                              data:_excelRow,
                                              dataType:'json',
                                              async:false,
                                              success:function(importresponse){
                                                  if(importresponse.success){
                                                      _importedrows++;
                                                  }
                                              },
                                              error:function(){
                                                  var infoboxcontent="<p>System fatal error.</p>";
                                                  Metro.infobox.create(infoboxcontent,"alert",{overlay:true});
                                              }
                                           });
                                        }

                                    }
                                    alert(_importedrows+" row(s) successfully imported. "+_unimportedrows+" rows(s) failed.");
                                }
                            }
                        }
                    });
                }
            },
            error:function () {

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
</script>
</body>
</html>
