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

    <link href="<?php echo base_url(); ?>assets/metro/css/metro-all.css?ver=@@b-version" rel="stylesheet">

    <title>OES-First time login</title>

    <style>
        .login-form {
            width: 80%;
            height: auto;
        }
    </style>
</head>
<body class="h-vh-100 bg-brandColor2">
    <div data-role="panel" data-cls-title="bg-darkBlue fg-white" class="login-form p-6 mt-10 bg-white mx-auto border bd-default win-shadow" data-title-caption="First time login." data-collapsible="false">
        <form id="frmInfo"
              data-role="validator"
              action="javascript:"
              data-clear-invalid="2000"
              data-on-error-form="invalidForm"
              data-on-validate-form="validateForm">
              <div class="grid">
                  <h4><?php echo $_SESSION['Email']; ?> it seems like it's your first time logging in our system. We need some few information from you.</h4>
                  <div class="row">
                      <div class="cell">
                          <div class="form-group">
                              <label for="Firstname">Firstname</label>
                              <input data-validate="required" type="text" name="Firstname" id="Firstname" data-role="input">
                          </div>
                      </div>
                      <div class="cell">
                          <div class="form-group">
                              <label for="Lastname">Lastname</label>
                              <input data-validate="required" type="text" name="Lastname" id="Lastname" data-role="input">
                          </div>
                      </div>
                      <div class="cell">
                          <div class="form-group">
                              <label for="Middlename">Middlename</label>
                              <input data-validate="required" type="text" name="Middlename" id="Middlename" data-role="input">
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="cell">
                          <div class="form-group">
                              <label for="Birthdate">Birthdate</label>
                              <input data-validate="required" name="Birthdate" id="Birthdate" data-role="datepicker">
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
                              <input data-validate="required" id="ContactNumber" type="text" name="ContactNumber">
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="cell">
                          <div class="form-group">
                              <textarea name="Address" data-validate="required" placeholder="Address" data-role="textarea" data-auto-size="true" data-max-height="200"></textarea>
                          </div>
                      </div>
                      <div class="cell">
                          <div class="form-group">
                              <label for="ProfilePic">Choose you profile picture</label>
                              <input id="ProfilePic" name="ProfilePic" type="file" data-validate="required" data-caption="<span class='mif-folder'></span>" data-role="file" name="ProfilePic" value="">
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="cell">
                          <div class="form-group">
                              <label for="Password">Password</label>
                              <input data-validate="required minlength=8" type="password" id="txtPassword" name="Password" value="">
                          </div>
                      </div>
                      <div class="cell">
                          <div class="form-group">
                              <label for="ConfirmPassword">Confirm Password</label>
                              <input data-validate="required equals=Password minlength=8" type="password" id="txtConfirmPassword" name="ConfirmPassword" value="">
                          </div>
                      </div>
                  </div>
                  <hr class="row thick bg-darkBlue">
                  <div class="row">
                      <div class="cell">
                          <a type="button" href="<?php echo base_url('index.php/Login/Logout'); ?>" class="button bg-darkRed fg-white place-right" name="button">Cancel</a>
                          <button type="submit" class="button bg-darkBlue fg-white place-right" name="button">Proceed</button>
                      </div>
                  </div>
              </div>
        </form>
    </div>
    <script src="<?php echo base_url(); ?>assets/metro/js/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/metro/js/metro.js"></script>
    <script>

        function invalidForm(){
            var form  = $(this);
            form.addClass("ani-ring");
            setTimeout(function(){
                form.removeClass("ani-ring");
            }, 1000);
        }

        function validateForm(){
            if($('#txtPassword').val()==$('#txtConfirmPassword').val()){
                var formData = new FormData( $("#frmInfo")[0] );
                $.ajax({
                    type: 'ajax',
                    method:'POST',
                    url: '<?php echo base_url() ?>index.php/FirstTimeLogin/InsertInfo',
                    async: false,
                    dataType: 'json',
                    data: formData,
                    contentType : false,
                    processData : false,
                    success: function(data){
                        if(data.success){
                            $(".login-form").animate({
                                opacity: 0
                            });
                            window.location.replace("<?php echo base_url();?>index.php/Login");
                        }else{
                            alert("Insertion failed");
                        }
                    },
                    error: function(){
                        alert('Could not get Data from Database');
                    }
                });
            }else{
                alert('Password dont match');
            }

        }

    </script>

</body>
</html>
