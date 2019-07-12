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
    "email" : "mlesterdampios@gmail.com",
    "subject" : "bug",
    "feedback" : "when i clicked ok, there is a bug"
}';
*/

$data = json_decode($data,true);

$name = mysqli_real_escape_string($con,$data['name']);
$email = mysqli_real_escape_string($con,$data['email']);
$subject = mysqli_real_escape_string($con,$data['subject']);
$uploadedImage = mysqli_real_escape_string($con,$data['uploadedImage']);
$id = uniqid();
$date = date("Y-m-d");
$time = date("h:i:sa");
$feedback = mysqli_real_escape_string($con,$data['feedback']);


if(empty($uploadedImage) || !isset($uploadedImage)){
    $result = mysqli_query($con,"INSERT INTO feedback VALUES  ('$id' , '$name', '$email' , '$subject', '$feedback' , '$date' , '$time', null )") or die ("Error");
}else{
    $result = mysqli_query($con,"INSERT INTO feedback VALUES  ('$id' , '$name', '$email' , '$subject', '$feedback' , '$date' , '$time', '$uploadedImage')") or die ("Error");
}

if($result)
{
    $return = array('name' => $name,
        'email' => $email,
        'uploadedImage' => $uploadedImage,
        'subject' => $subject,
        'id' => $id,
        'date' => $date,
        'time' => $time,
        'feedback' => $feedback
    );
    echo json_encode($return);
    die();
}

die('error');

?>