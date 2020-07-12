<?php
$con = mysqli_connect('localhost', 'admin', 'admin');
if (!$con){
    die("Database Connection Failed" . mysqli_error($connection));
}
$select_db = mysqli_select_db($con, 'droughtdb');
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($con));
}
?>