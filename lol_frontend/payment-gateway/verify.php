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
    $userid = $_SESSION['regid'];
    $qry0 = $conn->query("SELECT * FROM cart WHERE userid = '$userid' AND status = '1'");
    
    if ($qry0->num_rows > 0) 
    {
        while($row0 = $qry0->fetch_assoc()) 
        {
            $cartid = $row0["id"];
            $paymentid = $_POST['razorpay_payment_id'];
            $conn->query("INSERT INTO orders(cartid,userid,paymentid,status) VALUES ('$cartid','$userid','$paymentid','1')");
            $conn->query("UPDATE cart SET status = '2' WHERE id = '$cartid'");

            //
            $qrycart = $conn->query("SELECT * FROM cart WHERE id = '$cartid'");
            $rowcart = $qrycart->fetch_array();

            $proid = $rowcart['productid'];
            $sizid = $rowcart['size_id'];
            $quaty = $rowcart['quantity'];

            $conn->query("UPDATE size_details SET quantity = quantity -'$quaty' WHERE product_id='$proid' AND size_id='$sizid'");


            //
            
        }
    }
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
</head>
<body>
    <script>
    alert(<?php echo '"'.$html.'"' ?>);
    window.location.href = "../myorders.php";
    </script>
</body>
</html>
