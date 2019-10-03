<?php
session_start();
if(!isset($_POST['roll'])){
header("Location: student.php");
}
if(empty($_POST['roll'])){
header("Location: student.php");
}
?>
<?php
include('db.php');
include('head.php');
?>
<?php
echo'
<div class="container">
<div class="jumbotron">
<h2 class="text-center">CSE Attendance Report</h2>
</div>';
if($_SERVER['REQUEST_METHOD']=='POST'){
$subject = $_POST['subject'];
$roll = $_POST['roll'];
$_SESSION['roll']=$roll;
$class = $_POST['class'];
$check = mysqli_query($conn, "SELECT * from attendance WHERE roll='$roll' AND sec='$class' AND subject='$subject'");
$checkrows = mysqli_num_rows($check);
$checktot = mysqli_query($conn,"SELECT * from total_class WHERE sec='$class' AND subject='$subject'");
$checktotrows = mysqli_num_rows($checktot);
if($checktotrows>0){
echo "<div class='row'>";
echo "<div class='col-sm-4'>";
echo "<p class='text-center'>Classes Attended: $checkrows</p>";
echo "</div>";
echo "<div class='col-sm-4'>";
echo "<p class='text-center'>Total classes: $checktotrows</p>";
echo "</div>";
echo "<div class='col-sm-4'>";
$percent = ($checkrows/$checktotrows)*100;
echo "<p class='text-center'>Percentage: $percent</p>";
echo "</div></div>";
}else{
echo"<div class='row'>
    <div class='col-sm-12'>";
echo "No classes taken";
echo "</div>";
echo "</div>";
}
}
echo"</div>";
include('footer.php');
?>
