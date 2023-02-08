<?php 
session_start();
if (!isset($_SESSION['admin']))
{
    header('location:http://localhost/pro/signin.php');
}
// print_r($_SESSION);
?>



<!DOCTYPE html>
<html lang="en">
<?php include './includes/head.blade.php';?>
<body>
    <?php include './includes/leftsidebar.blade.php';?>
    <div class="main-content">
        <?php include './includes/header.blade.php';?>
        <div class="page-content-wrap">
        <!-- Container Fluid-->
            <div class="page-content">
                <div class="container-fluid">
                    <!-- @yield('content';?> -->

