<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <!-- jQuery -->
        <title>Payment</title>
    </head>

<body class="">


<?php
require('config.php');

require('razorpay-php/Razorpay.php');
session_start();
use Razorpay\Api\Api;
$api = new Api($keyId, $keySecret);

$amt = $_POST['amount'] - $_POST['discount'];

$orderData = [
    'receipt'         => $_POST['item_number'],
    'amount'          => $amt * 100,
    'currency'        => $_POST['currency'],
    'payment_capture' => 1
];
$razorpayOrder = $api->order->create($orderData);
$razorpayOrderId = $razorpayOrder['id'];
$_SESSION['razorpay_order_id'] = $razorpayOrderId;
$displayAmount = $amount = $orderData['amount'];

$data = [
    "key"               => $keyId,
    "amount"            => $amount,
    "name"              => $_POST['item_name'],
    "description"       => $_POST['item_description'],
    "image"             => "",
    "prefill"           => [
    "name"              => $_POST['cust_name'],
    "email"             => $_SESSION['user'],
    "contact"           => $_POST['contact'],
    ],
    "notes"             => [
    "address"           => $_POST['address'],
    "merchant_order_id" => $_SESSION['regid'],
    ],
    "theme"             => [
    "color"             => "#9933ff"
    ],
    "order_id"          => $razorpayOrderId,
];


$json = json_encode($data);
?>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<form name='razorpayform' action="verify.php" method="POST">
    <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
    <input type="hidden" name="razorpay_signature"  id="razorpay_signature" >
</form>

<script>

    var options = <?php echo $json?>;

    options.handler = function (response){
        document.getElementById('razorpay_payment_id').value = response.razorpay_payment_id;
        document.getElementById('razorpay_signature').value = response.razorpay_signature;
        document.razorpayform.submit();
    };

    options.theme.image_padding = false;
    options.modal = {
        ondismiss: function() {
            console.log("This code runs when the popup is closed");
            document.location.href = "../checkout.php";
        },
        escape: true,
        backdropclose: false
    };

    var rzp = new Razorpay(options);

    rzp.open();
    e.preventDefault();

</script>

</body>
</html>

