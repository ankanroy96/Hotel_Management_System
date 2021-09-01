<?php
session_start();
if(!isset($_SESSION['username'])){
  header("Location: http://localhost/hotel_management_system/index.php");
}
$email=$_SESSION['username'];
$cin=$_SESSION['cindate'];
$cout=$_SESSION['coutdate'];
$room=$_GET['room'];
$id=$_GET['id'];

$conn9 = mysqli_connect("localhost","root","","hms") or die("Connection failed");
$sql9 = "delete from cart where email='$email' and cindate='$cin' and coutdate='$cout' and room=$room";
$result9 = mysqli_query($conn9, $sql9) or die("Query failed");
if($id==1){
header("Location: http://localhost/hotel_management_system/selectAllRoom.php");
}
else {
  header("Location: http://localhost/hotel_management_system/selectAvailableRoom.php");
}
mysqli_close($conn9);
 ?>
