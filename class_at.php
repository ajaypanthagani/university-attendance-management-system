<?php
session_start();
if(!isset($_SESSION["username"])){
header("Location: faculty_login.php");
exit(); }
?>
<?php
if(!(isset($_GET["submit_op"])||isset($_POST["submit_at"]))){
header("Location: faculty.php");
}
?>
<html>
<?php include 'head.php' ?>
<body>
<script>
function dup(x){
document.getElementById(x).innerHTML='Duplicate!';
document.getElementById(x).style.color="red";
}
function suc(x){
document.getElementById(x).innerHTML='Success!';
document.getElementById(x).style.color="green";
}
</script>
<div class="container">
<div class="jumbotron">
<h2 class="text-center">CSE Attendance Portal</h2>
</div>
<div class="alert alert-success">
    <strong id="alertbox"></strong>
 </div>
<?php include 'db.php' ?>
<?php
if(!isset($_POST['submit_at'])){
$teacher=$_SESSION['username'];
$sec=$_GET['class'];
$_SESSION['sec']=$sec;
$subject = $_GET['subject'];
$_SESSION['subject']=$subject;
$period = $_GET['period'];
$_SESSION['period']=$period;
$query="SELECT * FROM total_class WHERE sec='$sec' AND period='$period' AND sub_date=CURDATE()";
$result = mysqli_query($conn, $query);
$rowcheck = mysqli_num_rows($result);
$fname=mysqli_fetch_array($result);
if(($fname[1]!=$subject||$fname[4]!=$teacher)&&$rowcheck>0){
header("Location: faculty.php");
}
}
$sec=$_SESSION['sec'];
$sql="SELECT name,roll FROM class WHERE sec='$sec'";

if ($result=mysqli_query($conn,$sql))
  {
  // Fetch one and one row
echo "<div class='form-bordered'>";

echo "<table class='table table-bordered'>";
echo "<thead>
      <tr>
      <th>ROLL</th>
      <th>TICK</th>
      </tr>
      </thead>
      <tbody>";
  while ($row=mysqli_fetch_row($result))
    {
	$rownum=1;
    echo "<tr>";
    echo "<div class='form-group'>";
    echo "<td>";
    echo "<form id='formf' action='class_at.php' method='POST'>";
     printf ("%s",$row[1]);
    echo "</td>";
    echo "<td>";
    echo "<button class='btn btn-info' type='submit' id='$row[1]' name='submit_at' value='$row[1]'>present</button>";
    echo "</form>";
    echo "</td>";
    echo "</tr>";
    $rownum=$rownum+1;
    }
echo "  </tbody>
	</table>
	";
  // Free result set
  mysqli_free_result($result);
}
?> 
</body>
<?php include("footer.php");?>
<?php
if(isset($_POST['submit_at'])){//to run PHP script on submit
$sec=$_SESSION['sec'];
$period=$_SESSION['period'];
$teacher=$_SESSION['username'];
$subject=$_SESSION['subject'];
$roll=$_POST['submit_at'];
$check = mysqli_query($conn, "SELECT * from attendance WHERE roll='$roll' AND sub_date=CURDATE() AND period='$period'");
$checkrows = mysqli_num_rows($check);
if($checkrows>0){
echo "<script>dup('$roll')</script>";
}else{
echo "<script>suc('$roll')</script>";
$in="INSERT IGNORE INTO attendance (subject, roll, sec, period, teacher, sub_date) VALUES('$subject', '$roll', '$sec', '$period', '$teacher', CURDATE());";
mysqli_query($conn, $in);
}
$checktot = mysqli_query($conn, "SELECT * from total_class WHERE sec='$sec' AND period='$period' AND sub_date=CURDATE()");
$checktotrows = mysqli_num_rows($checktot);
if(!($checktotrows>0)){
$inn="INSERT IGNORE INTO total_class (subject, sec, period, teacher, sub_date) VALUES('$subject', '$sec', '$period', '$teacher', CURDATE());";
mysqli_query($conn, $inn);
}
}
mysqli_close($conn);
?>
</html>
