<?php

include_once '../dbConnection.php';
header('Content-Type: application/json');

if (!isset($_GET['eid']) || empty($_GET['eid'])){
    die('error');
}

$eid = ($_GET['eid']);

$eid = mysqli_real_escape_string($con,$eid);

$result = mysqli_query($con,"SELECT * FROM `questions` inner JOIN answer on answer.qid=questions.qid where questions.eid like '$eid'") or die('error');

$count=mysqli_num_rows($result);

if($count>0){
    $return = array();
    while($row = mysqli_fetch_array($result)) {
        //==================
        $tempArray = array();
        $qid = $row['qid'];
        $result1 = mysqli_query($con1,"select * from options where qid like '$qid'") or die('error');
        $count1=mysqli_num_rows($result1);

        if($count1>0){
            while($row1 = mysqli_fetch_array($result1)) {
                array_push($tempArray , array('optionid' => $row1['optionid'],
                    'option' => $row1['option']
                ));
            }
        }
        //==================
        array_push($return , array('eid' => $row['eid'],
            'qid' => $row['qid'],
            'qns' => $row['qns'],
            'ansid' => $row['ansid'],
            'options' => $tempArray
        ));
    }
    echo json_encode($return);
    die();
}
die('error');


?>