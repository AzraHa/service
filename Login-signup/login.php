<?php
session_start();
require_once("../Classes/user.class.php");

$login = new USER();

//If session is started redirect user

/*if($log->is_loggedin()!="")
{
	$login->redirect('');
}
*/
//Checking post method 
if(isset($_POST['login']))
{
	$username = $_POST['username'];
	$email = $_POST['username'];
	$password = $_POST['password'];

	if($login->login($username,$email,$password))
	{
		header("Location:../User-service/index.php");
	}
	else
	{
        echo' <b style="color:#f5f5f5;text-align:center;">Please enter your Username/Email and Password</b>';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewpoort"content="width-device-width">
    <title>Login </title>
    <link href="../style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=DM+Serif+Display&display=swap" rel="stylesheet">
  </head>
<body>
	<div id="container">
    <form class="login-signup" method="post" >
    	<h1>Login Here</h1>
        <input type="text" name="username" placeholder="Username or email" >
        <input type="password" name="password" placeholder="Your Password">
		<button type="submit" name="login">LOGIN!</button><br>
		<a href="signup.php">Doesn't have an acount <b style="color:red">?</b> </a> 
    </form>
</div>
</body>
</html>
