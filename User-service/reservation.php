<?php
require "../Classes/function.php";
require "../Classes/user.class.php";
session_start();
if(isset($_SESSION['user_session'])){
  echo '<form action="../Login-signup/logout.php" method="post">
        <button class="Logout" type="submit" name="logout-submit">Logout</button>
        <a class="back" href="index.php">Back</a></p>
        </form>';
      }

@$message = $_GET['message'];
if(isset($_POST['submit']) && (!empty($message))){
  if(!empty($_POST['Type'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['phone'];
    $type = $_POST['Type'];
    $notes = $_POST['notes'];
    $date = $_POST['date'];
    $slot = $_POST['time'];
    $status = 0;

    $reservation = new reservation();
    $reservation->reservation($name,$email,$number,$type,$notes,$date,$slot,$status);

    echo "Apointment succesfully booked! ";
    } 
  }else{
    echo $message;
  }
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../style.css">
  <link href="https://fonts.googleapis.com/css?family=DM+Serif+Display&display=swap" rel="stylesheet">
  <title>Reservations</title>
</head>
<body>
  <div id="container">
<form  method="post">
  <?php 
  $name = $_SESSION['user_username'];
  $email= $_SESSION['user_email'];

  echo 
  '<label>Username</label>
    <input type="text" name="name" value="'.$name.'" required>
    <br>
    <label>Email</label>
    <input type="text" name="email" value="'.$email.'" required>
    <br>';
    ?>
  <label>Phone</label>
  <input type="number" name="phone" required>
  <br>
  <label>Type of Service</label><br>
  <select name="Type" required>
  <option value="Small Service">Small service</option>
  <option value="Basic Service">Basic Service</option>
  <option value="Big Service">Big service</option>
  </select>
  <label>Notes</label>
  <input type="message" name="notes">
  <br>
  <label>Date</label>
  <input type="date" name="date" required>
  <br>
  <label>Time</label>
  <input type="time" name="time" required>
  <br>
  <input type="submit" name="submit" value="Submit" />
</form>
</div>
</body>
</html>
