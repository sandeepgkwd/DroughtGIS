<?php
include('connectdb.php');
 
$loginst = 0;
if (isset($_SESSION['suid'])){ 

$user_check = $_SESSION['suid'];

$ses_sql = mysqli_query($db,"SELECT uemail FROM users WHERE uemail='$user_check' ");

$row=mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

$login_user=$row['uemail'];

if(!empty($login_user)) 
{
   $loginst = 1;
}

}

?>