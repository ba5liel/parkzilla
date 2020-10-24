<?php
$db_host = "localhost:3306";
$db_user = "root";
$db_pass = "";
$db = "parkzilla";

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db);

if(!$conn){
	die( "error". mysqli_connect_error($conn));
}

?>
