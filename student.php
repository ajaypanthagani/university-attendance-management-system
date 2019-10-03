<?php
session_start();
?>
<?php include 'db.php' ?>
<html>
<?php include("head.php");?>

<body>
<div class="container">
<div class="jumbotron">
<h2 class="text-center">Check Your Attendance</h2>
</div>
<div class="col-sm-1">
</div>
<div class="col-sm-10">
 <form action="chart.php" method="POST">
  <div class="form-group">
    <label  for="roll">ID No</label>
<input type="text" class="form-control" id='roll' name="roll">
  </div>
   <div class="form-group">
    <label class="form-group1" for="class">Class</label>
    <select class="form-control" id='class' name="class">
	<option value="class not selected">select your class</option>
	<option value="cse1">CSE 1</option>
	<option value="cse2">CSE 2</option>
	<option value="cse3">CSE 3</option>
	<option value="cse4">CSE 4</option>
    </select>
  </div>
 <div class="form-group">
    <label class="form-group1" for="subject">subject</label>
    <select class="form-control" id='subject' name="subject">
	<option value="subject not selected">select subject</option>
	<option value="coa">COA</option>
	<option value="isn">ISN</option>
	<option value="eng">ENG</option>
	<option value="ds">DS</option>
	<option value="flat">TOC</option>
	<option value="mat">MATH</option>
    </select>
  </div>
  <button id="button" type="submit" class="btn btn-primary" value="st_submit">Submit</button>
</form>
</div>
<div class="col-sm-1">
</div>
</div>
</body>
<?php include("footer.php");?>
</html>
