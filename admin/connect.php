<?php
	$hostname = "localhost";
	$username = "root";
	$password = "";
	$dbname = "kingsfields_database";
	
	$connection = mysql_connect($hostname, $username, $password);
	if(!$connection) {
		echo "Database connection failed.";
	}
	$dbselect  = mysql_select_db($dbname);
	if(!$dbselect) {
		echo "Database selection failed.";
	}
?>