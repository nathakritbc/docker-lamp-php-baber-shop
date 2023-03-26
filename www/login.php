<?php 
@session_start();
//  @session_destroy();
?>
<!doctype html>
<html class="no-js" lang="en">

<head>

    <title>เข้าสู่ระบบ | JongQ</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet">
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
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="css/main.css">
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
    <!-- forms CSS
		============================================ -->
    <link rel="stylesheet" href="css/form/all-type-forms.css">
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
    <div class="error-pagewrap">
        <div class="error-page-int">
            <div class="text-center m-b-md custom-login">
                <h3>เข้าสู่ระบบ JongQ ตัดผม</h3>
                <p>กรอกข้อมูลการเข้าสู่ระบบ!</p>
            </div>
            <div class="content-error">
                <div class="hpanel">
                    <div class="panel-body">
                        <form action="" method="post" id="loginForm">
                            <div class="form-group">
                                <label class="control-label" for="username">ชื่อผู้ใช้งาน (Username)</label>
                                <input type="text" placeholder="username ชื่อผู้ใช้งาน"
                                    title="กรุณากรอกข้อมูล ชื่อผู้ใช้งาน username" required name="username"
                                    id="username" class="form-control">
                                <!-- <span class="help-block small"></span> -->
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">รหัสผ่าน</label>
                                <input type="password" title="กรุณากรอกข้อมูล รหัสผ่าน" placeholder="******" required
                                    name="password" id="password" class="form-control">
                                <!-- <span class="help-block small">Yur strong password</span> -->
                            </div>
                            <!-- <div class="checkbox login-checkbox">
                                <label>
                                    <input type="checkbox" class="i-checks"> Remember me </label>
                                <p class="help-block small">(if this is a private computer)</p>
                            </div> -->
                            <input type="hidden" name="acction" value="login">
                            <button type="submit" class="btn btn-success btn-block loginbtn">เข้าสู่ระบบ</button>
                            <!-- <a class="btn btn-default btn-block" href="#">Register</a> -->
                        </form>
                    </div>
                </div>
            </div>
            <div class="text-center login-footer">
                <p>ถ้ายังไม่มีบัญชีสามารถลงทะเบียน <a href="./register.php">จองคิวตัดผม</a></p>
            </div>
        </div>
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
    <!-- tab JS
		============================================ -->
    <script src="js/tab.js"></script>
    <!-- icheck JS
		============================================ -->
    <script src="js/icheck/icheck.min.js"></script>
    <script src="js/icheck/icheck-active.js"></script>
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
<?php 
include("./configs/connect_db.php");
include_once("./models/login_register_model.php"); ?>

</html>