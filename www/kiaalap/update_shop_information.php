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
$dateNow=date("Y-m-d");
include_once("./configs/connect_db.php");
 $user_id=$_SESSION["user_id"];
 $sqlUser ="SELECT * FROM `tb_barbershop_informations` 
           WHERE id='1';";
 $queryUser=   mysqli_query($conn, $sqlUser);
  $userResult  = mysqli_fetch_assoc($queryUser)


?>

<!doctype html>
<html class="no-js" lang="en">

<head>

    <title>เเก้ไขข้อมูลร้านตัดผม</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>

    <?php include_once("./head_fragment.php") ?>
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="css/alerts.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
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
            <!-- <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="logo-pro">
                        <a href="index.html"><img class="main-logo" src="img/profile-informations/profile-informations.png" alt="" /></a>
                    </div>
                </div>
            </div> -->
        </div>
        <?php include_once("./header.php") ?>

        <!-- Basic Form Start -->
        <div class="basic-form-area mg-b-15">
            <div class="container-fluid">



                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline12-list">
                            <div class="sparkline12-hd">
                                <div class="main-sparkline12-hd">
                                    <h1>เเก้ไขข้อมูลร้านตัดผม</h1>
                                </div>
                            </div>
                            <div class="sparkline12-graph">
                                <div class="basic-login-form-ad">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="all-form-element-inner">
                                                <form action="" method="post" enctype="multipart/form-data">

                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label
                                                                    class="login2 pull-right pull-right-pro">ชื่อร้าน</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                <input type="text" name="bi_name"
                                                                    value="<?=$userResult['bi_name']?>"
                                                                    class="form-control" required />
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label
                                                                    class="login2 pull-right pull-right-pro">เบอร์โทรศัพท์ร้าน</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                <input type="text" name="bi_tel"
                                                                    value="<?=$userResult['bi_tel']?>"
                                                                    class="form-control" required />
                                                            </div>
                                                        </div>
                                                    </div>




                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label
                                                                    class="login2 pull-right pull-right-pro">อีเมล</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                <input type="text" name="bi_email"
                                                                    value="<?=$userResult['bi_email']?>"
                                                                    class="form-control" required />
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label
                                                                    class="login2 pull-right pull-right-pro">ไลน์ไอดีร้าน</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                <input type="text" name="bi_line"
                                                                    value="<?=$userResult['bi_line']?>"
                                                                    class="form-control" required />
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="login2 pull-right pull-right-pro">ไลน์
                                                                    token (line notification token)</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                <input type="text" name="bi_line_token"
                                                                    value="<?=$userResult['bi_line_token']?>"
                                                                    class="form-control" required />
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label
                                                                    class="login2 pull-right pull-right-pro">รายละเอียดร้าน</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                <textarea required class="form-control"
                                                                    name="bi_descriptions"
                                                                    rows="5"><?=$userResult['bi_descriptions']?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label
                                                                    class="login2 pull-right pull-right-pro">ชื่อเจ้าของร้าน</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                <input required type="text" name="bi_shop_owner"
                                                                    value="<?=$userResult['bi_shop_owner']?>"
                                                                    class="form-control" required />
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label
                                                                    class="login2 pull-right pull-right-pro">รหัสผ่าน</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                <input type="password" name="password" value=""
                                                                    class="form-control" required />
                                                            </div>
                                                        </div>
                                                    </div> -->



                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label
                                                                    class="login2 pull-right pull-right-pro">รูปโปรไฟล์
                                                                </label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                <input type="file" class="form-control" accept="image/*"
                                                                    name="bi_profile" onchange="loadFile(event)" />
                                                            </div>

                                                        </div>
                                                    </div>


                                                    <input type="hidden" value="update_shop_information"
                                                        name="update_shop_information">
                                                    <div class="form-group-inner">
                                                        <div class="login-btn-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3"></div>
                                                                <div class="col-lg-9">
                                                                    <div
                                                                        class="login-horizental cancel-wp pull-left form-bc-ele">
                                                                        <!-- <button class="btn btn-white"
                                                                            type="submit">Cancel
                                                                        </button> -->
                                                                        <button id="btnSubmit"
                                                                            class="btn btn-sm btn-warning login-submit"
                                                                            type="submit">เเก้ไขข้อมูลร้านตัดผม
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                </form>

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
 
if(isset($_POST["update_shop_information"])){
    // $profile="555555555555";
    $valueBi_profile= $_FILES["bi_profile"]["name"];

     $bi_profile ="";
   
    if($valueBi_profile == null){
       $bi_profile = $userResult['bi_profile'];
    } else{
       $dt_image1_time =  date("Y-m-d h:i:s");
       $bi_profile = uniqid() . $dt_image1_time . $_FILES["bi_profile"]["name"]; 
    }

        //     $path = "./uploads/";
        // move_uploaded_file($_FILES["bi_profile"]["tmp_name"], "$path/$bi_profile");

    $sqlUpdate = "UPDATE `tb_barbershop_informations` 
                  SET  `bi_name`='{$_POST["bi_name"]}',`bi_tel`='{$_POST["bi_tel"]}',`bi_profile`='{$bi_profile}',
                       `bi_email`='{$_POST["bi_email"]}',`bi_line`='{$_POST["bi_line"]}',`bi_descriptions`='{$_POST["bi_descriptions"]}',
                       `bi_shop_owner`='{$_POST["bi_shop_owner"]}',`bi_line_token`='{$_POST["bi_line_token"]}' WHERE id='1';";

    if (mysqli_query($conn, $sqlUpdate)) {

                   if($valueBi_profile !== null){
                        $path = "./img/profile-informations/";
                         move_uploaded_file($_FILES["bi_profile"]["tmp_name"], "$path/$bi_profile");

                        // $file_slip= "./img/profile-informations/{$userResult['bi_profile']}";
                        // $status=unlink($file_slip);  

                         @session_start(); 
                          $_SESSION['username'] = $_POST["username"];  
                          $_SESSION['full_name'] = $_POST["full_name"]    ;
                        $_SESSION['email'] = $_POST["email"];  
                        $_SESSION['bi_profile'] =$bi_profile;  
                        $_SESSION['tel'] =  $_POST["tel"];  

                    }

                    echo "<script> 
                        Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'เเก้ไขข้อมูลร้านตัดผมสำเร็จ',
                                showConfirmButton: false,
                                timer: 1500
                            }).then(()=> location = './update_shop_information.php')

                    </script>";
                
           }  
           else  
           {  
                echo
                    "<script> 
                        Swal.fire({
                            icon: 'error',
                            title: 'เเก้ไขข้อมูลร้านตัดผมไม่สำเร็จ', 
                            text: 'โปรดตรวจสอบความถูกต้องของข้อมูล!',
                        }).then(()=> location = './update_shop_information.php')
                  </script>";
           } 
 
}

?>


</html>