<?php

include_once '../dbConnection.php';
header('Content-Type: application/json');

$result = mysqli_query($con,"SELECT * FROM tbl_lessons where isDeleted=false;") or die('error');

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