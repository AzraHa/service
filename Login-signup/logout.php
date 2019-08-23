<?php
//User logout , session destroy
	require_once('../Classes/user.class.php');
	session_start();
	session_unset();
	session_destroy();
	header("Location:../index.php");
