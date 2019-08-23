<?php
session_start();
include_once "../Classes/user.class.php";
$user = new USER();

if($user->is_loggedin()!="")
{
	$user->redirect('../store/index.php');
}

if(isset($_POST['submit'])){
	$level = $_POST['level'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$username = $_POST['username'];
	$password = $_POST['password'];

	//Checking if inputs are empty
	if(empty($firstname) || empty($lastname) || empty($email) || empty($username) ||empty($password)){
		header("Location:signup.php?signup=empty");
		exit();
	}else{
		//Check if input char are valid
		if(!preg_match("/[a-zA-A]*$/", $firstname) ||!preg_match("/[a-zA-A]*$/", $lastname)){
			header("Location:signup.php?signup=char");
			exit();
		}else{
			//Checking email
			if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
				header("Location:signup.php?signup=email&firstname=$firstname&lastname=$lastname&username=$username");
				exit();
			}else{
				try{
				 
					$stmt = $user->runQuery("SELECT user_username, user_email FROM users WHERE user_username=:username OR user_email=:email"); 
					$stmt->execute(array(':username'=>$username, ':email'=>$email));
					$row=$stmt->fetch(PDO::FETCH_ASSOC);

					if($row['user_username']==$username) {
						header("Location:signup.php?signup=username");
						exit();
					}else if($row['user_email']==$email) {
						header("Location:signup.php?signup=emaile");
						exit();
					}else{

						$register = $user->register($firstname,$lastname,$email,$username,$password);
	                	//var_dump($register);
	                	header("Location:signup.php?signup=success");
	                	exit();
					}
				}catch(PDOException $e){
					echo $e->getMessage();
				}
			}
		}
	}
}else{
	header("Location:signup.php");
	exit();
}