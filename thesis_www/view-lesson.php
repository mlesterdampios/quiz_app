<!DOCTYPE html>
<html>

<!-- Head -->
<?php include 'view/partials/header.php'?>

<body>
  <!-- <div class="container mt-8 mh75vh" id="bad-background"> -->
  	<div class="container mt-5 mh75vh" id="body-background">





  	<div class="row">
		<div class="col-md-8">
			<?php
				$con = mysqli_connect("localhost","root","","caipl");
				$result = mysqli_query($con,"SELECT * FROM lesson WHERE id='1'");
				while($row = mysqli_fetch_array($result))
				{
					echo "<h2>" . $row['lesson_name'] . "</h2>";
					echo "<p>" . $row['lesson_description'] . " </p>";
				}
				mysqli_close($con);
			?>
		</div>
		<div class="col-md-4">
			<h2>Lesson Attachments</h2>
		  	
		  	<a href="documentation/philippine national anthem.mp3" target="_blank">Andres Bonifacio</a><br>
		  	<a href="documentation/philippine national anthem.mp3" target="_blank">Apolinario Mabini</a><br>
		  	<a href="documentation/philippine national anthem.mp3" target="_blank">Emilio Aguinaldo</a><br>
		  	<a href="documentation/philippine national anthem.mp3" target="_blank">Gabriela Silang</a><br>
		  	<a href="documentation/philippine national anthem.mp3" target="_blank">Jose Rizal</a><br>
		  	<a href="documentation/philippine national anthem.mp3" target="_blank">Juan Luna</a><br>
		  	<a href="documentation/philippine national anthem.mp3" target="_blank">Marcelo H. Del Pilar</a><br>
		  	<a href="documentation/philippine national anthem.mp3" target="_blank">Melchora Aquino</a><br>
		  	<a href="documentation/philippine national anthem.mp3" target="_blank">Muhammad Kudarat</a><br>
		</div>
	</div>
  </div>
  
</body>
</html>