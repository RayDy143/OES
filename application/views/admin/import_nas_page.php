<div class="cell bg-white p-3 ml-4">
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
            <h4>Import NAS from excel files.</h4>
        </div>
    </div>
    <hr class="row thick bg-black drop-shadow">
    <div class="row">
        <div class="cell">
            <div class="row">
                <form class="cell-lg-6 cell-md-12 cell-sm-12 mr-3" id="frmImportNas">
                    <input id="ExcelFile" name="ExcelFile" type="file" data-role="file" data-prepend="Select from excel file: " data-caption="Choose file">
                </form>
                <div class="stub">
                    <button type="button" class="button bg-darkBlue fg-white" id="btnImport" name="button">Import</button>
                </div>
            </div>
            <div class="row">
                <div class="cell mr-3">
                    <table id="tblNasInfo" class="table striped table-border cell-border cell-hover win-shadow">
                        <thead>
                            <tr>
                                <th style="width:50px">ID Number</th>
                                <th>Email</th>
                                <th>Firstname</th>
                                <th>Lastname</th>
                                <th>Middlename</th>
                                <th>Contact Number</th>
                                <th>Address</th>
                                <th>Birthdate</th>
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
</div>
</div>

<script>
    $(document).ready(function(){
        var excelData=[];
        $("#tblNasInfo").DataTable();
        $("#sidenavcontainer").hide();
        $("#Brand").click(function(){
            $("#sidenavcontainer").toggle();
        });
        $("#ExcelFile").change(function () {
            var _formData=new FormData($("#frmImportNas")[0]);
            $.ajax({
                type:'ajax',
                method:'POST',
                url:'<?php echo base_url("index.php/Nas/uploadExcel"); ?>',
                data:_formData,
                dataType:'json',
                processData: false,
                contentType: false,
                success:function(uploadresponse){
                    if(uploadresponse.success){
                        var _filename=uploadresponse.filename;
                        importExcel({
                            filename:"<?php echo base_url(); ?>assets/temp_files/"+_filename,
                            success:function (importresponse) {
                                excelData=importresponse;
                                var excelLength=excelData.length;
                                var _tablecontent='';
                                if(excelLength>0){
                                    for (var i = 0; i < excelLength; i++) {
                                        _tablecontent+='<tr>'
                                                            +'<td>'+(excelData[i].IDNumber==undefined?'<span class="fg-red">'+excelData[i].IDNumber+'</span>':excelData[i].IDNumber)+'</td>'
                                                            +'<td>'+excelData[i].Email+'</td>'
                                                            +'<td>'+(excelData[i].Firstname==undefined?'<span class="fg-red">'+excelData[i].Firstname+'</span>':excelData[i].Firstname)+'</td>'
                                                            +'<td>'+excelData[i].Lastname+'</td>'
                                                            +'<td>'+excelData[i].Middlename+'</td>'
                                                            +'<td>'+excelData[i].ContactNumber+'</td>'
                                                            +'<td>'+excelData[i].Address+'</td>'
                                                            +'<td>'+ExcelDateToJSDate(excelData[i].Birthdate).toLocaleDateString()+'</td>'
                                                            +'<td>'+excelData[i].Department+'</td>'
                                                       +'</tr>';
                                    }
                                    if ($.fn.DataTable.isDataTable("#tblNasInfo")) {
                                      $('#tblNasInfo').DataTable().clear().destroy();
                                    }
                                    $("#tblNasInfo tbody").html(_tablecontent);
                                    $('#tblNasInfo').DataTable();
                                }
                            }
                        });
                    }
                },
                error:function(){

                }
            });
        });
        $("#btnImport").click(function () {
            if(excelData.length>0){
                $.ajax({
                    type:'ajax',
                    method:'POST',
                    url:'<?php echo base_url("index.php/Nas/getAllDepartment") ?>',
                    dataType:'json',
                    success:function (depresponse) {
                        if(depresponse.success){
                            var _departmentData=depresponse.dep;
                            var _importedrows=0;
                            var _unimportedrows=0;
                            for (var i = 0; i < excelData.length; i++) {
                                var _excelRow=excelData[i];
                                var depgrep=$.grep(_departmentData,function(x){return x.DepartmentName==_excelRow.Department} );
                                if(depgrep.length==0){
                                    alert('Unknown department in row number '+(i+1));
                                    _unimportedrows++;
                                }else{
                                    _excelRow.DepartmentID=depgrep[0].DepartmentID;
                                    $.ajax({
                                        type:'ajax',
                                        method:'POST',
                                        url:'<?php echo base_url("index.php/Nas/ImportNas"); ?>',
                                        data:_excelRow,
                                        dataType:'json',
                                        async:false,
                                        success:function (importresponse) {
                                            if(importresponse.success==false){
                                                _unimportedrows++;
                                                alert('Failed to import row number'+(i+1));
                                            }else{
                                                _importedrows++;
                                            }
                                        },
                                        error:function () {
                                            alert('Failed to import row number'+(i+1));
                                            _unimportedrows++;
                                        }
                                    });
                                }
                            }
                            alert("Imported row(s): "+_importedrows+" Unimported row(s): "+_unimportedrows);                        }
                    }
                });
            }
        });
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
    function ExcelDateToJSDate(serial) {
       var utc_days  = Math.floor(serial - 25569);
       var utc_value = utc_days * 86400;
       var date_info = new Date(utc_value * 1000);

       var fractional_day = serial - Math.floor(serial) + 0.0000001;

       var total_seconds = Math.floor(86400 * fractional_day);

       var seconds = total_seconds % 60;

       total_seconds -= seconds;

       var hours = Math.floor(total_seconds / (60 * 60));
       var minutes = Math.floor(total_seconds / 60) % 60;

       return new Date(date_info.getFullYear(), date_info.getMonth(), date_info.getDate(), hours, minutes, seconds);
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
