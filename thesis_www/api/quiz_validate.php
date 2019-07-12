<?php

include_once '../dbConnection.php';
header('Content-Type: application/json');

if (!isset($_GET['email']) || empty($_GET['email']) || !isset($_GET['eid']) || empty($_GET['eid'])){
    die('error');
}

$email = ($_GET['email']);
$eid = ($_GET['eid']);

$email = mysqli_real_escape_string($con,$email);
$eid = mysqli_real_escape_string($con,$eid);

$result = mysqli_query($con,"SELECT * FROM history WHERE email like '$email' and eid like '$eid'") or die('error');

$count = mysqli_num_rows($result);

if($count==1){
    echo true;
    die();
}

die('error');

?>