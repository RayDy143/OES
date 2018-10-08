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
            <li class="page-item"><a href="#" class="page-link">Masterfile</a></li>
            <li class="page-item"><a href="#" class="page-link">NAS</a></li>
            <li class="page-item"><a href="#" class="page-link">List of NAS</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="cell-8">
            <h4>Non-Academic Scholars(NAS)</h4>
        </div>
        <div class="cell-4">
            <div class="row">
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
    <div class="row" id="nasContainer">
        <div class="cell">
            <table id="tblNas" class="table table-border striped cell-border cell-hover win-shadow">
                <thead>
                    <tr>
                        <th>Profile</th>
                        <th>ID</th>
                        <th>Fullname</th>
                        <th>Department</th>
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
</div>

<script>
    $(document).ready(function() {
        $("#tblNas").dataTable();
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
        $('body').on('click','button.delete',function(){
            var _strid=$(this).attr('id');
            var _id=_strid.split("Delete")[1];
            Metro.dialog.create({
                title:'Are you sure you want to delete this?',
                content:'<p>This process cant be undone!</p>',
                actions:[
                    {
                        caption:'Delete',
                        cls:'alert js-dialog-close',
                        onclick:function(){
                            $.ajax({
                                type:'ajax',
                                method:'POST',
                                url:'<?php echo base_url("index.php/Nas/deleteNas") ?>',
                                data:{ID:_id},
                                dataType:'json',
                                success:function(response){
                                    if(response.success){
                                        var _infocontent='<p>Successfully deleted</p>';
                                        Metro.infobox.create(_infocontent,"success",{
                                            overlay:true
                                        });
                                        $("#cmbFilterDepartment").change();
                                    }
                                }
                            });
                        }
                    },
                    {
                        caption:'Cancel',
                        cls:'js-dialog-close'
                    }
                ]
            });
        });
    });
    $('#cmbFilterDepartment').change(function () {
        getAllNas();
    });
    getAllNas();
    function getAllNas(){
        $.ajax({
            type:'ajax',
            method:"POST",
            url:'<?php echo base_url("index.php/Nas/getAllNas") ?>',
            data:{ID:$("#cmbFilterDepartment").val()},
            dataType:'json',
            success:function(response){
                if(response.success){
                    var _nas=response.nas;
                    var _html='';
                    for (var i = 0; i < _nas.length; i++) {
                        _html+='<tr>'
                                    +'<td><div class="avatar"><img style="width:50px;" src="<?php echo base_url('assets/uploads/Picture/'); ?>'+_nas[i].Filename+'"></div></td>'
                                    +'<td>'+_nas[i].IDNumber+'</td>'
                                    +'<td>'+_nas[i].Firstname+' '+_nas[i].Lastname+'</td>'
                                    +'<td>'+_nas[i].DepartmentName+'</td>'
                                    +'<td><div data-role="buttongroup" class="row pr-5 pl-5"><a href="<?php echo base_url('index.php/Nas/Info/'); ?>'+_nas[i].NasID+'" class="button edit small cell bg-darkBlue fg-white ml-1 mr-1 mif-pencil"> MANAGE</a><button id="Delete'+_nas[i].NasID+'" class="button delete cell small bg-darkRed fg-white ml-1 mr-1 mif-bin"> DELETE</button></div></td>'
                               +'</tr>'
                    }
                    if ($.fn.DataTable.isDataTable("#tblNas")) {
                      $('#tblNas').DataTable().clear().destroy();
                    }
                    $('#tblNas tbody').html(_html);
                    $("#tblNas").dataTable();
                    $("#progress").hide();

                }
            },
            error:function(){

            }

        })
    }
</script>
</body>
</html>
