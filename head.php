<head>
<title>IIIT-ONGOLE::ATTENDANCE</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style/bootstrap/css/bootstrap.min.css">
 <link rel="stylesheet" href="style/main.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="style/bootstrap/js/bootstrap.min.js"></script>
</head>
<nav style="background-image: linear-gradient(-189deg, #01031c 90%, white);" class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a href="index.php"><img class="navbar-brand" src='img/image.png' alt='RGUKT'></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Home</a></li>
        <li><a href="faculty.php">Faculty Dashboard</a></li>
        <li><a href="student.php">Student Dashboard</a></li>
	<li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Contact<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="admin.php">Admin</a></li>
            <li><a href="#myModal" data-toggle="modal" data-target="#myModal">Developer</a></li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
	<?php
        if(!isset($_SESSION['username'])){
	echo"
        <li><a href='#'><span class='glyphicon glyphicon-user'></span> Sign Up</a></li>
        <li><a href='faculty_login.php'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>";
	}
	else{
	echo"<li><a href='logout.php'><span class='glyphicon glyphicon-log-out'></span>Logout</a></li>";
	}
	?>
      </ul>
    </div>
  </div>
</nav>
