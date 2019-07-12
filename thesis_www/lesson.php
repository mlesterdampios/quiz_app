    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
      <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
          <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
          <meta name="viewport" content="width=device-width, initial-scale=1">

            <title>LPENHS - CAI</title>
              <link rel="icon" href="assets/logo/logoshit.png" type="image/gif" sizes="16x16">
              <link  rel="stylesheet" href="css/bootstrap.min.css"/>
              <link  rel="stylesheet" href="css/bootstrap-theme.min.css"/>    
              <link rel="stylesheet" href="css/main.css">
              <link  rel="stylesheet" href="css/font.css">
              <script src="js/jquery.js" type="text/javascript"></script>
              <script src="js/bootstrap.min.js"  type="text/javascript"></script>
              <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
               <!--alert message-->
              <?php if(@$_GET['w'])
              {echo'<script>alert("'.@$_GET['w'].'");</script>';}
              ?>
              <!--alert message end-->

        </head>
        <?php
          include_once 'dbConnection.php';
        ?>
        <body>
          <div class="header">
          <div class="row">
          <div class="col-lg-6">
          <span class="logo">LPENHS</span></div>
          <div class="col-md-4 col-md-offset-2">
           <?php
             include_once 'dbConnection.php';
             session_start();
               if(!(isset($_SESSION['email']))){
               header("location:index.php");
            }
            else
            {
              $name = $_SESSION['name'];
              $email=$_SESSION['email'];

              include_once 'dbConnection.php';
              echo '<span class="pull-right top title1" >
                    <span class="log1">
                    <span class="glyphicon glyphicon-user" aria-hidden="true"> </span>
                    &nbsp;&nbsp;&nbsp;&nbsp;Hello, </span> 
                    <a href="account.php?q=1" class="log log1">'.$name.' </a>&nbsp;|&nbsp;
                    <a href="logout.php?q=account.php" class="log">
                   
                    </button>
                    </a>
                    </span>';
              }?>
              <!--  <span class="glyphicon glyphicon-log-out" aria-hidden="true">
                    </span>&nbsp;Signout -->
          </div>
          </div>
          </div>
          
          <div class="bg">
          <!--navigation menu-->
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
      <!-- <a class="navbar-brand"><b>Dashboard</b></a> -->
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
    
      </ul>
          </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
              

              <div class="container"><!--container start-->
              <div class="row">
              <div class="col-md-12">

              
              <!--<span id="countdown" class="timer"></span>
              <script>
              var seconds = 40;
                  function secondPassed() {
                  var minutes = Math.round((seconds - 30)/60);
                  var remainingSeconds = seconds % 60;
                  if (remainingSeconds < 10) {
                      remainingSeconds = "0" + remainingSeconds; 
                  }
                  document.getElementById('countdown').innerHTML = minutes + ":" +    remainingSeconds;
                  if (seconds == 0) {
                      clearInterval(countdownTimer);
                      document.getElementById('countdown').innerHTML = "Buzz Buzz";
                  } else {    
                      seconds--;
                  }
                  }
              var countdownTimer = setInterval('secondPassed()', 1000);
              </script>-->

              <!--home closed-->

              <!--quiz start-->
              
            <div class="container mt-5 mh75vh" id="body-background">





   <div class="row">
    <div class="col-md-8">
     <h1>National hero of the Philippines</h1>
A national hero of the Philippines is a Filipino who has been recognized as a national hero for his or her role in the history of the Philippines. Loosely, the term may refer to all Filipino historical figures recognized as heroes, but the term more strictly refers to those officially designated as such. In 1995 the Philippine National Heroes Committee officially recommended several people for the designation, but this was not acted upon. As of 2007, no one had ever been officially recognized as a Philippine national hero. The reformist writer Jose Rizal, today generally considered the greatest Filipino hero and often given as the Philippine national hero, has never been explicitly proclaimed as the (or even a) national hero by the Philippine government. Besides Rizal, the only other Filipinos currently given implied recognition as national hero such as revolutionary Andres Bonifacio. While other historical figures are commemorated in public municipal or provincial holidays, Rizal and Bonifacio are commemorated in public nationwide (national) holidays and thus are implied to be national heroes. The National Heroes Committee recommended Jose Rizal, Andres Bonifacio, Emilio Aguinaldo, Apolinario Mabini, Marcelo H. del Pilar, Sultan Dipatuan Kudarat, Juan Luna, Melchora Aquino (no relation to Benigno Aquino), and Gabriela Silang to be recognized as national heroes on November 15, 1995. As of today, no action has been taken for these recommended national heroes. A bill filed by Congressman Rene Relampagos from Bohol in February 2014 sought, among other things, to declare Jose Rizal as the sole Filipino national hero. According to the bill, he was a nationalist and well known for his Philippine reforms advocacy during the Spanish colonial era. As of January 1, 2017, the status of the bill was "Pending with the Committee on REVISION OF LAWS since 2014-02-19". </div>
    <div class="col-md-4">
      <h2>Lesson Attachments</h2>
        
        <a href="documentation/Andres Bonifacio.docx" target="_blank">Andres Bonifacio</a><br>
        &nbsp &nbsp &nbsp <a href="documentation/andres bonifacio.MP4" target="_blank">andres bonifacio.MP4</a><br>

        <a href="documentation/Apolinario Mabini.docx" target="_blank">Apolinario Mabini</a><br>
        &nbsp &nbsp &nbsp <a href="documentation/apolinario mabini.MP4" target="_blank">apolinario mabini.MP4</a><br>

        <a href="documentation/Emilio Aguinaldo.docx" target="_blank">Emilio Aguinaldo</a><br>
        &nbsp &nbsp &nbsp <a href="documentation/emilio aguinaldo.MP4" target="_blank">emilio aguinaldo.MP4</a><br>

        <a href="documentation/Gabriela Silang.docx" target="_blank">Gabriela Silang</a><br>
        &nbsp &nbsp &nbsp <a href="documentation/gabriela silang.MP4" target="_blank">gabriela silang.MP4</a><br>

        <a href="documentation/Jose Rizal.docx" target="_blank">Jose Rizal</a><br>
        &nbsp &nbsp &nbsp <a href="documentation/jose rizal.MP4" target="_blank">jose rizal.MP4</a><br>

        <a href="documentation/Juan Luna.docx" target="_blank">Juan Luna</a><br>
        &nbsp &nbsp &nbsp <a href="documentation/juan luna.MP4" target="_blank">juan luna.MP4</a><br>

        <a href="documentation/Marcelo H. Del Pilar.docx" target="_blank">Marcelo H. Del Pilar</a><br>
        &nbsp &nbsp &nbsp <a href="documentation/Marcelo H. Del Pilar.MP4" target="_blank">Marcelo H. Del Pilar.MP4</a><br>

        <a href="documentation/Melchora Aquino.docx" target="_blank">Melchora Aquino</a><br>
        &nbsp &nbsp &nbsp <a href="documentation/melchora aquino" target="_blank">melchora aquino.MP4</a><br>

        <a href="documentation/Muhammad Kudarat.docx" target="_blank">Muhammad Kudarat</a><br>
        &nbsp &nbsp &nbsp <a href="documentation/muhammad kudarat.MP4" target="_blank">muhammad kudarat.MP4</a><br><br><br>
    </div>
  </div>
  </div>



























              
        
           



<!-- <div class="modal fade title1" id="developers"> -->
    <!-- <div class="modal-dialog"> -->
      <!-- <div class="modal-content"> -->
        












     
































  </body>
  </html>
