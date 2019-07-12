<?php

include_once '../dbConnection.php';
header('Content-Type: application/json');

$result = mysqli_query($con,"SELECT * FROM rank inner join user on rank.email=user.email ORDER BY score DESC") or die('error');

$count=mysqli_num_rows($result);

if($count>0){
    $return = array();
    $i = 1;
    while($row = mysqli_fetch_array($result)) {
        array_push($return , array('rank' => $i,
            'name' => $row['name'],
            'gender' => $row['gender'],
            'college' => $row['college'],
            'score' => $row['score']
        ));
        $i++;
    }
    echo json_encode($return);
    die();
}
die('error');

?>