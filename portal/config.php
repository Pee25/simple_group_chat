<?php 
$host_name  = "localhost";
$host_user  = "root";
$host_pass  = "";
$db_name  = "messenger";

$db_conn = new mysqli($host_name,$host_user,$host_pass,$db_name);

if(!$db_conn){
	die("Error: Could not connect to database server.");	
	// mysqli_error();
}

mysqli_select_db($db_conn,$db_name);

if ($db_conn->connect_error) {
	die("Connection failed: " . $db_conn->connect_error);
 } 

?>