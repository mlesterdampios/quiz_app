<?php

include_once '../dbConnection.php';
header('Content-Type: application/json');

if (!isset($_GET['email']) || empty($_GET['email'])){
    die('error');
}

$email = ($_GET['email']);

$email = mysqli_real_escape_string($con,$email);

$result = mysqli_query($con,"SELECT title,level,history.sahi,history.wrong,score FROM history inner join quiz on quiz.eid=history.eid WHERE email='$email' ORDER BY history.date DESC") or die('error');

$count=mysqli_num_rows($result);

if($count>0){
    $return = array();
    $i = 1;
    while($row = mysqli_fetch_array($result)) {
        array_push($return , array('id' => $i,
            'title' => $row['title'],
            'level' => $row['level'],
            'right' => $row['sahi'],
            'wrong' => $row['wrong'],
            'score' => $row['score']
        ));
        $i++;
    }
    echo json_encode($return);
    die();
}
die('error');


?>