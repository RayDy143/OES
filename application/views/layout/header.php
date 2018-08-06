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

    <script src="<?php echo base_url(); ?>assets/metro/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/plugins/mdtimepicker.js') ?>"></script>
    <script src="<?php echo base_url(); ?>assets/metro/js/metro.js"></script>
    <title><?php echo $Title; ?></title>

    <style>
        .container-fluid,section,header,footer,aside{
            margin:0;
        }
        a.active{
            background-color: #0077a3 !important;
            color:white;
        }
        table {
            font-size: 14px;
        }

        table td [class*=mif-] {
            margin: 0 4px;
        }
        .sidenav-m3 a{
            background-color: inherit;
        }
        .sidenav-m3 a:hover{
            background-color: #0077a3;
        }
    </style>
</head>
<body class="h-vh-100">
    <div class="pos-fixed fixed-top app-bar-wrapper z-top bg-blue drop-shadow">
        <header class="container-fluid pos-relative app-bar-expand-md fg-white bg-darkBlue" data-role="appbar">
            <a href="#" class="brand no-hover fg-white-hover order-1" style="font-size:25px;"><strong>OES-NAS</strong></a>
            <div class="app-bar-container ml-auto order-2 order-md-3">
                <a href="#" class="app-bar-item"><strong>Home</strong></a>
                <a href="#" class="app-bar-item"><span class="mif-bell"></span></a>
                <div class="app-bar-container">
                    <a class="app-bar-item dropdown-toggle marker-light" href="#"><span class="mif-plus"></span></a>
                    <ul class="d-menu place-right bg-darkBlue fg-white" data-role="dropdown">
                        <li><a href="">New repository</a></li>
                        <li><a href="">Import repository</a></li>
                        <li><a href="">New gist</a></li>
                        <li><a href="">New organization</a></li>
                        <li class="divider"></li>
                        <li><a href="">New issue</a></li>
                    </ul>
                </div>

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
    <div class="grid mt-13">
        <div class="row" style="height:100%;">
            <div class="stub bg-dark drop-shadow">
                <ul class="sidenav-m3 bg-dark fg-white">
                    <li class="title">Masterfile</li>
                    <li><a id="sideUserAccounts" class="<?php echo $useraccounts ?>" href="<?php echo base_url('index.php/UserAccounts') ?>"><span class="mif-home icon"></span>User Accounts</a></li>
                    <li><a id="sideUserNas" class="<?php echo $nas ?>" href="#"><span class="mif-list icon"></span>NAS</a></li>
                    <li><a id="sideUserDeparment" class="<?php echo $department ?>" href="<?php echo base_url('index.php/Department'); ?>"><span class="mif-list icon"></span>Department</a></li>
                    <li><a id="sideUserScheduler" class="<?php echo $scheduler ?>" href="<?php echo base_url('index.php/Scheduler') ?>"><span class="mif-list icon"></span>Scheduler</a></li>
                    <li class="title">Evaluation Components</li>
                    <li><a href="#"><span class="mif-list icon"></span>Attendance</a></li>
                    <li><a href="#"><span class="mif-list icon"></span>Grade</a></li>
                    <li><a href="#"><span class="mif-list icon"></span>Evaluation Question</a></li>
                    <li class="title">Reports</li>
                    <li><a href="#"><span class="mif-list icon"></span>Evaluation Result</a></li>
                    <li><a href="#"><span class="mif-list icon"></span>Renewal Remarks</a></li>
                </ul>
            </div>
