<?php

include_once '../dbConnection.php';
header('Content-Type: application/json');

if (!isset($_GET['email']) || empty($_GET['email'])){
    die('error');
}

$email = ($_GET['email']);

$email = mysqli_real_escape_string($con,$email);

$result = mysqli_query($con,"SELECT * FROM quiz;") or die('error');

$count=mysqli_num_rows($result);

if($count>0){
    $return = array();
    while($row = mysqli_fetch_array($result)) {

        $eid = $row['eid'];

        $result1 = mysqli_query($con1,"SELECT * FROM history WHERE email like '$email' and eid like '$eid'") or die('error');

        $count1 = mysqli_num_rows($result1);

        $isDone = false;

        if($count1==1){
            $isDone = true;
        }

        array_push($return , array('eid' => $row['eid'],
            'title' => $row['title'],
            'sahi' => $row['sahi'],
            'wrong' => $row['wrong'],
            'total' => $row['total'],
            'time' => $row['time'],
            'intro' => $row['intro'],
            'isDone' => $isDone
        ));
    }
    echo json_encode($return);
    die();
}
die('error');

?>