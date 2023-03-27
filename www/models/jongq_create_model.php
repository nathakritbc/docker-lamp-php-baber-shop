<?php 

$acction=null;
if(isset($_POST["acction"])){
    $acction=mysqli_real_escape_string($conn,$_POST["acction"]);
}



$time_slot_id= null;
$jong_date =date("Y-m-d"); 
$jong_time=null;
$jong_slip=null; 
$user_id =0;
$time_slot_time=null;
 
 



switch ($acction) {
    case 'create':
        createJongQ($conn,$jong_date,$time_slot_id,$time_slot_time,$user_id );
        break;

    // case 'remove':
    //     removeJongQ($conn,$jong_id);
    //     break;

    
    default:
        exit();
        break;
}


function createJongQ($conn,$jong_date,$time_slot_id,$user_id,$jong_slip){
 
        $user_id=mysqli_real_escape_string($conn,$_POST["user_id"]);
        $time_slot_id=mysqli_real_escape_string($conn,$_POST["time_slot_id"]);
        $jong_date=mysqli_real_escape_string($conn,$_POST["jong_date"]);
  
        $sqlTimeSlot = "SELECT * FROM `tb_time_slots`   WHERE id='$time_slot_id';";
        $resultTimeSlot = mysqli_query($conn, $sqlTimeSlot);
        $dataTimeSlot=  mysqli_fetch_assoc($resultTimeSlot);  
        $jong_time= $dataTimeSlot["time_slot_time"]; 
        

        // $jong_slip=mysqli_real_escape_string($conn,$_POST["jong_slip"]);
      
 
      
          $dt_image1_time = md5(date("Y-m-d h:i:s"));
          $jong_slip = uniqid() . $dt_image1_time . $_FILES["jong_slip"]["name"]; 

        // $sql = "INSERT INTO `tb_jongs` (`id`, `jong_date`, `jong_time`, `jong_status`, `jong_slip`, `time_slot_id`, `user_id`, `jong_date_time`) 
        //         VALUES (NULL, '$jong_date', '$jong_time', 'PENDING', '$jong_slip', '$time_slot_id', '$user_id',current_timestamp());";  
    
        $sql="INSERT INTO `tb_jongs` (`id`, `jong_date`, `jong_time`, `jong_status`, `jong_slip`, `time_slot_id`, `user_id`, `jong_date_time`)
               VALUES (NULL, '$jong_date', '$jong_time', 'PENDING', '$jong_slip', '$time_slot_id', '$user_id',  current_timestamp());";    
      
      $sqlUpdate = "UPDATE `tb_time_slots` SET `time_slot_status` = '0' 
                      WHERE `tb_time_slots`.`id` = '$time_slot_id';";  
        



        if (mysqli_query($conn, $sql)) {
        // echo "New record created successfully";
        mysqli_query($conn, $sqlUpdate);
        $path = "./uploads/";
        move_uploaded_file($_FILES["jong_slip"]["tmp_name"], "$path/$jong_slip");

        $url = "http://localhost/line-notification.php";

       $sql_select="SELECT * FROM `tb_jongs` ORDER BY id DESC LIMIT 1;";  
       $query_select=mysqli_query($conn, $sql_select);  
       $data_select= mysqli_fetch_assoc($query_select);   
       $data_select_id=$data_select["id"];
       
        
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array('acction' => 'jongq_acction','jongq_id' => $data_select_id),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        echo "<script> 
                Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'บันทึกการจองสำเร็จ',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    .then(()=> location = './jongq_list_user_toDay.php') 
              </script>";
        } else {
              echo
                    "<script> 
                        Swal.fire({
                            icon: 'error',
                            title: 'บันทึกการจองไม่สำเร็จ', 
                            text: 'โปรดตรวจสอบความถูกต้องของข้อมูล!',
                        })
                      .then(()=> location = './jongq_user.php')
                  </script>";
                //  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        mysqli_close($conn);
  
}