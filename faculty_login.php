<?php
	require('db.php');
	session_start();
    // If form submitted, insert values into the database.
if(!isset($_SESSION['username'])){
    if (isset($_POST['username'])){
		
		$username = stripslashes($_REQUEST['username']); // removes backslashes
		$username = mysqli_real_escape_string($conn,$username); //escapes special characters in a string
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($conn,$password);
		
	//Checking is user existing in the database or not
        $query = "SELECT * FROM `admin` WHERE username='$username' and password='$password'";
		$result = mysqli_query($conn,$query) or die(mysql_error());
		$rows = mysqli_num_rows($result);
		$data = mysqli_fetch_array($result);
        if($rows==1){
			$_SESSION['username'] = $username;
			$_SESSION['email'] = $data[2];
			header("Location: faculty.php"); // Redirect user to index.php
            }else{
				echo "<div class='form'><h3>Username/password is incorrect.</h3><br/>Click here to <a href='faculty_login.php'>Login</a></div>";
				}
    }else{
?>
<html>
<?php include 'head.php' ?>
<body>
<div class="container">
<div class="jumbotron">
<h2 class="text-center">CSE Attendance Portal</h2>
</div>
<div class="row">
<div class="col-sm-6">
<form action="<?php echo $_SERVER['PHP_SELF']?>" method='POST'>
<div class="form-group">
<label for="username">Username</label>
<input type="text" id="username" class="form-control" name="username">
</div>
<div class="form-group">
<label for="pwd">Password</label>
<input type="password" id="pwd" class="form-control" name="password">
</div>
<button type="submit" id="button">Login</button>
</form>
</div>
<div class="col-sm-6">
<div class="about-card">
<h2>Forgot Password?</h2>
<a href='admin.php' clas='frg'><h4>Contact admin</h4></a>
</div>
</div>
</div>
</div>
</body>
<?php include("footer.php");?>
<?php }
}else{
header("Location: faculty.php");} ?>
</html>

