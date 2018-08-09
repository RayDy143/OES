<div class="cell bg-white p-3 ml-4" style="overflow:auto;">
    <div class="row">
        <a type="button" href="javascript:history.back();" class="button stub drop-shadow bg-red fg-white"><span class="mif-arrow-left"></span> Go Back</a>
        <div class="stub ml-auto">
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
        </ul>
        <div class="stub">
            <a href="<?php echo base_url('index.php/Nas/Add') ?>" class="button drop-shadow bg-darkBlue fg-white">New NAS</a>
            <button type="button" name="button" class="button bg-darkBlue fg-white drop-shadow">Import</button>
        </div>
    </div>
    <div class="row">
        <div class="cell-8">
            <h3>Non-Academic Scholars(NAS)</h3>
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
    <div class="row" id="nasContainer">
        <span class="mif-spinner2 mif-5x ani-spin mx-auto"></span>

    </div>
</div>
</div>
</div>

<script>
    $(document).ready(function() {
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
                    $("#nasContainer").empty();
                    for (var i = 0; i < _nas.length; i++) {
                        _html+='<div class="stub mx-auto" style="width:270px;">'
                                        +'<div class="card win-shadow">'
                                            +'<div class="card-header">'
                                                +'<div class="avatar">'
                                                    +'<img src="'+'<?php echo base_url("assets/uploads/Picture/"); ?>'+_nas[i].Filename+'">'
                                                +'</div>'
                                                +'<div class="name text-ellipsis">'+_nas[i].Firstname+' '+_nas[i].Lastname+'</div>'
                                                +'<div class="date center">'+_nas[i].DepartmentName+'</div>'
                                            +'</div>'
                                            +'<div class="card-footer useractions">'
                                                +'<a href="'+'<?php echo base_url("index.php/Nas/Info/"); ?>'+_nas[i].NasID+'" class="button edit bg-darkBlue fg-white"> <span class="mt-2 mif-info"> More Info</span></a>'
                                                +'<button id="Delete'+_nas[i].NasID+'" class="button delete alert mif-bin"> Delete</button>'
                                            +'</div>'
                                        +'</div>'
                                +'</div>';
                    }
                    $("#nasContainer").append(_html);

                }
            },
            error:function(){

            }

        })
    }
</script>
</body>
</html>
