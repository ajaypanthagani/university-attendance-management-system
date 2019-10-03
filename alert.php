<?php
include('db.php');
?>
<?php
date_default_timezone_set('Asia/Kolkata');
echo date('H:i:s');
$start_first = strtotime('08:30:00');
$end_first = strtotime('10:00:00');
$start_sec = strtotime('10:00:00');
$end_sec = strtotime('11:30:00');
$start_third = strtotime('11:30:00');
$end_third = strtotime('13:00:00');
$start_fourth = strtotime('14:00:00');
$end_fourth = strtotime('15:30:00');
$start_fifth = strtotime('15:30:00');
$end_fifth = strtotime('17:00:00');
$period = 0;
if(time() >= $start_first && time() <= $end_first) {
  $period = 1;
} elseif(time() >= $start_sec && time() <= $end_sec){
  $period = 2;
} elseif(time() >= $start_third && time() <= $end_third){
  $period = 3;
} elseif(time() >= $start_fourth && time() <= $end_fourth){
  $period = 4;
} elseif(time() >= $start_fifth && time() <= $end_fifth){
  $period = 5;
}
echo "<br>$period<br>";
$clRoll = mysqli_query($conn, "SELECT roll FROM class");
$atRoll = mysqli_query($conn, "SELECT roll FROM attendance WHERE sub_date=CURDATE() and period = '$period'");
function fetchResult($result){
	$rows = [];
	while($row = $result->fetch_assoc()){
		$rows[] = $row['roll'];
	}
	return $rows;
}

$clRoll_result = fetchResult($clRoll);
$atRoll_result = fetchResult($atRoll);

$absentList = array_diff_assoc($clRoll_result, $atRoll_result);

foreach ($absentList as $absentId){
echo $absentId."<br>";
}


?>
