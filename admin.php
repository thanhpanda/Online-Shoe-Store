<?php
include("ConnectDB.php");
include("Functions.php");

$_SESSION["UserInfo"] = isset($_SESSION["UserInfo"])
    ? $_SESSION["UserInfo"] : null;
if ($_SESSION["UserInfo"] == null) {
    header("Location: ./login.php");
}

// đã đăng nhap
$userInfo = $_SESSION["UserInfo"];
// var_dump($userInfo);
$pages =  "index";
if (isset($_GET["pages"])) {
    $pages = $_GET["pages"];
}
$_Content = "./Pages/" . $pages . ".php";
$_Content = "./Pages/{$pages}.php";

$profile = GetInfo($_SESSION["UserInfo"]["Username"]);


?>

<!doctype html>
<html class="fuelux" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Simplicity V2</title>

    <link rel="stylesheet" type="text/css" href="/assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/weather-icons/weather-icons.min.css">

    <link rel="stylesheet" type="text/css" href="/assets/effects/menu-effects.css">

    <!-- Google Fonts -->
    <!-- <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lato:400,100italic,100,300italic,300,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'> -->

    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
  <![endif]-->

    <!-- Assets -->
    <link rel='stylesheet' type='text/css' href='/assets/jquery-ui/ui-lightness/jquery-ui-1.10.3.custom.css' />
    <link rel='stylesheet' type='text/css' href='/assets/morrischarts/morris.css' />
    <link rel='stylesheet' type='text/css' href='/assets/fullcalendar/fullcalendar.css' />
    <link rel='stylesheet' type='text/css' href='/assets/datatables/jquery.dataTables.css' />
    <link rel='stylesheet' type='text/css' href='/assets/icheck/flat/_all.css' />

    <!-- Theme Styles -->
    <link rel="stylesheet" type="text/css" href="/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/responsive.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/animate.css">
    <link rel="stylesheet" type="text/css" href="/assets/_demo/demo.css">
    <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>

    <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="/assets/flotcharts/excanvas.min.js"></script><![endif]-->

    <!-- Google Maps -->
    <!-- <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false"></script> -->

    <!-- <link rel="shortcut icon" href="favicon.ico" type="image/png">
    <link rel="shortcut icon" type="image/png" href="favicon.ico" /> -->

</head>

<body>

    <section class="content">

        <!-- Sidebar Start -->
        <div class="sidebar">

            <!-- Logo Start -->
            <a href="?pages=index">
                <div class="logo-container" id="step1">
                    <h1>Online Shoe</h1>
                    <h4>admin template</h4>
                </div>
            </a>
            <!-- Logo End -->

            <!-- Sidebar User Profile Start -->
            <div class="sidebar-profile">
                <div class="user-avatar">
                    <img src="images/avatar/<?php echo $profile["Avatar"] ?>" alt="Samantha Lenna Wilson"/>
                </div>
                <div class="user-info">
                    <a href="?pages=profile"><?php echo $profile["Name"] ?></a>
                </div>
            </div>

            <div class="responsive-menu">
                <a href="#"><i class="fa fa-bars"></i></a>
            </div>
            <!-- Sidebar User Profile End -->

            <!-- Menu Start -->
            <ul class="menu">

                <li class="lightblue active">
                    <a href="/">
                        <span class="menu-icon"><i class="fa fa-home"></i></span>
                        <span class="menu-text">Dashboard</span>
                    </a>
                </li>

                <li class="parent lightyellow">
                    <a href="#">
                        <span class="menu-icon"><i class="fa fa-book"></i></span>
                        <span class="menu-text">Banner Management</span>
                    </a>
                    <ul class="child">
                        <li class="">
                            <a href="?pages=listbanner">List Banner</a>
                        </li>
                        <li class="">
                            <a href="?pages=bannerpost">Add Baner</a>
                        </li>
                        <li class="">
                            <a href="?pages=bannerput">Update Banner</a>
                        </li>
                    </ul>
                </li>

                <li class="parent lightyellow">
                    <a href="#">
                        <span class="menu-icon"><i class="fa fa-book"></i></span>
                        <span class="menu-text">Category Management</span>
                    </a>
                    <ul class="child">
                        <li class="">
                            <a href="?pages=listcategory">List Category</a>
                        </li>
                        <li class="">
                            <a href="?pages=categorypost">Add Category</a>
                        </li>
                        <li class="">
                            <a href="?pages=categoryput">Update Category</a>
                        </li>
                    </ul>
                </li>

                <li class="parent lightyellow">
                    <a href="#">
                        <span class="menu-icon"><i class="fa fa-book"></i></span>
                        <span class="menu-text">Product Management</span>
                    </a>
                    <ul class="child">
                        <li class="">
                            <a href="?pages=listproduct">List Product</a>
                        </li>
                        <li class="">
                            <a href="?pages=productpost">Add Product</a>
                        </li>
                        <li class="">
                            <a href="?pages=productput">Update Product</a>
                        </li>
                    </ul>
                </li>

                <li class="parent lightyellow">
                    <a href="#">
                        <span class="menu-icon"><i class="fa fa-book"></i></span>
                        <span class="menu-text">Order Management</span>
                    </a>
                    <ul class="child">
                        <li class="">
                            <a href="?pages=listorder">List Order</a>
                        </li>

                    </ul>
                </li>

                <li class="parent lightyellow">
                    <a href="#">
                        <span class="menu-icon"><i class="fa fa-book"></i></span>
                        <span class="menu-text">Post Management</span>
                    </a>
                    <ul class="child">
                        <li class="">
                            <a href="?pages=listpost">List Post</a>
                        </li>
                        <li class="">
                            <a href="?pages=postpost">Add Post</a>
                        </li>
                        <li class="">
                            <a href="?pages=postput">Update Post</a>
                        </li>
                    </ul>
                </li>

                <li class="parent lightyellow">
                    <a href="#">
                        <span class="menu-icon"><i class="fa fa-book"></i></span>
                        <span class="menu-text">User Management</span>
                    </a>
                    <ul class="child">
                        <li class="">
                            <a href="?pages=listuser">List User</a>
                        </li>
                        <li class="">
                            <a href="?pages=userput">Update User</a>
                        </li>
                    </ul>
                </li>

                <li class="parent lightyellow">
                    <a href="#">
                        <span class="menu-icon"><i class="fa fa-book"></i></span>
                        <span class="menu-text">Admin Account Management</span>
                    </a>
                    <ul class="child">
                        <li class="">
                            <a href="?pages=listadmin">List Admin</a>
                        </li>
                        <li class="">
                            <a href="?pages=adminput">Update Admin</a>
                        </li>
                    </ul>
                </li>

            </ul>
            <!-- Menu End -->

        </div>
        <!-- Sidebar End -->

        <div class="content-liquid-full">
            <div class="container">

                <!-- Header Bar Start -->
                <div class="row header-bar" id="step2">

                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 hidden-xs hidden-sm">
                        <ul class="left-icons">
                            <li><a href="#" class="collapse-sidebar"><i class="fa fa-bars"></i></a></li>
                            <li><input type="text" class="search" placeholder="Input your search..." /></li>
                            <li><a href="#"><i class="fa fa-refresh"></i></a></li>
                        </ul>
                    </div>

                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                        <ul class="right-icons" id="step3">
                            <li>
                                <a href="#" class="user"><i class="fa fa-user"></i></a>
                                <ul class="dropdown">
                                    <li><a href="?pages=security"><i class="fa fa-cogs"></i>Settings</a></li>
                                    <li><a href="?pages=profile"><i class="fa fa-user"></i>My Profile</a></li>
                                    <li><a href="?pages=logout"><i class="fa fa-sign-out"></i>Sign Out</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#" class="email">
                                    <i class="fa fa-envelope-o"></i>
                                    <div class="notify">13</div>
                                </a>
                                <ul class="dropdown">
                                    <li><a href="#"><i class="fa fa-envelope-o"></i>Inbox</a></li>
                                    <li><a href="#"><i class="fa fa-reply-all"></i>Send</a></li>
                                    <li><a href="#"><i class="fa fa-folder"></i>Draft</a></li>
                                    <li><a href="#"><i class="fa fa-pencil-square-o"></i>Compose</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#" class="info">
                                    <i class="fa fa-info"></i>
                                    <div class="notify">2</div>
                                </a>
                                <ul class="dropdown big">
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-check-circle green"></i>
                                            Uploaded successfully
                                            <span class="description">1 minute ago</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-comments blue"></i>
                                            Jenna commented on your link
                                            <span class="description">1 hour ago</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-calendar orange"></i>
                                            Jason invited you on a event
                                            <span class="description">3 hours ago</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#" class="settings"><i class="fa fa-cog"></i></a>
                            </li>
                            <li>
                                <a href="#" class="lock"><i class="fa fa-lock"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Header Bar End -->

                <!-- Row Start -->
                <?php
                include $_Content;
                ?>
                <!-- Row End -->

                <!-- Footer Line Start -->
                <div class="footer-line">
                    &#169; All rights reserved by Creativico
                </div>

            </div>
        </div>

    </section>


    <!-- Javascript -->
    <script src="/assets/jquery/jquery.min.js"></script>


    <!-- Custom Scroll Bar -->
    <script src="/assets/nicescroll/jquery.nicescroll.min.js"></script>

    <script src="/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="/assets/charts/table-to-chart.js"></script>
    <script src="/assets/fullcalendar/fullcalendar.min.js"></script>
    <script src="/assets/fullcalendar/gcal.js"></script>
    <script src="/assets/sidebar/min-height.js"></script>

    <!-- DataTables -->
    <script src="/assets/datatables/jquery.dataTables.min.js"></script>
    <script src="/assets/datatables/jquery.dataTables.min.js"></script>

    <!-- jQuery UI -->
    <script src="/assets/jquery-ui/jquery-ui-1.10.3.custom.min.js"></script>

    <!-- Morris Charts -->
    <script src="/assets/morrischarts/raphael.js"></script>
    <script src="/assets/morrischarts/morris.js"></script>

    <!-- iCheck -->
    <script src="/assets/icheck/icheck.js"></script>

    <!-- CountTo -->
    <script src="/assets/jquery-countto/jquery.count-to.js"></script>

    <!-- FlotCharts  -->
    <script src="/assets/flotcharts/flotcharts-common.js"></script>
    <script src="/assets/flotcharts/jquery.flot.min.js"></script>
    <script src="/assets/flotcharts/jquery.flot.resize.min.js"></script>
    <script src="/assets/flotcharts/jquery.flot.canvas.min.js"></script>
    <script src="/assets/flotcharts/jquery.flot.image.min.js"></script>
    <script src="/assets/flotcharts/jquery.flot.categories.min.js"></script>
    <script src="/assets/flotcharts/jquery.flot.crosshair.min.js"></script>
    <script src="/assets/flotcharts/jquery.flot.errorbars.min.js"></script>
    <script src="/assets/flotcharts/jquery.flot.fillbetween.min.js"></script>
    <script src="/assets/flotcharts/jquery.flot.navigate.min.js"></script>
    <script src="/assets/flotcharts/jquery.flot.pie.min.js"></script>
    <script src="/assets/flotcharts/jquery.flot.selection.min.js"></script>
    <script src="/assets/flotcharts/jquery.flot.stack.min.js"></script>
    <script src="/assets/flotcharts/jquery.flot.symbol.min.js"></script>
    <script src="/assets/flotcharts/jquery.flot.threshold.min.js"></script>
    <script src="/assets/flotcharts/jquery.colorhelpers.min.js"></script>
    <script src="/assets/flotcharts/jquery.flot.time.min.js"></script>

    <!-- Demo -->
    <script src="/assets/_demo/icheck/icheck.js"></script>
    <script src="/assets/_demo/charts/dashboard.js"></script>
    <script src="/assets/_demo/all-pages.js"></script>
    <script src="/assets/_demo/google-maps.js"></script>
    <script type="text/javascript" src="/assets/_demo/page-index.js"></script>

    <!-- Intro -->
    <script type="text/javascript" src="/assets/_demo/introjs/init.js"></script>


</body>

</html>