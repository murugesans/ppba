<?php
include('config.php');
$access_token = getAccessToken();
$token_id=$_POST['tokenID'];
$res = getExecutePayment($access_token,$token_id);
print json_encode($res);
?>