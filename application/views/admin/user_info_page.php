<div class="cell bg-white p-6 mr-4">
    <div class="row">
        <a type="button" href="javascript:history.back();" class="button drop-shadow bg-red fg-white"><span class="mif-arrow-left"></span> Go Back</a>
    </div>
    <div class="row">
        <ul class="cell breadcrumbs" style="margin-bottom:0px;">
            <li class="page-item"><a href="<?php echo base_url('index.php/AdminStart'); ?>" class="page-link">Home</a></li>
            <li class="page-item"><a href="#" class="page-link">Masterfile</a></li>
            <li class="page-item"><a href="<?php echo base_url('index.php/UserAccounts') ?>" class="page-link">User Accounts</a></li>
            <li class="page-item"><a href="#" class="page-link">User Info</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="stub">
            <h3>User Info</h3>
        </div>
    </div>
    <hr class="row thick bg-black">
    <div class="row p-5" id="infoContainer">
        <div class="cell-8 card pl-5 pr-5 pt-2">
            <!--<h5>UserType: <?php echo $info['Type'] ?></h5>-->
            <hr class="row thick bg-darkBlue">
            <h5>Name: <?php if(isset($info[0]['Firstname'])){echo $info[0]['Firstname']." ".$info[0]['Middlename']." ".$info[0]['Lastname'];}else{echo "N/A";}?></h5>
            <hr class="row thick bg-darkBlue">
            <h5>Address: <?php if($info){ echo $info[0]['Address'];}else{echo "N/A";} ?></h5>
            <hr class="row thick bg-darkBlue">
            <h5>Birthdate: <?php if($info){ echo $info[0]['Birthdate'];}else{echo "N/A";} ?></h5>
            <hr class="row thick bg-darkBlue">
            <h5>Gender: <?php if($info){ echo $info[0]['Gender'];}else{echo "N/A";} ?></h5>
            <hr class="row thick bg-darkBlue">
            <h5>Contact Number: <?php if($info){ echo $info[0]['ContactNumber'];}else{echo "N/A";} ?></h5>
            <hr class="row thick bg-darkBlue">
            <!--<h5>Department: <?php if($info){ echo $info[0]['DepartmentName'];}else{echo "N/A";} ?></h5>
            <hr class="row thick bg-darkBlue">-->
        </div>
        <div class="cell-4">
            <div class="card">
                <div class="img-container thumbnail">
                    <img src="<?php if($info) {echo base_url('assets/uploads/Picture/').$info[0]['Filename'];}else{echo base_url('assets/uploads/Picture/default_prof_pic.png');}?>">
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

<script>
</script>
</body>
</html>
