<?php
include('config.php');
session_start();
if(isset($_POST['submit'])){
	$amount = $_POST['amount'];
	$_SESSION['id'] = $_POST['BAID'];
	$BAID =$_SESSION['id'];
}
?>
<!DOCTYPE html>
<head>
<body>
<div>
<h1><a href="index.php">Click the below link to go back to home page</a></h1>
</body>
</head>
</html>
<?php
$postData = '{
    "intent": "sale",
    "payer": {
        "payment_method": "paypal",
        "funding_instruments": [
        {
            "billing": {
                "billing_agreement_id": "'.$BAID.'"
            }
        }
        ]
    },
     "transactions": [
        {
            "amount": {
                "total": "'.$amount.'",
                "currency": "SGD"
            },
             
                "payment_options": {
                "allowed_payment_method": "INSTANT_FUNDING_SOURCE"
            }
        }
    ]
}';
//print $postData;
$access_token = getAccessToken(); //echo $access_token;
$res = getDoReferencePayment($access_token, $postData);
echo"<h1> Payment details using Billing ID - " .$BAID . "</h1>";
echo "<pre>";var_dump($res);echo"</pre>";
?>