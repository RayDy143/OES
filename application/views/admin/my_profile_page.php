<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <meta name="twitter:site" content="@metroui">
    <meta name="twitter:creator" content="@pimenov_sergey">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="Metro 4 Components Library">
    <meta name="twitter:description" content="Metro 4 is an open source toolkit for developing with HTML, CSS, and JS. Quickly prototype your ideas or build your entire app with responsive grid system, extensive prebuilt components, and powerful plugins built on jQuery.">
    <meta name="twitter:image" content="https://metroui.org.ua/images/m4-logo-social.png">

    <meta property="og:url" content="https://metroui.org.ua/v4/index.html">
    <meta property="og:title" content="Metro 4 Components Library">
    <meta property="og:description" content="Metro 4 is an open source toolkit for developing with HTML, CSS, and JS. Quickly prototype your ideas or build your entire app with responsive grid system, extensive prebuilt components, and powerful plugins built on jQuery.">
    <meta property="og:type" content="website">
    <meta property="og:image" content="https://metroui.org.ua/images/m4-logo-social.png">
    <meta property="og:image:secure_url" content="https://metroui.org.ua/images/m4-logo-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="968">
    <meta property="og:image:height" content="504">

    <meta name="author" content="Sergey Pimenov">
    <meta name="description" content="The most popular HTML, CSS, and JS library in Metro style.">
    <meta name="keywords" content="HTML, CSS, JS, Metro, CSS3, Javascript, HTML5, UI, Library, Web, Development, Framework">

    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/metro/favicon.ico" type="image/x-icon">
    <link rel="icon" href="<?php echo base_url(); ?>assets/metro/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo base_url('assets/plugins/mdtimepicker.css') ?>">
    <link href="<?php echo base_url(); ?>assets/metro/css/metro-all.css?ver=@@b-version" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/metro/css/third-party/datatables.css?ver=@@b-version" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/plugins/jquery.mCustomScrollbar.min.css" rel="stylesheet">

    <script src="<?php echo base_url(); ?>assets/metro/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/plugins/mdtimepicker.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/plugins/jquery.mCustomScrollbar.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/plugins/xlsx.full.min.js') ?>"></script>
    <script src="<?php echo base_url(); ?>assets/metro/js/metro.js"></script>
    <script src="<?php echo base_url('assets/plugins/datatable.min.js'); ?>"></script>
    <title><?php echo $title ?></title>

    <style>
        .container-fluid,section,header,footer,aside{
            margin:0;
        }
        .sidenav-m3 li a.active{
            background-color: #0077a3 !important;
        }
        table {
            font-size: 14px;
        }
        .sidenav-m3 a:hover{
            background-color: #0077a3;
        }
        .button, .flat-button, .action-button{
            background-color: #0077a3;
            color: white;
        }
    </style>
</head>
<body class="h-vh-100 bg-light" style="overflow:hidden">
    <div class="pos-fixed fixed-top app-bar-wrapper z-top bg-blue drop-shadow">
        <header class="container-fluid pos-relative app-bar-expand-md fg-white bg-darkBlue" data-role="appbar">
            <a href="#" id="Brand" class="brand no-hover fg-white-hover order-1" style="font-size:25px;"><strong>OES-NAS</strong></a>
            <div class="app-bar-container ml-auto order-2">
                <a href="<?php echo base_url('index.php/AdminStart') ?>" class="app-bar-item"><strong>Home</strong></a>
                <div class="app-bar-container">
                    <a class="app-bar-item dropdown-toggle marker-light pl-1 pr-5" href="#"><strong><?php echo $_SESSION['Firstname'].' '.$_SESSION['Lastname']; ?></strong>
                    </a>
                    <ul class="v-menu place-right bg-darkBlue fg-white" data-role="dropdown">
                        <li><a href="" class="no-hover">Signed as <strong><?php echo $_SESSION['Email'] ?></strong></a></li>
                        <li><div class="img-container mx-auto">
                                <img src="<?php echo base_url('assets/uploads/Picture/').$_SESSION['Filename'];?>">
                            </div>
                        </li>
                        <li><a href="">My profile</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo base_url('index.php/Login/Logout'); ?>">Log out</a></li>
                    </ul>
                </div>
            </div>
        </header>
    </div>
    <div class="grid mt-13 bg-light" style="height:100%;">
        <div class="row" style="height:100%;">
            <div class="cell-8 mx-auto mb-5 bg-white win-shadow p-5" style="overflow:auto;">
                <form id="frmInfo"
                      data-role="validator"
                      action="javascript:"
                      data-clear-invalid="2000"
                      data-on-error-form="invalidForm"
                      data-on-validate-form="validateForm">
                      <div class="grid">
                          <div class="row">
                              <div class="form-group">
                                  <div style="width:20%" class="mx-auto img-container thumbnail">
                                      <img id="imgshow" src="<?php echo base_url('assets/uploads/Picture/').$_SESSION['Filename'];?>">
                                  </div>
                                  <input class="cell-3 mx-auto" type="file" data-role="file" id="ProfilePic" name="ProfilePic" value="<?php echo $_SESSION['Filename']; ?>">
                              </div>
                          </div>
                          <div class="row mt-5">
                              <div class="cell">
                                  <div class="form-group">
                                      <label for="Firstname">Firstname</label>
                                      <input data-validate="required" type="text" name="Firstname" id="Firstname" value="<?php echo $_SESSION['Firstname'] ?>" data-role="input">
                                  </div>
                              </div>
                              <div class="cell">
                                  <div class="form-group">
                                      <label for="Lastname">Lastname</label>
                                      <input data-validate="required" type="text" name="Lastname" id="Lastname" value="<?php echo $_SESSION['Lastname'] ?>" data-role="input">
                                  </div>
                              </div>
                              <div class="cell">
                                  <div class="form-group">
                                      <label for="Middlename">Middlename</label>
                                      <input data-validate="required" type="text" name="Middlename" id="Middlename" value="<?php echo $_SESSION['Middlename'] ?>" data-role="input">
                                  </div>
                              </div>
                          </div>
                          <div class="row">
                              <div class="cell">
                                  <div class="form-group">
                                      <label for="Birthdate">Birthdate</label>
                                      <input data-validate="required" data-value="<?php echo $_SESSION['Birthdate'] ?>" name="Birthdate" id="Birthdate" data-role="datepicker">
                                  </div>
                              </div>
                              <div class="cell">
                                  <label>Gender</label>
                                  <hr class="thick bg-darkBlue">
                                  <input type="radio" value="Male" data-role="radio" data-caption="Male" name="Gender" checked>
                                  <input type="radio" value="Female" data-role="radio" data-caption="Female" name="Gender">
                              </div>
                              <div class="cell">
                                  <div class=" form-group">
                                      <label for="ContactNumber">Contact Number</label>
                                      <input value="<?php echo $_SESSION['Address'] ?>" data-validate="required" id="ContactNumber" type="text" name="ContactNumber">
                                  </div>
                              </div>
                          </div>
                          <div class="row">
                              <div class="cell">
                                  <div class="form-group">
                                      <textarea name="Address" data-validate="required" placeholder="Address" data-role="textarea" data-auto-size="true" data-max-height="200"><?php echo $_SESSION['Address'] ?></textarea>
                                  </div>
                              </div>
                          </div>
                          <hr class="row thick bg-darkBlue">
                          <div class="row">
                              <div class="cell">
                                  <a href="<?php echo base_url('index.php/Login/Logout'); ?>" class="m-1 button bg-darkRed fg-white place-right" name="button">Cancel</a>
                                  <button type="submit" class="m-1 button bg-darkBlue fg-white place-right" name="button">Update</button>
                                  <button type="button" onclick="Metro.dialog.open('#changePassDialog')" class="m-1 button bg-darkBlue fg-white place-right" name="button">Change Password</button>
                              </div>
                          </div>
                      </div>
                </form>
            </div>
            </div>
        </div>
        <div class="dialog" id="changePassDialog" data-role="dialog">
        <form class="validator" data-role="validator" action="javascript:" data-on-validate-form="validateChangePass">
            <div class="dialog-title">Change Password</div>
            <div class="dialog-content">
                    <div class="row">
                        <div class="cell-12 form-group">
                            <label for="OlpPass">Old Password</label>
                            <input data-validate="required" type="password" name="OlpPass" id="OlpPass">
                            <span class="invalid_feedback">
                               Old Password is required
                           </span>
                        </div>
                        <div class="cell-12 form-group">
                            <label for="NewPass">New password</label>
                            <input data-validate="required" type="password" name="NewPass" id="NewPass">
                            <span class="invalid_feedback">
                               New Password is Required
                           </span>
                        </div>
                        <div class="cell-12 form-group">
                            <label for="CNewPass">Retyp new password</label>
                            <input data-validate="required equals=NewPass" type="password" name="CNewPass" id="CNewPass">
                            <span class="invalid_feedback">
                               Password didnt match
                           </span>
                        </div>
                    </div>
            </div>
            <div class="dialog-actions">
                <button type="button" class="button js-dialog-close">Cancel</button>
                <button type="submit" class="button primary">Change</button>
            </div>
        </form>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#ProfilePic").change(function functionName() {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#imgshow').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            })
        });
        function invalidForm(){
            var form  = $(this);
            form.addClass("ani-ring");
            setTimeout(function(){
                form.removeClass("ani-ring");
            }, 1000);
        }

        function validateForm(){
                var formData = new FormData( $("#frmInfo")[0] );
                $.ajax({
                    type: 'ajax',
                    method:'POST',
                    url: '<?php echo base_url() ?>index.php/MyProfile/InsertInfo',
                    async: false,
                    dataType: 'json',
                    data: formData,
                    contentType : false,
                    processData : false,
                    success: function(data){
                        if(data.success){
                            alert("Changing your profile will going to log you out.");
                            window.location.replace("<?php echo base_url();?>index.php/Login");
                        }else{
                            alert("Insertion failed");
                        }
                    },
                    error: function(){
                        alert('Could not get Data from Database');
                    }
                });

        }
        function validateChangePass() {
            alert('sdafas');
        }
    </script>
</body>
</html>
