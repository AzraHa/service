<?php
session_start();
  if(isset($_SESSION['user_session'])){
        echo '<form action="../Login-signup/logout.php" method="post">
          <button class="Logout" type="submit" name="logout-submit">Logout</button>
          </form>';
  }else{
        header("Location:../Login-signup/login.php");
        exit();
      }
  
?>
<!DOCTYPE html>
<html>
<head>
	<title>ADMIN PAGE</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
  <link href="https://fonts.googleapis.com/css?family=DM+Serif+Display&display=swap" rel="stylesheet">

</head>
<body>

  <section id="service">
    <div class="service-containera">
      <article class="service-item">
        <h1><a href="users.php">Users</a></h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores sed vero libero sapiente corrupti. Dolorum.</p>
      </article>
      <article class="service-item">
        <h1><a href="reservations.php">Reservations</a></h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores sed vero libero sapiente corrupti. Dolorum.</p>
      </article>
      <article class="service-item">
        <h1><a href="hotel.php">Tire Hotel Reservations</a></h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores sed vero libero sapiente corrupti. Dolorum.</p>
      </article>
      
    </div>

  </section>

</body>
</html>