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

    <title>Github demo page - Metro 4 :: Popular HTML, CSS and JS library</title>

    <style>
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
        a:hover{
            background-color: #CE352C;
        }
    </style>
</head>
<body class="h-vh-100" style="overflow:hidden;">
    <div class="pos-fixed fixed-top app-bar-wrapper z-top bg-blue">
        <header class="container-fluid pos-relative app-bar-expand-md fg-white bg-darkBlue" data-role="appbar">
            <a href="#" class="brand no-hover fg-white-hover order-1" style="font-size:25px;"><strong>OES-NAS</strong></a>
            <div class="app-bar-container ml-auto order-2 order-md-3">
                <a href="#" class="app-bar-item">Home</a>
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
                    <a class="app-bar-item dropdown-toggle marker-light pl-1 pr-5" href="#">
                        <img class="rounded" data-role="gravatar" data-email="sergey@pimenov.com.ua" data-size="25">
                    </a>
                    <ul class="v-menu place-right bg-darkBlue fg-white" data-role="dropdown">
                        <li><a href="">Signed as <strong>olton</strong></a></li>
                        <li><a href="">Your profile</a></li>
                        <li class="divider"></li>
                        <li><a href="">Log out</a></li>
                    </ul>
                </div>
            </div>
        </header>
    </div>
    <div class="grid mt-13 bg-darkBlue" id="hero" style="height: 100%;overflow:auto;">
        <div class="row">
            <div class="stub">
                <ul class="sidenav-m3">
                    <li class="title">Masterfile</li>
                    <li><a class="active" href="#"><span class="mif-home icon"></span>User Accounts</a></li>
                    <li><a href="#"><span class="mif-list icon"></span>NAS</a></li>
                    <li><a href="#"><span class="mif-list icon"></span>Department</a></li>
                    <li><a href="#"><span class="mif-list icon"></span>Scheduler</a></li>
                    <li class="title">Evaluation Components</li>
                    <li><a href="#"><span class="mif-list icon"></span>Attendance</a></li>
                    <li><a href="#"><span class="mif-list icon"></span>Grade</a></li>
                    <li><a href="#"><span class="mif-list icon"></span>Evaluation Question</a></li>
                    <li class="title">Reports</li>
                    <li><a href="#"><span class="mif-list icon"></span>Evaluation Result</a></li>
                    <li><a href="#"><span class="mif-list icon"></span>Renewal Remarks</a></li>
                    <li><a href="#"><span class="mif-list icon"></span>Renewal Remarks</a></li>
                </ul>
            </div>
            <div class="cell bg-white p-6 mr-4" style="height:100%;overflow-x:auto;">
                <div class="row">
                    <button type="button" class="button bg-red fg-white"><span class="mif-arrow-left"></span> Go Back</button>
                </div>
                <div class="row">
                    <ul class="cell breadcrumbs" style="margin-bottom:0px;">
                        <li class="page-item"><a href="#" class="page-link">Home</a></li>
                        <li class="page-item"><a href="#" class="page-link">User Accounts</a></li>
                    </ul>
                    <div class="stub">
                        <button type="button" name="button" onclick="Metro.dialog.open('#demoDialog1')" class="button bg-darkBlue fg-white">New User</button>
                        <button type="button" name="button" class="button bg-darkBlue fg-white">Import</button>
                    </div>
                </div>
                <hr class="row thick bg-black">
                <div class="row">
                    <div class="stub">
                        <h3>User Accounts</h3>
                    </div>
                    <div class="cell">
                        <div class="row">
                            <div class="cell">
                                <label class="place-right mt-1" for="">Filter by Role:</label>
                            </div>
                            <div class="cell">
                                <select data-role="select">
                                    <option>Admin</option>
                                    <option>Evaluator</option>
                                </select>
                            </div>
                            <div class="cell">
                                <label class="place-right mt-1" for="">Filter by department:</label>
                            </div>
                            <div class="cell">
                                <select data-role="select">
                                    <option>All</option>
                                    <option>One</option>
                                    <option>Two</option>
                                    <option>Three</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="row thick bg-black">
                <div class="row">
                    <div class="stub" style="width:25%">
                        <div class="card">
                            <div class="card-header">
                                <div class="name">John Doe</div>
                                <div class="date">Monday at 3:47 PM</div>
                            </div>
                            <div class="card-footer">
                                <button class="button bg-darkBlue fg-white mif-info"></button>
                                <button class="button alert mif-bin"></button>
                            </div>
                        </div>
                    </div>
                    <div class="stub" style="width:25%">
                        <div class="card">
                            <div class="card-header">
                                <div class="name">John Doe</div>
                                <div class="date">Monday at 3:47 PM</div>
                            </div>
                            <div class="card-footer">
                                <button class="flat-button mif-thumbs-up"></button>
                                <button class="flat-button mif-tag"></button>
                                <button class="flat-button mif-share"></button>
                            </div>
                        </div>
                    </div>
                    <div class="stub" style="width:25%">
                        <div class="card">
                            <div class="card-header">
                                <div class="name">John Doe</div>
                                <div class="date">Monday at 3:47 PM</div>
                            </div>
                            <div class="card-footer">
                                <button class="flat-button mif-thumbs-up"></button>
                                <button class="flat-button mif-tag"></button>
                                <button class="flat-button mif-share"></button>
                            </div>
                        </div>
                    </div>
                    <div class="stub" style="width:25%">
                        <div class="card">
                            <div class="card-header">
                                <div class="name">John Doe</div>
                                <div class="date">Monday at 3:47 PM</div>
                            </div>
                            <div class="card-footer">
                                <button class="flat-button mif-thumbs-up"></button>
                                <button class="flat-button mif-tag"></button>
                                <button class="flat-button mif-share"></button>
                            </div>
                        </div>
                    </div>
                    <div class="stub" style="width:25%">
                        <div class="card">
                            <div class="card-header">
                                <div class="name">John Doe</div>
                                <div class="date">Monday at 3:47 PM</div>
                            </div>
                            <div class="card-footer">
                                <button class="flat-button mif-thumbs-up"></button>
                                <button class="flat-button mif-tag"></button>
                                <button class="flat-button mif-share"></button>
                            </div>
                        </div>
                    </div>
                    <div class="stub" style="width:25%">
                        <div class="card">
                            <div class="card-header">
                                <div class="avatar">
                                    <img src="">
                                </div>
                                <div class="name">John Doe</div>
                                <div class="date">Monday at 3:47 PM</div>
                            </div>
                            <div class="card-footer">
                                <button class="flat-button mif-thumbs-up"></button>
                                <button class="flat-button mif-tag"></button>
                                <button class="flat-button mif-share"></button>
                            </div>
                        </div>
                    </div>
                    <div class="stub" style="width:25%">
                        <div class="card">
                            <div class="card-header">
                                <div class="avatar">
                                    <img src="">
                                </div>
                                <div class="name">John Doe</div>
                                <div class="date">Monday at 3:47 PM</div>
                            </div>
                            <div class="card-footer">
                                <button class="flat-button mif-thumbs-up"></button>
                                <button class="flat-button mif-tag"></button>
                                <button class="flat-button mif-share"></button>
                            </div>
                        </div>
                    </div>
                    <div class="stub" style="width:25%">
                        <div class="card">
                            <div class="card-header">
                                <div class="name">John Doe</div>
                                <div class="date">Monday at 3:47 PM</div>
                            </div>
                            <div class="card-footer">
                                <button class="flat-button mif-thumbs-up"></button>
                                <button class="flat-button mif-tag"></button>
                                <button class="flat-button mif-share"></button>
                            </div>
                        </div>
                    </div>
                    <div class="stub" style="width:25%">
                        <div class="card">
                            <div class="card-header">
                                <div class="avatar">
                                    <img src="">
                                </div>
                                <div class="name">John Doe</div>
                                <div class="date">Monday at 3:47 PM</div>
                            </div>
                            <div class="card-footer">
                                <button class="flat-button mif-thumbs-up"></button>
                                <button class="flat-button mif-tag"></button>
                                <button class="flat-button mif-share"></button>
                            </div>
                        </div>
                    </div>
                    <div class="stub" style="width:25%">
                        <div class="card">
                            <div class="card-header">
                                <div class="avatar">
                                    <img src="">
                                </div>
                                <div class="name">John Doe</div>
                                <div class="date">Monday at 3:47 PM</div>
                            </div>
                            <div class="card-footer">
                                <button class="flat-button mif-thumbs-up"></button>
                                <button class="flat-button mif-tag"></button>
                                <button class="flat-button mif-share"></button>
                            </div>
                        </div>
                    </div>
                    <div class="stub" style="width:25%">
                        <div class="card">
                            <div class="card-header">
                                <div class="avatar">
                                    <img src="">
                                </div>
                                <div class="name">John Doe</div>
                                <div class="date">Monday at 3:47 PM</div>
                            </div>
                            <div class="card-footer">
                                <button class="flat-button mif-thumbs-up"></button>
                                <button class="flat-button mif-tag"></button>
                                <button class="flat-button mif-share"></button>
                            </div>
                        </div>
                    </div>
                    <div class="stub" style="width:25%">
                        <div class="card">
                            <div class="card-header">
                                <div class="avatar">
                                    <img src="">
                                </div>
                                <div class="name">John Doe</div>
                                <div class="date">Monday at 3:47 PM</div>
                            </div>
                            <div class="card-footer">
                                <button class="flat-button mif-thumbs-up"></button>
                                <button class="flat-button mif-tag"></button>
                                <button class="flat-button mif-share"></button>
                            </div>
                        </div>
                    </div>
                    <div class="stub" style="width:25%">
                        <div class="card">
                            <div class="card-header">
                                <div class="avatar">
                                    <img src="">
                                </div>
                                <div class="name">John Does</div>
                                <div class="date">Monday at 3:47 PM</div>
                            </div>
                            <div class="card-footer">
                                <button class="flat-button mif-thumbs-up"></button>
                                <button class="flat-button mif-tag"></button>
                                <button class="flat-button mif-share"></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <form class="" action="" method="post">
                <div class="dialog" data-role="dialog" id="demoDialog1">
                    <div class="dialog-title">Add new user<hr class="thick bg-black"></div>
                    <div class="dialog-content">
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="" value="">
                        </div>
                        <div class="form-group">
                            <label for="">Select Usertype</label>
                            <select data-role="select">
                                <option>Admin</option>
                                <option>Evaluator</option>
                            </select>
                        </div>
                    </div>
                    <div class="dialog-actions">
                        <button class="button alert js-dialog-close place-right">Cancel</button>
                        <button class="button primary js-dialog-close place-right">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="<?php echo base_url(); ?>assets/metro/js/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/metro/js/metro.js"></script>

    <script>
        Metro.utils.github("olton/Metro-UI-CSS", function(data){
            $("#github-fork").text(Number(data.forks).format(0, 0, ","));
            $("#github-star").text(Number(data.stargazers_count).format(0, 0, ","));
            $("#github-watch").text(Number(data.subscribers_count).format(0, 0, ","));
            $("#github-project").text(data.name);
        })
    </script>
</body>
</html>
