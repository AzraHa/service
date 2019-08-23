<?php
require "Classes/user.class.php";
session_start();
if(isset($_SESSION['user_session'])){
  if($_SESSION['user_session'] == "1"){
    header("Location:Admin/index.php");
  }else{
    header("Location:User-service/index.php");
  }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewpoort"content="width-device-width">
    <title>Car service</title>
    <link href="style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=DM+Serif+Display&display=swap" rel="stylesheet">
  </head>
<body>
  <section id="autoservis">
    <div id="autoservis-box">
      <h1 id="autoservis-title">Car service</h1>
        <div class="autoservis-underline"></div>
          <p class="autoservis-subtitle">
            <a href="Login-signup/login.php">Login</a>
            <a href="Login-signup/signup.php">Signup</a></p>
        </div>
  </section>
</body>
</html>