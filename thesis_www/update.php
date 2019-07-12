	<?php
	include_once 'dbConnection.php';
	session_start();
	$email=$_SESSION['email'];
	//delete feedback
	if(isset($_SESSION['key'])){
	if(@$_GET['fdid'] && $_SESSION['key']=='sunny7785068889') {
	$id=@$_GET['fdid'];
	$result = mysqli_query($con,"DELETE FROM feedback WHERE id='$id' ") or die('Error');
	header("location:dash.php?q=3");
	}
	}

	//delete lesson
	if(@$_GET['ldid']) {
	$id=@$_GET['ldid'];
	$result = mysqli_query($con,"update tbl_lessons set isDeleted=true WHERE id='$id' ") or die('Error');
	header("location:dash.php?q=6");
	}

	//delete user
	if(isset($_SESSION['key'])){
	if(@$_GET['demail'] && $_SESSION['key']=='sunny7785068889') {
	$demail=@$_GET['demail'];
	$r1 = mysqli_query($con,"DELETE FROM rank WHERE email='$demail' ") or die('Error');
	$r2 = mysqli_query($con,"DELETE FROM history WHERE email='$demail' ") or die('Error');
	$result = mysqli_query($con,"DELETE FROM user WHERE email='$demail' ") or die('Error');
	header("location:dash.php?q=1");
	}
	}
	//remove quiz
	if(isset($_SESSION['key'])){
	if(@$_GET['q']== 'rmquiz' && $_SESSION['key']=='sunny7785068889') {
	$eid=@$_GET['eid'];
	$result = mysqli_query($con,"SELECT * FROM questions WHERE eid='$eid' ") or die('Error');
	while($row = mysqli_fetch_array($result)) {
		$qid = $row['qid'];
	$r1 = mysqli_query($con,"DELETE FROM options WHERE qid='$qid'") or die('Error');
	$r2 = mysqli_query($con,"DELETE FROM answer WHERE qid='$qid' ") or die('Error');
	}
	$r3 = mysqli_query($con,"DELETE FROM questions WHERE eid='$eid' ") or die('Error');
	$r4 = mysqli_query($con,"DELETE FROM quiz WHERE eid='$eid' ") or die('Error');
	$r4 = mysqli_query($con,"DELETE FROM history WHERE eid='$eid' ") or die('Error');

	header("location:dash.php?q=5");
	}
	}

	//add quiz
	if(isset($_SESSION['key'])){
	if(@$_GET['q']== 'addquiz' && $_SESSION['key']=='sunny7785068889') {
	$name = $_POST['name'];
	$name= ucwords(strtolower($name));
	$total = $_POST['total'];
	$sahi = $_POST['right'];
	$wrong = $_POST['wrong'];
	$time = $_POST['time'];
	$tag = $_POST['tag'];
	$desc = $_POST['desc'];
	$id=uniqid();
	$q3=mysqli_query($con,"INSERT INTO quiz VALUES  ('$id','$name' , '$sahi' , '$wrong','$total','$time' ,'$desc','$tag', NOW())");

	header("location:dash.php?q=4&step=2&eid=$id&n=$total");
	}
	}

	//add lesson
	if(@$_GET['q']== 'addlsn') {
	$lesson_title=$_POST['lesson_title'];
	$body=$_POST['body'];
	$region=$_POST['region'];

	$q3=mysqli_query($con,"INSERT INTO tbl_lessons(lesson_title,body,region) VALUES  ('$lesson_title','$body','$region')");

	header("location:dash.php?q=6");
	}

	//edit lesson 

	if(@$_GET['q']== 'editlesson') {
	$id=@$_GET['id'];
	$pdfName = null;
	$vidName = null;
	echo 'none';
	if(isset($_FILES["PDFToUpload"]) && $_FILES['PDFToUpload']['size'] != 0){
		echo 'pdf';
		$target_dir = "uploads/pdf/";
		$target_file = $target_dir . basename($_FILES["PDFToUpload"]["name"]);
		$uploadOk = 1;
		$pdfFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		// Check if file already exists
		if (file_exists($target_file)) {
			unlink($target_file);
		}
		// Check file size
		if ($_FILES["PDFToUpload"]["size"] > 9999999) {
			echo "Sorry, your file is too large.";
			$uploadOk = 0;
		}
		// Allow certain file formats
		if($pdfFileType != "pdf") {
			echo "Sorry, only .pdf file is allowed.";
			$uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
			if (move_uploaded_file($_FILES["PDFToUpload"]["tmp_name"], $target_file)) {
				echo "The file ". basename( $_FILES["PDFToUpload"]["name"]). " has been uploaded.";
				$pdfName = basename( $_FILES["PDFToUpload"]["name"]);
			} else {
				echo "Sorry, there was an error uploading your file.";
			}
		}
	}

	if(isset($_FILES["VidToUpload"]) && $_FILES['VidToUpload']['size'] != 0){
		echo 'vid';
		$target_dir = "uploads/video/";
		$target_file = $target_dir . basename($_FILES["VidToUpload"]["name"]);
		$uploadOk = 1;
		$pdfFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		// Check if file already exists
		if (file_exists($target_file)) {
			unlink($target_file);
		}
		// Check file size
		if ($_FILES["VidToUpload"]["size"] > 9999999) {
			echo "Sorry, your file is too large.";
			$uploadOk = 0;
		}
		// Allow certain file formats
		if($pdfFileType != "mp4") {
			echo "Sorry, only .mp4 file is allowed.";
			$uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
			if (move_uploaded_file($_FILES["VidToUpload"]["tmp_name"], $target_file)) {
				echo "The file ". basename( $_FILES["VidToUpload"]["name"]). " has been uploaded.";
				$vidName = basename( $_FILES["VidToUpload"]["name"]);
			} else {
				echo "Sorry, there was an error uploading your file.";
			}
		}
	}
	//die();
	if($pdfName!=null && $vidName!=null){
		mysqli_query($con,"Update tbl_lessons set pdf_link='$pdfName', video_link='$vidName' where id=$id");
	}else if($pdfName!=null && $vidName==null){
	mysqli_query($con,"Update tbl_lessons set pdf_link='$pdfName' where id=$id");
	}else if($pdfName==null && $vidName!=null){
	mysqli_query($con,"Update tbl_lessons set video_link='$vidName' where id=$id");
	}

	header("location:dash.php?q=6");
	}
	

	//add question
	if(isset($_SESSION['key'])){
	if(@$_GET['q']== 'addqns' && $_SESSION['key']=='sunny7785068889') {
	$n=@$_GET['n'];
	$eid=@$_GET['eid'];
	$ch=@$_GET['ch'];

	for($i=1;$i<=$n;$i++)
	{
	$qid=uniqid();
	$qns=$_POST['qns'.$i];
	$q3=mysqli_query($con,"INSERT INTO questions VALUES  ('$eid','$qid','$qns' , '$ch' , '$i')");
	$oaid=uniqid();
	$obid=uniqid();
	$ocid=uniqid();
	$odid=uniqid();
	$a=$_POST[$i.'1'];
	$b=$_POST[$i.'2'];
	$c=$_POST[$i.'3'];
	$d=$_POST[$i.'4'];
	$qa=mysqli_query($con,"INSERT INTO options VALUES  ('$qid','$a','$oaid')") or die('Error61');
	$qb=mysqli_query($con,"INSERT INTO options VALUES  ('$qid','$b','$obid')") or die('Error62');
	$qc=mysqli_query($con,"INSERT INTO options VALUES  ('$qid','$c','$ocid')") or die('Error63');
	$qd=mysqli_query($con,"INSERT INTO options VALUES  ('$qid','$d','$odid')") or die('Error64');
	$e=$_POST['ans'.$i];
	switch($e)
	{
	case 'a':
	$ansid=$oaid;
	break;
	case 'b':
	$ansid=$obid;
	break;
	case 'c':
	$ansid=$ocid;
	break;
	case 'd':
	$ansid=$odid;
	break;
	default:
	$ansid=$oaid;
	}


	$qans=mysqli_query($con,"INSERT INTO answer VALUES  ('$qid','$ansid')");

	}
	header("location:dash.php?q=0");
	}
	}

	//quiz start
	if(@$_GET['q']== 'quiz' && @$_GET['step']== 2) {
		
		$eid=@$_GET['eid'];
		$sn=@$_GET['n'];
		$total=@$_GET['t'];
		$ans=$_POST['ans'];
		$qid=@$_GET['qid'];
		
		$q=mysqli_query($con,"SELECT * FROM answer WHERE qid='$qid' " );
		while($row=mysqli_fetch_array($q) )
		{
			$ansid=$row['ansid'];
		}
		if($ans == $ansid)
		{
			$q=mysqli_query($con,"SELECT * FROM quiz WHERE eid='$eid' " );
			while($row=mysqli_fetch_array($q) )
			{
				$sahi=$row['sahi'];
			}
			if($sn == 1)
			{
				$q=mysqli_query($con,"INSERT INTO history VALUES('$email','$eid' ,'0','0','0','0',NOW())")or die('Error');
			}
			$q=mysqli_query($con,"SELECT * FROM history WHERE eid='$eid' AND email='$email' ")or die('Error115');

			while($row=mysqli_fetch_array($q) )
			{
				$s=$row['score'];
				$r=$row['sahi'];
			}
			$r++;
			$s=$s+$sahi;
			$q=mysqli_query($con,"UPDATE `history` SET `score`=$s,`level`=$sn,`sahi`=$r, date= NOW()  WHERE  email = '$email' AND eid = '$eid'")or die('Error124');
			printf("UPDATE `history` SET `score`=$s,`level`=$sn,`sahi`=$r, date= NOW()  WHERE  email = '$email' AND eid = '$eid'"); die();
		} 
		else
		{
			$q=mysqli_query($con,"SELECT * FROM quiz WHERE eid='$eid' " )or die('Error129');

			while($row=mysqli_fetch_array($q) )
			{
				$wrong=$row['wrong'];
			}
			if($sn == 1)
			{
				$q=mysqli_query($con,"INSERT INTO history VALUES('$email','$eid' ,'0','0','0','0',NOW() )")or die('Error137');
			}
			$q=mysqli_query($con,"SELECT * FROM history WHERE eid='$eid' AND email='$email' " )or die('Error139');
			while($row=mysqli_fetch_array($q) )
			{
				$s=$row['score'];
				$w=$row['wrong'];
			}
			$w++;
			$s=$s-$wrong;
			$q=mysqli_query($con,"UPDATE `history` SET `score`=$s,`level`=$sn,`wrong`=$w, date=NOW() WHERE  email = '$email' AND eid = '$eid'")or die('Error147');
			printf("UPDATE `history` SET `score`=$s,`level`=$sn,`wrong`=$w, date=NOW() WHERE  email = '$email' AND eid = '$eid'"); //die();
		}
		if($sn != $total)
		{
			$sn++;
			header("location:account.php?q=quiz&step=2&eid=$eid&n=$sn&t=$total")or die('Error152');
		}
		else if( $_SESSION['key']!='sunny7785068889')
		{
			$q=mysqli_query($con,"SELECT score FROM history WHERE eid='$eid' AND email='$email'" )or die('Error156');
			while($row=mysqli_fetch_array($q) )
			{
				$s=$row['score'];
			}
			$q=mysqli_query($con,"SELECT * FROM rank WHERE email='$email'" )or die('Error161');
			$rowcount=mysqli_num_rows($q);
			if($rowcount == 0)
			{
				$q2=mysqli_query($con,"INSERT INTO rank VALUES('$email','$s',NOW())")or die('Error165');
			}
			else
			{
				while($row=mysqli_fetch_array($q) )
				{
					$sun=$row['score'];
				}
				$sun=$s+$sun;
				$q=mysqli_query($con,"UPDATE `rank` SET `score`=$sun ,time=NOW() WHERE email= '$email'")or die('Error174');
			}
			header("location:account.php?q=result&eid=$eid");
		}
		else
		{
			header("location:account.php?q=result&eid=$eid");
		}
	}

	//restart quiz
	if(@$_GET['q']== 'quizre' && @$_GET['step']== 25 ) {
	$eid=@$_GET['eid'];
	$n=@$_GET['n'];
	$t=@$_GET['t'];
	$q=mysqli_query($con,"SELECT score FROM history WHERE eid='$eid' AND email='$email'" )or die('Error156');
	while($row=mysqli_fetch_array($q) )
	{
	$s=$row['score'];
	}
	$q=mysqli_query($con,"DELETE FROM `history` WHERE eid='$eid' AND email='$email' " )or die('Error184');
	$q=mysqli_query($con,"SELECT * FROM rank WHERE email='$email'" )or die('Error161');
	while($row=mysqli_fetch_array($q) )
	{
	$sun=$row['score'];
	}
	$sun=$sun-$s;
	$q=mysqli_query($con,"UPDATE `rank` SET `score`=$sun ,time=NOW() WHERE email= '$email'")or die('Error174');
	header("location:account.php?q=quiz&step=2&eid=$eid&n=1&t=$t");
	}

	?>



