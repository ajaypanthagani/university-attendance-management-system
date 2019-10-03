<?php include 'db.php' ?>
<?php
if(isset($_POST['roll'])){//to run PHP script on submit
$sec=$_POST['section'];
$period=$_POST['period'];
$teacher=$_POST['teacher'];
$subject=$_POST['subject'];
$roll=$_POST['roll'];
$check = mysqli_query($conn, "SELECT * from attendance WHERE roll='$roll' AND sub_date=CURDATE() AND period='$period'");
$checkrows = mysqli_num_rows($check);
if($checkrows>0){
echo 0;
}else{
$in="INSERT IGNORE INTO attendance (subject, roll, sec, period, teacher, sub_date) VALUES('$subject', '$roll', '$sec', '$period', '$teacher', CURDATE());";
mysqli_query($conn, $in);
echo 1;
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
