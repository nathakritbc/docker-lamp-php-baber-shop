<?php 

function sendCarouselMessage($messageData,$access_token){
    // Prepare Flex Message JSON string
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
}