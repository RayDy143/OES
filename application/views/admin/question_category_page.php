
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
            <li class="page-item"><a href="#" class="page-link">Manage</a></li>
            <li class="page-item"><a href="#" class="page-link">Evaluation</a></li>
            <li class="page-item"><a href="#" class="page-link">Question Category</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="cell-8">
            <h4>Question Category</h4>
        </div>
        <div class="stub ml-auto">
            <button type="button" class="button bg-darkBlue fg-white" onclick="Metro.dialog.open('#AddCatDialog');" name="button">ADD</button>
        </div>
    </div>
    <hr class="row thick bg-black drop-shadow">
    <div class="row">
        <div data-role="progress" id="progress" data-type="line"></div>
        <div class="cell">
            <table class="table table-border cell-border cell-hover" id="tblQuestionCategory">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="dialog" data-role="dialog" id="AddCatDialog">
    <form id="frmAddCat" data-role="validator" data-on-validate-form="validateAddCat" action="javascript:">
        <div class="dialog-title">Add new category</div>
        <div class="dialog-content">
            <div class="row">
                <div class="cell-12 form-group">
                    <label for="txtAddCategory">Category</label>
                    <input type="text" data-validate="required" data-role="input" name="txtAddCategory" id="txtAddCategory">
                </div>
            </div>
        </div>
        <div class="dialog-actions">
            <button type="button" class="button bg-darkRed fg-white js-dialog-close place-right">Cancel</button>
            <button type="submit" class="button bg-darkBlue fg-white place-right">Add</button>
        </div>
    </form>
</div>
<div class="dialog" data-role="dialog" id="EditCatDialog">
    <form id="frmAddCat" data-role="validator" data-on-validate-form="validateEditCat" action="javascript:">
        <div class="dialog-title">Edit category</div>
        <div class="dialog-content">
            <div class="row">
                <input type="hidden" name="txtEditCatID" id="txtEditCatID" value="">
                <div class="cell-12 form-group">
                    <label for="txtEditCat">Category</label>
                    <input type="text" data-validate="required" data-role="input" name="txtEditCat" id="txtEditCat">
                </div>
            </div>
        </div>
        <div class="dialog-actions">
            <button type="button" class="button bg-darkRed fg-white js-dialog-close place-right">Cancel</button>
            <button type="submit" class="button bg-darkBlue fg-white place-right">Update</button>
        </div>
    </form>
</div>
</div>
</div>

<script>
var catData=[];
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
        getCategory();
        $("#tblQuestionCategory").DataTable();
        $("#tblQuestionCategory tbody").on("click","button.edit",function () {
            var _stringID=$(this).attr("id");
            var _id=_stringID.split("Edit")[1];
            var _index=catData.findIndex(x=>x.CategoryID==_id);
            $("#txtEditCatID").val(catData[_index].CategoryID);
            $("#txtEditCat").val(catData[_index].Category);
            Metro.dialog.open("#EditCatDialog");
        });
        $("#tblQuestionCategory tbody").on("click","button.delete",function () {
            var _stringID=$(this).attr("id");
            var _id=_stringID.split('Delete')[1];
            Metro.dialog.create({
                title:"Are you sure you want to delete this record?",
                content:'<p>This process cannot be undone.</p>',
                actions:[
                    {
                        caption:'Delete',
                        cls:'js-dialog-close bg-darkRed fg-white',
                        onclick:function () {
                            $.ajax({
                                type:'ajax',
                                method:'POST',
                                url:'<?php echo base_url("index.php/Evaluation/deleteCategory"); ?>',
                                data:{ID:_id},
                                dataType:'json',
                                success:function(response) {
                                    if(response.success){
                                        var _infoboxcontent="<p>Successfully deleted.</p>";
                                        Metro.infobox.create(_infoboxcontent,"success",{overlay:true});
                                        getCategory();
                                    }
                                },
                                error:function () {
                                    var _infoboxcontent="<p>System fatal error. Please contact you syste administrator immediately.</p>";
                                    Metro.infobox.create(_infoboxcontent,"alert",{overlay:true});
                                }
                            });
                        }
                    },
                    {
                        caption:'Abort',
                        cls:'js-dialog-close bg-darkBlue fg-white'
                    }
                ]
            });
        });
    });
    function getCategory() {
        $.ajax({
            type:'ajax',
            method:'POST',
            url:'<?php echo base_url("index.php/Evaluation/getCategory"); ?>',
            dataType:'json',
            success:function (response) {
                if(response.success){
                    var cat=response.category;
                    catData=cat;
                    var _tableContent='';
                    for (var i = 0; i < cat.length; i++) {
                        _tableContent+='<tr>'
                                           +'<td>'+cat[i].CategoryID+'</td>'
                                           +'<td>'+cat[i].Category+'</td>'
                                           +'<td><div data-role="buttongroup" class="row"><button id="Edit'+cat[i].CategoryID+'" class="button edit small cell bg-darkBlue fg-white ml-1 mr-1 mif-pencil"></button><button id="Delete'+cat[i].CategoryID+'" class="button delete cell small bg-darkRed fg-white ml-1 mr-1 mif-bin"></button></div></td>'
                                       +'</tr>';
                    }
                    if($.fn.DataTable.isDataTable("#tblQuestionCategory")){
                        $("#tblQuestionCategory").DataTable().clear().destroy();
                    }
                    $("#tblQuestionCategory tbody").html(_tableContent);
                    $("#tblQuestionCategory").DataTable();
                    $("#progress").hide();
                }
            },
            error:function () {
                var infoboxcontent="<p>System fatal error. Please contact you system administrator emmediately.</p>";
                Metro.infobox.create(infoboxcontent,"alert",{overlay:true});
            }
        });

    }
    function validateEditCat() {
        $.ajax({
            type:'ajax',
            method:'POST',
            url:'<?php echo base_url("index.php/Evaluation/updateCategory"); ?>',
            data:$(this).serialize(),
            dataType:'json',
            success:function (response) {
                if(response.success){
                    var infoboxcontent="<p>Successfully Updated</p>";
                    Metro.infobox.create(infoboxcontent,"success",{overlay:true});
                    Metro.dialog.close("#EditCatDialog");
                    getCategory();
                }
            },
            error:function () {
                var infoboxcontent="<p>System fatal error. Please contact you system administrator emmediately.</p>";
                Metro.infobox.create(infoboxcontent,"alert",{overlay:true});
            }
        });
    }
    function validateAddCat() {
        $.ajax({
            type:'ajax',
            method:'POST',
            url:'<?php echo base_url("index.php/Evaluation/addCategory"); ?>',
            data:$(this).serialize(),
            dataType:'json',
            success:function (response) {
                if(response.success){
                    var infoboxcontent="<p>Successfully Added</p>";
                    Metro.infobox.create(infoboxcontent,"success",{overlay:true});
                    Metro.dialog.close(".dialog");
                    getCategory();
                }
            },
            error:function () {
                var infoboxcontent="<p>System fatal error. Please contact you system administrator emmediately.</p>";
                Metro.infobox.create(infoboxcontent,"alert",{overlay:true});
            }
        })
    }
</script>
</body>
</html>
