<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="description" content="Metro, a sleek, intuitive, and powerful framework for faster and easier web development for Windows Metro Style.">
    <meta name="keywords" content="HTML, CSS, JS, JavaScript, framework, metro, front-end, frontend, web development">
    <meta name="author" content="Sergey Pimenov and Metro UI CSS contributors">

    <link rel='shortcut icon' type='image/x-icon' href='../favicon.ico' />
    <title>OES-Admin Dashboard</title>

    <link href="<?php echo base_url('assets/metro2/css/metro.css'); ?>" rel="stylesheet">
     <link href="<?php echo base_url('assets/metro2/css/metro-icons.css'); ?>" rel="stylesheet">
     <link href="<?php echo base_url('assets/metro2/css/metro-responsive.css'); ?>" rel="stylesheet">
     <link href="<?php echo base_url('assets/metro2/css/metro-schemes.css'); ?>" rel="stylesheet">
     <link href="<?php echo base_url('assets/metro2/css/metro-colors.css'); ?>" rel="stylesheet">

     <script src="<?php echo base_url(); ?>assets/metro2/js/jquery-3.3.1.min.js"></script>
     <script src="<?php echo base_url(); ?>assets/metro2/js/metro.js"></script>

    <style>
        .tile-area-controls {
            position: fixed;
            right: 40px;
            top: 40px;
        }

        .tile-group {
            left: 100px;
        }

        .tile, .tile-small, .tile-sqaure, .tile-wide, .tile-large, .tile-big, .tile-super {
            opacity: 0;
            -webkit-transform: scale(.8);
            transform: scale(.8);
        }

        #charmSettings .button {
            margin: 5px;
        }

        .schemeButtons {
            /*width: 300px;*/
        }

        @media screen and (max-width: 640px) {
            .tile-area {
                overflow-y: scroll;
            }
            .tile-area-controls {
                display: none;
            }
        }

        @media screen and (max-width: 320px) {
            .tile-area {
                overflow-y: scroll;
            }

            .tile-area-controls {
                display: none;
            }

        }
    </style>
    <script>
        function ShowDialog(){
            metroDialog.create({
                title: "Logout?",
                content: "Are you sure you want to logout?",
                actions: [
                    {
                        title: "Ok",
                        onclick: function(el){
                            $(el).data('dialog').close();
                            window.location.replace('<?php echo base_url("index.php/Login/Logout"); ?>')

                        }
                    },
                    {
                        title: "Cancel",
                        cls: "js-dialog-close"
                    }
                ],
                options: {
                    overlay:"true",
                    type:"alert"
                }
            });

        }
        (function($) {
            $.StartScreen = function(){
                var plugin = this;
                var width = (window.innerWidth > 0) ? window.innerWidth : screen.width;

                plugin.init = function(){
                    setTilesAreaSize();
                    if (width > 640) addMouseWheel();
                };

                var setTilesAreaSize = function(){
                    var groups = $(".tile-group");
                    var tileAreaWidth = 80;
                    $.each(groups, function(i, t){
                        if (width <= 640) {
                            tileAreaWidth = width;
                        } else {
                            tileAreaWidth += $(t).outerWidth() + 80;
                        }
                    });
                    $(".tile-area").css({
                        width: tileAreaWidth
                    });
                };

                var addMouseWheel = function (){
                    $("body").mousewheel(function(event, delta, deltaX, deltaY){
                        var page = $(document);
                        var scroll_value = delta * 50;
                        page.scrollLeft(page.scrollLeft() - scroll_value);
                        return false;
                    });
                };

                plugin.init();
            }
        })(jQuery);
        $(function(){

            $.StartScreen();

            var tiles = $(".tile, .tile-small, .tile-sqaure, .tile-wide, .tile-large, .tile-big, .tile-super");

            $.each(tiles, function(){
                var tile = $(this);
                setTimeout(function(){
                    tile.css({
                        opacity: 1,
                        "-webkit-transform": "scale(1)",
                        "transform": "scale(1)",
                        "-webkit-transition": ".3s",
                        "transition": ".3s"
                    });
                }, Math.floor(Math.random()*500));
            });

            $(".tile-group").animate({
                left: 0
            });
        });

        function showCharms(id){
            var  charm = $(id).data("charm");
            if (charm.element.data("opened") === true) {
                charm.close();
            } else {
                charm.open();
            }
        }

        function setSearchPlace(el){
            var a = $(el);
            var text = a.text();
            var toggle = a.parents('label').children('.dropdown-toggle');

            toggle.text(text);
        }

        $(function(){
            var current_tile_area_scheme = localStorage.getItem('tile-area-scheme') || "tile-area-scheme-dark";
            $(".tile-area").removeClass (function (index, css) {
                return (css.match (/(^|\s)tile-area-scheme-\S+/g) || []).join(' ');
            }).addClass(current_tile_area_scheme);

            $(".schemeButtons .button").hover(
                    function(){
                        var b = $(this);
                        var scheme = "tile-area-scheme-" +  b.data('scheme');
                        $(".tile-area").removeClass (function (index, css) {
                            return (css.match (/(^|\s)tile-area-scheme-\S+/g) || []).join(' ');
                        }).addClass(scheme);
                    },
                    function(){
                        $(".tile-area").removeClass (function (index, css) {
                            return (css.match (/(^|\s)tile-area-scheme-\S+/g) || []).join(' ');
                        }).addClass(current_tile_area_scheme);
                    }
            );

            $(".schemeButtons .button").on("click", function(){
                var b = $(this);
                var scheme = "tile-area-scheme-" +  b.data('scheme');

                $(".tile-area").removeClass (function (index, css) {
                    return (css.match (/(^|\s)tile-area-scheme-\S+/g) || []).join(' ');
                }).addClass(scheme);

                current_tile_area_scheme = scheme;
                localStorage.setItem('tile-area-scheme', scheme);

                showSettings();
            });
        });
    </script>

</head>
<body style="overflow-y: hidden;">
    <div data-role="appbar"></div>
    <div data-role="charm" id="charmSearch">
        <h1 class="text-light">Search</h1>
        <hr class="thin"/>
        <br />
        <div class="input-control text full-size">
            <label>
                <span class="dropdown-toggle drop-marker-light">Anywhere</span>
                <ul class="d-menu" data-role="dropdown">
                    <li><a onclick="setSearchPlace(this)">Anywhere</a></li>
                    <li><a onclick="setSearchPlace(this)">Options</a></li>
                    <li><a onclick="setSearchPlace(this)">Files</a></li>
                    <li><a onclick="setSearchPlace(this)">Internet</a></li>
                </ul>
            </label>
            <input type="text">
            <button class="button"><span class="mif-search"></span></button>
        </div>
    </div>

    <div data-role="charm" id="charmSettings" data-position="top">
        <h1 class="text-light">Settings</h1>
        <hr class="thin"/>
        <br />
        <div class="schemeButtons">
            <div class="button square-button tile-area-scheme-dark" data-scheme="dark"></div>
            <div class="button square-button tile-area-scheme-darkBrown" data-scheme="darkBrown"></div>
            <div class="button square-button tile-area-scheme-darkCrimson" data-scheme="darkCrimson"></div>
            <div class="button square-button tile-area-scheme-darkViolet" data-scheme="darkViolet"></div>
            <div class="button square-button tile-area-scheme-darkMagenta" data-scheme="darkMagenta"></div>
            <div class="button square-button tile-area-scheme-darkCyan" data-scheme="darkCyan"></div>
            <div class="button square-button tile-area-scheme-darkCobalt" data-scheme="darkCobalt"></div>
            <div class="button square-button tile-area-scheme-darkTeal" data-scheme="darkTeal"></div>
            <div class="button square-button tile-area-scheme-darkEmerald" data-scheme="darkEmerald"></div>
            <div class="button square-button tile-area-scheme-darkGreen" data-scheme="darkGreen"></div>
            <div class="button square-button tile-area-scheme-darkOrange" data-scheme="darkOrange"></div>
            <div class="button square-button tile-area-scheme-darkRed" data-scheme="darkRed"></div>
            <div class="button square-button tile-area-scheme-darkPink" data-scheme="darkPink"></div>
            <div class="button square-button tile-area-scheme-darkIndigo" data-scheme="darkIndigo"></div>
            <div class="button square-button tile-area-scheme-darkBlue" data-scheme="darkBlue"></div>
            <div class="button square-button tile-area-scheme-lightBlue" data-scheme="lightBlue"></div>
            <div class="button square-button tile-area-scheme-lightTeal" data-scheme="lightTeal"></div>
            <div class="button square-button tile-area-scheme-lightOlive" data-scheme="lightOlive"></div>
            <div class="button square-button tile-area-scheme-lightOrange" data-scheme="lightOrange"></div>
            <div class="button square-button tile-area-scheme-lightPink" data-scheme="lightPink"></div>
            <div class="button square-button tile-area-scheme-grayed" data-scheme="grayed"></div>
        </div>
    </div>

    <div class="tile-area tile-area-scheme-dark fg-white" style="height: 100%; max-height: 100% !important;">
        <h1 class="tile-area-title">Admin-Start</h1>
        <div class="tile-area-controls">
            <a href="<?php echo base_url('index.php/MyProfile') ?>" class="image-button icon-right bg-transparent fg-dark bg-hover-red no-border"><span class="sub-header no-margin text-dark"><?php echo $_SESSION['Firstname'].' '.$_SESSION['Lastname']; ?></span> <span class="icon mif-user"></span></a>
            <button class="square-button bg-transparent fg-dark bg-hover-red no-border" onclick="showCharms('#charmSettings')"><span class="mif-cog"></span></button>
            <a href="#" onclick="ShowDialog()" class="square-button bg-transparent fg-dark bg-hover-red no-border"><span class="mif-switch"></span></a>
        </div>

        <div class="tile-group double">
            <span class="tile-group-title">Masterfiles</span>

            <div class="tile-container">
                <a href="<?php echo base_url('index.php/UserAccounts/View'); ?>" class="tile bg-indigo fg-white" data-role="tile">
                    <div class="tile-content iconic">
                        <span><img src="<?php echo base_url('assets/Icons/user.png') ?>" class="icon"></span>
                    </div>
                    <span class="tile-label">User Accounts</span>
                </a>

                <a href="<?php echo base_url('index.php/Nas/View'); ?>" class="tile bg-darkBlue fg-white" data-role="tile" onclick="document.location.href='<?php echo base_url(); ?>index.php/NAS'">
                    <div class="tile-content iconic">
                        <span class="icon"><img src="<?php echo base_url('assets/Icons/nas1.png') ?>" class="icon"></span>
                    </div>
                    <span class="tile-label">NAS</span>
                </a>
                <a href="<?php echo base_url('index.php/Attendance/DTR'); ?>" class="tile bg-darkBlue fg-white" data-role="tile" onclick="document.location.href='<?php echo base_url(); ?>index.php/NAS'">
                    <div class="tile-content iconic">
                        <span class="icon"><img src="<?php echo base_url('assets/Icons/dtr.png') ?>" class="icon"></span>
                    </div>
                    <span class="tile-label">Import DTR</span>
                </a>
                <a href="<?php echo base_url('index.php/User/Import'); ?>" class="tile bg-darkBlue fg-white" data-role="tile" onclick="document.location.href='<?php echo base_url(); ?>index.php/NAS'">
                    <div class="tile-content iconic">
                        <span class="icon"><img src="<?php echo base_url('assets/Icons/importusers.png') ?>" class="icon"></span>
                    </div>
                    <span class="tile-label">Import User</span>
                </a>
                <a href="<?php echo base_url('index.php/Nas/Import'); ?>" class="tile bg-darkBlue fg-white" data-role="tile" onclick="document.location.href='<?php echo base_url(); ?>index.php/NAS'">
                    <div class="tile-content iconic">
                        <span class="icon"><img src="<?php echo base_url('assets/Icons/importnas.png') ?>" class="icon"></span>
                    </div>
                    <span class="tile-label">Import NAS</span>
                </a>
                <a href="<?php echo base_url('index.php/Evaluation/Question'); ?>" class="tile bg-darkBlue fg-white" data-role="tile" onclick="document.location.href='<?php echo base_url(); ?>index.php/NAS'">
                    <div class="tile-content iconic">
                        <span class="icon"><img src="<?php echo base_url('assets/Icons/questionnaire.png') ?>" class="icon"></span>
                    </div>
                    <span class="tile-label">Import Questionnaire</span>
                </a>
            </div>
        </div>

        <div class="tile-group double">
            <span class="tile-group-title">Manage</span>
            <div class="tile-container">
                <a href="<?php echo base_url('index.php/Scheduler'); ?>" class="tile-wide bg-darkRed fg-white" data-role="tile" data-effect="slideLeft">
                    <div class="tile-content iconic">
                        <span class="icon"><img src="<?php echo base_url('assets/Icons/schedule.png') ?>" class="icon"></span>
                    </div>
                    <span class="tile-label">Schedule</span>
                </a>
                <a href="<?php echo base_url('index.php/Attendance/WorkingDate'); ?>" class="tile bg-darkRed fg-white" data-role="tile" data-effect="slideLeft">
                    <div class="tile-content iconic">
                        <span class="icon"><img src="<?php echo base_url('assets/Icons/attendance.png') ?>" class="icon"></span>
                    </div>
                    <span class="tile-label">Working Dates</span>
                </a>
                <a href="<?php echo base_url('index.php/Department'); ?>" class="tile fg-white bg-darkRed" data-role="tile" data-effect="slideLeft">
                    <div class="tile-content iconic">
                        <span class="icon"><img src="<?php echo base_url('assets/Icons/department.png') ?>" class="icon"></span>
                    </div>
                    <span class="tile-label">Department</span>
                </a>
                <a href="<?php echo base_url('index.php/Evaluation/Manage'); ?>" class="tile-wide fg-white bg-darkRed" data-role="tile" data-effect="slideLeft">
                    <div class="tile-content iconic">
                        <span class="icon"><img src="<?php echo base_url('assets/Icons/evaluation.png') ?>" class="icon"></span>
                    </div>
                    <span class="tile-label">Evaluation</span>
                </a>
            </div>
        </div>

        <div class="tile-group one">
            <span class="tile-group-title">Reports</span>

            <a href="<?php echo base_url('index.php/MonthlyAllowance'); ?>" class="tile-wide fg-white bg-blue" data-role="tile">
                <div class="tile-content iconic">
                    <img src="<?php echo base_url('assets/Icons/salary.png') ?>" class="icon">
                </div>
                <span class="tile-label">Monthy Allowance</span>
            </a>
            <a href="<?php echo base_url('index.php/Evaluation/Results'); ?>" class="tile-wide fg-white bg-darkBlue" data-role="tile">
                <div class="tile-content iconic">
                    <img src="<?php echo base_url('assets/Icons/results.png') ?>" class="icon">
                </div>
                <span class="tile-label">Evaluation Results</span>
            </a>
            <a href="<?php echo base_url('index.php/RenewRemarks'); ?>" class="tile-wide bg-green fg-white" data-role="tile">
                <div class="tile-content iconic">
                    <img src="<?php echo base_url('assets/Icons/renewal.png') ?>" class="icon">
                </div>
                <span class="tile-label">Renewal Remarks</span>
            </a>
        </div>
    </div>
</body>
</html>
