<?php
session_start();
if($log->is_loggedin()!="")
{
	$login->redirect('../Login-signup/login.php');
}
require "function.php";
$reservation_status= 1;
@$reservation_id=$_GET['id'];
$update = new reservations();
$update->confirm($reservation_status,$reservation_id);

header("Location:reservations.php");
?>