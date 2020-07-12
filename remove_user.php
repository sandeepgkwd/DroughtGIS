<?php
$email = $_REQUEST['email'];
$token = $_REQUEST['token'];

$dsn = 'mysql:dbname=leaflet;host=127.0.0.1';
$user = 'admin';
$password = 'admin';
$db = new PDO($dsn, $user, $password);


$sql = "DELETE FROM users WHERE email = '$email' AND token = '$token';";

$rs = $db->query($sql);
$count = $rs->rowCount();
echo $count;
$db = NULL;
?>