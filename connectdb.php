<?php
$db_host = "localhost";
$db_name = "u_190070603_astoncv";
$user = "u-190070603";
$password = "TdC1B5Wywmyvywz";

try {   
    $db = new PDO("mysql:dbname=$db_name;host=$db_host", $user, $password); 
}
catch (PDOException $ex) {
    echo("Failed to connect to the database.<br>");
	echo($ex->getMessage());
	exit;
}
?>