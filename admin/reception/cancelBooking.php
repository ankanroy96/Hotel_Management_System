<?php
session_start();

if(!isset($_SESSION['reception_admin'])){
  header("Location: http://localhost/hotel_management_system/admin/reception/reception.php");
}
?>
<?php

$email=$_SESSION['guestEmail'];
$cin=$_SESSION['cindate'];
$cout=$_SESSION['coutdate'];
$room=$_GET['room'];


$conn9 = mysqli_connect("localhost","root","","hms") or die("Connection failed");
$sql9 = "delete from cart where email='$email' and cindate='$cin' and coutdate='$cout' and room=$room";
$result9 = mysqli_query($conn9, $sql9) or die("Query failed");
header("Location: http://localhost/hotel_management_system/admin/reception/availableAllRooms.php");
mysqli_close($conn9);
 ?>
