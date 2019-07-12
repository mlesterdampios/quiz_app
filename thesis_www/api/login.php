<?php

include_once '../dbConnection.php';
header('Content-Type: application/json');

if (!isset($_POST['data']) || empty($_POST['data'])){
    die('error');
}

$data = ($_POST['data']);
    
/*
$data = '{
    "email" : "mlesterdampios@gmail.com",
    "password" : "123456"
}';
*/

$data = json_decode($data,true);

$email = mysqli_real_escape_string($con,$data['email']);
$password = md5($data['password']);

$result = mysqli_query($con,"SELECT * FROM user WHERE email = '$email' and password = '$password'") or die('error');

$count=mysqli_num_rows($result);

if($count==1){
    $return = array();
    while($row = mysqli_fetch_array($result)) {
        $return = array('email' => $row['email'],
            'name' => $row['name'],
            'gender' => $row['gender'],
            'college' => $row['college'],
            'mob' => $row['mob']
        );
    }
    echo json_encode($return);
    die();
}
die('error');

?>