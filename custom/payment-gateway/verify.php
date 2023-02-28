<?php

require('config.php');

session_start();

require('razorpay-php/Razorpay.php');
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

$success = '';

$error = "Payment Failed";

if (empty($_POST['razorpay_payment_id']) === false)
{
    $api = new Api($keyId, $keySecret);

    try
    {
        // Please note that the razorpay order ID must
        // come from a trusted source (session here, but
        // could be database or something else)
        $attributes = array(
            'razorpay_order_id' => $_SESSION['razorpay_order_id'],
            'razorpay_payment_id' => $_POST['razorpay_payment_id'],
            'razorpay_signature' => $_POST['razorpay_signature']
        );

        $api->utility->verifyPaymentSignature($attributes);
        $success = true;
    }
    catch(SignatureVerificationError $e)
    {
        $success = false;
        $error = 'Razorpay Error : ' . $e->getMessage();
    }
}

if ($success === true)
{
    $html = "Your payment was successful.Payment ID: {$_POST['razorpay_payment_id']}";
    include '../db_connect.php';
    $pid = $_POST['razorpay_payment_id'];
    $customid = $_SESSION['customuid'];
    $qry0 = $conn->query("UPDATE customorder SET paymentid='$pid' , status = '2'  WHERE uniqueid='$customid'");
}
else
{
    $html = "<p>Your payment failed</p>
             <p>{$error}</p>";
}

//echo $html;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <script>
    //alert(<?php echo '"'.$html.'"' ?>);
    Swal.fire({
                position: 'center',
                icon: 'success',
                title: "Payment Successful!",
                // text: "Message!",
                // showConfirmButton: false,
                type: "success"
                
            }).then(function() {
                window.location = "../../user/myorders.php";
            });
    
    </script>
</body>
</html>
