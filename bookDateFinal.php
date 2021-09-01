<?php
session_start();
if(!isset($_SESSION['username'])){
  header("Location: http://localhost/hotel_management_system/index.php");
}
else if(isset($_POST['submit'])){

$_SESSION["cindate"]=$_POST['cindate'];
$_SESSION["coutdate"]=$_POST['coutdate'];
$_SESSION["size_type"]=$_POST['size_type'];

if(!isset($_SESSION['cindate'])){
  header("Location: http://localhost/hotel_management_system/room.php");
}
else{
  header("Location: http://localhost/hotel_management_system/selectAllRoom.php");
}
}
else{
  header("Location: http://localhost/hotel_management_system/Room.php");

}
?>
