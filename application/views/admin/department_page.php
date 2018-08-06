<div class="cell bg-white p-6 mr-4">
    <div class="row">
        <a type="button" href="javascript:history.back();" class="button drop-shadow bg-red fg-white"><span class="mif-arrow-left"></span> Go Back</a>
    </div>
    <div class="row">
        <ul class="cell breadcrumbs" style="margin-bottom:0px;">
            <li class="page-item"><a href="<?php echo base_url('index.php/AdminStart'); ?>" class="page-link">Home</a></li>
            <li class="page-item"><a href="#" class="page-link">Masterfile</a></li>
            <li class="page-item"><a href="#" class="page-link">Department</a></li>
        </ul>
        <div class="stub ml-auto">
            <button type="button" onclick="Metro.dialog.open('#AddDepartmentDialog');" class="button bg-darkBlue fg-white win-shadow" name="button">Add Department</button>
        </div>
    </div>
    <div class="row">
        <div class="stub">
            <h3>Department</h3>
        </div>
        <div class="stub ml-auto">
            <input type="text" class="win-shadow" data-role="search">
        </div>
    </div>
    <hr class="row thick bg-black drop-shadow">
    <div class="row bg-light">
        <div class="cell">
            <div class="row" id="depContainer">

            </div>
        </div>
    </div>
</div>
<div class="dialog" data-role="dialog" id="AddDepartmentDialog">
    <form id="frmAddDepartment" action="javascript:" data-role="validator" data-on-validate-form="validateAddDepartmentForm">
        <div class="dialog-title">Add new deparment.
            <hr class="thick bg-darkBlue">
        </div>
        <div class="dialog-content">
            <div class="grid">
                <div class="row">
                    <div class="cell">
                            <div class="form-group">
                                <label for="Department">Department</label>
                                <input type="text" placeholder="Enter department here..." data-validate="required" name="Department" data-role="input" id="Department">
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="dialog-actions">
            <button type="submit" name="button" class="button bg-darkBlue fg-white place-right">Add</button>
            <button type="button" name="button" class="button bg-darkRed fg-white place-right js-dialog-close">Close</button>
        </div>
    </form>
</div>
<div class="dialog" data-role="dialog" id="EditDepartmentDialog">
    <form id="frmEditDeparment" action="javascript:" data-role="validator" data-on-validate-form="validateEditDepartmentForm">
        <div class="dialog-title">Rename deparment.
            <hr class="thick bg-darkBlue">
        </div>
        <div class="dialog-content">
            <div class="grid">
                <div class="row">
                    <div class="cell">
                        <input type="hidden" name="ID" id="EditDepartmentID" name="" value="">
                            <div class="form-group">
                                <label for="Department">Department</label>
                                <input type="text" placeholder="Enter department here..." data-validate="required" name="Department" data-role="input" id="DepartmentEdit">
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="dialog-actions">
            <button type="submit" name="button" class="button bg-darkBlue fg-white place-right">Rename</button>
            <button type="button" name="button" class="button bg-darkRed fg-white place-right js-dialog-close">Close</button>
        </div>
    </form>
</div>
</div>
</div>

<script>
    var gDepartment=[];
    getAddDepartment();
    function validateAddDepartmentForm() {
        if(checkDepartmentExistence()){
            Metro.dialog.create({
            title: "Department already existed!",
            content: "<div>There might be a chance that it has been deleted but you can choose to restore it.</div>",
            actions: [
                {
                    caption: "Restore",
                    cls: "js-dialog-close alert",
                    onclick: function(){
                        $.ajax({
                            method:'POST',
                            type:'ajax',
                            url:'<?php echo base_url("index.php/Department/restoreDepartment") ?>',
                            data:$("#frmAddDepartment").serialize(),
                            success:function(response){
                                Metro.dialog.close('#AddDepartmentDialog');
                                    var html_content =
                                    "<p>Successfully Added.</p>";
                                     Metro.infobox.create(html_content,"success",{
                                         overlay:true
                                     })
                                     getAddDepartment();

                            },
                            error:function(){
                                var html_content =
                                "<p>System error. Please contact you system administrator immediately.</p>";
                                 Metro.infobox.create(html_content,"success",{
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
        }else{
            $.ajax({
                method:'POST',
                type:'ajax',
                url:'<?php echo base_url("index.php/Department/AddDepartment") ?>',
                data:$("#frmAddDepartment").serialize(),
                success:function(response){
                    Metro.dialog.close('#AddDepartmentDialog');
                        var html_content =
                        "<p>Successfully Added.</p>";
                         Metro.infobox.create(html_content,"success",{
                             overlay:true
                         })
                         getAddDepartment();

                },
                error:function(){
                    var html_content =
                    "<p>System error. Please contact you system administrator immediately.</p>";
                     Metro.infobox.create(html_content,"success",{
                         overlay:true
                     });
                }
            });
        }
    }
    function checkDepartmentExistence(){
        var HasExisted=false;
        $.ajax({
            type:'ajax',
            method:'POST',
            url:'<?php echo base_url("index.php/Department/getDepartmentExistence") ?>',
            data:$("#frmAddDepartment").serialize(),
            dataType:'json',
            async:false,
            success:function(response){
                if(response.success){
                    HasExisted=true;
                }
            }
        });
        return HasExisted;
    }
    function validateEditDepartmentForm() {
        $.ajax({
            method:'POST',
            type:'ajax',
            url:'<?php echo base_url("index.php/Department/renameDepartment") ?>',
            data:$("#frmEditDeparment").serialize(),
            success:function(){
                Metro.dialog.close('#EditDepartmentDialog');
                    var html_content =
                    "<p>Successfully renamed.</p>";
                     Metro.infobox.create(html_content,"success",{
                         overlay:true
                     })
                     getAddDepartment();

            },
            error:function(){
                var html_content =
                "<p>System error. Please contact you system administrator immediately.</p>";
                 Metro.infobox.create(html_content,"success",{
                     overlay:true
                 });
            }
        })
    }
    function getAddDepartment(){
        $.ajax({
            type:'ajax',
            url:'<?php echo base_url("index.php/Department/getAllDepartment") ?>',
            dataType:'json',
            success:function(response){
                if(response.success){
                    var _data=response.dep;
                    var _html='';
                    gDepartment=_data;
                    $("#depContainer").empty();
                    for (var i = 0; i < _data.length; i++) {
                        var _evalhtml='';
                        $.ajax({
                            type:'ajax',
                            method:'POST',
                            url:'<?php echo base_url("index.php/Department/getDepartmentEvaluator") ?>',
                            dataType:'json',
                            data:{ID:_data[i].DepartmentID},
                            async:false,
                            success:function(response){
                                var _eval=response.evaluator;
                                for (var i = 0; i < _eval.length; i++) {
                                    _evalhtml+='<br/>-'+_eval[i].Firstname+' '+_eval[i].Lastname;
                                }
                            },
                            error:function(){

                            }
                        });
                        _html+='<div class="cell-lg-4 cell-md-6 cell-sm-12 mt-2">'
                                    +'<div class="win-shadow" data-cls-title="bg-darkBlue fg-white" data-role="panel" data-title-caption="'+_data[i].DepartmentName+'" data-collapsible="true" data-collapsed="false">'
                                        +'<strong>Evaluator: '+_evalhtml+'</strong>'
                                        +'<hr class="thick bg-darkBlue"/>'
                                        +'<strong>Scholars </strong>'
                                        +'<hr class="thick bg-darkBlue"/>'
                                        +'<button id="Remove'+_data[i].DepartmentID+'" class="button remove mif-bin bg-red fg-white place-right"> REMOVE</button>'
                                        +'<button id="Rename'+_data[i].DepartmentID+'" class="button rename mif-list2 bg-darkBlue fg-white place-right"> RENAME</button>'
                                    +'</div>'
                                +'</div>';
                    }
                    $("#depContainer").empty().append(_html);
                }
            },
            error:function(){

            }
        })
    }
    $(document).ready(function(){
        $("body").on("click","button.remove",function(){
            var _stringId=$(this).attr("id");
            var _id=_stringId.split("Remove")[1];
            Metro.dialog.create({
                title: "Are you sure you want to delete this?",
                content: "<div>This process cant be undone.</div>",
                actions: [
                    {
                        caption: "Agree",
                        cls: "js-dialog-close alert",
                        onclick: function(){
                            $.ajax({
                                type:'ajax',
                                method:'POST',
                                url:'<?php echo base_url("index.php/Department/deleteDepartment") ?>',
                                data:{ID:_id},
                                success:function(){
                                    var html_content ="<p>You have successfully deleted the department.</p>";
                                     Metro.infobox.create(html_content,"success",{
                                         overlay:true
                                     });
                                     getAddDepartment();
                                },
                                error:function(){
                                    var html_content ="<p>System error. Please contact the system administrator for solution.</p>";
                                     Metro.infobox.create(html_content,"alert",{
                                         overlay:true
                                     });
                                }
                            });
                        }
                    },
                    {
                        caption: "Disagree",
                        cls: "js-dialog-close"
                    }
                ]
            });
        });
        $("body").on("click","button.rename",function(){
            var _stringId=$(this).attr("id");
            var _id=_stringId.split("Rename")[1];
            var _index=gDepartment.findIndex(g=>g.DepartmentID==_id);
            var _info=gDepartment[_index];
            $("#DepartmentEdit").val(_info.DepartmentName);
            $("#EditDepartmentID").val(_info.DepartmentID);
            Metro.dialog.open("#EditDepartmentDialog");
        });
    });
</script>
</body>
</html>
