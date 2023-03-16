<?php 
@session_start();

// $dd=date("Y-m-d");
$dd=null;
$user_id = $_SESSION["user_id"];


include_once("./configs/connect_db.php");
$sqlJongQLists = "SELECT jn.id,jn.jong_date,jn.jong_time,jn.jong_status,jn.time_slot_id,jn.jong_slip,jn.user_id,u.full_name,u.username 
                  FROM tb_jongs jn INNER JOIN tb_users u ON jn.user_id = u.id 
                  WHERE jn.user_id='$user_id'
                  ORDER BY jn.jong_date_time DESC;";

if(isset($_GET["findDate"])){
$dd=$_GET["findDate"];

$sqlJongQLists = "SELECT jn.id,jn.jong_date,jn.jong_time,jn.jong_status,jn.time_slot_id,jn.jong_slip,jn.user_id,u.full_name,u.username 
                  FROM tb_jongs jn INNER JOIN tb_users u ON jn.user_id = u.id 
                  WHERE jn.jong_date='$dd' AND jn.user_id='$user_id'
                  ORDER BY jn.jong_date_time DESC;";
}

$resultJongQLists = mysqli_query($conn, $sqlJongQLists);

?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Data Table | Kiaalap - Kiaalap Admin Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.css">
    <link rel="stylesheet" href="css/owl.transitions.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- meanmenu icon CSS
		============================================ -->
    <link rel="stylesheet" href="css/meanmenu.min.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="css/main.css">
    <!-- educate icon CSS
		============================================ -->
    <link rel="stylesheet" href="css/educate-custon-icon.css">
    <!-- morrisjs CSS
		============================================ -->
    <link rel="stylesheet" href="css/morrisjs/morris.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href="css/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="css/metisMenu/metisMenu-vertical.css">
    <!-- calendar CSS
		============================================ -->
    <link rel="stylesheet" href="css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="css/calendar/fullcalendar.print.min.css">
    <!-- x-editor CSS
		============================================ -->
    <link rel="stylesheet" href="css/editor/select2.css">
    <link rel="stylesheet" href="css/editor/datetimepicker.css">
    <link rel="stylesheet" href="css/editor/bootstrap-editable.css">
    <link rel="stylesheet" href="css/editor/x-editor-style.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="css/data-table/bootstrap-table.css">
    <link rel="stylesheet" href="css/data-table/bootstrap-editable.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
    <!-- Start Left menu area -->
    <div class="left-sidebar-pro">
        <nav id="sidebar" class="">
            <div class="sidebar-header">
                <a href="index.html"><img class="main-logo" src="img/logo/logo.png" alt="" /></a>
                <strong><a href="index.html"><img src="img/logo/logosn.png" alt="" /></a></strong>
            </div>
            <div class="left-custom-menu-adp-wrap comment-scrollbar">
                <nav class="sidebar-nav left-sidebar-menu-pro">
                    <ul class="metismenu" id="menu1">

                        <li>
                            <a title="Landing Page" href="events.html" aria-expanded="false"><span
                                    class="educate-icon educate-event icon-wrap sub-icon-mg" aria-hidden="true"></span>
                                <span class="mini-click-non">การจอง</span></a>
                        </li>
                        <li>
                            <a title="Landing Page" href="events.html" aria-expanded="false"><span
                                    class="educate-icon educate-event icon-wrap sub-icon-mg" aria-hidden="true"></span>
                                <span class="mini-click-non">ข่าว</span></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>
    </div>
    <!-- End Left menu area -->
    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="logo-pro">
                        <a href="index.html"><img class="main-logo" src="img/logo/logo.png" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-advance-area">
            <div class="header-top-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="header-top-wraper">
                                <div class="row">
                                    <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                                        <div class="menu-switcher-pro">
                                            <button type="button" id="sidebarCollapse"
                                                class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
                                                <i class="educate-icon educate-nav"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                                        <div class="header-top-menu tabl-d-n">
                                            <ul class="nav navbar-nav mai-top-nav">
                                                <li class="nav-item"><a href="#" class="nav-link">Home</a>
                                                </li>
                                                <li class="nav-item"><a href="#" class="nav-link">About</a>
                                                </li>
                                                <li class="nav-item"><a href="#" class="nav-link">Services</a>
                                                </li>
                                                <li class="nav-item dropdown res-dis-nn">
                                                    <a href="#" data-toggle="dropdown" role="button"
                                                        aria-expanded="false" class="nav-link dropdown-toggle">Project
                                                        <span class="angle-down-topmenu"><i
                                                                class="fa fa-angle-down"></i></span></a>
                                                    <div role="menu" class="dropdown-menu animated zoomIn">
                                                        <a href="#" class="dropdown-item">Documentation</a>
                                                        <a href="#" class="dropdown-item">Expert Backend</a>
                                                        <a href="#" class="dropdown-item">Expert FrontEnd</a>
                                                        <a href="#" class="dropdown-item">Contact Support</a>
                                                    </div>
                                                </li>
                                                <li class="nav-item"><a href="#" class="nav-link">Support</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                        <div class="header-right-info">
                                            <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                                <li class="nav-item dropdown">
                                                    <a href="#" data-toggle="dropdown" role="button"
                                                        aria-expanded="false" class="nav-link dropdown-toggle"><i
                                                            class="educate-icon educate-message edu-chat-pro"
                                                            aria-hidden="true"></i><span
                                                            class="indicator-ms"></span></a>
                                                    <div role="menu"
                                                        class="author-message-top dropdown-menu animated zoomIn">
                                                        <div class="message-single-top">
                                                            <h1>Message</h1>
                                                        </div>
                                                        <ul class="message-menu">
                                                            <li>
                                                                <a href="#">
                                                                    <div class="message-img">
                                                                        <img src="img/contact/1.jpg" alt="">
                                                                    </div>
                                                                    <div class="message-content">
                                                                        <span class="message-date">16 Sept</span>
                                                                        <h2>Advanda Cro</h2>
                                                                        <p>Please done this project as soon possible.
                                                                        </p>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <div class="message-img">
                                                                        <img src="img/contact/4.jpg" alt="">
                                                                    </div>
                                                                    <div class="message-content">
                                                                        <span class="message-date">16 Sept</span>
                                                                        <h2>Sulaiman din</h2>
                                                                        <p>Please done this project as soon possible.
                                                                        </p>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <div class="message-img">
                                                                        <img src="img/contact/3.jpg" alt="">
                                                                    </div>
                                                                    <div class="message-content">
                                                                        <span class="message-date">16 Sept</span>
                                                                        <h2>Victor Jara</h2>
                                                                        <p>Please done this project as soon possible.
                                                                        </p>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <div class="message-img">
                                                                        <img src="img/contact/2.jpg" alt="">
                                                                    </div>
                                                                    <div class="message-content">
                                                                        <span class="message-date">16 Sept</span>
                                                                        <h2>Victor Jara</h2>
                                                                        <p>Please done this project as soon possible.
                                                                        </p>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                        <div class="message-view">
                                                            <a href="#">View All Messages</a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="nav-item"><a href="#" data-toggle="dropdown" role="button"
                                                        aria-expanded="false" class="nav-link dropdown-toggle"><i
                                                            class="educate-icon educate-bell"
                                                            aria-hidden="true"></i><span
                                                            class="indicator-nt"></span></a>
                                                    <div role="menu"
                                                        class="notification-author dropdown-menu animated zoomIn">
                                                        <div class="notification-single-top">
                                                            <h1>Notifications</h1>
                                                        </div>
                                                        <ul class="notification-menu">
                                                            <li>
                                                                <a href="#">
                                                                    <div class="notification-icon">
                                                                        <i class="educate-icon educate-checked edu-checked-pro admin-check-pro"
                                                                            aria-hidden="true"></i>
                                                                    </div>
                                                                    <div class="notification-content">
                                                                        <span class="notification-date">16 Sept</span>
                                                                        <h2>Advanda Cro</h2>
                                                                        <p>Please done this project as soon possible.
                                                                        </p>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <div class="notification-icon">
                                                                        <i class="fa fa-cloud edu-cloud-computing-down"
                                                                            aria-hidden="true"></i>
                                                                    </div>
                                                                    <div class="notification-content">
                                                                        <span class="notification-date">16 Sept</span>
                                                                        <h2>Sulaiman din</h2>
                                                                        <p>Please done this project as soon possible.
                                                                        </p>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <div class="notification-icon">
                                                                        <i class="fa fa-eraser edu-shield"
                                                                            aria-hidden="true"></i>
                                                                    </div>
                                                                    <div class="notification-content">
                                                                        <span class="notification-date">16 Sept</span>
                                                                        <h2>Victor Jara</h2>
                                                                        <p>Please done this project as soon possible.
                                                                        </p>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <div class="notification-icon">
                                                                        <i class="fa fa-line-chart edu-analytics-arrow"
                                                                            aria-hidden="true"></i>
                                                                    </div>
                                                                    <div class="notification-content">
                                                                        <span class="notification-date">16 Sept</span>
                                                                        <h2>Victor Jara</h2>
                                                                        <p>Please done this project as soon possible.
                                                                        </p>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                        <div class="notification-view">
                                                            <a href="#">View All Notification</a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#" data-toggle="dropdown" role="button"
                                                        aria-expanded="false" class="nav-link dropdown-toggle">
                                                        <img src="img/product/pro4.jpg" alt="" />
                                                        <span class="admin-name">Prof.Anderson</span>
                                                        <i class="fa fa-angle-down edu-icon edu-down-arrow"></i>
                                                    </a>
                                                    <ul role="menu"
                                                        class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                                                        <li><a href="#"><span
                                                                    class="edu-icon edu-home-admin author-log-ic"></span>My
                                                                Account</a>
                                                        </li>
                                                        <li><a href="#"><span
                                                                    class="edu-icon edu-user-rounded author-log-ic"></span>My
                                                                Profile</a>
                                                        </li>
                                                        <li><a href="#"><span
                                                                    class="edu-icon edu-money author-log-ic"></span>User
                                                                Billing</a>
                                                        </li>
                                                        <li><a href="#"><span
                                                                    class="edu-icon edu-settings author-log-ic"></span>Settings</a>
                                                        </li>
                                                        <li><a href="#"><span
                                                                    class="edu-icon edu-locked author-log-ic"></span>Log
                                                                Out</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="nav-item nav-setting-open"><a href="#" data-toggle="dropdown"
                                                        role="button" aria-expanded="false"
                                                        class="nav-link dropdown-toggle"><i
                                                            class="educate-icon educate-menu"></i></a>

                                                    <div role="menu"
                                                        class="admintab-wrap menu-setting-wrap menu-setting-wrap-bg dropdown-menu animated zoomIn">
                                                        <ul class="nav nav-tabs custon-set-tab">
                                                            <li class="active"><a data-toggle="tab"
                                                                    href="#Notes">Notes</a>
                                                            </li>
                                                            <li><a data-toggle="tab" href="#Projects">Projects</a>
                                                            </li>
                                                            <li><a data-toggle="tab" href="#Settings">Settings</a>
                                                            </li>
                                                        </ul>

                                                        <div class="tab-content custom-bdr-nt">
                                                            <div id="Notes" class="tab-pane fade in active">
                                                                <div class="notes-area-wrap">
                                                                    <div class="note-heading-indicate">
                                                                        <h2><i class="fa fa-comments-o"></i> Latest
                                                                            Notes</h2>
                                                                        <p>You have 10 new message.</p>
                                                                    </div>
                                                                    <div class="notes-list-area notes-menu-scrollbar">
                                                                        <ul class="notes-menu-list">
                                                                            <li>
                                                                                <a href="#">
                                                                                    <div class="notes-list-flow">
                                                                                        <div class="notes-img">
                                                                                            <img src="img/contact/4.jpg"
                                                                                                alt="" />
                                                                                        </div>
                                                                                        <div class="notes-content">
                                                                                            <p> The point of using Lorem
                                                                                                Ipsum is that it has a
                                                                                                more-or-less normal.</p>
                                                                                            <span>Yesterday 2:45
                                                                                                pm</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">
                                                                                    <div class="notes-list-flow">
                                                                                        <div class="notes-img">
                                                                                            <img src="img/contact/1.jpg"
                                                                                                alt="" />
                                                                                        </div>
                                                                                        <div class="notes-content">
                                                                                            <p> The point of using Lorem
                                                                                                Ipsum is that it has a
                                                                                                more-or-less normal.</p>
                                                                                            <span>Yesterday 2:45
                                                                                                pm</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">
                                                                                    <div class="notes-list-flow">
                                                                                        <div class="notes-img">
                                                                                            <img src="img/contact/2.jpg"
                                                                                                alt="" />
                                                                                        </div>
                                                                                        <div class="notes-content">
                                                                                            <p> The point of using Lorem
                                                                                                Ipsum is that it has a
                                                                                                more-or-less normal.</p>
                                                                                            <span>Yesterday 2:45
                                                                                                pm</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">
                                                                                    <div class="notes-list-flow">
                                                                                        <div class="notes-img">
                                                                                            <img src="img/contact/3.jpg"
                                                                                                alt="" />
                                                                                        </div>
                                                                                        <div class="notes-content">
                                                                                            <p> The point of using Lorem
                                                                                                Ipsum is that it has a
                                                                                                more-or-less normal.</p>
                                                                                            <span>Yesterday 2:45
                                                                                                pm</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">
                                                                                    <div class="notes-list-flow">
                                                                                        <div class="notes-img">
                                                                                            <img src="img/contact/4.jpg"
                                                                                                alt="" />
                                                                                        </div>
                                                                                        <div class="notes-content">
                                                                                            <p> The point of using Lorem
                                                                                                Ipsum is that it has a
                                                                                                more-or-less normal.</p>
                                                                                            <span>Yesterday 2:45
                                                                                                pm</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">
                                                                                    <div class="notes-list-flow">
                                                                                        <div class="notes-img">
                                                                                            <img src="img/contact/1.jpg"
                                                                                                alt="" />
                                                                                        </div>
                                                                                        <div class="notes-content">
                                                                                            <p> The point of using Lorem
                                                                                                Ipsum is that it has a
                                                                                                more-or-less normal.</p>
                                                                                            <span>Yesterday 2:45
                                                                                                pm</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">
                                                                                    <div class="notes-list-flow">
                                                                                        <div class="notes-img">
                                                                                            <img src="img/contact/2.jpg"
                                                                                                alt="" />
                                                                                        </div>
                                                                                        <div class="notes-content">
                                                                                            <p> The point of using Lorem
                                                                                                Ipsum is that it has a
                                                                                                more-or-less normal.</p>
                                                                                            <span>Yesterday 2:45
                                                                                                pm</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">
                                                                                    <div class="notes-list-flow">
                                                                                        <div class="notes-img">
                                                                                            <img src="img/contact/1.jpg"
                                                                                                alt="" />
                                                                                        </div>
                                                                                        <div class="notes-content">
                                                                                            <p> The point of using Lorem
                                                                                                Ipsum is that it has a
                                                                                                more-or-less normal.</p>
                                                                                            <span>Yesterday 2:45
                                                                                                pm</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">
                                                                                    <div class="notes-list-flow">
                                                                                        <div class="notes-img">
                                                                                            <img src="img/contact/2.jpg"
                                                                                                alt="" />
                                                                                        </div>
                                                                                        <div class="notes-content">
                                                                                            <p> The point of using Lorem
                                                                                                Ipsum is that it has a
                                                                                                more-or-less normal.</p>
                                                                                            <span>Yesterday 2:45
                                                                                                pm</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">
                                                                                    <div class="notes-list-flow">
                                                                                        <div class="notes-img">
                                                                                            <img src="img/contact/3.jpg"
                                                                                                alt="" />
                                                                                        </div>
                                                                                        <div class="notes-content">
                                                                                            <p> The point of using Lorem
                                                                                                Ipsum is that it has a
                                                                                                more-or-less normal.</p>
                                                                                            <span>Yesterday 2:45
                                                                                                pm</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div id="Projects" class="tab-pane fade">
                                                                <div class="projects-settings-wrap">
                                                                    <div class="note-heading-indicate">
                                                                        <h2><i class="fa fa-cube"></i> Latest projects
                                                                        </h2>
                                                                        <p> You have 20 projects. 5 not completed.</p>
                                                                    </div>
                                                                    <div
                                                                        class="project-st-list-area project-st-menu-scrollbar">
                                                                        <ul class="projects-st-menu-list">
                                                                            <li>
                                                                                <a href="#">
                                                                                    <div class="project-list-flow">
                                                                                        <div
                                                                                            class="projects-st-heading">
                                                                                            <h2>Web Development</h2>
                                                                                            <p> The point of using Lorem
                                                                                                Ipsum is that it has a
                                                                                                more or less normal.</p>
                                                                                            <span
                                                                                                class="project-st-time">1
                                                                                                hours ago</span>
                                                                                        </div>
                                                                                        <div
                                                                                            class="projects-st-content">
                                                                                            <p>Completion with: 28%</p>
                                                                                            <div
                                                                                                class="progress progress-mini">
                                                                                                <div style="width: 28%;"
                                                                                                    class="progress-bar progress-bar-danger hd-tp-1">
                                                                                                </div>
                                                                                            </div>
                                                                                            <p>Project end: 4:00 pm -
                                                                                                12.06.2014</p>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">
                                                                                    <div class="project-list-flow">
                                                                                        <div
                                                                                            class="projects-st-heading">
                                                                                            <h2>Software Development
                                                                                            </h2>
                                                                                            <p> The point of using Lorem
                                                                                                Ipsum is that it has a
                                                                                                more or less normal.</p>
                                                                                            <span
                                                                                                class="project-st-time">2
                                                                                                hours ago</span>
                                                                                        </div>
                                                                                        <div
                                                                                            class="projects-st-content project-rating-cl">
                                                                                            <p>Completion with: 68%</p>
                                                                                            <div
                                                                                                class="progress progress-mini">
                                                                                                <div style="width: 68%;"
                                                                                                    class="progress-bar hd-tp-2">
                                                                                                </div>
                                                                                            </div>
                                                                                            <p>Project end: 4:00 pm -
                                                                                                12.06.2014</p>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">
                                                                                    <div class="project-list-flow">
                                                                                        <div
                                                                                            class="projects-st-heading">
                                                                                            <h2>Graphic Design</h2>
                                                                                            <p> The point of using Lorem
                                                                                                Ipsum is that it has a
                                                                                                more or less normal.</p>
                                                                                            <span
                                                                                                class="project-st-time">3
                                                                                                hours ago</span>
                                                                                        </div>
                                                                                        <div
                                                                                            class="projects-st-content">
                                                                                            <p>Completion with: 78%</p>
                                                                                            <div
                                                                                                class="progress progress-mini">
                                                                                                <div style="width: 78%;"
                                                                                                    class="progress-bar hd-tp-3">
                                                                                                </div>
                                                                                            </div>
                                                                                            <p>Project end: 4:00 pm -
                                                                                                12.06.2014</p>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">
                                                                                    <div class="project-list-flow">
                                                                                        <div
                                                                                            class="projects-st-heading">
                                                                                            <h2>Web Design</h2>
                                                                                            <p> The point of using Lorem
                                                                                                Ipsum is that it has a
                                                                                                more or less normal.</p>
                                                                                            <span
                                                                                                class="project-st-time">4
                                                                                                hours ago</span>
                                                                                        </div>
                                                                                        <div
                                                                                            class="projects-st-content project-rating-cl2">
                                                                                            <p>Completion with: 38%</p>
                                                                                            <div
                                                                                                class="progress progress-mini">
                                                                                                <div style="width: 38%;"
                                                                                                    class="progress-bar progress-bar-danger hd-tp-4">
                                                                                                </div>
                                                                                            </div>
                                                                                            <p>Project end: 4:00 pm -
                                                                                                12.06.2014</p>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">
                                                                                    <div class="project-list-flow">
                                                                                        <div
                                                                                            class="projects-st-heading">
                                                                                            <h2>Business Card</h2>
                                                                                            <p> The point of using Lorem
                                                                                                Ipsum is that it has a
                                                                                                more or less normal.</p>
                                                                                            <span
                                                                                                class="project-st-time">5
                                                                                                hours ago</span>
                                                                                        </div>
                                                                                        <div
                                                                                            class="projects-st-content">
                                                                                            <p>Completion with: 28%</p>
                                                                                            <div
                                                                                                class="progress progress-mini">
                                                                                                <div style="width: 28%;"
                                                                                                    class="progress-bar progress-bar-danger hd-tp-5">
                                                                                                </div>
                                                                                            </div>
                                                                                            <p>Project end: 4:00 pm -
                                                                                                12.06.2014</p>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">
                                                                                    <div class="project-list-flow">
                                                                                        <div
                                                                                            class="projects-st-heading">
                                                                                            <h2>Ecommerce Business</h2>
                                                                                            <p> The point of using Lorem
                                                                                                Ipsum is that it has a
                                                                                                more or less normal.</p>
                                                                                            <span
                                                                                                class="project-st-time">6
                                                                                                hours ago</span>
                                                                                        </div>
                                                                                        <div
                                                                                            class="projects-st-content project-rating-cl">
                                                                                            <p>Completion with: 68%</p>
                                                                                            <div
                                                                                                class="progress progress-mini">
                                                                                                <div style="width: 68%;"
                                                                                                    class="progress-bar hd-tp-6">
                                                                                                </div>
                                                                                            </div>
                                                                                            <p>Project end: 4:00 pm -
                                                                                                12.06.2014</p>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">
                                                                                    <div class="project-list-flow">
                                                                                        <div
                                                                                            class="projects-st-heading">
                                                                                            <h2>Woocommerce Plugin</h2>
                                                                                            <p> The point of using Lorem
                                                                                                Ipsum is that it has a
                                                                                                more or less normal.</p>
                                                                                            <span
                                                                                                class="project-st-time">7
                                                                                                hours ago</span>
                                                                                        </div>
                                                                                        <div
                                                                                            class="projects-st-content">
                                                                                            <p>Completion with: 78%</p>
                                                                                            <div
                                                                                                class="progress progress-mini">
                                                                                                <div style="width: 78%;"
                                                                                                    class="progress-bar">
                                                                                                </div>
                                                                                            </div>
                                                                                            <p>Project end: 4:00 pm -
                                                                                                12.06.2014</p>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">
                                                                                    <div class="project-list-flow">
                                                                                        <div
                                                                                            class="projects-st-heading">
                                                                                            <h2>Wordpress Theme</h2>
                                                                                            <p> The point of using Lorem
                                                                                                Ipsum is that it has a
                                                                                                more or less normal.</p>
                                                                                            <span
                                                                                                class="project-st-time">9
                                                                                                hours ago</span>
                                                                                        </div>
                                                                                        <div
                                                                                            class="projects-st-content project-rating-cl2">
                                                                                            <p>Completion with: 38%</p>
                                                                                            <div
                                                                                                class="progress progress-mini">
                                                                                                <div style="width: 38%;"
                                                                                                    class="progress-bar progress-bar-danger">
                                                                                                </div>
                                                                                            </div>
                                                                                            <p>Project end: 4:00 pm -
                                                                                                12.06.2014</p>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div id="Settings" class="tab-pane fade">
                                                                <div class="setting-panel-area">
                                                                    <div class="note-heading-indicate">
                                                                        <h2><i class="fa fa-gears"></i> Settings Panel
                                                                        </h2>
                                                                        <p> You have 20 Settings. 5 not completed.</p>
                                                                    </div>
                                                                    <ul class="setting-panel-list">
                                                                        <li>
                                                                            <div class="checkbox-setting-pro">
                                                                                <div class="checkbox-title-pro">
                                                                                    <h2>Show notifications</h2>
                                                                                    <div class="ts-custom-check">
                                                                                        <div class="onoffswitch">
                                                                                            <input type="checkbox"
                                                                                                name="collapsemenu"
                                                                                                class="onoffswitch-checkbox"
                                                                                                id="example">
                                                                                            <label
                                                                                                class="onoffswitch-label"
                                                                                                for="example">
                                                                                                <span
                                                                                                    class="onoffswitch-inner"></span>
                                                                                                <span
                                                                                                    class="onoffswitch-switch"></span>
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="checkbox-setting-pro">
                                                                                <div class="checkbox-title-pro">
                                                                                    <h2>Disable Chat</h2>
                                                                                    <div class="ts-custom-check">
                                                                                        <div class="onoffswitch">
                                                                                            <input type="checkbox"
                                                                                                name="collapsemenu"
                                                                                                class="onoffswitch-checkbox"
                                                                                                id="example3">
                                                                                            <label
                                                                                                class="onoffswitch-label"
                                                                                                for="example3">
                                                                                                <span
                                                                                                    class="onoffswitch-inner"></span>
                                                                                                <span
                                                                                                    class="onoffswitch-switch"></span>
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="checkbox-setting-pro">
                                                                                <div class="checkbox-title-pro">
                                                                                    <h2>Enable history</h2>
                                                                                    <div class="ts-custom-check">
                                                                                        <div class="onoffswitch">
                                                                                            <input type="checkbox"
                                                                                                name="collapsemenu"
                                                                                                class="onoffswitch-checkbox"
                                                                                                id="example4">
                                                                                            <label
                                                                                                class="onoffswitch-label"
                                                                                                for="example4">
                                                                                                <span
                                                                                                    class="onoffswitch-inner"></span>
                                                                                                <span
                                                                                                    class="onoffswitch-switch"></span>
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="checkbox-setting-pro">
                                                                                <div class="checkbox-title-pro">
                                                                                    <h2>Show charts</h2>
                                                                                    <div class="ts-custom-check">
                                                                                        <div class="onoffswitch">
                                                                                            <input type="checkbox"
                                                                                                name="collapsemenu"
                                                                                                class="onoffswitch-checkbox"
                                                                                                id="example7">
                                                                                            <label
                                                                                                class="onoffswitch-label"
                                                                                                for="example7">
                                                                                                <span
                                                                                                    class="onoffswitch-inner"></span>
                                                                                                <span
                                                                                                    class="onoffswitch-switch"></span>
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="checkbox-setting-pro">
                                                                                <div class="checkbox-title-pro">
                                                                                    <h2>Update everyday</h2>
                                                                                    <div class="ts-custom-check">
                                                                                        <div class="onoffswitch">
                                                                                            <input type="checkbox"
                                                                                                name="collapsemenu"
                                                                                                checked=""
                                                                                                class="onoffswitch-checkbox"
                                                                                                id="example2">
                                                                                            <label
                                                                                                class="onoffswitch-label"
                                                                                                for="example2">
                                                                                                <span
                                                                                                    class="onoffswitch-inner"></span>
                                                                                                <span
                                                                                                    class="onoffswitch-switch"></span>
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="checkbox-setting-pro">
                                                                                <div class="checkbox-title-pro">
                                                                                    <h2>Global search</h2>
                                                                                    <div class="ts-custom-check">
                                                                                        <div class="onoffswitch">
                                                                                            <input type="checkbox"
                                                                                                name="collapsemenu"
                                                                                                checked=""
                                                                                                class="onoffswitch-checkbox"
                                                                                                id="example6">
                                                                                            <label
                                                                                                class="onoffswitch-label"
                                                                                                for="example6">
                                                                                                <span
                                                                                                    class="onoffswitch-inner"></span>
                                                                                                <span
                                                                                                    class="onoffswitch-switch"></span>
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="checkbox-setting-pro">
                                                                                <div class="checkbox-title-pro">
                                                                                    <h2>Offline users</h2>
                                                                                    <div class="ts-custom-check">
                                                                                        <div class="onoffswitch">
                                                                                            <input type="checkbox"
                                                                                                name="collapsemenu"
                                                                                                checked=""
                                                                                                class="onoffswitch-checkbox"
                                                                                                id="example5">
                                                                                            <label
                                                                                                class="onoffswitch-label"
                                                                                                for="example5">
                                                                                                <span
                                                                                                    class="onoffswitch-inner"></span>
                                                                                                <span
                                                                                                    class="onoffswitch-switch"></span>
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                    </ul>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu start -->
            <div class="mobile-menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="mobile-menu">
                                <nav id="dropdown">
                                    <ul class="mobile-menu-nav">
                                        <li><a data-toggle="collapse" data-target="#Charts" href="#">Home <span
                                                    class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul class="collapse dropdown-header-top">
                                                <li><a href="index.html">Dashboard v.1</a></li>
                                                <li><a href="index-1.html">Dashboard v.2</a></li>
                                                <li><a href="index-3.html">Dashboard v.3</a></li>
                                                <li><a href="analytics.html">Analytics</a></li>
                                                <li><a href="widgets.html">Widgets</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="events.html">Event</a></li>
                                        <li><a data-toggle="collapse" data-target="#demoevent" href="#">Professors <span
                                                    class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul id="demoevent" class="collapse dropdown-header-top">
                                                <li><a href="all-professors.html">All Professors</a>
                                                </li>
                                                <li><a href="add-professor.html">Add Professor</a>
                                                </li>
                                                <li><a href="edit-professor.html">Edit Professor</a>
                                                </li>
                                                <li><a href="professor-profile.html">Professor Profile</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#demopro" href="#">Students <span
                                                    class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul id="demopro" class="collapse dropdown-header-top">
                                                <li><a href="all-students.html">All Students</a>
                                                </li>
                                                <li><a href="add-student.html">Add Student</a>
                                                </li>
                                                <li><a href="edit-student.html">Edit Student</a>
                                                </li>
                                                <li><a href="student-profile.html">Student Profile</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#democrou" href="#">Courses <span
                                                    class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul id="democrou" class="collapse dropdown-header-top">
                                                <li><a href="all-courses.html">All Courses</a>
                                                </li>
                                                <li><a href="add-course.html">Add Course</a>
                                                </li>
                                                <li><a href="edit-course.html">Edit Course</a>
                                                </li>
                                                <li><a href="course-profile.html">Courses Info</a>
                                                </li>
                                                <li><a href="course-payment.html">Courses Payment</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#demolibra" href="#">Library <span
                                                    class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul id="demolibra" class="collapse dropdown-header-top">
                                                <li><a href="library-assets.html">Library Assets</a>
                                                </li>
                                                <li><a href="add-library-assets.html">Add Library Asset</a>
                                                </li>
                                                <li><a href="edit-library-assets.html">Edit Library Asset</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#demodepart" href="#">Departments
                                                <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul id="demodepart" class="collapse dropdown-header-top">
                                                <li><a href="departments.html">Departments List</a>
                                                </li>
                                                <li><a href="add-department.html">Add Departments</a>
                                                </li>
                                                <li><a href="edit-department.html">Edit Departments</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#demomi" href="#">Mailbox <span
                                                    class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul id="demomi" class="collapse dropdown-header-top">
                                                <li><a href="mailbox.html">Inbox</a>
                                                </li>
                                                <li><a href="mailbox-view.html">View Mail</a>
                                                </li>
                                                <li><a href="mailbox-compose.html">Compose Mail</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#Miscellaneousmob" href="#">Interface
                                                <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul id="Miscellaneousmob" class="collapse dropdown-header-top">
                                                <li><a href="google-map.html">Google Map</a>
                                                </li>
                                                <li><a href="data-maps.html">Data Maps</a>
                                                </li>
                                                <li><a href="pdf-viewer.html">Pdf Viewer</a>
                                                </li>
                                                <li><a href="x-editable.html">X-Editable</a>
                                                </li>
                                                <li><a href="code-editor.html">Code Editor</a>
                                                </li>
                                                <li><a href="tree-view.html">Tree View</a>
                                                </li>
                                                <li><a href="preloader.html">Preloader</a>
                                                </li>
                                                <li><a href="images-cropper.html">Images Cropper</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#Chartsmob" href="#">Charts <span
                                                    class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul id="Chartsmob" class="collapse dropdown-header-top">
                                                <li><a href="bar-charts.html">Bar Charts</a>
                                                </li>
                                                <li><a href="line-charts.html">Line Charts</a>
                                                </li>
                                                <li><a href="area-charts.html">Area Charts</a>
                                                </li>
                                                <li><a href="rounded-chart.html">Rounded Charts</a>
                                                </li>
                                                <li><a href="c3.html">C3 Charts</a>
                                                </li>
                                                <li><a href="sparkline.html">Sparkline Charts</a>
                                                </li>
                                                <li><a href="peity.html">Peity Charts</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#Tablesmob" href="#">Tables <span
                                                    class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul id="Tablesmob" class="collapse dropdown-header-top">
                                                <li><a href="static-table.html">Static Table</a>
                                                </li>
                                                <li><a href="data-table.html">Data Table</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#formsmob" href="#">Forms <span
                                                    class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul id="formsmob" class="collapse dropdown-header-top">
                                                <li><a href="basic-form-element.html">Basic Form Elements</a>
                                                </li>
                                                <li><a href="advance-form-element.html">Advanced Form Elements</a>
                                                </li>
                                                <li><a href="password-meter.html">Password Meter</a>
                                                </li>
                                                <li><a href="multi-upload.html">Multi Upload</a>
                                                </li>
                                                <li><a href="tinymc.html">Text Editor</a>
                                                </li>
                                                <li><a href="dual-list-box.html">Dual List Box</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#Appviewsmob" href="#">App views
                                                <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul id="Appviewsmob" class="collapse dropdown-header-top">
                                                <li><a href="basic-form-element.html">Basic Form Elements</a>
                                                </li>
                                                <li><a href="advance-form-element.html">Advanced Form Elements</a>
                                                </li>
                                                <li><a href="password-meter.html">Password Meter</a>
                                                </li>
                                                <li><a href="multi-upload.html">Multi Upload</a>
                                                </li>
                                                <li><a href="tinymc.html">Text Editor</a>
                                                </li>
                                                <li><a href="dual-list-box.html">Dual List Box</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#Pagemob" href="#">Pages <span
                                                    class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul id="Pagemob" class="collapse dropdown-header-top">
                                                <li><a href="login.html">Login</a>
                                                </li>
                                                <li><a href="register.html">Register</a>
                                                </li>
                                                <li><a href="lock.html">Lock</a>
                                                </li>
                                                <li><a href="password-recovery.html">Password Recovery</a>
                                                </li>
                                                <li><a href="404.html">404 Page</a></li>
                                                <li><a href="500.html">500 Page</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu end -->
            <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list single-page-breadcome">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="breadcome-heading">
                                            <form role="search" class="sr-input-func">
                                                <input type="text" placeholder="Search..."
                                                    class="search-int form-control">
                                                <a href="#"><i class="fa fa-search"></i></a>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <ul class="breadcome-menu">
                                            <li><a href="#">Home</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">Data Table</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Static Table Start -->
        <div class="data-table-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1>Projects <span class="table-project-n">Data</span> Table</h1>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mt-5">
                                        <label for="">วันที่</label>
                                        <input type="date" value="<?=$dd?>" id="findDateInput" class="form-control"
                                            name="" aria-describedby="helpId" placeholder="" onChange="findByDate()">
                                    </div>
                                </div>
                                <!-- <div class="col-md-6">
                                    <div class="form-group mt-5">
                                        <label for="">วันที่</label>
                                        <input type="date" value="<?=$dd?>" class="form-control" name="" id=""
                                            aria-describedby="helpId" placeholder="">
                                    </div>
                                </div> -->
                            </div>
                            <div class="sparkline13-graph">

                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    <div id="toolbar">

                                        <select class="form-control dt-tb">
                                            <option value="">Export Basic</option>
                                            <option value="all">Export All</option>
                                            <option value="selected">Export Selected</option>
                                        </select>

                                    </div>
                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true"
                                        data-show-columns="true" data-show-pagination-switch="true"
                                        data-show-refresh="true" data-key-events="true" data-show-toggle="true"
                                        data-resizable="true" data-cookie="true" data-cookie-id-table="saveId"
                                        data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                                <th data-field="state" data-checkbox="true"></th>
                                                <th data-field="id">ไอดี</th>
                                                <th data-field="name">วันที่</th>
                                                <th data-field="email">เวลา</th>
                                                <th data-field="phone">สถานะ</th>
                                                <!-- <th data-field="complete">Completed</th> -->
                                                <!-- <th data-field="task">ผู้จอง</th> -->
                                                <th data-field="action">ดำเนินการ</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php 
                                        if(mysqli_num_rows($resultJongQLists)>0){ 
                                            while($rowJongQ=mysqli_fetch_assoc($resultJongQLists)){
                                                ?>
                                            <tr>
                                                <td></td>
                                                <td><?=$rowJongQ["id"]?></td>
                                                <td><?=$rowJongQ["jong_date"]?></td>
                                                <td><?=$rowJongQ["jong_time"]?></td>
                                                <td>
                                                    <?php    
                                                if($rowJongQ["jong_status"]=="PENDING"){?>
                                                    <div class="alert alert-warning" role="alert">
                                                        <strong>รอการยืนยัน!</strong>
                                                    </div>
                                                    <?PHP 
                                                   }elseif($rowJongQ["jong_status"]=="CONFIRM"){?>
                                                    <div class="alert alert-success" role="alert">
                                                        <strong>ยืนยันการจองเรียบร้อย!</strong>
                                                    </div>
                                                    <?php
                                                    }else{?>
                                                    <div class="alert alert-danger" role="alert">
                                                        <strong>ยกเลิกการจอง!</strong>
                                                    </div>
                                                    <?php  }
                                                   ?>
                                                </td>
                                                <td>
                                                    <?php    
                                                if($rowJongQ["jong_status"]=="PENDING"){?>
                                                    <a type="button"
                                                        href="./jongq_list_user.php?deleteR=req&jong_id=<?php echo $rowJongQ["id"]; ?>&time_slot_id=<?php echo $rowJongQ["time_slot_id"]; ?>&jong_slip=<?php echo $rowJongQ["jong_slip"]; ?>"
                                                        class="btn btn-sm btn-warning text-white">
                                                        ยกเลิก
                                                    </a>
                                                    <?PHP 
                                                   }elseif($rowJongQ["jong_status"]=="CONFIRM"){?>
                                                    <button type="button" class="btn btn-sm btn-primary">
                                                        ดูการจอง
                                                    </button>
                                                    <?php
                                                    }  else{?>
                                                    <a href="./jongq_list_user.php?deleteR=req&jong_id=<?php echo $rowJongQ["id"]; ?>&jong_slip=<?php echo $rowJongQ["time_slot_id"]; ?>&jong_slip=<?php echo $rowJongQ["time_slot_id"]; ?>"
                                                        type="button" class="btn btn-sm btn-danger">
                                                        ลบ
                                                    </a>
                                                    <?php  }
                                                   ?>
                                                </td>
                                            </tr>

                                            <?php
                                            }
                                        }
                                        ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Static Table End -->
        <!-- <div class="footer-copyright-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="footer-copy-right">
                            <p>Copyright © 2018. All rights reserved. Template by <a
                                    href="https://colorlib.com/wp/templates/">Colorlib</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    </div>

    <!-- jquery
		============================================ -->
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- wow JS
		============================================ -->
    <script src="js/wow.min.js"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="js/jquery-price-slider.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="js/jquery.meanmenu.js"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- sticky JS
		============================================ -->
    <script src="js/jquery.sticky.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="js/jquery.scrollUp.min.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/scrollbar/mCustomScrollbar-active.js"></script>
    <!-- metisMenu JS
		============================================ -->
    <script src="js/metisMenu/metisMenu.min.js"></script>
    <script src="js/metisMenu/metisMenu-active.js"></script>
    <!-- data table JS
		============================================ -->
    <script src="js/data-table/bootstrap-table.js"></script>
    <script src="js/data-table/tableExport.js"></script>
    <script src="js/data-table/data-table-active.js"></script>
    <script src="js/data-table/bootstrap-table-editable.js"></script>
    <script src="js/data-table/bootstrap-editable.js"></script>
    <script src="js/data-table/bootstrap-table-resizable.js"></script>
    <script src="js/data-table/colResizable-1.5.source.js"></script>
    <script src="js/data-table/bootstrap-table-export.js"></script>
    <!--  editable JS
		============================================ -->
    <script src="js/editable/jquery.mockjax.js"></script>
    <script src="js/editable/mock-active.js"></script>
    <script src="js/editable/select2.js"></script>
    <script src="js/editable/moment.min.js"></script>
    <script src="js/editable/bootstrap-datetimepicker.js"></script>
    <script src="js/editable/bootstrap-editable.js"></script>
    <script src="js/editable/xediable-active.js"></script>
    <!-- Chart JS
		============================================ -->
    <script src="js/chart/jquery.peity.min.js"></script>
    <script src="js/peity/peity-active.js"></script>
    <!-- tab JS
		============================================ -->
    <script src="js/tab.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="js/plugins.js"></script>
    <!-- main JS
		============================================ -->
    <script src="js/main.js"></script>
    <!-- tawk chat JS
		============================================ -->
    <!-- <script src="js/tawk-chat.js"></script> -->
</body>

<script>
function findByDate() {
    const findDateInput = document.getElementById("findDateInput").value
    // console.log('findDateInput', findDateInput);
    window.location = `./jongq_list_user.php?findDate=${findDateInput}`
}
</script>


<?php

        if (isset($_GET["deleteR"] )) {
                echo
                    "<script> 
                        Swal.fire({
                            icon: 'warning',
                            title: 'ยืนยันการลบข้อมูล?',
                            text: 'ท่านเเน่ใจว่า ท่านต้องการลบข้อมูล!',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'ใช่',
                            cancelButtonText: 'ไม่!'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location = 'jongq_list_user.php?deleteR2=req&jong_id={$_GET["jong_id"]}&time_slot_id={$_GET["time_slot_id"]}&jong_slip={$_GET["jong_slip"]}'
                            }else{
                                location = 'jongq_list_user.php'
                            }
                        }); 
                </script>";
        }
 
        if (isset($_GET["deleteR2"])) { 
            
            $sql = "DELETE FROM tb_jongs WHERE  jong_status='PENDING' AND id={$_GET["jong_id"]};"; 
            $sqlCheckStatus = "SELECT jong_status,user_id FROM tb_jongs WHERE jong_status='PENDING' AND user_id='$user_id';"; 
            $resultCheckStatus  = mysqli_query($conn, $sqlCheckStatus);

            if (mysqli_num_rows($resultCheckStatus) == 0) {
                    echo
                    "<script> 
                        Swal.fire({
                            icon: 'error',
                            title: 'ทางร้านได้ยืนยันการจองเเล้ว', 
                        }).then(()=> location = 'jongq_list_user.php')
                    </script>";
                //header('Location: jongq_list_user.php'); 
            }else{
               $sqlUpdateTimeSlot = "UPDATE tb_time_slots SET `time_slot_status` = '1'
                                  WHERE `tb_time_slots`.`id` = '{$_GET["time_slot_id"]}';";


            if (mysqli_query($conn, $sql)) {
                mysqli_query($conn, $sqlUpdateTimeSlot);
                $file_slip= "./uploads/{$_GET["jong_slip"]}";
                $status=unlink($file_slip);    
                echo
                    "<script> 
                        Swal.fire(
                            'ลบข้อมูลสำเร็จ!',
                            'ท่านได้ลบข้อมูลเรียบร้อย',
                            'success'
                        ).then(()=> location = 'jongq_list_user.php')
                    </script>";
                //header('Location: jongq_list_user.php');
            } else {
                echo
                    "<script> 
                    Swal.fire({
                        icon: 'error',
                        title: 'ลบข้อมูลไม่สำเร็จ', 
                    }).then(()=> location = 'jongq_list_user.php')
                </script>";
            }
            }
 

            mysqli_close($conn);
        }
        ?>


</html>