<?php
// connection string for PDO
$dsn = 'mysql:dbname=droughtdb;host=127.0.0.1';
$user = 'admin';
$password = 'admin';
$db = new PDO($dsn, $user, $password);
?>