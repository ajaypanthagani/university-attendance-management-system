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
<script>
function dup(x){
document.getElementById(x).innerHTML='Duplicate!';
document.getElementById(x).style.color="red";
}

function suc(x){
document.getElementById(x).innerHTML='Success!';
document.getElementById(x).style.color="green";
}

$(document).ready(function () {
            $('button').click(function() {
                var elementID = $(this).val();
		var subject = "<?php echo $_GET['subject']?>";
		var roll= $(this).val();
		var period= "<?php echo $_GET['period']?>";
		var teacher= "<?php echo $_SESSION['username']?>";
		var section= "<?php echo $_GET['class']?>";
                $.ajax({
                    // your uri, pay attention if the post is going to the right place
                    url: "test.php",
                    type: "POST",
                    // myVar = name of the var that you will be able to call in php
                    // val = your data
                    data: {'subject': subject, 'roll': roll, 'period': period, 'teacher':teacher, 'section':section},
		    success: function(data) {
			if(data==1){
				suc(elementID);
			}
			else{dup(elementID);}
                }
                });
            });
        });
</script>
<body>
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
     printf ("%s",$row[1]);
    echo "</td>";
    echo "<td>";
    echo "<button type='button' class='btn btn-info' id='$row[1]' value='$row[1]'>present</button>";
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
</html>
