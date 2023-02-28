<?php
session_start();
    extract($_POST);
    //$email = '@gmail.com';
    //echo $email;
    require("./mail/PHPMailer.php");
    require("./mail/SMTP.php");
    require("./mail/Exception.php");
    require("./mail/OAuth.php");
    require("./mail/OAuthTokenProvider.php");
    require("./mail/POP3.php");

    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->IsSMTP(); // enable SMTP

    $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
    $mail->SMTPAuth = true; // authentication enabled
    $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 465; // or 587
    $mail->IsHTML(true);
    $mail->Username = "tonsiatreesathomas@mca.ajce.in";
    $mail->Password = "Princia@29";
    $mail->SetFrom("tonsiatreesathomas@mca.ajce.in");
    $mail->Subject = "OTP Verification";
    $ottp = rand(100000,999999);
    $_SESSION['forgotemail'] = $email;
    $_SESSION['otp'] = md5($ottp);

    $mail->Body = '<h3>Dear Customer,
    
    <p>Thank you for choosing our service. To verify your account, please enter the following One-Time Password (OTP) on our website:<h3>
    
    <h2><p>OTP Code: '.$ottp.'</h2>
    
    <h3><p>This OTP is valid for 10 minutes. If you did not request this OTP, please contact our support team immediately.</h3>
    
    <p>Best regards,
    
    <p><strong>Haycouture<strong>';

    $mail->AddAddress($email);

     if($mail->Send()) {

     }
?>