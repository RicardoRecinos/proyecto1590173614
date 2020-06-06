<?php
error_reporting(0);
	$host="localhost";
	$db_user="id13925892_root";
	$db_pass="eABNC~#hFU121Q*B";
	$db_name = "id13925892_proyecto";
	//connecting to the mysql server
	$connect = mysql_connect($host,$db_user,$db_pass);
	//checking whether the connection is successful or not
	if($connect){
		//connection successful so now connecting to database
		$db_connect=mysql_select_db($db_name);
		//again checking whether the db is selected or not
		if($db_connect){
			
		}
			
	}
	else{
		echo "Sorry connection error";
		die();
	}

?>
