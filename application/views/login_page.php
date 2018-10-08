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

    <title>Login to OES</title>

    <style>
        .login-form {
            width: 350px;
            height: auto;
            top: 50%;
            margin-top: -160px;
        }
    </style>
</head>
<body class="h-vh-100 bg-brandColor2">
    <form id="frmLogin" class="login-form bg-white p-6 mx-auto border bd-default win-shadow"
          data-role="validator"
          action="javascript:"
          data-clear-invalid="2000"
          data-on-error-form="invalidForm"
          data-on-validate-form="validateForm">
        <h2 class="text-light">Login to OES</h2>
        <hr class="thin mt-4 mb-4 bg-white">
        <div class="form-group">
            <input type="text" name="Email" data-role="input" data-prepend="<span class='mif-envelop'>" placeholder="Enter your email..." data-validate="required email">
        </div>
        <div class="form-group">
            <input type="password" name="Password" data-role="input" data-prepend="<span class='mif-key'>" placeholder="Enter your password..." data-validate="required minlength=6">
        </div>
        <div class="form-group mt-10">
            <button type="submit" class="button primary">Login</button>
            <!-- <button type="button" class="button bg-darkRed fg-white place-right" name="btnForgotPass">Forgot Password</button> -->
        </div>
    </form>

        <div class="dialog" id="verificationDialog" data-role="dialog">
            <form id="frmVerifiction" action="javascript:" method="post">
                <div class="dialog-title">We have sent a verification code to your email.</div>
                <div class="dialog-content">
                    <div class="form-group">
                        <label for="Code">Enter verification code</label>
                        <input type="text" id="Code">
                    </div>
                </div>
                <div class="dialog-actions">
                    <a class="button alert place-right" href="javascript:history.back()">Abort</a>
                    <button id="btnVerify" class="button primary place-right">Verfiy</button>
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
            $.ajax({
                type: 'ajax',
                method:'POST',
                url: '<?php echo base_url() ?>index.php/Login/authenticate',
                async: false,
                dataType: 'json',
                data: $("#frmLogin").serialize(),
                success: function(data){
                    if(data.success){
                        if(data.Status=="Verified"){
                            window.location.replace("<?php echo base_url();?>index.php/AdminStart");
                        }else{
                            /*$.Notify({
                                caption: 'Login failed!',
                                content: 'It looks like the credendtials you\'ve entered was not verified.',
                                type: 'alert'
                            });*/
                           /* window.location.replace("<?php echo base_url();?>index.php/FirstTimeLogin");*/
                            //metroDialog.open('#VerifyDialog');
                            Metro.dialog.open("#verificationDialog");
                            $(".login-form").animate({
                                opacity: 0
                            });
                        }
                    }else{
                        var form  = $($('#frmLogin'));
                        form.addClass("ani-ring");
                        setTimeout(function(){
                            form.removeClass("ani-ring");
                        }, 1000);
                        var html_content =
                        "<p>It looks like the credendtials you\'ve entered was not registered.";
                         Metro.infobox.create(html_content,"alert",{
                             overlay:true
                         });
                    }
                },
                error: function(){
                    alert('Could not get Data from Database');
                }
            });
        }
        $(document).ready(function(){
            $('#btnVerify').click(function(){
                $.ajax({
                    type: 'ajax',
                    method:'POST',
                    url: '<?php echo base_url() ?>index.php/Login/checkCodeValidity',
                    async: false,
                    dataType: 'json',
                    data: {Code:$("#Code").val()},
                    success: function(data){
                        if(data.success){
                            window.location.replace("<?php echo base_url();?>index.php/FirstTimeLogin");
                        }else{
                            var html_content =
                            "<p>It looks like the code you've entered might already expired or not valid.</p>";
                             Metro.infobox.create(html_content,"alert",{
                                 overlay:true
                             });
                        }
                    },
                    error: function(){
                        alert('Could not get Data from Database');
                    }
                });
            });
        });
    </script>

</body>
</html>
