<?php
       include_once("./configs/connect_db.php");
       $sql="SELECT * FROM `tb_barbershop_informations` WHERE id=1;";
       $query = mysqli_query($conn,$sql);
       $data = mysqli_fetch_assoc($query);
       
       $token = $data["bi_line_token"];  
       $ip_address = $data["ip_address"];  

    //    $token = "8YXQMYZMXWK0F0GTY15TBNQN4z9nr5h23WVmJ7VA9Cx";  

        $input = json_decode(file_get_contents("php://input"));
        define('LINE_API', "https://notify-api.line.me/api/notify");
        $urlOfficer = $ip_address."/kiaalap/jongq_list_user.php";
        //ไอดีเจ้าหน้าที่ที่จะส่งไปหา 
        $lineMessages = "lineMessages";
        //$token = "od6XlKiHhWvcErGcHz7NiKNwoGUxsuwnxPapYRB6v9n"; //ใส่Token ที่copy เอาไว้
        $str = "{$lineMessages}😍🥰🥰🥰😘😘 ตรวจสอบรายการเเจ้งซ่อม {$urlOfficer}"; //ข้อความที่ต้องการส่ง สูงสุด 1000 ตัวอักษร

        $stickerPkg = 1; //stickerPackageId
        $stickerId = 11; //stickerId

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

        
        notify_message($str, $stickerPkg, $stickerId, $token);
 
        // $input = json_decode(file_get_contents("php://input"));
        // define('LINE_API', "https://notify-api.line.me/api/notify");
        // $urlOfficer = "http://localhost:81/dashboard/repair-system-mbs/repair-system-mbs/RPofficer/newNotification.php";
        // //ไอดีเจ้าหน้าที่ที่จะส่งไปหา 
        // $lineMessages = "lineMessages";
        // //$token = "od6XlKiHhWvcErGcHz7NiKNwoGUxsuwnxPapYRB6v9n"; //ใส่Token ที่copy เอาไว้
        // $str = "{$lineMessages}😍🥰🥰🥰😘😘 ตรวจสอบรายการเเจ้งซ่อม {$urlOfficer}"; //ข้อความที่ต้องการส่ง สูงสุด 1000 ตัวอักษร

        // $stickerPkg = 1; //stickerPackageId
        // $stickerId = 11; //stickerId

        // function notify_message($message, $stickerPkg, $stickerId, $token)
        // {
        //     $queryData = array(
        //         'message' => $message,
        //         'stickerPackageId' => $stickerPkg,
        //         'stickerId' => $stickerId
        //     );
        //     $queryData = http_build_query($queryData, '', '&');
        //     $headerOptions = array(
        //         'http' => array(
        //             'method' => 'POST',
        //             'header' => "Content-Type: application/x-www-form-urlencoded\r\n"
        //                 . "Authorization: Bearer " . $token . "\r\n"
        //                 . "Content-Length: " . strlen($queryData) . "\r\n",
        //             'content' => $queryData
        //         ),
        //     );
        //     $context = stream_context_create($headerOptions);
        //     $result = file_get_contents(LINE_API, FALSE, $context);
        //     $res = json_decode($result);
        //     return $res;
        // }

        
        //  notify_message($str, $stickerPkg, $stickerId, $token);