<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'myDB';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
$myquery = "select * from uploads";
$results = mysqli_query($conn, $myquery);
while ($row=mysqli_fetch_row($results))
{
echo "<img src='$row[1]' alt='images'</img>";
}
?>
