<?php


$con=mysqli_connect("localhost","root","");
if($con===false) 
{
die("ERROR:Could not connect." .mysqli_connect_error());
}
echo "Connect Sucessfully. Host info:" .mysqli_get_host_info($con);
//db creation
$sql="create database data";
if($con->query($sql)===true)
{
echo "Database created sucessfully";
}
else
{
echo "ERROR:Could not connect $sql. " .$mysqli->error;
}
?>