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
    "eid" : "xxx",
    "score" : 0,
    "level" : 0,
    "sahi" : 0,
    "wrong" : 0
}';
*/

$data = json_decode($data,true);

$email = mysqli_real_escape_string($con,$data['email']);
$eid = mysqli_real_escape_string($con,$data['eid']);
$score = mysqli_real_escape_string($con,$data['score']);
$level = mysqli_real_escape_string($con,$data['level']);
$sahi = mysqli_real_escape_string($con,$data['sahi']);
$wrong = mysqli_real_escape_string($con,$data['wrong']);
{
    $result = mysqli_query($con,"SELECT * FROM history WHERE eid='$eid' AND email='$email'") or die('error');

    $count=mysqli_num_rows($result);

    if($count!=0){
        $return = mysqli_query($con,"UPDATE `history` SET `score`=$score,`level`=$level,`sahi`=$sahi,`wrong`=$wrong, date= NOW()  WHERE  email = '$email' AND eid = '$eid'")or die('error');
        if($return)
        {
            $return = array('eid' => $eid,
                'email' => $email,
                'score' => $score,
                'level' => $level,
                'sahi' => $sahi,
                'wrong' => $wrong
            );
            //echo json_encode($return);
            //die();
        }
    }else{
        $return = mysqli_query($con,"INSERT INTO history VALUES('$email','$eid' ,'$score','$level','$sahi','$wrong',NOW() )")or die('error');
        if($return)
        {
            $return = array('eid' => $eid,
                'email' => $email,
                'score' => $score,
                'level' => $level,
                'sahi' => $sahi,
                'wrong' => $wrong
            );
            //echo json_encode($return);
            //die();
        }
    }
}
{
    $result = mysqli_query($con,"SELECT * FROM rank WHERE email='$email'") or die('error');

    $count=mysqli_num_rows($result);

    if($count!=0){
        while($row = mysqli_fetch_array($result)) {
            $score += $row['score'];
            $return = mysqli_query($con,"UPDATE `rank` SET `score`=$score ,time=NOW() WHERE email= '$email'") or die('error');
            if($return)
            {
                $return = array('email' => $email,
                    'score' => $score
                );
                echo json_encode($return);
                die();
            }
        }

    }else{
        $return = mysqli_query($con,"INSERT INTO rank VALUES('$email','$score',NOW())")or die('error');
        if($return)
        {
            $return = array('email' => $email,
                'score' => $score
            );
            echo json_encode($return);
            die();
        }
    }
}
die('error');

?>