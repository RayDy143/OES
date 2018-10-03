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
    <script src="<?php echo base_url(); ?>assets/plugins/printThis.js"></script>
    <script src="<?php echo base_url('assets/plugins/datatable.min.js'); ?>"></script>
    <title><?php echo $Title; ?></title>

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
<body class="h-vh-100" style="overflow:hidden">
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
    <div class="grid" style="height:100%;">
        <div class="row mt-13" style="height:100%">
            <div id="sidenavcontainer" style="background-color:#f8f8f8;overflow:auto;height:100%;" class="stub drop-shadow">
                <ul class="sidenav-m3">
                    <li class="title">Masterfile</li>
                    <li>
                        <a id="sideUserAccounts" class="dropdown-toggle <?php echo $useraccounts ?>" href="<?php echo base_url('index.php/UserAccounts/AddImport') ?>"><span class="mif-list icon"></span>User Accounts</a>
                        <ul class="d-menu" data-role="dropdown" style="display: none;">
                            <li><a href="<?php echo base_url('index.php/UserAccounts/Add'); ?>">Add User</a></li>
                            <li><a href="<?php echo base_url('index.php/UserAccounts/Import'); ?>">Import User</a></li>
                            <li><a href="<?php echo base_url('index.php/UserAccounts/View'); ?>">View User</a></li>
                        </ul>
                    </li>
                    <li>
                        <a id="sideUserNas" class="dropdown-toggle <?php echo $nas ?>" href="<?php echo base_url('index.php/Nas/Add') ?>"><span class="mif-list icon"></span>NAS</a>
                        <ul class="d-menu" data-role="dropdown" style="display: none;">
                            <li><a href="<?php echo base_url('index.php/Nas/Add'); ?>">Add Nas</a></li>
                            <li><a href="<?php echo base_url('index.php/Nas/Import'); ?>">Import NAS</a></li>
                            <li><a href="<?php echo base_url('index.php/Nas/View'); ?>">Manage NAS</a></li>
                        </ul>
                    </li>
                    <li class="title">Manage</li>
                    <li><a href="<?php echo base_url('index.php/Scheduler'); ?>"><span class="mif-list icon"></span>Schedule</a></li>
                    <li>
                        <a href="#" class="dropdown-toggle <?php echo $evaluation ?>"><span class="mif-list icon"></span>Evaluation</a>
                        <ul class="d-menu" data-role="dropdown" style="display: none;">
                        <li><a href="<?php echo base_url('index.php/Evaluation/QuestionCategory'); ?>"><span class="icon"></span>Question Category</a></li>
                            <li><a href="<?php echo base_url('index.php/Evaluation/Question'); ?>">Evaluation Question</a></li>
                            <li><a href="<?php echo base_url('index.php/Evaluation/Manage'); ?>">Manage Evaluation</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="dropdown-toggle <?php if(isset($attendance)){echo $attendance;} ?>"><span class="mif-list icon"></span>Attendance</a>
                        <ul class="d-menu" data-role="dropdown" style="display: none;">
                            <li><a href="<?php echo base_url('index.php/Attendance/WorkingDate') ?>"><span class="icon"></span>Working Dates</a></li>
                            <li><a href="<?php echo base_url('index.php/Attendance/DTR') ?>">DTR</a></li>
                        </ul>
                    </li>
                    <li><a id="sideUserDeparment" class="<?php echo $department ?>" href="<?php echo base_url('index.php/Department'); ?>"><span class="mif-list icon"></span>Department</a></li>
                    <li class="title">Reports</li>
                    <li><a href="<?php echo base_url('index.php/MonthlyAllowance'); ?>" class="<?php if(isset($allowancenav)){echo $allowancenav;} ?>"><span class="mif-list icon"></span>Monthly Allowance</a></li>
                    <li><a href="<?php echo base_url('index.php/Evaluation/Results'); ?>" class="<?php if(isset($evaluationresultsnav)){ echo $evaluationresultsnav; }?>"><span class="mif-list icon"></span>Evaluation Result</a></li>
                    <li><a href="<?php echo base_url('index.php/RenewRemarks'); ?>" class="<?php if(isset($renewremarksnav)){echo $renewremarksnav;}  ?>"><span class="mif-list icon "></span>Renewal Remarks</a></li>
                </ul>
            </div>
