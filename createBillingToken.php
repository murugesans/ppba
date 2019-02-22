<?php
include('config.php');
$access_token = getAccessToken(); //echo $access_token;
$randomnumber=mt_rand();
$profileData='{
  "name": "Photobook'.$randomnumber.'",
  "presentation": {
    "brand_name":"Photobook",
    "logo_image": "https://static.e-junkie.com/sslpic/176445.447063fea884c4e0a5a1c00284ce1ef9.jpg"
  },
  "input_fields": {
    "no_shipping": "1"
  }
}';
$webprofileid = getWebProfileID($access_token, $profileData);
$postData = '{
    "description":"Photobook can insert any message here for communication",
   "payer":{
     "payment_method":"paypal"
           },
         "plan":{
         "type":"MERCHANT_INITIATED_BILLING",
         "merchant_preferences":{
             "cancel_url":"http://www.cancel.com",
             "return_url":"http://www.return.com",     
             "accepted_pymt_type":"Instant",
			 "experience_id": "'.$webprofileid.'"
          }
      },
      "merchant_custom_data":"Testing"    
}';
//print $postData;
$res = getApprovalURL($access_token, $postData);
print json_encode($res);
//var_dump($res); exit;
?>