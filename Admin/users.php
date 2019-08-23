<?php
session_start();
  if(isset($_SESSION['user_session'])){
        echo '<form action="../Login-signup/logout.php" method="post">
          <button class="Logout" type="submit" name="logout-submit">Logout</button>
          <a class="back" href="index.php">Back</a></p>
          </form>';
  }else{
        header("Location:../Login-signup/login.php");
        exit();
      }
  
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Users</title>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <link href="https://fonts.googleapis.com/css?family=DM+Serif+Display&display=swap" rel="stylesheet">

</head>
<?php
require "function.php";
$user = new USER();
$user->showUsers();
?>
</body>
</html>