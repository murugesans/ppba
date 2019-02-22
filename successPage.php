<?php
include('config.php');
error_reporting(0);
session_start();
$_SESSION['id'] = $_GET['id'];
$BAID =$_SESSION['id'];
?>
<!DOCTYPE html>
<head>
<body>
<div>
<h1>Call Reference Payment</h1>
<form action="doReferencePayment.php" method="POST" onsubmit="return validateForm()" name="myForm">
<label>Enter Amount:</label><br />
<input type="text" size="8" name="amount" value="" /><br />
<input type="hidden" name="BAID" value="<?php echo $BAID; ?>" /><br />
<input type="submit" value="Submit" name="submit" />
</form>
</div>
<p></p>
<script>
function validateForm() {
    var x = document.forms["myForm"]["amount"].value;
    if (x == "") {
        alert("Please enter the amount");
        return false;
    }
}
</script>
</body>
</head>
</html>
<?php
$access_token = getAccessToken(); //echo $access_token;
$BADetails = getBillingAgreementDetails($access_token,$BAID);
echo"<h1> Billing details for " .$BAID . "</h1>";
echo "<pre>";var_dump($BADetails);echo"</pre>";
?>
