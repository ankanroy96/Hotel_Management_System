<?php
session_start();
$_SESSION["room_type"]=$_GET['type'];
if(!isset($_SESSION['username'])){
  header("Location: http://localhost/hotel_management_system/index.php");
}
else if(!isset($_SESSION['room_type'])){
  header("Location: http://localhost/hotel_management_system/room.php");
}
else{
  header("Location: http://localhost/hotel_management_system/bookDate.php");
}
?>
