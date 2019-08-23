<!DOCTYPE>
<html>
<head>

<title>Tire Hotel Price</title>
</head>
<body>

<?php

@$date1 = $_GET['datum1'];
@$date2 = $_GET['datum2'];


function DateDifference( $date1, $date2 = null){
    
    $date1 = new DateTime($date1);
    $date2 = $date2 == null ? new DateTime() : new DateTime($date2);
    $interval = $date1->diff($date2);
    echo "From : " . $date1->format('d-m-Y') . "<br>";
    echo "To : " . $date2->format('d-m-Y') . "<br>";
    $years = $interval->y;
    $months = $interval->m;
    $days = $interval->d;
    $dani = $years * 365 + $months*30 + $days; 
    $cijena = $dani * 1.5;
    echo $years."<br>".$months."<br>".$days;
    echo "<br><div class='login-signup'>
    Price: </div>".$cijena." KM";
    echo "<br><a href='../store/index.php'>Nazad</a>";
}
DateDifference($date1,$date2);

?>
</div>
</body>
</html>