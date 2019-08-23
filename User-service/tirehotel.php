<?php
require "../Classes/function.php";
require "../Classes/user.class.php";
session_start();
if(!isset($_SESSION['user_session'])){
  header("Location:../Login-signup/login.php");
}


if(isset($_POST['hotel'])){
  if(!empty($_POST['Type'])) {
    $sifra = "H".rand(0,1000);

    $name = $_POST['name'];

    $num = $_POST['number'];

    $email = $_POST['email'];

    $gume = $_POST['gume'];

    $vrsta= $_POST['Type'];

    $datum_od = $_POST['datumod'];

    $datum_do  = $_POST['datumdo'];

    
    if($name=="" || $num == "" || $email=="" ||$gume=="" || $vrsta=="" ||$datum_od=="" || $datum_do=="" ){
      $error[] = "<b>Please enter all fields</b>";
    }
    else{
      $hotel = new hotel();
      $hotel->hotel($sifra,$name,$num,$email,$vrsta,$gume,$datum_od,$datum_do);
 }
    header("Location: hotelprice.php?datum1=".$datum_od."&datum2=".$datum_do."");


}
}

?>
<!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewpoort"content="width-device-width">
    <title>Autoservis</title>
    <link href="../style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=DM+Serif+Display&display=swap" rel="stylesheet">

</head>
<body>
<header>
      <nav>
        <ul class="link">
         
          <li>
            <?php 
            if(isset($_SESSION['user_session'])){
              echo '<form action="../Login-signup/logout.php" method="post">
                  <button class="Logout" type="submit" name="logout-submit">Logout</button>
                  <a class="back" href="index.php">Back</a></p>
                  </form>';
            
            }
            ?>
          </li>
        </ul>
      </nav>            
    </header>
  <div id="container">
<form class="login-signup"  method="POST"><br>
<?php 
  $name = $_SESSION['user_username'];
  $email = $_SESSION['user_email'];
  echo '<label>Name :</label>
        <input type="text" name="name" value="'.$name.'" required>
        <br>
        <label>Email :</label>
        <input type="text" name="email" value="'.$email.'" required>
          <br>';
?>

<label>Number :</label><input type="number" name="number"placeholder="Number" required><br>

<label>Number of tires :</label><input type="number" name="gume"placeholder="Number of tires" required><br>
<label>Type of Tires :</label>
<select name="Type" required>
  <option value="Winter">Winter</option>
  <option value="Summer">Summer</option>
  <option value="Season">Season</option>
  </select><br>
<label>Date from:</label>
<input type="date" name="datumod" required>
<br>
<label>Date to:</label>
<input type="date" name="datumdo" required>

<br>
<button name="hotel" type="submit" >Pošalji</buttton>
</form>
</div>
</div>

</button>
</form>
</div>
</body></html>
