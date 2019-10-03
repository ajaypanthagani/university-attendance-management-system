<?php
session_start();
if(!isset($_SESSION["username"])){
header("Location: faculty_login.php");
exit(); }
?>
<?php include 'db.php' ?>
<html>
<?php include 'head.php' ?>
<?php $name=$_SESSION["username"];
      $email=$_SESSION["email"];
?>
<body>
<div class='container'>
<div class="jumbotron">
<h2 class="text-center">CSE Attendance Portal</h2>
</div>
<div class='row'>
<div class='col-sm-6'>
<table class="table table-striped">
<form method='GET' action="class_at_1.php">
<tr>
<div class="form-group">
<th>
<lable for="class">Select Class</label>
</th>
<td>
<select class="form-control" id="class" name="class">
<option value="cse1">cse1</option>
<option value="cse2">cse2</option>
<option value="cse3">cse3</option>
<option value="cse4">cse4</option>
</select>
</td>
</div>
</tr>
<tr>
<div class="form-group">
<th>
<label for="subject">Select Subject</label>
</th>
<td>
<select class="form-control" id="subject" name="subject">
<option value="coa">COA</option>
<option value="ds">DS</option>
<option value="eng">ENG</option>
<option value="flat">TOC</option>
<option value="isn">ISN</option>
<option value="mat">MAT</option>
</select>
</td>
</div>
</tr>
<tr>
<div class="form-group">
<th>
<label for="period">Select Period</label>
</th>
<td>
<select class="form-control" id="period" name="period">
<option value="1">one</option>
<option value="2">two</option>
<option value="3">three</option>
<option value="4">four</option>
<option value="5">five</option>
</select>
</td>
</div>
</tr>
<tr>
<td>
<button type="submit" name='submit_op' value='submit' id="button">Submit</button>
</td>
</tr>
<input type='hidden' name='username' value='$name'>
</form>
</table>
</div>
<div class='col-sm-6'>
<div id='about-faculty'>
<div class='about-card'>
<h2 class='text-center'>Faculty Details</h4>
<h4 class='detail'><?php echo $name;?></h4>
<br>
<h4 class='detail'><?php echo $email;?></h4>
</div>
</div>
</div>
</div>
</div>
<?php include("footer.php");?>
</body>
</html>
