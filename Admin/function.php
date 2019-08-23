<?php

class Database{

    private $host = "localhost";
    private $db_name = "service";
    private $username = "root";
    private $password = "";
    public $conn;

    public function Connection(){
        {

            $this->conn = null;
            try
            {
                $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            catch(PDOException $exception)
            {
                echo "Connection error: " . $exception->getMessage();
            }
    
            return $this->conn;
        }

    }

}

class USER{
	private $conn;
	
	//konstruktor za konekciju sa bazom 

	public function __construct()
	{
		$database = new Database();
		$db = $database->Connection();
		$this->conn = $db;
    }
	//funkcija za pokretanje query-a

	public function runQuery($sql)
	{
		$stmt = $this->conn->prepare($sql);
		return $stmt;
	}
    public function showUsers(){
		try
		{
			$stmt = $this->conn->query("SELECT * FROM users");
			while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
				echo "<table  style='background:#f5f5f5;width:100%;border:2px solid #000;'>
				<tr >
				<th style='border:2px solid #000;text-align: center;'>ID</th>
				  <th style='border:2px solid #000;margin: 0 auto;'>User-Level</th>
				  <th style='border:2px solid #000;margin: 0 auto;'>Firstname</th> 
				  <th style='border:2px solid #000;margin: 0 auto;'>Lastname</th>
				  <th style='border:2px solid #000;margin: 0 auto;'>Email</th>
				  <th style='border:2px solid #000;margin: 0 auto;'>Username</th>
				  <th style='border:2px solid #000;margin: 0 auto;'>Joining date</th>
				  <th style='border:2px solid #000;margin: 0 auto;'>Delete?!</th>
				</tr>
				<tr>
				<td style='border:2px solid #000;text-align: center;'>".$row['user_id']."</td>
				<td style='border:2px solid #000;text-align: center;'>".$row['user_level']."</td>
				  <td style='border:2px solid #000;text-align: center;'>".$row['user_firstname']."</td>
				  <td style='border:2px solid #000;text-align: center;'>".$row['user_lastname']."</td>
				  <td style='border:2px solid #000;text-align: center;'>".$row['user_email']."</td>
				  <td style='border:2px solid #000;text-align: center;'>".$row['user_username']."</td>
				  <td style='border:2px solid #000;text-align: center;'>".$row['user_date']."</td>
				  <td style='border:2px solid #000;text-align: center;'><button type='submit' name='delete'><a href='delete.php?id=".$row['user_id']."'>DELETE</a></button></td>
				 </tr>
			</table>";
			}
	}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
	public function delete($id){
        try
        {
			$stmt = $this->conn->prepare("DELETE FROM users WHERE user_id=:id");
            $stmt->bindparam(':id',$id);
            $stmt->execute();   
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
}



class reservations{
	private $conn;

	public function __construct()
	{
		$database = new Database();
		$db = $database->Connection();
		$this->conn = $db;
    }


	public function runQuery($sql)
	{
		$stmt = $this->conn->prepare($sql);
		return $stmt;
	}

	public function showReservations(){
		try{
			$stmt = $this->conn->query("SELECT * FROM reservations");
			while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
				if($row['reservation_status']==0){//res_status=0 kada rezervacija ceka potvrdu , kada je 0 nije potvrdjen termin kada je 1 potvrdjen je termin
				echo "<div class='tabele'><table style='background:#f5f5f5;width:100%;border:2px solid #000;'>
				<tr>
				<th style='border:2px solid #000;margin: 0 auto;'>>ID</th>
				  <th style='border:2px solid #000;margin: 0 auto;'>>ID Rezervacije</th>
				  <th style='border:2px solid #000;margin: 0 auto;'>>Ime</th> 
				  <th style='border:2px solid #000;margin: 0 auto;'>>Email</th>
				  <th style='border:2px solid #000;margin: 0 auto;'>>Poruka</th>
				  <th style='border:2px solid #000;margin: 0 auto;'>>Telefon</th>
				  <th style='border:2px solid #000;margin: 0 auto;'>>Datum rezervacije</th>
				  <th style='border:2px solid #000;margin: 0 auto;'>>Vrijeme rezervacije</th>
				  <th style='border:2px solid #000;margin: 0 auto;'>>Status</th>
				</tr>
				<tr>
				<td style='border:2px solid #000;margin: 0 auto;'>>".$row['reservation_id']."</td>
				  <td style='border:2px solid #000;margin: 0 auto;'>>".$row['reservation_username']."</td>
				  <td style='border:2px solid #000;margin: 0 auto;'>>".$row['reservation_email']."</td>
				  <td style='border:2px solid #000;margin: 0 auto;'>>".$row['reservation_phone']."</td>
				  <td style='border:2px solid #000;margin: 0 auto;'>>".$row['reservation_type']."</td>
				  <td style='border:2px solid #000;margin: 0 auto;'>>".$row['reservation_notes']."</td>
				  <td style='border:2px solid #000;margin: 0 auto;'>>".$row['reservation_date']."</td>
				  <td style='border:2px solid #000;margin: 0 auto;'>>".$row['reservation_slot']."</td>
				  <td style='border:2px solid #000;margin: 0 auto;'>>".$row['reservation_status']."</td>		  
 				  <td style='border:2px solid #000;margin: 0 auto;'><button type='submit' name='delete'><a href='confirm_reservations.php?id=".$row['reservation_id']."&status=".$row['reservation_status']."'>Confirm reservation</a></button></td>	 
				</tr>
			  </table></div>";
			}
		}
	}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
		}

	public function confirm($reservation_status,$reservation_id){
		try{
			$stmt =$this->conn->prepare("UPDATE reservations SET reservation_status = :reservation_status WHERE reservation_id = :reservation_id");
			$stmt->bindParam(':reservation_status',$reservation_status,PDO::PARAM_INT);
			$stmt->bindParam(':reservation_id',$reservation_id);
			$stmt->execute();

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
		$db = $database->Connection();
		$this->conn = $db;
    }


	public function runQuery($sql)
	{
		$stmt = $this->conn->prepare($sql);
		return $stmt;
	}
	
	public function showHotel(){
		try{
			$stmt = $this->conn->query("SELECT * FROM tirehotel");
			while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
				echo "<div class='tabele'><table>
				<tr>
				<th>Hotel ID</th>
				  <th>Code</th>
				  <th>Username</th> 
				  <th>E-mail</th>
				  <th>Phone</th>
				  <th>Tire number</th>
				  <th>Tire type</th>
				  <th>Date form</th>
				  <th>Date to</th>
				  <th>Tire Hotel reservation date</th>

				</tr>
				<tr>
				<td>".$row['hotel_id']."</td>
				  <td>".$row['hotel_sifra']."</td>
				  <td>".$row['hotel_username']."</td>
				  <td>".$row['hotel_email']."</td>
				  <td>".$row['hotel_number']."</td>
				  <td>".$row['hotel_tireType']."</td>
				  <td>".$row['hotel_tireNum']."</td>
				  <td>".$row['hotel_dateFrom']."</td>
				  <td>".$row['hotel_dateTo']."</td>
				   <td>".$row['hotel_dateRes']."</td>
				   <td><button type='submit' name='delete'><a href='deletehotel.php?id=".$row['hotel_id']."&sifra=".$row['hotel_sifra']."'>Izbrisi</a></button></td>
				  
				</tr>
			  </table></div>";
			}
		}
	
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
		}
	
	public function deleteHotel($hotel_id,$hotel_sifra){
		try
        {
			$stmt = $this->conn->prepare("DELETE FROM tirehotel WHERE hotel_id=:hotel_id AND hotel_sifra=:hotel_sifra");
			$stmt->bindparam(':hotel_id',$hotel_id);
			$stmt->bindparam(':hotel_sifra',$hotel_sifra);
            $stmt->execute();
            
            
        }
		catch(PDOException $e)
		{
			echo $e->getMessage();
        }
    }
}
?>