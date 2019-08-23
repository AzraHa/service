 

<?php 
 session_start();
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Services</title>
  <link rel="stylesheet" type="text/css" href="../style.css">
  
</head>
<body>

  <section id="service">
    <div class="service-container">
      <article class="service-item">
        <h1><a href="../index.php">Home</a></h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores sed vero libero sapiente corrupti. Dolorum.</p>
      </article>
      <article class="service-item">
        <h1><a href="reservation.php">Reservation</a></h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores sed vero libero sapiente corrupti. Dolorum.</p>
      </article>
      <article class="service-item">
        <h1><a href="calculator.php">Calculator</a></h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores sed vero libero sapiente corrupti. Dolorum.</p>
      </article>
      <article class="service-item">
        <h1><a href="tirehotel.php">Tire Hotel</a></h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores sed vero libero sapiente corrupti. Dolorum.</p>
      </article>
    </div>

  </section>
<?php
 if($_SESSION['user_session'] == "1"){
  header("Location:../Admin/index.php");

 }else{
  if(isset($_SESSION['user_session'])){
        echo '<form action="../Login-signup/logout.php" method="post">
          <button class="Logout" type="submit" name="logout-submit">Logout</button>
          </form>';
  }else{
        header("Location:../Login-signup/login.php");
        exit();
      }
  }
?>
</body>
</html>