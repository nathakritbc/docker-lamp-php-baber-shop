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
 

$dd=null;
$isDateNow=true;



include_once("./configs/connect_db.php");
$sqlJongQLists = "SELECT ts.time_slot_description,jn.time_slot_id, jn.id,jn.jong_date,jn.jong_time,jn.jong_status,jn.jong_slip,jn.user_id,u.full_name,u.username 
                  FROM tb_jongs jn INNER JOIN tb_users u ON jn.user_id = u.id  INNER JOIN tb_time_slots ts ON jn.time_slot_id = ts.id
                  ORDER BY jn.jong_date_time  ASC;";

if(isset($_GET["findDate"])){
$dd=$_GET["findDate"];
$isDateNow=false;

$sqlJongQLists = "SELECT ts.time_slot_description,jn.time_slot_id, jn.id,jn.jong_date,jn.jong_time,jn.jong_status,jn.jong_slip,jn.user_id,u.full_name,u.username 
                  FROM tb_jongs jn INNER JOIN tb_users u ON jn.user_id = u.id  INNER JOIN tb_time_slots ts ON jn.time_slot_id = ts.id
                 WHERE jn.jong_date='$dd' ORDER BY jn.jong_date_time ASC;";
}

$resultJongQLists = mysqli_query($conn, $sqlJongQLists);

$IS_PROCEED_SQL="SELECT jong_status FROM `tb_jongs` WHERE jong_status='PROCEED';";
$IS_PROCEED_SQL_RES = mysqli_query($conn, $IS_PROCEED_SQL); 
$IS_PROCEED_COUNT =mysqli_num_rows($IS_PROCEED_SQL_RES) ;


function updateJongQ($conn,$jong_status,$status,$jongq_id,$time_slot_id){
    if($jong_status=="PENDING" || $jong_status=="CONFIRM" || $jong_status=="PROCEED"){
        $sql="UPDATE `tb_jongs` SET `jong_status` = '$status' WHERE `tb_jongs`.`id` = '$jongq_id';";
        $sql_time_slot_id="UPDATE `tb_time_slots` SET `time_slot_status` = '1' WHERE `tb_time_slots`.`id` = '$time_slot_id';";

        $query=mysqli_query($conn,$sql);
        $query_time_slot_id=mysqli_query($conn,$sql_time_slot_id);

    } 
}


function updateNum($conn,$jong_date,$jongq_id){ 
    $ddNnow=date("Y-m-d");
    if($jong_date !=  $ddNnow){
        $sql="UPDATE `tb_jongs` SET `num` = '0' WHERE `tb_jongs`.`id` = '$jongq_id';";
        $query=mysqli_query($conn,$sql); 
    }
}


function checkUpdatePROCEED($conn,$jongq_id){  

    // if($jong_date !=  date("Y-m-d")){
    //     $sql="UPDATE `tb_jongs` SET `num` = '0' WHERE `tb_jongs`.`id` = '$jongq_id';";
    
    $res=0;
    $dddNow=date('Y-m-d');
    $sql="SELECT id,jong_date_time_confirm ,num,jong_date,jong_date_time FROM `tb_jongs` 
          WHERE jong_date_time_confirm IS NOT NULL AND jong_date='$dddNow' 
          AND jong_status='CONFIRM'
          ORDER BY jong_date_time_confirm ASC LIMIT 1;";; 
 
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) { 
        $row = mysqli_fetch_assoc($result) ;
        if($row["id"]==$jongq_id){
           $res=1;
       } else{
           $res=0;  
       } 
    }else{
        $res= 0;
    }

    return $res;
}


  $ddNow=date("Y-m-d");

$sql="SELECT `id`, `jong_date`, `jong_time`, `jong_status`, `jong_slip`, `time_slot_id`, `user_id`, `jong_date_time`, `jong_date_time_confirm` FROM `tb_jongs` 
      WHERE jong_status !='CANCEL' AND jong_status !='PENDING' AND jong_status !='TIME_OUT' AND jong_date='$ddNow' ;";
      

$result =mysqli_query($conn, $sql);
$result_num =mysqli_num_rows( $result);

  $sql_current="SELECT id,jong_status,num,jong_date,jong_date_time_confirm FROM `tb_jongs` WHERE jong_status='PROCEED';";
  $res_current = mysqli_query($conn, $sql_current);

  $data_current=mysqli_fetch_assoc($res_current);


    function getQ($conn){ 
        $sql="SELECT * FROM `tb_jongs` WHERE jong_status='CONFIRM' ORDER BY `tb_jongs`.`jong_date_time_confirm` DESC LIMIT 1;";
        $query=mysqli_query($conn,$sql);  
        $data_current=mysqli_fetch_assoc($query); 
        return $data_current["num"];
    }

   function getQ_SUCCESS($conn){ 
        $sql="SELECT * FROM `tb_jongs` WHERE jong_status='SUCCESS' ORDER BY `tb_jongs`.`jong_date_time_confirm` DESC LIMIT 1;";
        $query=mysqli_query($conn,$sql);  
        $data_current=mysqli_fetch_assoc($query); 
        return $data_current["num"];
    }


?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>รายการจองคิวตัดผม</title>
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
    <!-- modals CSS
		============================================ -->
    <link rel="stylesheet" href="css/modals.css">
</head>

<body>
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
    <!-- Start Left menu area -->
    <?php include_once("./sidebar.php");?>
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
        <!-- Static Table Start -->
        <div class="data-table-area mg-b-15">
            <div class="container-fluid">

                <?php if($isDateNow){?>
                <div class="row" style="margin-top:2rem;margin-bottom:2rem;">

                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="hpanel shadow-inner hbggreen bg-1 responsive-mg-b-30">
                            <div class="panel-body">
                                <div class="text-center content-bg-pro">
                                    <h3>ลำดับคิวทั้งหมด</h3>
                                    <p class="text-big font-light">
                                        <?=$result_num?>
                                    </p>
                                    <!-- <small>
                                        Lorem Ipsum passages and more recently with desktop published software.
                                    </small> -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div
                            class="hpanel shadow-inner hbgyellow bg-3 responsive-mg-b-30 res-tablet-mg-t-30 dk-res-t-pro-30">
                            <div class="panel-body">
                                <div class="text-center content-bg-pro">
                                    <h3>ลำดับคิวปัจจุบัน</h3>
                                    <p class="text-big font-light">
                                        <?php 
                                        if($data_current["num"] != '' || $data_current["num"] != NULL){
                                         echo   $data_current["num"];
                                        }else{
                                             if(getQ($conn) != '' || getQ($conn) != NULL){
                                                 echo   getQ($conn);
                                              }else{
                                                if( getQ_SUCCESS($conn)){ 
                                                     echo   getQ_SUCCESS($conn);
                                                }else{
                                                  echo 0;
                                                }
                                                
                                              } 
                                        }
                                        ?>
                                    </p>
                                    <!-- <small>
                                        Lorem Ipsum passages and more recently with desktop published software.
                                    </small> -->
                                </div>
                            </div>
                        </div>
                    </div>



                </div>
                <?php }?>

                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1>รายการจองคิวตัดผม</h1>
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
                                                <th data-field="task">ผู้จอง</th>
                                                <th data-field="action">ดำเนินการ</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php 
                                        if(mysqli_num_rows($resultJongQLists)>0){ 
                                            while($rowJongQ=mysqli_fetch_assoc($resultJongQLists)){
                                                 updateNum($conn,$rowJongQ["jong_date"],$rowJongQ["id"]);
                                                
                                                if($rowJongQ["jong_date"] != date("Y-m-d")){
                                                 updateJongQ($conn,$rowJongQ["jong_status"],"TIME_OUT",$rowJongQ["id"],$rowJongQ["time_slot_id"]); 
                                                }

                                                ?>
                                            <tr>
                                                <td></td>
                                                <td><?=$rowJongQ["id"]?></td>
                                                <td><?=$rowJongQ["jong_date"]?></td>
                                                <td><?=$rowJongQ["jong_time"]?></td>
                                                <td><?=$rowJongQ["full_name"]?></td>
                                                <td>

                                                    <?php    
                                                if($rowJongQ["jong_status"]=="PENDING"){?>
                                                    <div class="alert alert-warning" role="alert">
                                                        <strong>รอการยืนยัน!</strong>
                                                    </div>
                                                    <?PHP 
                                                   }   elseif($rowJongQ["jong_status"]=="TIME_OUT"){?>
                                                    <div class="alert "
                                                        style="color:white;background-color:#EB0EBF;border-color: ##DB0BEA;"
                                                        role="alert">
                                                        <strong>คำขอหมดอายุ!</strong>
                                                    </div>
                                                    <?php
                                                    } 
                                                   elseif($rowJongQ["jong_status"]=="CONFIRM"){?>
                                                    <div class="alert alert-success" role="alert">
                                                        <strong>ยืนยันการจองเรียบร้อย!</strong>
                                                    </div>
                                                    <?php
                                                    } elseif($rowJongQ["jong_status"]=="PROCEED"){?>
                                                    <div class="alert alert-info" role="alert">
                                                        <strong>กำลังเริ่มตัดผม!</strong>
                                                    </div>
                                                    <?php
                                                    }  elseif($rowJongQ["jong_status"]=="CANCEL"){?>
                                                    <div class="alert alert-danger" role="alert">
                                                        <strong>ไม่รับการจอง!</strong>
                                                    </div>
                                                    <?php
                                                    }  elseif($rowJongQ["jong_status"]=="SUCCESS"){?>
                                                    <div class="alert"
                                                        style="color:white;background-color:#0EEB80;border-color: ##0BEA7E;"
                                                        role="alert">
                                                        <strong>ตัดผมเสร็จเรียบร้อย!</strong>
                                                    </div>
                                                    <?php 
                                                    }else{?>
                                                    <div class="alert alert-danger" role="alert">
                                                        <strong>ยกเลิกการจอง!</strong>
                                                    </div>
                                                    <?php  }
                                                   ?>
                                                </td>
                                                <td class="datatable-ct">

                                                    <a type="button" href="#" data-toggle="modal"
                                                        data-target="#PrimaryModalftblack_<?=$rowJongQ["id"]?>"
                                                        style="color:white"
                                                        class="btn btn-sm btn-primary"><strong>ดูข้อมูลการจอง
                                                        </strong>
                                                    </a>



                                                    <div id="PrimaryModalftblack_<?=$rowJongQ["id"]?>"
                                                        class="modal modal-edu-general default-popup-PrimaryModal fade"
                                                        role="dialog">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-close-area modal-close-df">
                                                                    <a class="close" data-dismiss="modal" href="#"><i
                                                                            class="fa fa-close"></i></a>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="card" style="">
                                                                        <img class="card-img-top"
                                                                            src="./uploads/<?=$rowJongQ["jong_slip"]?>"
                                                                            alt="Card image cap">
                                                                        <div class="card-body">
                                                                            <h5 class="card-title"
                                                                                style="margin-top:2rem">ชื่อผู้จอง :
                                                                                <?=$rowJongQ["full_name"]?></h5>
                                                                            <h6>วันที่จอง : <?=$rowJongQ["jong_date"]?>
                                                                            </h6>
                                                                            <p class="card-text">ช่วงเวลาการจอง :
                                                                                <?=$rowJongQ["time_slot_description"]?>
                                                                            </p>
                                                                            <!-- <a href="#" class="btn btn-primary">Go
                                                                                somewhere
                                                                            </a> -->
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <!-- <a href="#">Process</a> -->
                                                                    <a data-dismiss="modal" href="#">ปิด</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <!-- <i class="fa fa-check"></i>  -->


                                                    <?php
                                                    }
                                                   ?>
                                                </td>
                                            </tr>

                                            <?php
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
    window.location = `./jongq_list_admin.php?findDate=${findDateInput}`
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
                                location = 'jongq_list_admin.php?deleteR2=req&jong_id={$_GET["jong_id"]}&time_slot_id={$_GET["time_slot_id"]}&jong_slip={$_GET["jong_slip"]}'
                            }else{
                                location = 'jongq_list_admin.php'
                            }
                        }); 
                </script>";
        }
 
        if (isset($_GET["deleteR2"])) { 
            
            $sql = "DELETE FROM tb_jongs WHERE  jong_status='PENDING' AND id={$_GET["jong_id"]};"; 
            // $sqlCheckStatus = "SELECT jong_status,user_id FROM tb_jongs WHERE jong_status='PENDING' AND user_id='$user_id';"; 
            // $resultCheckStatus  = mysqli_query($conn, $sqlCheckStatus);

            // if (mysqli_num_rows($resultCheckStatus) == 0) {
            //         echo
            //         "<script> 
            //             Swal.fire({
            //                 icon: 'error',
            //                 title: 'ทางร้านได้ยืนยันการจองเเล้ว', 
            //             }).then(()=> location = 'jongq_list_admin.php')
            //         </script>";
            //     //header('Location: jongq_list_admin.php'); 
            // }else{
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
                        ).then(()=> location = 'jongq_list_admin.php')
                    </script>";
                //header('Location: jongq_list_admin.php');
            } else {
                echo
                    "<script> 
                    Swal.fire({
                        icon: 'error',
                        title: 'ลบข้อมูลไม่สำเร็จ', 
                    }).then(()=> location = 'jongq_list_admin.php')
                </script>";
            }
            // }
 

          
        }
                if (isset($_GET["confirmR"] )) {
                echo
                    "<script> 
                        Swal.fire({
                            icon: 'warning',
                            title: 'ยืนยันการจอง?',
                            text: 'ท่านเเน่ใจว่า ท่านต้องยืนยันการจองคิวตัดผม!',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'ใช่',
                            cancelButtonText: 'ไม่!'
                        })
                        .then((result) => {
                            if (result.isConfirmed) {
                                location = 'jongq_list_admin.php?confirmR2=req&jong_id={$_GET["jong_id"]}'
                            }else{
                                location = 'jongq_list_admin.php'
                            }
                        }); 
                </script>";
        }

         if (isset($_GET["confirmR2"])) { 
            $jong_id=$_GET["jong_id"];

            $dddNow=date('Y-m-d');
            $SQL_CONFIRM="SELECT id,jong_date_time_confirm ,num,jong_date,jong_date_time FROM `tb_jongs` 
                         WHERE jong_date_time_confirm IS NOT NULL AND jong_date='$dddNow' ORDER BY jong_date_time_confirm ASC LIMIT 1;";
              
            $IS_CONFIRM_SQL_RES = mysqli_query($conn, $SQL_CONFIRM);  

            $num =1;

            if (mysqli_num_rows($IS_CONFIRM_SQL_RES) == 0) {  
               $UpdateStatus = "UPDATE `tb_jongs` SET `jong_status` = 'CONFIRM',jong_date_time_confirm=current_timestamp(),
                              num='1' WHERE `tb_jongs`.`id` = '$jong_id';"; 
            }  else{
                $data_CONFIRM = mysqli_fetch_assoc($IS_CONFIRM_SQL_RES);
                $num = intval($data_CONFIRM["num"])+1; 
                $UpdateStatus = "UPDATE `tb_jongs` SET `jong_status` = 'CONFIRM',jong_date_time_confirm=current_timestamp(),
                              num='$num' WHERE `tb_jongs`.`id` = '$jong_id';"; 
            }
 
 
 

            if (mysqli_query($conn, $UpdateStatus)) {  
                echo
                    "<script> 
                        Swal.fire(
                            'ยืนยันการจองสำเร็จ!',
                            'ท่านได้ยืนยันการจองคิวตัดผมเรียบร้อยเรียบร้อย',
                            'success'
                        ).then(()=> location = 'jongq_list_admin.php')
                    </script>"; 
            } else {
                echo
                    "<script> 
                    Swal.fire({
                        icon: 'error',
                        title: 'ยืนยันการจองไม่สำเร็จ', 
                    })
                    //.then(()=> location = 'jongq_list_admin.php')
                </script>";
                 echo "Error: " . $SQL_CONFIRM . "<br>" . mysqli_error($conn);
            }
            // }
 

          
        }


          if (isset($_GET["proceedR"] )) {
                echo
                    "<script> 
                        Swal.fire({
                            icon: 'warning',
                            title: 'เปลี่ยนสถานะเป็นเริ่มตัดผม?',
                            text: 'ท่านเเน่ใจว่า ท่านต้องเปลี่ยนสถานะเป็นเริ่มตัดผม!',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'ใช่',
                            cancelButtonText: 'ไม่!'
                        })
                        .then((result) => {
                            if (result.isConfirmed) {
                                location = 'jongq_list_admin.php?proceedR2=req&jong_id={$_GET["jong_id"]}'
                            }else{
                                location = 'jongq_list_admin.php'
                            }
                        }); 
                </script>";
        }

         if (isset($_GET["proceedR2"])) { 
            $jong_id=$_GET["jong_id"];
            $UpdateStatus = "UPDATE `tb_jongs` SET `jong_status` = 'PROCEED' WHERE `tb_jongs`.`id` = '$jong_id';"; 
 

            if (mysqli_query($conn, $UpdateStatus)) {  
                echo
                    "<script> 
                        Swal.fire(
                            'เปลี่ยนสถานะเป็นเริ่มตัดผมสำเร็จ!',
                            'ท่านได้เปลี่ยนสถานะเป็นเริ่มตัดผมคิวเรียบร้อย',
                            'success'
                        ).then(()=> location = 'jongq_list_admin.php')
                    </script>"; 
            } else {
                echo
                    "<script> 
                    Swal.fire({
                        icon: 'error',
                        title: 'เปลี่ยนสถานะเป็นเริ่มตัดผมไม่สำเร็จ', 
                    }).then(()=> location = 'jongq_list_admin.php')
                </script>";
            }  
        }

        if (isset($_GET["successR"] )) {
                echo
                    "<script> 
                        Swal.fire({
                            icon: 'warning',
                            title: 'เปลี่ยนสถานะเป็นตัดผมเสร็จเรียบร้อย?',
                            text: 'ท่านเเน่ใจว่า ท่านต้องเปลี่ยนสถานะเป็นตัดผมเสร็จเรียบร้อย!',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'ใช่',
                            cancelButtonText: 'ไม่!'
                        })
                        .then((result) => {
                            if (result.isConfirmed) {
                                location = 'jongq_list_admin.php?successR2=req&jong_id={$_GET["jong_id"]}'
                            }else{
                                location = 'jongq_list_admin.php'
                            }
                        }); 
                </script>";
        }

         if (isset($_GET["successR2"])) { 
            $jong_id=$_GET["jong_id"];
            $UpdateStatus = "UPDATE `tb_jongs` SET `jong_status` = 'SUCCESS' WHERE `tb_jongs`.`id` = '$jong_id';"; 
 

            if (mysqli_query($conn, $UpdateStatus)) {  
                echo
                    "<script> 
                        Swal.fire(
                            'เปลี่ยนสถานะเป็นเริ่มตัดผมสำเร็จ!',
                            'ท่านได้เปลี่ยนสถานะเป็นเริ่มตัดผมคิวเรียบร้อย',
                            'success'
                        ).then(()=> location = 'jongq_list_admin.php')
                    </script>"; 
            } else {
                echo
                    "<script> 
                    Swal.fire({
                        icon: 'error',
                        title: 'เปลี่ยนสถานะเป็นเริ่มตัดผมเสร็จเเล้วไม่สำเร็จ', 
                    }).then(()=> location = 'jongq_list_admin.php')
                </script>";
            }  
        }



          if (isset($_GET["cancelR"] )) {
                echo
                    "<script> 
                        Swal.fire({
                            icon: 'warning',
                            title: 'เปลี่ยนสถานะเป็นเริ่มตัดผม?',
                            text: 'ท่านเเน่ใจว่า ท่านต้องเปลี่ยนสถานะเป็นเริ่มตัดผม!',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'ใช่',
                            cancelButtonText: 'ไม่!'
                        })
                        .then((result) => {
                            if (result.isConfirmed) {
                                location = 'jongq_list_admin.php?cancelR2=req&jong_id={$_GET["jong_id"]}'
                            }else{
                                location = 'jongq_list_admin.php'
                            }
                        }); 
                </script>";
        }

         if (isset($_GET["cancelR2"])) { 
            $jong_id=$_GET["jong_id"];
            $UpdateStatus = "UPDATE `tb_jongs` SET `jong_status` = 'CANCEL' WHERE `tb_jongs`.`id` = '$jong_id';"; 
 

            if (mysqli_query($conn, $UpdateStatus)) {  
                echo
                    "<script> 
                        Swal.fire(
                            'เปลี่ยนสถานะเป็นเริ่มตัดผมสำเร็จ!',
                            'ท่านได้เปลี่ยนสถานะเป็นเริ่มตัดผมคิวเรียบร้อย',
                            'success'
                        ).then(()=> location = 'jongq_list_admin.php')
                    </script>"; 
            } else {
                echo
                    "<script> 
                    Swal.fire({
                        icon: 'error',
                        title: 'เปลี่ยนสถานะเป็นเริ่มตัดผมไม่สำเร็จ', 
                    }).then(()=> location = 'jongq_list_admin.php')
                </script>";
            }  
        }


        ?>

</html>