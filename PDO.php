<?php 
//set the headers to be a json string
header('content-type: text/json');

//no need to continue if there is no value in the POST username
if(!isset($_POST['roll']))
    exit;

//initialize our PDO class. You will need to replace your database credentials respectively
$db = new PDO('mysql:host=localhost;dbname=myDB','root','',array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

//prepare our query.
$query = $db->prepare('SELECT * from attendance WHERE roll= :roll AND sub_date=CURDATE() AND period= :period');
//let PDO bind the username into the query, and prevent any SQL injection attempts.
$query->bindParam(':roll', $_POST['roll']);
$query->bindParam(':period', $_POST['period']);
//execute the query
$query->execute();

if($query->rowcount()>0){
echo "no";exit;
}
else{
$insert_query = $db->prepare('INSERT IGNORE INTO total_class (subject, roll, period, teacher, sub_date) VALUES(:subject, :roll, :period, :teacher, CURDATE())');
$insert_query->execute(array(':subject'=>$_POST[subject], ':roll'=>$_POST[roll], ':period'=>$_POST[period], ':teacher'=>$_POST[teacher]));

$teacher_check = $db->prepare('SELECT * from total_class WHERE sec= :section AND period= :period AND sub_date=CURDATE()');
if($teacher_check->rowcount()==0){
$teacher_insert = $db->prepare('INSERT IGNORE INTO total_class (subject, section, period, teacher, sub_date) VALUES(:subject, :section, :period, :teacher, CURDATE())');
$teacher->execute(array(':subject'=>$_POST[subject], ':section'=>$_POST[section], ':period'=>$_POST[period], ':teacher'=>$_POST[teacher]));
}
echo "yes";exit;
}
?>
