<?php

include_once '../dbConnection.php';
header('Content-Type: application/json');

if (!isset($_GET['region']) || empty($_GET['region'])){
    die('error');
}

$region = ($_GET['region']);

$region = mysqli_real_escape_string($con,$region);

$result = mysqli_query($con,"SELECT * FROM tbl_lessons where region like '$region';") or die('error');

$count=mysqli_num_rows($result);

if($count>0){
    $return = array();
    while($row = mysqli_fetch_array($result)) {
        array_push($return , array('id' => $row['id'],
            'pdf_link' => (empty($row['pdf_link'])) ? null : BASE_URL."uploads/pdf/".$row['pdf_link'],
            'video_link' => (empty($row['video_link'])) ? null :BASE_URL."uploads/video/".$row['video_link'],
            'lesson_title' => $row['lesson_title'],
            'body' => $row['body'],
            'region' => $row['region']
        ));
    }
    echo json_encode($return);
    die();
}
die('error');

?>