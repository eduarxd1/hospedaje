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

	

/* RECEIVE VALUE */
$validateValue=$_REQUEST['fieldValue'];
$validateId=$_REQUEST['fieldId'];


$validateError= "This username is already taken";
$validateSuccess= "This username is available";



	/* RETURN VALUE */
	$arrayToJs = array();
	$arrayToJs[0] = $validateId;
	
		
	$query = mysql_query("select * from tb_member") or die (mysql_error());
	while ($row = mysql_fetch_array($query)){
		
		$user = $row['username'];
		
		}

if($validateValue == $user){		// validate??
	$arrayToJs[1] = false;			// RETURN TRUE
	echo json_encode($arrayToJs);			// RETURN ARRAY WITH success
}else{
	for($x=0;$x<1000000;$x++){
		if($x == 990000){
			$arrayToJs[1] = true;
			echo json_encode($arrayToJs);		// RETURN ARRAY WITH ERROR
		}
	}
	
}

	
?>