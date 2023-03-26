<?php 
@session_start();
if(!isset($_SESSION["user_id"])  ){
    header('Location: ./login.php');
    exit;
}
// if( $_SESSION["user_role"] !=="USER"){
//     header('Location: ./login.php');
//     exit;
// }

$user_id=$_SESSION["user_id"];

$dateNow =  date("Y/m/d") ;
require_once("./configs/connect_db.php");
require_once("./functions.php");
$sqlShopInfor="SELECT * FROM tb_barbershop_informations WHERE id='1';";
$resultShopInfor=mysqli_query($conn,$sqlShopInfor);
$dataShopInfor=mysqli_fetch_assoc( $resultShopInfor);
$barbershop_information_id=$dataShopInfor["id"];


$mountThai = dateMonthThaiFormat(date("M"));
?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>ข้อมูลร้านตัดผม</title>
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
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
    <!-- Start Left menu area -->
    <?php include_once("./sidebar.php") ?>
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
        <?php include_once("./header.php");?>
        <div class="blog-details-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="blog-details-inner">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="latest-blog-single blog-single-full-view">
                                        <div class="blog-image">
                                            <a href="#"><img
                                                    src="img/profile-informations/<?=$dataShopInfor["bi_profile"]?>"
                                                    alt="" />
                                            </a>
                                            <div class="blog-date">
                                                <p><span class="blog-day"><?=date("d")?></span> <?=$mountThai;?></p>
                                            </div>
                                        </div>
                                        <div class="blog-details blog-sig-details">
                                            <div class="details-blog-dt blog-sig-details-dt courses-info mobile-sm-d-n">
                                                <!-- <span><a href="#"><i class="fa fa-user"></i> <b>Course Name:</b> Web
                                                        Development</a></span>
                                                <span><a href="#"><i class="fa fa-heart"></i> <b>Course Price:</b>
                                                        $3000</a></span> -->
                                                <span><a href="#"><i class="fa fa-user-o"></i>
                                                        <b>ชื่อเจ้าของร้าน : </b>
                                                        <?=$dataShopInfor["bi_shop_owner"]?></a></span>
                                            </div>
                                            <h1><a class="blog-ht" href="#">ร้าน <?=$dataShopInfor["bi_name"]?></a></h1>
                                            <p><?=$dataShopInfor["bi_descriptions"]?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="comment-head">
                                        <h3><b>รีวิว </b></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <?php 

                                
                            $sqlComment = "SELECT * FROM tb_comments c INNER JOIN tb_users u ON u.id=c.user_id 
                                            WHERE barbershop_information_id='1';";
                            $resultComment = mysqli_query($conn, $sqlComment);

                            if (mysqli_num_rows($resultComment) > 0) { 
                                while($row = mysqli_fetch_assoc($resultComment)) {
                                     ?>

                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="user-comment">
                                        <?php
                                        if($row["profile"] == NULL || $row["profile"] == ""  ){
                                            ?>
                                        <img style="width: 76px;height: 76px;" src="img/user/profile.png" alt="" />
                                        <?php
                                    }else{
                                        ?>
                                        <img style="width: 76px;height: 76px;" src="img/user/<?=$row["profile"]; ?>"
                                            alt="" />
                                        <?php }
                                        $date=date_create($row["com_date"]); 
                                        ?>

                                        <div class="comment-details">
                                            <h4><b><?=$row["full_name"]; ?></b> <?=intval(date_format($date,"d"))?>
                                                <?=$mountThai;?> <?=intval(date_format($date,"Y"))+543?>
                                                <!-- <span class="comment-replay">Replay</span> -->
                                            </h4>
                                            <p><?=$row["com_descriptions"]; ?></p>
                                        </div>
                                    </div>
                                </div>

                                <?php }
                            }
                            
                            ?>




                            </div>

                            <?php 
                            if($_SESSION["user_role"] ==="USER"){?>



                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="lead-head">
                                        <h3>เเสดงความคิดเห็น เพื่อให้ทางร้านพัฒนาการให้บริการที่ดีขึ้น</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="coment-area">
                                    <form id="comment" action="" method="post" class="comment">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <textarea name="com_descriptions" cols="30" rows="10"
                                                    placeholder="รายละเอียดความคิดเห็น"></textarea>
                                            </div>
                                            <input type="hidden" name="create_comment" value="create_comment">
                                            <div class="payment-adress comment-stn">
                                                <button type="submit"
                                                    class="btn btn-primary waves-effect waves-light">ส่ง</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <?php                            
}
                            ?>

                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="footer-copyright-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="footer-copy-right">
                            <p>Copyright © 2018. All rights reserved. Template by . <a
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
    <!-- morrisjs JS
		============================================ -->
    <script src="js/sparkline/jquery.sparkline.min.js"></script>
    <script src="js/sparkline/jquery.charts-sparkline.js"></script>
    <!-- calendar JS
		============================================ -->
    <script src="js/calendar/moment.min.js"></script>
    <script src="js/calendar/fullcalendar.min.js"></script>
    <script src="js/calendar/fullcalendar-active.js"></script>
    <!-- maskedinput JS
		============================================ -->
    <script src="js/jquery.maskedinput.min.js"></script>
    <script src="js/masking-active.js"></script>
    <!-- datepicker JS
		============================================ -->
    <script src="js/datepicker/jquery-ui.min.js"></script>
    <script src="js/datepicker/datepicker-active.js"></script>
    <!-- form validate JS
		============================================ -->
    <script src="js/form-validation/jquery.form.min.js"></script>
    <script src="js/form-validation/jquery.validate.min.js"></script>
    <script src="js/form-validation/form-active.js"></script>
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

<?php 
if(isset($_POST["create_comment"])){
    
    $com_descriptions=mysqli_real_escape_string($conn,$_POST["com_descriptions"]);
    $sqlCreateComment ="INSERT INTO `tb_comments` (`id`, `com_date`, `user_id`, `barbershop_information_id`, `com_descriptions`)
                        VALUES (NULL, CURRENT_TIMESTAMP, '$user_id', '$barbershop_information_id', '$com_descriptions');";
    
    if (mysqli_query($conn, $sqlCreateComment)) {
        echo "<script> 
                Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'เเสดงความคิดเห็นเรียบร้อย',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    .then(()=> location = './info_shop.php') 
              </script>";
    } else {
            echo
                    "<script> 
                        Swal.fire({
                            icon: 'error',
                            title: 'เเสดงความคิดเห็นไม่สำเร็จ', 
                            text: 'โปรดตรวจสอบความถูกต้องของข้อมูล!',
                        })
                      .then(()=> location = './info_shop.php')
                  </script>";
                //  echo "Error: " . $sqlCreateComment . "<br>" . mysqli_error($conn);
    }
}
?>

</html>