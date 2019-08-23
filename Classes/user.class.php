<?php
require_once('database.php');


class USER
{	
	private $conn;

	public function __construct()
	{
		$database = new Database();
		$db = $database->dbConnection();
		$this->conn = $db;
    }

	public function runQuery($sql)
	{
		$stmt = $this->conn->prepare($sql);
		return $stmt;
	}

	//Registration function
	public function register($firstname,$lastname,$email,$username,$password){
		try{
			$new_password = md5(md5($password));
			$stmt = $this->conn->prepare("INSERT INTO users(user_firstname,user_lastname,user_email,user_username,user_password) VALUES (:firstname, :lastname, :email, :username,:password)");	

									  
			$stmt->bindparam(":firstname", $firstname);
			$stmt->bindparam(":lastname", $lastname);
			$stmt->bindparam(":email", $email);	
			$stmt->bindparam(":username",$username);	
			$stmt->bindparam(":password",$new_password);									  
								  
			$stmt->execute();	
			return $stmt;	
			
		}catch(PDOException $e){
			echo $e->getMessage();
		}				
	}


	//Login function
	public function login($username,$email,$password){
		try{
			$stmt = $this->conn->prepare("SELECT user_id, user_username, user_email, user_password FROM users WHERE user_username=:username OR user_email=:email ");
			$stmt->execute(array(':username'=>$username, ':email'=>$email)); // for username and/or email
			$userRow=$stmt->fetch(PDO::FETCH_ASSOC);

			//Check if username or email exists in database
			//than checking password
			if($stmt->rowCount() == 1)
			{
				if(md5(md5($password)) === $userRow['user_password']){
					//Starting user session
					session_start();
					$_SESSION['user_session'] = $userRow['user_id'];
					$_SESSION['user_firstname'] = $userRow['user_firstname'];
					$_SESSION['user_lastname'] = $userRow['user_lastname'];
					$_SESSION['user_email'] = $userRow['user_email'];
					$_SESSION['user_username'] = $userRow['user_username'];
					$_SESSION['user_level'] = $userRow['user_level'];
					return true;
				}
				else
				{
					return false;
				}
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}

	public function is_loggedin()
	{
		if(isset($_SESSION['user_session']))
		{
			return true;
		}
	}

	//Redirecting user on other location
	public function redirect($url)
	{
		header("Location: $url");
	}
	
	//Logout function 
	//Destroing session
	public function doLogout()
	{
		session_destroy();
		unset($_SESSION['user_session']);
		return true;
	}

}
?>