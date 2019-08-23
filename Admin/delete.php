<?php
require "function.php";
@$id=$_GET['id'];
$delete = new USER();
$delete->delete($id);
header("Location:users.php");
?>