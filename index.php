<?php
session_start();
?>
<?php include 'db.php' ?>
<html>
<?php include("head.php");?>
<head>
<style>
/* Center the loader */
#loader {
  position: absolute;
  left: 50%;
  top: 50%;
  z-index: 1;
  width: 150px;
  height: 150px;
  margin: -75px 0 0 -75px;
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}
.jumbotron{
margin-top: 10px;
}
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

/* Add animation to "page content" */
.animate-bottom {
  position: relative;
  -webkit-animation-name: animatebottom;
  -webkit-animation-duration: 1s;
  animation-name: animatebottom;
  animation-duration: 1s
}

@-webkit-keyframes animatebottom {
  from { bottom:-100px; opacity:0 } 
  to { bottom:0px; opacity:1 }
}

@keyframes animatebottom { 
  from{ bottom:-100px; opacity:0 } 
  to{ bottom:0; opacity:1 }
}

#myDiv {
  display: none;
}
</style>
<script>
var myVar;

function myFunction() {
  myVar = setTimeout(showPage, 1000);
}

function showPage() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("myDiv").style.display = "block";
}
</script>
</head>
<body onload="myFunction()" id="bgg">
<div id="loader"></div>
<div style="display:none;" id="myDiv" class="animate-bottom">
<div class="container">
<div class="jumbotron">
<h2 class="text-center">Attendance Portal</h2>
</div>
<div class='row'>
<div class="col-xs-6">
<a href="student.php"><div class="ctr"><div class='thumbnail'><img class="img-responsive" style="width:250px;" src="img/st.png"><div class="overlay"><div class="text1"><b>STUDENT</b></div></div></div></div></a>
</div>
<div class="col-xs-6">
<a href="faculty_login.php"><div class="ctr"><div class='thumbnail'><img class="img-responsive" style="width:250px;" src="img/te.png"><div class="overlay"><div class="text1"><b>FACULTY</b></div></div></div></div></a>
</div>
</div>
</div>
<?php include("footer.php");?>
</div>
</body>
</html>
