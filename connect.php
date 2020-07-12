<?php

/**
 * Database config variables for APP
 */
define("DB_HOST", "localhost");
define("DB_USER", "admin");
define("DB_PASSWORD", "admin");
define("DB_DATABASE", "droughtdb");

$connection = mysqli_connect('DB_HOST', 'DB_USER', 'DB_PASSWORD');
if(!$connection){
	die("Database Connection Failed" . mysqli_error($connection));
}
$select_db = mysqli_select_db($connection, 'DB_DATABASE');
if(!$select_db){
	die("Database Selection Failed" . mysqli_error($connection));
}
?>