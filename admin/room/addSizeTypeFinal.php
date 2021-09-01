<?php
$conn1 = mysqli_connect("localhost","root","","hms") or die("Connection failed");
session_start();

if(!isset($_SESSION['username'])){
  header("Location: http://localhost/hotel_management_system/admin/room/roomadmin.php");
}
?>
<?php

  $type=$_POST['newtype'];
  $adult=$_POST['adult'];
  $child=$_POST['child'];
  $conn3 = mysqli_connect("localhost","root","","hms") or die("Connection failed");
  $sql3 ="INSERT INTO size_type(size_type,adult,child) values ('{$type}','{$adult}','{$child}')";
  $result3 = mysqli_query($conn3, $sql3) or die("Room type is already there.");
  mysqli_close($conn3);
  header("Location: http://localhost/hotel_management_system/admin/room/allRoom.php");
 ?>
