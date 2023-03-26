<?php 

        function notify_message($message, $stickerPkg, $stickerId, $token)
        {
            $queryData = array(
                'message' => $message,
                'stickerPackageId' => $stickerPkg,
                'stickerId' => $stickerId
            );
            $queryData = http_build_query($queryData, '', '&');
            $headerOptions = array(
                'http' => array(
                    'method' => 'POST',
                    'header' => "Content-Type: application/x-www-form-urlencoded\r\n"
                        . "Authorization: Bearer " . $token . "\r\n"
                        . "Content-Length: " . strlen($queryData) . "\r\n",
                    'content' => $queryData
                ),
            );
            $context = stream_context_create($headerOptions);
            $result = file_get_contents(LINE_API, FALSE, $context);
            $res = json_decode($result);
            return $res;
        } 

        function jongq($conn,$jongq_id){

            $sql="SELECT * FROM `tb_barbershop_informations` WHERE id=1;";
            $sql_jongq="SELECT * FROM tb_jongs j INNER JOIN tb_users u on u.id=j.user_id 
                        INNER JOIN tb_time_slots ts ON ts.id=j.time_slot_id WHERE j.id='$jongq_id';";

            $query = mysqli_query($conn,$sql);
            $data = mysqli_fetch_assoc($query);

            $query_jongq = mysqli_query($conn,$sql_jongq);
            $data_jongq = mysqli_fetch_assoc($query_jongq);
            
            $token = $data["bi_line_token"];  
            $ip_address = $data["ip_address"]; 

                $input = json_decode(file_get_contents("php://input"));
                define('LINE_API', "https://notify-api.line.me/api/notify");
                $urlOfficer = $ip_address."/jongq_list_user.php";
           
                $lineMessages = "มีรายการจองคิวตัดผม ไอดี ". $jongq_id. " เวลา ".$data_jongq["time_slot_description"];
                //$token = "od6XlKiHhWvcErGcHz7NiKNwoGUxsuwnxPapYRB6v9n"; //ใส่Token ที่copy เอาไว้
                $str = "{$lineMessages} ผู้จอง {$data_jongq["full_name"]} ตรวจสอบรายการจองคิวตัดผม {$urlOfficer}";  

                $stickerPkg = 11537; //stickerPackageId
                $stickerId = 52002768; //stickerId 

                notify_message($str, $stickerPkg, $stickerId, $token);

        }

        function cancel_jongq($conn,$jongq_id){
            $sql="SELECT * FROM `tb_barbershop_informations` WHERE id=1;"; 

            $query = mysqli_query($conn,$sql);
            $data = mysqli_fetch_assoc($query);

           
            
            $token = $data["bi_line_token"];  
            $ip_address = $data["ip_address"]; 

                $input = json_decode(file_get_contents("php://input"));
                define('LINE_API', "https://notify-api.line.me/api/notify");
                $urlOfficer = $ip_address."/jongq_list_user.php";
           
                $lineMessages = "มีการยกเลิกจองคิวตัดผม ไอดี {$jongq_id}"; 
                $str = "{$lineMessages} ตรวจสอบรายการจองคิวตัดผม {$urlOfficer}";  

                $stickerPkg = 11537; //stickerPackageId
                $stickerId = 52002768; //stickerId 

                notify_message($str, $stickerPkg, $stickerId, $token);

        }
        
        include_once("./configs/connect_db.php");
        

        $acction="";
        $jongq_id=0;
        if(isset($_POST["acction"])){
             $acction=$_POST["acction"];
        } 
        
        switch ($acction) {
            case 'jongq_acction':
                $jongq_id=$_POST["jongq_id"];
                jongq($conn,$jongq_id);
                break;
            
            case 'cancel_jongq_acction':
                $jongq_id=$_POST["jongq_id"];
                cancel_jongq($conn,$jongq_id);
                break;
            
            default:
                $acction="";
                break;
        }



        
         


  