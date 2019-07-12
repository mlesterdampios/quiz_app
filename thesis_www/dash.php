<?php

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>LPENHS - CAI </title>
<link rel="icon" href="assets/logo/logoshit.png" type="image/gif" sizes="16x16">
<link  rel="stylesheet" href="css/bootstrap.min.css"/>
 <link  rel="stylesheet" href="css/bootstrap-theme.min.css"/>    
 <link rel="stylesheet" href="css/main.css">
 <link  rel="stylesheet" href="css/font.css">
 <script src="js/jquery.js" type="text/javascript"></script>

  <script src="js/bootstrap.min.js"  type="text/javascript"></script>
   <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="dist/pell.css">
<style>
      body {
        margin: 0;
        padding: 0;
      }

      .content {
        box-sizing: border-box;
        margin: 0 auto;
        max-width: 600px;
        padding: 20px;
      }

      #html-output {
        white-space: pre-wrap;
      }
    </style>
<script>
$(function () {
    $(document).on( 'scroll', function(){
        console.log('scroll top : ' + $(window).scrollTop());
        if($(window).scrollTop()>=$(".logo").height())
        {
             $(".navbar").addClass("navbar-fixed-top");
        }

        if($(window).scrollTop()<$(".logo").height())
        {
             $(".navbar").removeClass("navbar-fixed-top");
        }
    });
});</script>
</head>

<body  style="background:#eee;">
<div class="header">
<div class="row">
<div class="col-lg-6">
<span class="logo">LPENHS</span></div>
<?php
 include_once 'dbConnection.php';
session_start();
$email=$_SESSION['email'];
  if(!(isset($_SESSION['email']))){
header("location:index.php");

}
else
{
$name = $_SESSION['name'];;

include_once 'dbConnection.php';
echo '<span class="pull-right top title1" ><span class="log1"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;Hello,</span> <a href="account.php" class="log log1">'.$name.'</a>&nbsp;|&nbsp;<a href="logout.php?q=account.php" class="log"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Signout</button></a></span>';
}?>

</div></div>
<!-- admin start-->

<!--navigation menu-->
<nav class="navbar navbar-default title1">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand"><b>Dashboard</b></a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li>
      <a href="lesson.php">Lesson
      </a>
    </li>
        
        <li <?php if(@$_GET['q']==0) echo'class="active"'; ?>>
          <a href="dash.php?q=0">Home<span class="sr-only">(current)
          </span>
        </a>
      </li>
        <li <?php if(@$_GET['q']==1) echo'class="active"'; ?>>
          <a href="dash.php?q=1">User
          </a>
        </li>
    <li <?php if(@$_GET['q']==2) echo'class="active"'; ?>>
      <a href="dash.php?q=2">Ranking
      </a>
    </li>
    <li <?php if(@$_GET['q']==3) echo'class="active"'; ?>>
      <a href="dash.php?q=3">Feedback
      </a>
      
        <li class="dropdown <?php if(@$_GET['q']==4 || @$_GET['q']==5) echo'active"'; ?>">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Quiz
            <span class="caret">
            </span>
          </a>
          <ul class="dropdown-menu">
            <li>
              <a href="dash.php?q=4">Add Quiz
              </a>
            </li>
            <li>
              <a href="dash.php?q=5">Remove Quiz
              </a>
            </li>
      
          </ul>
        </li>
        <li class="pull-right"> 
          <a href="logout.php?q=account.php">
            <span class="glyphicon glyphicon-log-out" aria-hidden="true">
            </span>&nbsp;&nbsp;&nbsp;&nbsp;Signout
          </a>
        </li>
      </li>
      <li <?php if(@$_GET['q']==6) echo'class="active"'; ?>>
        <a href="dash.php?q=6">Lessons
        </a>
      </li>
      </ul>
          </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<!--navigation menu closed-->
<div class="container"><!--container start-->
<div class="row">
<div class="col-md-12">
<!--home start-->

<?php if(@$_GET['q']==0) {

$result = mysqli_query($con,"SELECT * FROM quiz ORDER BY date DESC") or die('Error');
echo  '<div class="panel"><div class="table-responsive"><table class="table table-striped title1">
<tr><td><b>S.N.</b></td><td><b>Topic</b></td><td><b>Total question</b></td><td><b>Marks</b></td><td><b>Time limit</b></td><td></td></tr>';
$c=1;
while($row = mysqli_fetch_array($result)) {
  $title = $row['title'];
  $total = $row['total'];
  $sahi = $row['sahi'];
    $time = $row['time'];
  $eid = $row['eid'];
$q12=mysqli_query($con,"SELECT score FROM history WHERE eid='$eid' AND email='$email'" )or die('Error98');
$rowcount=mysqli_num_rows($q12);  
if($rowcount == 0){
  echo '<tr><td>'.$c++.'</td><td>'.$title.'</td><td>'.$total.'</td><td>'.$sahi*$total.'</td><td>'.$time.'&nbsp;min</td>
  <td><b><a href="account.php?q=quiz&step=2&eid='.$eid.'&n=1&t='.$total.'" class="pull-right btn sub1" style="margin:0px;background:#99cc32"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Start</b></span></a></b></td></tr>';
}
else
{
echo '<tr style="color:#99cc32"><td>'.$c++.'</td><td>'.$title.'&nbsp;<span title="This quiz is already solve by you" class="glyphicon glyphicon-ok" aria-hidden="true"></span></td><td>'.$total.'</td><td>'.$sahi*$total.'</td><td>'.$time.'&nbsp;min</td>
  <td><b><a href="update.php?q=quizre&step=25&eid='.$eid.'&n=1&t='.$total.'" class="pull-right btn sub1" style="margin:0px;background:red"><span class="glyphicon glyphicon-repeat" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Restart</b></span></a></b></td></tr>';
}
}
$c=0;
echo '</table></div></div>';

}

//ranking start
if(@$_GET['q']== 2) 
{
$q=mysqli_query($con,"SELECT * FROM rank  ORDER BY score DESC " )or die('Error223');
echo  '<div class="panel title"><div class="table-responsive">
<table class="table table-striped title1" >
<tr style="color:red"><td><b>Rank</b></td><td><b>Name</b></td><td><b>Gender</b></td><td><b>Section</b></td><td><b>Score</b></td></tr>';
$c=0;
while($row=mysqli_fetch_array($q) )
{
$e=$row['email'];
$s=$row['score'];
$q12=mysqli_query($con,"SELECT * FROM user WHERE email='$e' " )or die('Error231');
while($row=mysqli_fetch_array($q12) )
{
$name=$row['name'];
$gender=$row['gender'];
$college=$row['college'];
}
$c++;
echo '<tr><td style="color:#99cc32"><b>'.$c.'</b></td><td>'.$name.'</td><td>'.$gender.'</td><td>'.$college.'</td><td>'.$s.'</td><td>';
}
echo '</table></div></div>';}

?>


<!--home closed-->
<!--users start-->
<?php if(@$_GET['q']==1) {

$result = mysqli_query($con,"SELECT * FROM user") or die('Error');
echo  '<div class="panel"><div class="table-responsive"><table class="table table-striped title1">
<tr><td><b>S.N.</b></td><td><b>Name</b></td><td><b>Gender</b></td><td><b>Section</b></td><td><b>Email</b></td><td><b>Mobile</b></td><td></td></tr>';
$c=1;
while($row = mysqli_fetch_array($result)) {
  $name = $row['name'];
  $mob = $row['mob'];
  $gender = $row['gender'];
    $email = $row['email'];
  $college = $row['college'];

  echo '<tr><td>'.$c++.'</td><td>'.$name.'</td><td>'.$gender.'</td><td>'.$college.'</td><td>'.$email.'</td><td>'.$mob.'</td>
  <td><a title="Delete User" href="update.php?demail='.$email.'"><b><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></b></a></td></tr>';
}
$c=0;
echo '</table></div></div>';

}?>
<!--user end-->

<!--feedback start-->
<?php if(@$_GET['q']==3) {
$result = mysqli_query($con,"SELECT * FROM `feedback` ORDER BY `feedback`.`date` DESC") or die('Error');
echo  '<div class="panel"><div class="table-responsive"><table class="table table-striped title1">
<tr><td><b>S.N.</b></td><td><b>Subject</b></td><td><b>Email</b></td><td><b>Date</b></td><td><b>Time</b></td><td><b>By</b></td><td></td><td></td></tr>';
$c=1;
while($row = mysqli_fetch_array($result)) {
  $date = $row['date'];
  $date= date("d-m-Y",strtotime($date));
  $time = $row['time'];
  $subject = $row['subject'];
  $name = $row['name'];
  $email = $row['email'];
  $id = $row['id'];
   echo '<tr><td>'.$c++.'</td>';
  echo '<td><a title="Click to open feedback" href="dash.php?q=3&fid='.$id.'">'.$subject.'</a></td><td>'.$email.'</td><td>'.$date.'</td><td>'.$time.'</td><td>'.$name.'</td>
  <td><a title="Open Feedback" href="dash.php?q=3&fid='.$id.'"><b><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span></b></a></td>';
  echo '<td><a title="Delete Feedback" href="update.php?fdid='.$id.'"><b><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></b></a></td>

  </tr>';
}
echo '</table></div></div>';
}
?>
<!--feedback closed-->

<!--feedback reading portion start-->
<?php if(@$_GET['fid']) {
echo '<br />';
$id=@$_GET['fid'];
$result = mysqli_query($con,"SELECT * FROM feedback WHERE id='$id' ") or die('Error');
while($row = mysqli_fetch_array($result)) {
  $name = $row['name'];
  $subject = $row['subject'];
  $date = $row['date'];
  $date= date("d-m-Y",strtotime($date));
  $time = $row['time'];
  $feedback = $row['feedback'];
  $uploadedImage = $row['uploadedImage'];
  $uploadedImageXD = (isset($uploadedImage)) ? '<img src="'.BASE_URL."uploads/feedback/".$uploadedImage.'" style="max-width:300px; max-height: 500px;"></img></div></div>' : '</div></div>';
echo '<div class="panel"<a title="Back to Archive" href="update.php?q1=2"><b><span class="glyphicon glyphicon-level-up" aria-hidden="true"></span></b></a><h2 style="text-align:center; margin-top:-15px;font-family: "Ubuntu", sans-serif;"><b>'.$subject.'</b></h1>';
 echo '<div class="mCustomScrollbar" data-mcs-theme="dark" style="margin-left:10px;margin-right:10px; max-height:450px; line-height:35px;padding:5px;"><span style="line-height:35px;padding:5px;">-&nbsp;<b>DATE:</b>&nbsp;'.$date.'</span>
<span style="line-height:35px;padding:5px;">&nbsp;<b>Time:</b>&nbsp;'.$time.'</span><span style="line-height:35px;padding:5px;">&nbsp;<b>By:</b>&nbsp;'.$name.'</span><br />'.$feedback .  $uploadedImageXD;}
}?>
<!--Feedback reading portion closed-->

<!--add quiz start-->
<?php
if(@$_GET['q']==4 && !(@$_GET['step']) ) {
echo ' 
<div class="row">
<span class="title1" style="margin-left:40%;font-size:30px;"><b>Enter Quiz Details</b></span><br /><br />
 <div class="col-md-3"></div><div class="col-md-6">   <form class="form-horizontal title1" name="form" action="update.php?q=addquiz"  method="POST">
<fieldset>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="name"></label>  
  <div class="col-md-12">
  <input id="name" name="name" placeholder="Enter Quiz title" class="form-control input-md" type="text">
    
  </div>
</div>



<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="total"></label>  
  <div class="col-md-12">
  <input id="total" name="total" placeholder="Enter total number of questions" class="form-control input-md" type="number">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="right"></label>  
  <div class="col-md-12">
  <input id="right" name="right" placeholder="Enter marks on right answer" class="form-control input-md" min="0" type="number">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="wrong"></label>  
  <div class="col-md-12">
  <input id="wrong" name="wrong" placeholder="Enter minus marks on wrong answer without sign" class="form-control input-md" min="0" type="number">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="time"></label>  
  <div class="col-md-12">
  <input id="time" name="time" placeholder="Enter time limit for test in minute" class="form-control input-md" min="1" type="number">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="tag"></label>  
  <div class="col-md-12">
  <input id="tag" name="tag" placeholder="Enter #tag which is used for searching" class="form-control input-md" type="text">
    
  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="desc"></label>  
  <div class="col-md-12">
  <textarea rows="8" cols="8" name="desc" class="form-control" placeholder="Write description here..."></textarea>  
  </div>
</div>


<div class="form-group">
  <label class="col-md-12 control-label" for=""></label>
  <div class="col-md-12"> 
    <input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Submit" class="btn btn-primary"/>
  </div>
</div>

</fieldset>
</form></div>';



}
?>
<!--add quiz end-->

<!--add quiz step2 start-->
<?php
if(@$_GET['q']==4 && (@$_GET['step'])==2 ) {
echo ' 
<div class="row">
<span class="title1" style="margin-left:40%;font-size:30px;"><b>Enter Question Details</b></span><br /><br />
 <div class="col-md-3"></div><div class="col-md-6"><form class="form-horizontal title1" name="form" action="update.php?q=addqns&n='.@$_GET['n'].'&eid='.@$_GET['eid'].'&ch=4 "  method="POST">
<fieldset>
';
 
 for($i=1;$i<=@$_GET['n'];$i++)
 {
echo '<b>Question number&nbsp;'.$i.'&nbsp;:</><br /><!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="qns'.$i.' "></label>  
  <div class="col-md-12">
  <textarea rows="3" cols="5" name="qns'.$i.'" class="form-control" placeholder="Write question number '.$i.' here..."></textarea>  
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="'.$i.'1"></label>  
  <div class="col-md-12">
  <input id="'.$i.'1" name="'.$i.'1" placeholder="Enter option a" class="form-control input-md" type="text">
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="'.$i.'2"></label>  
  <div class="col-md-12">
  <input id="'.$i.'2" name="'.$i.'2" placeholder="Enter option b" class="form-control input-md" type="text">
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="'.$i.'3"></label>  
  <div class="col-md-12">
  <input id="'.$i.'3" name="'.$i.'3" placeholder="Enter option c" class="form-control input-md" type="text">
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="'.$i.'4"></label>  
  <div class="col-md-12">
  <input id="'.$i.'4" name="'.$i.'4" placeholder="Enter option d" class="form-control input-md" type="text">
    
  </div>
</div>
<br />
<b>Correct answer</b>:<br />
<select id="ans'.$i.'" name="ans'.$i.'" placeholder="Choose correct answer " class="form-control input-md" >
   <option value="a">Select answer for question '.$i.'</option>
  <option value="a">option a</option>
  <option value="b">option b</option>
  <option value="c">option c</option>
  <option value="d">option d</option> </select><br /><br />'; 
 }
    
echo '<div class="form-group">
  <label class="col-md-12 control-label" for=""></label>
  <div class="col-md-12"> 
    <input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Submit" class="btn btn-primary"/>
  </div>
</div>

</fieldset>
</form></div>';



}
?><!--add quiz step 2 end-->

<!--remove quiz-->
<?php if(@$_GET['q']==5) {

$result = mysqli_query($con,"SELECT * FROM quiz ORDER BY date DESC") or die('Error');
echo  '<div class="panel"><div class="table-responsive"><table class="table table-striped title1">
<tr><td><b>S.N.</b></td><td><b>Topic</b></td><td><b>Total question</b></td><td><b>Marks</b></td><td><b>Time limit</b></td><td></td></tr>';
$c=1;
while($row = mysqli_fetch_array($result)) {
  $title = $row['title'];
  $total = $row['total'];
  $sahi = $row['sahi'];
    $time = $row['time'];
  $eid = $row['eid'];
  echo '<tr><td>'.$c++.'</td><td>'.$title.'</td><td>'.$total.'</td><td>'.$sahi*$total.'</td><td>'.$time.'&nbsp;min</td>
  <td><b><a href="update.php?q=rmquiz&eid='.$eid.'" class="pull-right btn sub1" style="margin:0px;background:red"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Remove</b></span></a></b></td></tr>';
}
$c=0;
echo '</table></div></div>';

}


?>
<?php if(@$_GET['q']==6) {
  ?>



<div class="row">
<span class="title1" style="margin-left:40%;font-size:30px;"><b>Lessons</b></span><br /><br />
 <div class="col-md-3"></div><div class="col-md-6"><form class="form-horizontal title1" name="form" action="update.php?q=addlsn"  method="POST">
<fieldset>

<b>Add Lesson</><br /><!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="lesson_title"></label>  
  <div class="col-md-12">
  <input type="text" name="lesson_title" class="form-control" placeholder="Lesson Title"/>
  </div>
</div>
<br />

<b>Region</b>:<br />
<select  name="region" placeholder="Choose Region" class="form-control input-md" >

  <option value="ARMM (Autonomous Region in Muslim Mindanao)">ARMM (Autonomous Region in Muslim Mindanao)</option>
  <option value="CAR (Cordillera Administrative Region)">CAR (Cordillera Administrative Region)</option>
  <option value="NCR (National Capital Region)">NCR (National Capital Region)</option>
  <option value="Region 1 (Ilocos Region)">Region 1 (Ilocos Region)</option>
  <option value="Region 2 (Cagayan Valley)">Region 2 (Cagayan Valley)</option>
  <option value="Region 3 (Central Luzon)">Region 3 (Central Luzon)</option>
  <option value="Region 4A (CALABARZON)">Region 4A (CALABARZON)</option>
  <option value="Region 4B (MIMAROPA)">Region 4B (MIMAROPA)</option>
  <option value="Region 5 (Bicol Region)">Region 5 (Bicol Region)</option>
  <option value="Region 6 (Western Visayas)">Region 6 (Western Visayas)</option>
  <option value="Region 7 (Central Visayas)">Region 7 (Central Visayas)</option>
  <option value="Region 8 (Eastern Visayas)">Region 8 (Eastern Visayas)</option>
  <option value="Region 9 (Zamboanga Peninsula)">Region 9 (Zamboanga Peninsula)</option>
  <option value="Region 10 (Northern Mindanao)">Region 10 (Northern Mindanao)</option>
  <option value="Region 11 (Davao Region)">Region 11 (Davao Region)</option>
  <option value="Region 12 (SOCCSKSARGEN)">Region 12 (SOCCSKSARGEN)</option>
  <option value="Region 13 (Caraga Region)">Region 13 (Caraga Region)</option>

</select>

  <br /><br />


<div class="form-group">
  <label class="col-md-12 control-label" for="body"></label>  
  <div class="col-md-12">
  <div id="editor" class="pell"></div>
  <textarea style="display:none;" id="html-output" name="body"></textarea>
  </div>
</div>

<div class="form-group">
  <label class="col-md-12 control-label" for=""></label>
  <div class="col-md-12"> 
    <input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Submit" class="btn btn-primary"/>
  </div>
</div>

</fieldset>
</form></div></div>


  <?php
$result = mysqli_query($con,"SELECT * FROM `tbl_lessons` where isDeleted=false") or die('Error');
echo  '<div class="panel"><div class="table-responsive"><table class="table table-striped title1">
<tr><td><b>ID</b></td><td><b>Lesson Title</b></td><td><b>Region</b></td><td><b>PDF Link</b></td><td><b>Video Link</b></td><td></td><td></td></tr>';
$c=1;
while($row = mysqli_fetch_array($result)) {
  $lesson_title = $row['lesson_title'];
  $region = $row['region'];
  $pdf_link = $row['pdf_link'];
  $video_link = $row['video_link'];
  $id = $row['id'];
   echo '<tr><td>'.$id.'</td>';
  echo '<td><a title="Click to open lesson" href="dash.php?q=6&lid='.$id.'">'.$lesson_title.'</a></td><td>'.$region.'</td><td>'.$pdf_link.'</td><td>'.$video_link.'</td>'.
  '<td><a title="Open Lesson" href="dash.php?q=6&lid='.$id.'"><b><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span></b></a></td>';
  echo '<td><a title="Delete Lesson" href="update.php?ldid='.$id.'"><b><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></b></a></td>

  </tr>';
}
echo '</table></div></div>';
}
?>
<!--lesson closed-->

<!--lesson reading portion start-->
<?php if(@$_GET['lid']) {
echo '<br />';
$id=@$_GET['lid'];
$result = mysqli_query($con,"SELECT * FROM tbl_lessons WHERE id='$id' ") or die('Error');
while($row = mysqli_fetch_array($result)) {
  $lesson_title = $row['lesson_title'];
  $region = $row['region'];
  $video_link = $row['video_link'];
  $pdf_link = $row['pdf_link'];
  $body = $row['body'];
  
echo '<div class="panel"<a title="Back to Archive" href="update.php?q1=2"><b><span class="glyphicon glyphicon-level-up" aria-hidden="true"></span></b></a><h2 style="text-align:center; margin-top:-15px;font-family: "Ubuntu", sans-serif;"><b>'.$lesson_title.'</b></h1>';
echo '<form action="update.php?q=editlesson&id='.$id.'" method="post" enctype="multipart/form-data">
    Select new PDF to upload:
    <input type="file" name="PDFToUpload" id="PDFToUpload">

<br/>';
echo '
    Select new Video to upload:
    <input type="file" name="VidToUpload" id="VidToUpload"><br/>
    <input type="submit" value="Upload attachments" name="submit">
</form><br/><hr/>';
 echo '<div class="mCustomScrollbar" data-mcs-theme="dark" style="margin-left:10px;margin-right:10px; max-height:450px; line-height:35px;padding:5px;"><span style="line-height:35px;padding:5px;">-&nbsp;<b>Region:</b>&nbsp;'.$region.'</span><br />
<span style="line-height:35px;padding:5px;">&nbsp;<b>Video Link:</b>&nbsp;<a href="'.BASE_URL."uploads/video/".$video_link.'">'.$video_link.'</a></span><br /><span style="line-height:35px;padding:5px;">&nbsp;<b>PDF Link:</b>&nbsp;<a href="'.BASE_URL."uploads/pdf/".$pdf_link.'">'.$pdf_link.'</a></span><br /><hr><b>Content:</b><br/>'.($body).'</div></div>';

}
}?>

</div><!--container closed-->
</div></div>
    <script src="dist/pell.js"></script>
    <script>
      var editor = window.pell.init({
        element: document.getElementById('editor'),
        defaultParagraphSeparator: 'p',
        onChange: function (html) {
          document.getElementById('html-output').textContent = html
        }
      })
    </script>
</body>
</html>
