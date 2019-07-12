<?php

include_once '../dbConnection.php';
header('Content-Type: application/json');

if (!isset($_POST['data']) || empty($_POST['data'])){
    die('error');
}

$data = ($_POST['data']);

/*
$data = '{
    "name" : "Mark Lester",
    "gender" : "M",
    "college" : "section-1",
    "email" : "mlesterdampios@gmail.com",
    "mob" : "09354635971",
    "password" : "123456"
}';
*/

$data = json_decode($data,true);

$name = mysqli_real_escape_string($con,$data['name']);
$gender = mysqli_real_escape_string($con,$data['gender']);
$college = mysqli_real_escape_string($con,$data['college']);
$email = mysqli_real_escape_string($con,$data['email']);
$mob = mysqli_real_escape_string($con,$data['mob']);
$password = md5($data['password']);

$result = mysqli_query($con,"INSERT INTO user VALUES  ('$name' , '$gender' , '$college','$email' ,'$mob', '$password')");

if($result)
{
    $return = array('name' => $name,
        'gender' => $gender,
        'college' => $college,
        'email' => $email,
        'mob' => $mob,
        'password' => $password
    );
    echo json_encode($return);
    die();
}

die('error');

?>