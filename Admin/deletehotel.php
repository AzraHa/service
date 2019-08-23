<?php
require "function.php";

@$hotel_id = $_GET['id'];
@$hotel_sifra = $_GET['sifra'];


$delete = new hotel();
$delete->deleteHotel($hotel_id,$hotel_sifra);

header("Location:hotel.php");
?>
