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

        // function send_notify_flex_message($message, $stickerPkg, $stickerId, $token)
        // {
        //      $access_token = '5f94aa7d07113a7d65f5734f2bd82ee8';
        //      $httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
        //     $bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '<channel secret>']);

        //     $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello');
        //     $response = $bot->replyMessage('<replyToken>', $textMessageBuilder);

        //     echo $response->getHTTPStatus() . ' ' . $response->getRawBody();
        // }

        function jongq($conn,$jongq_id){

            $sql="SELECT * FROM `tb_barbershop_informations` WHERE id=1;";
            $query = mysqli_query($conn,$sql);
            $data = mysqli_fetch_assoc($query);
            
            $token = $data["bi_line_token"];  
            $ip_address = $data["ip_address"]; 

                $input = json_decode(file_get_contents("php://input"));
                define('LINE_API', "https://notify-api.line.me/api/notify");
                $urlOfficer = $ip_address."/kiaalap/jongq_list_user.php";
           
                $lineMessages = "lineMessages";
                //$token = "od6XlKiHhWvcErGcHz7NiKNwoGUxsuwnxPapYRB6v9n"; //ใส่Token ที่copy เอาไว้
                $str = "{$lineMessages}😍🥰🥰🥰😘😘 ตรวจสอบรายการเเจ้งซ่อม {$urlOfficer}"; //ข้อความที่ต้องการส่ง สูงสุด 1000 ตัวอักษร

                $stickerPkg = 11537; //stickerPackageId
                $stickerId = 52002768; //stickerId


        }


        $acction="";
        if(isset($_POST["acction"])){
             $acction=$_POST["acction"];
        }
        

        switch ($acction) {
            case 'jongq_acction':
                # code...
                break;
            
            case 'cancel_jongq_acction':
                # code...
                break;
            
            default:
                $acction="";
                break;
        }



        
         


  