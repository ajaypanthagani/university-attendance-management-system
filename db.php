<?php
	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = '';
	$dbname = 'myDB';
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	if(!$conn){
		die('Couldnt connect to the database'.mysqli_error());
	}
	$table1="CREATE TABLE IF NOT EXISTS attendance(
   		id INT NOT NULL AUTO_INCREMENT,
  	 	subject VARCHAR(100) NOT NULL,
   		roll VARCHAR(40) NOT NULL,
		sec VARCHAR(40) NOT NULL,
		period VARCHAR(40) NOT NULL,
		teacher VARCHAR(40) NOT NULL,
  		sub_date DATE,
   		PRIMARY KEY (id )
	);";
	$table2="CREATE TABLE IF NOT EXISTS class(
   		id INT NOT NULL AUTO_INCREMENT,
  	 	name VARCHAR(100) NOT NULL,
   		roll VARCHAR(40) NOT NULL,
  		sec VARCHAR(40) NOT NULL,
		email VARCHAR(40) NOT NULL,
   		PRIMARY KEY (id )
	);";
	$table3="CREATE TABLE IF NOT EXISTS admin(
   		id INT NOT NULL AUTO_INCREMENT,
  	 	username VARCHAR(100) NOT NULL,
                email VARCHAR(100) NOT NULL,
   		password VARCHAR(100) NOT NULL,
   		PRIMARY KEY (id )
	);";
	$table4="CREATE TABLE IF NOT EXISTS total_class(
   		id INT NOT NULL AUTO_INCREMENT,
  	 	subject VARCHAR(100) NOT NULL,
   		sec VARCHAR(100) NOT NULL,
		period VARCHAR(100) NOT NULL,
		teacher VARCHAR(100) NOT NULL,
		sub_date DATE,
   		PRIMARY KEY (id )
	);";
	mysqli_query($conn, $table1);
	mysqli_query($conn, $table2);
	mysqli_query($conn, $table3);
	mysqli_query($conn, $table4);
?>

