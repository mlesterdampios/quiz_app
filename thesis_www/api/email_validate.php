<?php

include_once '../dbConnection.php';
header('Content-Type: application/json');

if (!isset($_GET['email']) || empty($_GET['email'])){
    die('error');
}

$email = ($_GET['email']);

$email = mysqli_real_escape_string($con,$email);

$result = mysqli_query($con,"SELECT * FROM user WHERE email = '$email'") or die('error');

$count = mysqli_num_rows($result);

if($count==1){
    echo true;
    die();
}

die('error');

?>