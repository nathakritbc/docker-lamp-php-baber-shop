<?php 
@session_start();
if(!isset($_SESSION["user_id"])  ){
    header('Location: ./login.php');
    exit;
}
if( $_SESSION["user_role"] !=="USER"){
    header('Location: ./login.php');
    exit;
}
$dateNow=date("Y-m-d");
include_once("./configs/connect_db.php");
 $user_id=$_SESSION["user_id"];
 $sqlUser ="SELECT `id`, `full_name`, `tel`, `username`, `email`, `password`, `profile`, `user_role` FROM `tb_users` 
           WHERE id='$user_id';";
 $queryUser=   mysqli_query($conn, $sqlUser);
  $userResult  = mysqli_fetch_assoc($queryUser)


?>

<!doctype html>
<html class="no-js" lang="en">

<head>

    <title>เเก้ไขข้อมูลผู้ใช้งาน</title>
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



                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline12-list">
                            <div class="sparkline12-hd">
                                <div class="main-sparkline12-hd">
                                    <h1>เเก้ไขข้อมูลผู้ใช้งาน </h1>
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
                                                                    class="login2 pull-right pull-right-pro">ชื่อ</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                <input type="text" name="full_name"
                                                                    value="<?=$userResult['full_name']?>"
                                                                    class="form-control" required />
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label
                                                                    class="login2 pull-right pull-right-pro">เบอร์โทรศัพท์</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                <input type="text" name="tel"
                                                                    value="<?=$userResult['tel']?>" class="form-control"
                                                                    required />
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label
                                                                    class="login2 pull-right pull-right-pro">ชื่อผู้ใช้งาน
                                                                    username</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                <input type="text" name="username"
                                                                    value="<?=$userResult['username']?>"
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
                                                                <input type="text" name="email"
                                                                    value="<?=$userResult['email']?>"
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
                                                                    name="profile" onchange="loadFile(event)" />
                                                            </div>

                                                        </div>
                                                    </div>


                                                    <input type="hidden" value="update_user_prfile"
                                                        name="update_user_prfile">
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
                                                                            type="submit">เเก้ไขข้อมูลผู้ใช้งาน
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