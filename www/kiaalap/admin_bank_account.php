<?php 
@session_start();
if(!isset($_SESSION["user_id"])  ){
    header('Location: ./login.php');
    exit;
}
if( $_SESSION["user_role"] !=="ADMIN"){
    header('Location: ./login.php');
    exit;
}
include_once("./configs/connect_db.php");



$sqlTimeSlot="SELECT * FROM `tb_payments` ";
$queryTimeSlot=   mysqli_query($conn, $sqlTimeSlot);



$dateNow=date("Y-m-d");
 $user_id=$_SESSION["user_id"];
 $sqlUser ="SELECT * FROM `tb_barbershop_informations` 
           WHERE id='1';";
 $queryUser=   mysqli_query($conn, $sqlUser);
  $userResult  = mysqli_fetch_assoc($queryUser)


?>

<!doctype html>
<html class="no-js" lang="en">

<head>

    <title>จัดการบัญชีธนาคารของร้านตัดผม</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>

    <?php include_once("./head_fragment.php") ?>
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="css/alerts.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
    <!-- modals CSS
		============================================ -->
    <link rel="stylesheet" href="css/modals.css">
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
        <?php include_once("./header.php") ?>

        <!-- Basic Form Start -->
        <div class="basic-form-area mg-b-15">
            <div class="container-fluid">


                <div id="PrimaryModalalertaa" class="modal modal-edu-general default-popup-PrimaryModal fade"
                    role="dialog">
                    <form action="" method="post">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-close-area modal-close-df">
                                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                </div>
                                <div class="modal-body">
                                    <!-- <i class="educate-icon educate-checked modal-check-pro"></i> -->
                                    <h2 class="text-primary" style="margin-bottom:1rem">เพิ่มบัญชีธนาคาร</h2>
                                    <label for="">ชื่อธนาคาร</label>
                                    <input required type="text" name="payment_bank_name"
                                        placeholder="กสิกร,กรุงไทย,กรุงเทพ" class="form-control" required />
                                    <label for="">ชื่อ-เจ้าของบัญชี</label>
                                    <input required type="text" name="payment_name" placeholder="ชื่อ-สกุล"
                                        class="form-control" required />
                                    <label for="">เลขที่บัญชี</label>
                                    <input required type="text" name="payment_number" placeholder="xxx-xxx-xxx-xxxx"
                                        class="form-control" required />
                                    <input type="hidden" name="add_data" value="add_data">
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-primary" type="submit">เพิ่มบัญชีธนาคาร</button>
                                    <button class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="row">

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">




                        <div class="sparkline12-list mt-5">
                            <div class="sparkline12-hd">

                                <div class="row">
                                    <div class="col-md-12 bg-light text-left">
                                        <div class="main-sparkline12-hd">
                                            <h1>จัดการบัญชีธนาคารของร้านตัดผม</h1>
                                        </div>
                                    </div>
                                    <div class="col-md-12 bg-light text-right mb-5" style="margin-bottom:1rem">
                                        <button data-toggle="modal" data-target="#PrimaryModalalertaa" type="button"
                                            class="btn btn-primary">เพิ่มช่วงเวลา</button>
                                    </div>
                                </div>

                            </div>

                            <div class="sparkline12-graph">
                                <div class="basic-login-form-ad">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="all-form-element-inner">


                                                <ul class="list-group mt-5">

                                                    <?php 
                                                if (mysqli_num_rows($queryTimeSlot) > 0) {
                                                    while($rowTimeSlot = mysqli_fetch_assoc($queryTimeSlot)) {?>
                                                    <li
                                                        class="list-group-item d-flex justify-content-between align-items-center">
                                                        <div class="row justify-content-end">
                                                            <div class="col-md-10">
                                                                <h4 class="card-title text-primary">
                                                                    <?=$rowTimeSlot["payment_bank_name"]?>
                                                                </h4>
                                                                <h5 class="card-title"><?=$rowTimeSlot["payment_name"]?>
                                                                </h5>
                                                                <p><?=$rowTimeSlot["payment_number"]?></p>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <!-- <span class="badge badge-primary badge-pill">1</span> -->
                                                                <button type="button" class="btn btn-warning" title=""
                                                                    data-original-title="เเก้ไข" data-toggle="modal"
                                                                    data-target="#PrimaryModalftblack<?=$rowTimeSlot["id"]?>">เเก้ไข
                                                                </button>


                                                                <a data-toggle="tooltip" title=""
                                                                    href="admin_bank_account.php?deleteR=req&payment_id=<?=$rowTimeSlot["id"]?>"
                                                                    type="button" class="btn btn-danger"
                                                                    data-original-title="ลบ">ลบ
                                                                </a>

                                                                <div id="PrimaryModalftblack<?=$rowTimeSlot["id"]?>"
                                                                    class="
                                                                    modal modal-edu-general default-popup-PrimaryModal
                                                                    fade" role="dialog">
                                                                    <div class="modal-dialog">
                                                                        <form action="" method="post">
                                                                            <div class="modal-content">
                                                                                <div
                                                                                    class="modal-close-area modal-close-df">
                                                                                    <a class="close"
                                                                                        data-dismiss="modal" href="#"><i
                                                                                            class="fa fa-close"></i></a>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <h2 class="text-warning"
                                                                                        style="margin-bottom:1rem">
                                                                                        เเก้ไขบัญชีธนาคาร</h2>

                                                                                    <!-- <i
                                                                                    class="educate-icon educate-checked modal-check-pro"></i> -->

                                                                                    <!-- <i class="educate-icon educate-checked modal-check-pro"></i> -->
                                                                                    <!-- <h2 class="text-primary"
                                                                                        style="margin-bottom:1rem">
                                                                                        เพิ่มบัญชีธนาคาร</h2> -->
                                                                                    <label for="">ชื่อธนาคาร</label>
                                                                                    <input required type="text"
                                                                                        name="payment_bank_name"
                                                                                        value="<?=$rowTimeSlot["payment_bank_name"]?>"
                                                                                        placeholder="กสิกร,กรุงไทย,กรุงเทพ"
                                                                                        class="form-control" required />
                                                                                    <label
                                                                                        for="">ชื่อ-เจ้าของบัญชี</label>
                                                                                    <input required type="text"
                                                                                        name="payment_name"
                                                                                        value="<?=$rowTimeSlot["payment_name"]?>"
                                                                                        placeholder="ชื่อ-สกุล"
                                                                                        class="form-control" required />
                                                                                    <label for="">เลขที่บัญชี</label>
                                                                                    <input required type="text"
                                                                                        name="payment_number"
                                                                                        value="<?=$rowTimeSlot["payment_number"]?>"
                                                                                        placeholder="xxx-xxx-xxx-xxxx"
                                                                                        class="form-control" required />

                                                                                    <input required type="hidden"
                                                                                        name="payment_id"
                                                                                        value="<?=$rowTimeSlot["id"]?>"
                                                                                        class="form-control" required />
                                                                                    <input type="hidden"
                                                                                        name="update_data"
                                                                                        value="update_data">
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button class="btn btn-success"
                                                                                        type="submit">เเก้ไข</button>
                                                                                    <button class="btn btn-danger"
                                                                                        data-dismiss="modal">ยกเลิก</button>
                                                                                    <!-- <a href="#">เเก้ไข</a>
                                                                                    <a data-dismiss="modal"
                                                                                        href="#">ยกเลิก
                                                                                    </a> -->
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>



                                                            </div>
                                                        </div>

                                                    </li>
                                                    <?php     }
                                                }else{
                                                    echo "<h1>ไม่พบข้อมูล</h1>";
                                                }
                                                
                                                ?>

                                                </ul>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Basic Form End-->
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

    <?php include_once("./script_fragment.php") ?>

    <!-- tawk chat JS
		============================================ -->
    <!-- <script src="js/tawk-chat.js"></script> -->





</body>


<?php 
include_once("./configs/connect_db.php");



if(isset($_POST["add_data"])){
    

    $sqlUpdate = "INSERT INTO `tb_payments` (`id`, `payment_name`, `payment_number`, `payment_description`, `payment_image`, `barbershop_information_id`, `payment_bank_name`)
                   VALUES (NULL, '{$_POST["payment_name"]}', '{$_POST["payment_number"]}', '', '', '1', '{$_POST["payment_bank_name"]}');";

    if (mysqli_query($conn, $sqlUpdate)) { 
                   
                    echo "<script> 
                        Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'เพิ่มข้อมูลสำเร็จ',
                                showConfirmButton: false,
                                timer: 1500
                            })
                            .then(()=> location = './admin_bank_account.php')

                    </script>";
                
           }  
           else  
           {  
                echo
                    "<script> 
                        Swal.fire({
                            icon: 'error',
                            title: 'เพิ่มข้อมูลไม่สำเร็จ', 
                            text: 'โปรดตรวจสอบความถูกต้องของข้อมูล!',
                        })
                        //.then(()=> location = './admin_bank_account.php')
                  </script>";
           } 
 
}
 
if(isset($_POST["update_data"])){
    $payment_id=$_POST["payment_id"];

    $sqlUpdate = "UPDATE `tb_payments` SET `payment_name` = '{$_POST["payment_name"]}', 
                  `payment_number` = '{$_POST["payment_number"]}',
                  `payment_bank_name` = '{$_POST["payment_bank_name"]}' 
                  WHERE `tb_payments`.`id` = $payment_id;";

    if (mysqli_query($conn, $sqlUpdate)) { 
                   
                    echo "<script> 
                        Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'เเก้ไขข้อมูล',
                                showConfirmButton: false,
                                timer: 1500
                            }).then(()=> location = './admin_bank_account.php')

                    </script>";
                
           }  
           else  
           {  
                echo
                    "<script> 
                        Swal.fire({
                            icon: 'error',
                            title: 'เเก้ไขข้อมูลไม่สำเร็จ', 
                            text: 'โปรดตรวจสอบความถูกต้องของข้อมูล!',
                        }).then(()=> location = './admin_bank_account.php')
                  </script>";
           } 
 
}



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
                                location = 'admin_bank_account.php?deleteR2=req&payment_id={$_GET["payment_id"]}'
                            }else{
                                location = 'admin_bank_account.php'
                            }
                        }); 
                </script>";
        }

        //เช็อกว่่ามีการส่งค่า Get payment_id หรือไม่ (?payment_id=xxx)
        if (isset($_GET["deleteR2"])) {

            // คำสั่ง sql ในการลบข้อมูล ตาราง tbl_products โดยจะลบข้อมูลสินค้า p_id ที่ส่งมา
            $sql = "DELETE FROM tb_payments WHERE id={$_GET["payment_id"]}";

            if (mysqli_query($conn, $sql)) {
                echo
                    "<script> 
                        Swal.fire(
                            'ลบข้อมูลสำเร็จ!',
                            'ท่านได้ลบข้อมูลเรียบร้อย',
                            'success'
                        ).then(()=> location = 'admin_bank_account.php')
                    </script>";
                //header('Location: admin_bank_account.php');
            } else {
                echo
                    "<script> 
                    Swal.fire({
                        icon: 'error',
                        title: 'ลบข้อมูลไม่สำเร็จ', 
                    }).then(()=> location = 'admin_bank_account.php')
                </script>";
            }
 
        }

?>


</html>