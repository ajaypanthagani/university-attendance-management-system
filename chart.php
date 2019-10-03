<!DOCTYPE html>
<!---->
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
$percent = ($checkrows/$checktotrows)*100;
echo "<div class='row'>";
echo "<div class='col-sm-6'>";
echo"
<html class='gr__chartjs_org'><head>
<meta http-equiv='content-type' content='text/html; charset=UTF-8'>
	<title>Pie Chart</title>
	<script async='' src='chartjs/analytics.js'></script><script src='chartjs/Chart.js'></script>
	<script src='chartjs/utils.js'></script>
<style type='text/css'>/* Chart.js */
@keyframes chartjs-render-animation{from{opacity:.99}to{opacity:1}}.chartjs-render-monitor{animation:chartjs-render-animation 1ms}.chartjs-size-monitor,.chartjs-size-monitor-expand,.chartjs-size-monitor-shrink{position:absolute;direction:ltr;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1}.chartjs-size-monitor-expand>div{position:absolute;width:1000000px;height:1000000px;left:0;top:0}.chartjs-size-monitor-shrink>div{position:absolute;width:200%;height:200%;left:0;top:0}</style></head>

<body data-gr-c-s-loaded='true'>
	<div id='canvas-holder' style='width:auto;'><div class='chartjs-size-monitor'><div class='chartjs-size-monitor-expand'><div class=''></div></div><div class='chartjs-size-monitor-shrink'><div class=''></div></div></div>
		<canvas id='chart-area' style='display: block; max-width:270px; max-height: 540px;' class='chartjs-render-monitor'></canvas>
<div class='about-card'>
<p class='text-center'>Classes Attended: $checkrows</p><p class='text-center'>Total classes: $checktotrows</p><p class='text-center'>Percentage: $percent</p>
</div>
	</div>

	<script>

		var config = {
			type: 'pie',
			data: {
				datasets: [{
					data: [
						$percent,
						100-$percent,
					],
					backgroundColor: [
						window.chartColors.green,
						window.chartColors.red,
					],
					label: 'Dataset 1'
				}],
				labels: [
					'present',
					'absent',
				]
			},
			options: {
				responsive: true
			}
		};

		window.onload = function() {
			var ctx = document.getElementById('chart-area').getContext('2d');
			window.myPie = new Chart(ctx, config);
		};

		document.getElementById('randomizeData').addEventListener('click', function() {
			config.data.datasets.forEach(function(dataset) {
				dataset.data = dataset.data.map(function() {
					return randomScalingFactor();
				});
			});

			window.myPie.update();
		});

		var colorNames = Object.keys(window.chartColors);
		document.getElementById('addDataset').addEventListener('click', function() {
			var newDataset = {
				backgroundColor: [],
				data: [],
				label: 'New dataset ' + config.data.datasets.length,
			};

			for (var index = 0; index < config.data.labels.length; ++index) {
				newDataset.data.push(randomScalingFactor());

				var colorName = colorNames[index % colorNames.length];
				var newColor = window.chartColors[colorName];
				newDataset.backgroundColor.push(newColor);
			}

			config.data.datasets.push(newDataset);
			window.myPie.update();
		});

		document.getElementById('removeDataset').addEventListener('click', function() {
			config.data.datasets.splice(0, 1);
			window.myPie.update();
		});
	</script>



</body><span class='gr__tooltip'><span class='gr__tooltip-content'></span><i class='gr__tooltip-logo'></i><span class='gr__triangle'></span></span></html>";
echo "</div>";
echo "<div class='col-sm-6'>";
if($percent>=75){
echo "<img style='max-width:250px;' src='img/m75.gif'/><h2>yay! more than 75%</h2>";
}
else{
echo "<img style='max-width:250px;' src='img/l75.gif'/><h2>oops! less than 75%</h2>";
}
echo "</div>";
echo "</div>";
}else{
echo"<div class='row'>";
echo"<center>";
echo"<img style='max-width:250px;' src='img/no.gif'><h2 class='text-center'>No classes taken for the subject</h2>";
echo"</center>";
echo "</div>";
}
}
echo"</div>";
include('footer.php');
?>
<!---->

