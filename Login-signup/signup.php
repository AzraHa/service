<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>SignUp</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
	<link href="https://fonts.googleapis.com/css?family=DM+Serif+Display&display=swap" rel="stylesheet">

</head>
<body>
<div id="container">
    <form action="signup-check.php" class="login-signup" method="post" >
    	<h1>SignUp</h1>
	<?php
	if (isset($_GET['firstname'])) {
			$firstname = $_GET['firstname'];
			echo '<input type="text" name="firstname" placeholder="Firstname" value="'.$firstname.'">';
		}else{
			echo '<input type="text" name="firstname" placeholder="Firstname">';
		}
	if (isset($_GET['lastname'])) {
			$lastname = $_GET['lastname'];
			echo '<input type="text" name="lastname" placeholder="Lastname" value="'.$lastname.'">';
		}else {
			echo '<input type="text" name="lastname" placeholder="Lastname">';
		}
	?>
	<input type="text" name="email" placeholder="Email">
	<?php
	if (isset($_GET['username'])) {
			$username = $_GET['username'];
			echo '<input type="text" name="username" placeholder="Username" value="'.$username.'">';
		}else {
			echo '<input type="text" name="username" placeholder="Username">';
		}
	?>
	<input type="password" name="password" placeholder="Password">
	<button type="submit" name="submit">SignUp</button>
	<a href="login.php">Have an acount <b style="color:red">?</b> </a> 
</form>
</div>
<?php
			//Here we create an error message using GET methods, to see if we have a specific GET superglobal
			//This method we can use with the PHP code in the above form, to prevent the data from being deleted in the inputs, if the user makes a mistake
			//First we check if we DO NOT have a GET in the URL named "signup"
			if (!isset($_GET['signup'])) {
				//If not then we just exit the script and do nothing!
				exit();
			}
			else {
				//If we do have a GET, then we assign it to a variable
				$signupCheck = $_GET['signup'];
				//Then we check if the GET value is equal to a specific string
				if ($signupCheck == "empty") {
					//If it is we create an error or success message!
					echo "<p style='color:#f5f5f5;text-align:center;'>You did not fill in all fields!</p>";
					exit();
				}
				elseif ($signupCheck == "char") {
					echo "<p style='color:#f5f5f5;text-align:center;'>You used invalid characters!</p>";
					exit();
				}
				elseif ($signupCheck == "email") {
					echo "<p style='color:#f5f5f5;text-align:center;'>You used an invalid e-mail!</p>";
					exit();
				}
				elseif ($signupCheck == "success") {
					echo "<p style='color:#f5f5f5;text-align:center;'>You have been signed up!</p>";
					exit();
				}elseif($signupCheck == "username"){
					echo "<p style='color:#f5f5f5;text-align:center;'>Username already exists!</p>";
					exit();
				}elseif($signupCheck == "emaile"){
					echo "<p style='color:#f5f5f5;text-align:center;'>Email already exists!</p>";
					exit();
				}
			}
?>
</body>
</html>