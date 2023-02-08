<?php
session_start();
ob_start();
date_default_timezone_set("Asia/Manila");

$action = $_GET['action'];
include 'admin_class.php';
$crud = new Action();

if($action == 'addcustom'){
	$addcustom = $crud->addcustom(); 
	if($addcustom)
		echo $addcustom;
}




?>

