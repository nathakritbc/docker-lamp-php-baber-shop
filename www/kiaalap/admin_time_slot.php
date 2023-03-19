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



$sqlTimeSlot="SELECT * FROM `tb_time_slots` ORDER BY `tb_time_slots`.`time_slot_time` ASC";
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

    <title>จัดการช่วงเวลาจองคิวตัดผม</title>
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



                <div id="addTimeSlotModal"
                    class="modal modal-edu-general default-popup-PrimaryModal PrimaryModal-bgcolor fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-close-area modal-close-df">
                                <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                            </div>
                            <div class="modal-body">
                                <i class="educate-icon educate-checked modal-check-pro"></i>
                                <h2>เพิ่มช่วงเวลา!</h2>
                                <p>The Modal plugin is a dialog
                                    box/popup window
                                    that is displayed on top of the
                                    current page</p>
                            </div>
                            <div class="modal-footer footer-modal-admin">
                                <a data-dismiss="modal" href="#">Cancel</a>
                                <a href="#">Process</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">




                        <div class="sparkline12-list mt-5">
                            <div class="sparkline12-hd">

                                <div class="row">
                                    <div class="col-md-12 bg-light text-left">
                                        <div class="main-sparkline12-hd">
                                            <h1>จัดการช่วงเวลาจองคิวตัดผม</h1>
                                        </div>
                                    </div>
                                    <div class="col-md-12 bg-light text-right mb-5" style="margin-bottom:1rem">
                                        <button data-toggle="modal" data-target="#addTimeSlotModal" type="button"
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
                                                                <?=$rowTimeSlot["time_slot_description"]?>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <!-- <span class="badge badge-primary badge-pill">1</span> -->
                                                                <button title="" class="pd-setting-ed"
                                                                    data-original-title="เเก้ไข" data-toggle="modal"
                                                                    data-target="#PrimaryModalftblack">
                                                                    <i class="fa fa-pencil-square-o float-left"
                                                                        aria-hidden="true">
                                                                    </i>
                                                                </button>
                                                                <button data-toggle="tooltip" title=""
                                                                    class="pd-setting-ed" data-original-title="ลบ"><i
                                                                        class="fa fa-trash-o" aria-hidden="true"></i>
                                                                </button>



                                                                <div id="PrimaryModalftblack"
                                                                    class="modal modal-edu-general default-popup-PrimaryModal PrimaryModal-bgcolor fade"
                                                                    role="dialog">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div
                                                                                class="modal-close-area modal-close-df">
                                                                                <a class="close" data-dismiss="modal"
                                                                                    href="#"><i
                                                                                        class="fa fa-close"></i></a>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <i
                                                                                    class="educate-icon educate-checked modal-check-pro"></i>
                                                                                <h2>Awesome!</h2>
                                                                                <p>The Modal plugin is a dialog
                                                                                    box/popup window
                                                                                    that is displayed on top of the
                                                                                    current page</p>
                                                                            </div>
                                                                            <div
                                                                                class="modal-footer footer-modal-admin">
                                                                                <a data-dismiss="modal"
                                                                                    href="#">Cancel</a>
                                                                                <a href="#">Process</a>
                                                                            </div>
                                                                        </div>
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

    <script>
    function selectInputIdFunc(resultTimeSlotNum) {
        document.getElementById('selectInputId').style.display = "none";
        console.log('resultTimeSlotNum', resultTimeSlotNum);
        document.getElementById('fullQidNoti').style.display = "block";
    }


    let time_slot_id = 0;

    function selectTimeSlot(time_slot_id) {
        // console.log('selectTimeSlot', time_slot_id);
        if (time_slot_id !== 0) {
            document.getElementById('btnSubmit').style.display = "block";
        }
    }


    let loadFile = function(event) {
        let output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
        }
    };


    function checkJongQDate() {
        const dateNow = `<?=$dateNow;?>`
        let jongqDate = document.getElementById("jongq_date").value
        let isBrfore = moment(jongqDate).isBefore(dateNow);
        // console.log('dateNow', dateNow);
        // console.log('jongqDate', jongqDate);
        // console.log('isBrfore', isBrfore); 

        let element = document.getElementById("validateJongQ");
        let validateAlert = document.getElementById("validateAlert");
        element.style.display = "block";
        validateAlert.style.display = "block";

        // console.log('element.style.display', element.style.display);
        if (isBrfore) {
            element.classList.add("text-danger");
            element.style.display = "block";

            validateAlert.classList.add("text-danger");
            validateAlert.style.display = "block";

            document.getElementById("readonlyId").readOnly = true;
            document.getElementById("readonlyId").value = null

        } else {
            element.style.display = "none";
            validateAlert.style.display = "none";

            document.getElementById("readonlyId").readOnly = false;
            // document.getElementById("readonlyId").value = null



        }
    }

    function validate() {

    }
    </script>



</body>


<?php 
include_once("./configs/connect_db.php");
 
if(isset($_POST["update_user_prfile"])){
    // $profile="555555555555";
    $valueProfile= $_FILES["profile"]["name"];

     $profile ="";
   
    if($valueProfile == null){
       $profile = $userResult['profile'];
    } else{
       $dt_image1_time =  date("Y-m-d h:i:s");
       $profile = uniqid() . $dt_image1_time . $_FILES["profile"]["name"]; 
    }

        //     $path = "./uploads/";
        // move_uploaded_file($_FILES["profile"]["tmp_name"], "$path/$profile");

    $sqlUpdate = "UPDATE `tb_users` SET  `full_name`='{$_POST["full_name"]}' ,`tel`='{$_POST["tel"]}' ,
                  `username`='{$_POST["username"]}' , `email`='{$_POST["email"]}'  ,`profile`='$profile' 
                   WHERE id='$user_id';";

    if (mysqli_query($conn, $sqlUpdate)) {

                   if($valueProfile !== null){
                        $path = "./img/user/";
                         move_uploaded_file($_FILES["profile"]["tmp_name"], "$path/$profile");

                        // $file_slip= "./img/user/{$userResult['profile']}";
                        // $status=unlink($file_slip);  

                         @session_start(); 
                          $_SESSION['username'] = $_POST["username"];  
                          $_SESSION['full_name'] = $_POST["full_name"]    ;
                        $_SESSION['email'] = $_POST["email"];  
                        $_SESSION['profile'] =$profile;  
                        $_SESSION['tel'] =  $_POST["tel"];  

                    }

                    echo "<script> 
                        Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'เเก้ไขข้อมูลผู้ใช้สำเร็จ',
                                showConfirmButton: false,
                                timer: 1500
                            }).then(()=> location = './update_user_profile.php')

                    </script>";
                
           }  
           else  
           {  
                echo
                    "<script> 
                        Swal.fire({
                            icon: 'error',
                            title: 'เเก้ไขข้อมูลผู้ใช้สำเร็จไม่สำเร็จ', 
                            text: 'โปรดตรวจสอบความถูกต้องของข้อมูล!',
                        }).then(()=> location = './update_user_profile.php')
                  </script>";
           } 
 
}

?>


</html>