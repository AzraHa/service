<?php
class reservation{

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
	

	//reservation function
	public function reservation($name,$email,$number,$type,$notes,$date,$slot,$status){
		try{
			//Checking if date already exist in database
			$stmt = $this->conn->prepare("SELECT * FROM reservations WHERE reservation_date=:date and reservation_slot=:slot");
			$stmt->bindparam(':date',$date);
			$stmt->bindparam(':slot',$slot);
			$stmt->execute();
			//rowCount
			$check = $stmt->rowCount();
			//If date is already in database relocate user and sent a message
			$zauzeto ="An appointment already booked,please try again";
			if($check > 0){
				header("Location:reservation.php?message=".$zauzeto."");
			}else{
				//If appointment is not booked we book them and send a message to user 
				try{
					$stmt = $this->conn->prepare("INSERT INTO reservations(reservation_username,reservation_email,reservation_phone,reservation_type,reservation_notes,reservation_date,reservation_slot,reservation_status) VALUES (:name,:email,:number,:type,:notes,:date,:slot,:status)");
					$stmt->bindparam(':name',$name);
					$stmt->bindparam(':email',$email);
					$stmt->bindparam(':number',$number);
					$stmt->bindparam(':type',$type);
					$stmt->bindparam(':notes',$notes);
					$stmt->bindparam(':date',$date);
					$stmt->bindparam(':slot',$slot);
					$stmt->bindparam(':status',$status);

					$stmt->execute();
					return $stmt;
					var_dump($stmt);
				}catch(PDOException $e){
					echo $e->getMessage();
				}
			}
		}catch(PDOException $e){
			echo $e->getMessage();
		}
	}
}

class hotel{

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

	public function hotel($sifra,$username,$email,$number,$vrsta,$brojguma,$datum_od,$datum_do){
		try{
			$stmt = $this->conn->prepare("INSERT INTO tirehotel(hotel_sifra, hotel_username, hotel_email, hotel_number,hotel_tireType, hotel_tireNum, hotel_dateFrom,hotel_dateTo) VALUES (:sifra,:username,:email,:number,:vrsta,:brojguma :datum_od, :datum_do)");
			$stmt->bindparam(':sifra',$sifra);
			$stmt->bindparam(':username',$username);
			$stmt->bindparam(':email',$email);
			$stmt->bindparam(':number',$number);
			$stmt->bindparam(':vrsta',$vrsta);
			$stmt->bindparam(':brojguma',$brojguma);
			$stmt->bindparam(':datum_od',$datum_od);
			$stmt->bindparam(':datum_do',$datum_do);
			$stmt->execute();
			return $stmt;
			}
			catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}	
	
}
?>