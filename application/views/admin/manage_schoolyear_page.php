
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
            <li class="page-item"><a href="#" class="page-link">Evalation</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="cell-8">
            <h4>Schoolyear</h4>
        </div>
        <div class="stub ml-auto">
            <button type="button" class="button bg-darkBlue fg-white" onclick="Metro.dialog.open('#AddSchoolyearDialog')" name="button">ADD NEW</button>
        </div>
    </div>
    <hr class="row thick bg-dark">
    <div class="row">
        <div class="cell">
            <div class="row">
                <table id="tblSchoolyear" class="table table-border striped cell-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Schoolyear</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="dialog" data-role="dialog" id="AddSchoolyearDialog">
    <form data-role="validator" action="javascript:" data-on-validate-form="validateAddSchoolyear">
        <div class="dialog-title">
            Add new schoolyear
        </div>
        <div class="dialog-content">
            <div class="cell form-group">
                <label for="dtpYear">Year</label>
                <input data-role="datepicker" data-day="false" id="dtpYear" name="dtpYear" data-month="false">
                <span class="invalid_feedback">Year is required.</span>
            </div>
        </div>
        <div class="dialog-actions">
            <button type="button" class="button bg-darkRed fg-white js-dialog-close place-right mb-2">CANCEL</button>
            <button type="submit" class="button bg-darkBlue fg-white place-right mb-2">ADD</button>
        </div>
</form>
</div>
<div class="dialog" data-role="dialog" id="EditSchoolyearDialog">
    <form data-role="validator" action="javascript:" data-on-validate-form="validateEditSchoolyear">
        <div class="dialog-title">
            Update schooyear
        </div>
        <div class="dialog-content">
            <input data-validate="required" type="hidden" name="txtEditSchoolyearID" id="txtEditSchoolyearID">
            <div class="cell form-group">
                <label for="dtpYear">Year</label>
                <input data-role="datepicker" data-day="false" id="dtpYear" name="dtpYear" data-month="false">
                <span class="invalid_feedback">Year is required.</span>
            </div>
        </div>
        <div class="dialog-actions">
            <button type="button" class="button bg-darkRed fg-white js-dialog-close place-right mb-2">CANCEL</button>
            <button type="submit" class="button bg-darkBlue fg-white place-right mb-2">UPDATE</button>
        </div>
</form>
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
        $("#tblSchoolyear").DataTable();
        $("#tblSchoolyear tbody").on("click","button.delete",function () {
            var _stringID=$(this).attr('id');
            var _id=_stringID.split("Delete")[1];
            Metro.dialog.create({
                title:"Are you sure you want to delete this record?",
                content:"<p>This process can't be undone.",
                actions:[
                    {
                        caption:"Delete",
                        cls:"js-dialog-close bg-darkRed fg-white",
                        onclick:function () {
                            $.ajax({
                                type:'ajax',
                                method:'POST',
                                url:'<?php echo base_url("index.php/Evaluation/deleteSchoolyear"); ?>',
                                data:{ID:_id},
                                dataType:'json',
                                success:function (response) {
                                    if(response.success){
                                        var infoboxcontent="<p>Successfully deleted.</p>";
                                        Metro.infobox.create(infoboxcontent,"success",{overlay:true});
                                        getSchoolyear();
                                    }
                                },
                                error:function () {
                                    if(response.success){
                                        var infoboxcontent="<p>System fatal error.</p>";
                                        Metro.infobox.create(infoboxcontent,"alert",{overlay:true});
                                    }
                                }
                            });
                        }
                    },
                    {
                        caption:"Cancel",
                        cls:"js-dialog-close bg-darkBlue fg-white"
                    }
                ]
            });
        });
    });
    getSchoolyear();
    var sydata=[];
    function getSchoolyear() {
        $.ajax({
            type:'ajax',
            method:'POST',
            url:'<?php echo base_url("index.php/Evaluation/getSchoolyear"); ?>',
            dataType:'json',
            success:function (response) {
                if(response.success){
                    var _sy=response.sy;
                    sydata=_sy;
                    var _tableContent='';
                    for (var i = 0; i < _sy.length; i++) {
                        _tableContent+='<tr>'
                                            +'<td>'+_sy[i].SchoolyearID+'</td>'
                                            +'<td>'+_sy[i].Year+'</td>'
                                            +'<td><div data-role="buttongroup" class="row"><button id="Delete'+_sy[i].SchoolyearID+'" class="button delete cell small bg-darkRed fg-white ml-1 mr-1 mif-bin"></button></div></td>'
                                      +'</tr>';
                    }
                    if($.fn.DataTable.isDataTable("#tblSchoolyear")){
                        $("#tblSchoolyear").DataTable().destroy().clear();
                    }
                    $("#tblSchoolyear tbody").html(_tableContent);
                    $("#tblSchoolyear").DataTable();
                }
            },
            error:function () {
                if(response.success){
                    var infoboxcontent="<p>System fatal error.</p>";
                    Metro.infobox.create(infoboxcontent,"alert",{overlay:true});
                }
            }
        });
    }
    function validateAddSchoolyear(){
        $.ajax({
            type:'ajax',
            method:'POST',
            url:'<?php echo base_url("index.php/Evaluation/addSchoolyear") ?>',
            data:$(this).serialize(),
            dataType:'json',
            success:function (response) {
                if(response.success){
                    Metro.dialog.close(".dialog");
                    var infoboxcontent="<p>Successfully added.</p>";
                    Metro.infobox.create(infoboxcontent,"success",{overlay:true});
                    getSchoolyear();
                }
            },
            error:function () {
                if(response.success){
                    var infoboxcontent="<p>System fatal error.</p>";
                    Metro.infobox.create(infoboxcontent,"alert",{overlay:true});
                }
            }
        });
    }
</script>
</body>
</html>
