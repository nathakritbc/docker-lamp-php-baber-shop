<?php

include_once("./configs/connect_db.php");
        $sqlShop ="SELECT * FROM tb_barbershop_informations  WHERE id='1';";
        $queryShop = mysqli_query($conn,$sqlShop);
        $resShop = mysqli_fetch_assoc($queryShop);
        $access_token = $resShop["bi_channel_access_token_line"];
        $urlHttps = $resShop["ip_address"];

// $access_token = 'VmIYbkUHUpFbORI9lRPOkpU439DLzjpYu//6MM34iRH9i01/fNtrZPQxnFQQgsdUNvAR+IcTrQ8w1uT1eCdI3NA2DT4CRn/CBt2bt8NqkjbIn1cfzv1xcqRpTuQYt3Afzur+IuplzrvoDilEE8Ik9wdB04t89/1O/w1cDnyilFU=';
 
// $login_user_id_db=null;
// if(isset($_GET["login_user_id_db"])){
//     $login_user_id_db=$_GET["login_user_id_db"];
// }

// read incoming message data
$inputData = file_get_contents('php://input');
$messageData = json_decode($inputData, true);

 file_put_contents('log.txt', file_get_contents('php://input') . PHP_EOL, FILE_APPEND);

// retrieve user ID and message text
$userId = $messageData['events'][0]['source']['userId'];
$messageText = $messageData['events'][0]['message']['text'];
 

 

$url = 'https://api.line.me/v2/bot/message/push';

$headers = array(
    'Content-Type: application/json',
    'Authorization: Bearer ' . $access_token
);

$data = array(
    'to' => $userId,
    'messages' => array(
        array(
            'type' => 'text',
            'text' => 'ลงทะเบียนไลน์ Bot เพื่อรับเเจ้งเตือนผ่าน  Line:',
        ),
        array(
            'type' => 'text',
            'text' => $urlHttps."?userId=".$userId,
            
        ),
    ),
);

$options = array(
    'http' => array(
        'method' => 'POST',
        'header' => implode("\r\n", $headers),
        'content' => json_encode($data),
    ),
);

$context = stream_context_create($options);
$result = file_get_contents($url, false, $context);

echo $result;



if (strtolower($messageText) == 'จองคิวตัดผม') {

  
$flexMessage = '{
    "type": "template",
    "altText": "This is a Carousel Template",
    "template": {
        "type": "carousel",
        "columns": [
            {
                "thumbnailImageUrl": "https://example.com/image1.jpg",
                "title": "Carousel 1",
                "text": "This is a carousel template with one column",
                "actions": [
                    {
                        "type": "message",
                        "label": "Action 1",
                        "text": "Action 1 clicked"
                    },
                    {
                        "type": "message",
                        "label": "Action 2",
                        "text": "Action 2 clicked"
                    }
                ]
            },
            {
                "thumbnailImageUrl": "https://example.com/image2.jpg",
                "title": "Carousel 2",
                "text": "This is a carousel template with two columns",
                "actions": [
                    {
                        "type": "message",
                        "label": "Action 3",
                        "text": "Action 3 clicked"
                    },
                    {
                        "type": "message",
                        "label": "Action 4",
                        "text": "Action 4 clicked"
                    }
                ]
            }
        ]
    }
}';

// send a response back to the user
$responseData = array(
    'replyToken' => $messageData['events'][0]['replyToken'],
    'messages'   => array(json_decode($flexMessage))
);

$ch = curl_init('https://api.line.me/v2/bot/message/reply');
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($responseData));
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Authorization: Bearer '.$access_token
));
$result = curl_exec($ch);
curl_close($ch);

}elseif  (strtolower($messageText) == 'ตรวจสอบคิวตัดผม') {
    
   
// Prepare Flex Message JSON string
$flexMessage = '{
    "type": "flex",
    "altText": "Flex Message",
    "contents": {
        "type": "bubble",
        "body": {
            "type": "box",
            "layout": "vertical",
            "contents": [
                {
                    "type": "text",
                    "text": "Hello, world!"
                }
            ]
        }
    }
}';

    // send a response back to the user
    $responseData = array(
        'replyToken' => $messageData['events'][0]['replyToken'],
        'messages'   => array(json_decode($flexMessage))
    );

    $ch = curl_init('https://api.line.me/v2/bot/message/reply');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($responseData));
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Authorization: Bearer '.$access_token
    ));
    $result = curl_exec($ch);
    curl_close($ch); 
}elseif  (strtolower($messageText) == 'register_line_bot') {
// }elseif  (strtolower($messageText) == 'ลง') {

    
    

$url = 'https://api.line.me/v2/bot/message/push';

$headers = array(
    'Content-Type: application/json',
    'Authorization: Bearer ' . $access_token
);

$data = array(
    'to' => $userId,
    'messages' => array(
        array(
            'type' => 'text',
            'text' => 'ลงทะเบียนไลน์ Bot เพื่อรับเเจ้งเตือนผ่าน  Line:',
        ),
        array(
            'type' => 'text',
            'text' => 'https://0cb2-2001-44c8-42ce-e77c-e8cc-3f1b-a95b-e26f.ngrok-free.app/login.php?userId='.$userId,
            // 'quickReply' => array(
            //     'items' => array(
            //         array(
            //             'type' => 'action',
            //             'action' => array(
            //                 'type' => 'message',
            //                 'label' => 'Yes',
            //                 'text' => 'Yes',
            //             ),
            //         ),
            //         array(
            //             'type' => 'action',
            //             'action' => array(
            //                 'type' => 'message',
            //                 'label' => 'No',
            //                 'text' => 'No',
            //             ),
            //         ),
            //     ),
            // ),
        ),
    ),
);

$options = array(
    'http' => array(
        'method' => 'POST',
        'header' => implode("\r\n", $headers),
        'content' => json_encode($data),
    ),
);

$context = stream_context_create($options);
$result = file_get_contents($url, false, $context);

echo $result;

}


function getUser($username,$userId){

include_once("./configs/connect_db.php");
$sql = "SELECT * FROM tb_users WHERE username='$username';";

$result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
    // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
        //    if($row["line_user_id"] !== NULL || $row["line_user_id"] !== '' || $row["line_user_id"] !== undefined  ){
                $sqlUpdate = "UPDATE MyGuests SET line_user_id='$userId' WHERE username='$username';";
                mysqli_query($conn, $sqlUpdate) ; 
        //    } 
        }
    } else {
        return 0;
    }

    mysqli_close($conn);
}