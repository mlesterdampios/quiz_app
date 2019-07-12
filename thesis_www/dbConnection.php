<?php
//all the variables defined here are accessible in all the files that include this one
header("Access-Control-Allow-Origin: *");
define('BASE_URL', 'http://192.168.1.4/thesis/');
$con= new mysqli('localhost','root','','quiz')or die("Could not connect to mysql".mysqli_error($con));
$con1= new mysqli('localhost','root','','quiz')or die("Could not connect to mysql".mysqli_error($con));
?>