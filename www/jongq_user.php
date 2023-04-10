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


$sqlUser ="SELECT * FROM `tb_users` WHERE id='{$_SESSION['user_id']}';";
$resultUser = mysqli_query($conn, $sqlUser);
$resUser =   mysqli_fetch_assoc($resultUser);

$isUserId=false;

if($resUser["line_user_id"] == "" || $resUser["line_user_id"] == NULL  ){
    $isUserId=false;
}else{
    $isUserId=true;
}



$sqlTimeSlot = "SELECT * FROM tb_time_slots WHERE time_slot_status='1' ORDER BY `tb_time_slots`.`time_slot_description` ASC;";
$resultTimeSlot = mysqli_query($conn, $sqlTimeSlot);

$sqlTimeSlot="SELECT * FROM `tb_payments` ";
$queryTimeSlot=   mysqli_query($conn, $sqlTimeSlot);

?>

<!doctype html>
<html class="no-js" lang="en">

<head>

    <title>จองคิวร้านตัดผม</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>

    <?php include_once("./head_fragment.php") ?>
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="css/alerts.css">
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
                                    <h1>จองคิวตัดผม</h1>
                                </div>
                            </div>
                            <div class="sparkline12-graph">
                                <div class="basic-login-form-ad">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="all-form-element-inner">
                                                <form action="./jongq_user.php" method="post"
                                                    enctype="multipart/form-data">
                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label
                                                                    class="login2 pull-right pull-right-pro">วันที่</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                <input readonly type="date" id="jongq_date"
                                                                    onchange="checkJongQDate()" value="<?=$dateNow;?>"
                                                                    class="form-control" />
                                                                <input type="hidden" name="jong_date"
                                                                    value="<?=$dateNow;?>" class="form-control" />
                                                                <input type="hidden" name="user_id"
                                                                    value="<?=$_SESSION["user_id"];?>"
                                                                    class="form-control" />
                                                                <span id="validateJongQ" style="display: none;"
                                                                    class="help-block small">เลือกวันที่ไม่ถูกต้อง</span>
                                                                <div id="validateAlert" style="display: none;"
                                                                    class="alert alert-danger alert-mg-b alert-st-four"
                                                                    role="alert">
                                                                    <i class="fa fa-times edu-danger-error admin-check-pro admin-check-pro-none"
                                                                        aria-hidden="true"></i>
                                                                    <p class="message-mg-rt message-alert-none">
                                                                        <strong>Oh snap!</strong> Change a few things up
                                                                        and try submitting again.
                                                                    </p>

                                                                </div>

                                                                <!-- <h4 class="login2 pull-left pull-left-pro">
                                                                    เลขที่บัญชีการชำระเงิน</h4> -->

                                                                <ul class="list-group mt-5" style="margin-top:2rem">

                                                                    <?php 
                                                if (mysqli_num_rows($queryTimeSlot) > 0) {
                                                    while($rowTimeSlot = mysqli_fetch_assoc($queryTimeSlot)) {
                                                        ?>
                                                                    <li
                                                                        class="list-group-item d-flex justify-content-between align-items-center">
                                                                        <div class="row justify-content-end">
                                                                            <div class="col-md-3">
                                                                                <img class="rounded float-left img-thumbnail "
                                                                                    src="./uploads/<?=$rowTimeSlot["payment_image"]?>"
                                                                                    alt="Card image cap">
                                                                            </div>

                                                                            <div class="col-md-9">
                                                                                <div style="margin-top:3rem">
                                                                                    <h4 class="card-title text-primary">
                                                                                        <?=$rowTimeSlot["payment_bank_name"]?>
                                                                                    </h4>
                                                                                    <h5 class="card-title"
                                                                                        style="margin-left:2px">
                                                                                        <?=$rowTimeSlot["payment_name"]?>
                                                                                    </h5>
                                                                                    <p><?=$rowTimeSlot["payment_number"]?>
                                                                                    </p>
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

                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label
                                                                    class="login2 pull-right pull-right-pro">เลือกเวลาที่ยังว่าง</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                <?php 
                                                                if(mysqli_num_rows($resultTimeSlot)<=0){?>
                                                                <label id="fullQidNoti"
                                                                    class="login2 pull-left pull-right-pro "><span
                                                                        class="text-danger">คิวเต็ม</span></label>
                                                                <!-- <span class="text-danger">คิวเต็ม</span> -->
                                                                <?php 
                                                                }else{?>
                                                                <div class="form-select-list" id="selectInputId"
                                                                    style="display: block;"
                                                                    onload="selectInputIdFunc('<?=mysqli_num_rows($resultTimeSlot)?>')">
                                                                    <select class="form-control custom-select-value"
                                                                        name="time_slot_id" required>
                                                                        <?php 
                                                                    //    if (mysqli_num_rows($resultTimeSlot) > 0) { 
                                                                            while($rowTimeSlot = mysqli_fetch_assoc($resultTimeSlot)) {
                                                                                // if($rowTimeSlot["time_slot_status"]==1){
                                                                                    ?>
                                                                        <option value="<?=$rowTimeSlot["id"]?>">
                                                                            <?=$rowTimeSlot["time_slot_description"]?>
                                                                        </option>
                                                                        <?php 
                                                                                // }
                                                                            // }
                                                                        }
                                                                       ?>

                                                                    </select>
                                                                </div>
                                                                <?php 
                                                                }
                                                                ?>

                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label
                                                                    class="login2 pull-right pull-right-pro">สลิปการโอนจอง
                                                                </label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                <input required type="file" class="form-control"
                                                                    accept="image/*" name="jong_slip"
                                                                    onchange="loadFile(event)" />
                                                                <label class="login2 pull-left pull-right-pro "><span
                                                                        class="text-danger">ราคาการจองคิวตัดผม 50 บาท
                                                                        ต่อ1
                                                                        ครั้ง</span>
                                                                </label>

                                                            </div>

                                                        </div>
                                                    </div>

                                                    <?php 
                                               if(!$isUserId){?>
                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">

                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                <h4>เเอดไลน์เเละยืนยันตัวตนผ่าน ไลน์บอท
                                                                    เพื่อติดตามเเจ้งเตือนสถานะการจองคิวตัดผม</h4>
                                                                <img src="https://qr-official.line.me/gs/M_127aipgw_GW.png"
                                                                    class="img-thumbnail">

                                                            </div>

                                                        </div>
                                                    </div>
                                                    <?php 
                                                                        }
                                                                        ?>







                                                    <?php  if(mysqli_num_rows($resultTimeSlot)>0){?>
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

                                                                        <?php 
                                                                        if($isUserId){?>
                                                                        <button id="btnSubmit"
                                                                            class="btn btn-sm btn-primary login-submit-cs"
                                                                            type="submit">บันทึกการจองคิวตัดผม
                                                                        </button>
                                                                        <?php 
                                                                        }
                                                                        ?>


                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" value="create" name="acction">
                                                    <?php                                                  
 }
                                                    ?>
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

include_once("./models/jongq_create_model.php");

?>


</html>