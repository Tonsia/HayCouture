<?php
session_start();
ob_start();
date_default_timezone_set("Asia/Manila");

$action = $_GET['action'];
include 'admin_class.php';
$crud = new Action();

if($action == 'login'){
	$login = $crud->login(); 
	if($login)
		echo $login;
}
if($action == 'signup'){
	$signup = $crud->signup();
	if($signup)
		echo $signup;
}
if($action == 'states'){
	$states = $crud->states();
	if($states)
		echo $states;
}
if($action == 'districts'){
	$districts = $crud->districts();
	if($districts)
		echo $districts;
}
if($action == 'citys'){
	$citys = $crud->citys();
	if($citys)
		echo $citys;
}

if($action == 'verifyotp'){
	$verifyotp = $crud->verifyotp();
	if($verifyotp)
		echo $verifyotp;
}

if($action == 'changepass'){
	$changepass = $crud->changepass();
	if($changepass)
		echo $changepass;
}

if($action == 'unamecheck'){
	$unamecheck = $crud->unamecheck();
	if($unamecheck)
		echo $unamecheck;
}












?>

