<?php
$conn1 = mysqli_connect("localhost","root","","hms") or die("Connection failed");
session_start();

if(!isset($_SESSION['username'])){
  header("Location: http://localhost/hotel_management_system/admin/room/roomadmin.php");
}
?>
<?php

  $type=$_POST['size_type'];
  $newname=$_POST['newname'];
  $adult=$_POST['adult'];
  $child=$_POST['child'];

  if($newname==""){
    $newname=$type;
  }
  $conn3 = mysqli_connect("localhost","root","","hms") or die("Connection failed");

  $sql3 ="UPDATE size_type set size_type='{$newname}',adult='{$adult}',child='{$child}' where size_type='{$type}'";
  $result3 = mysqli_query($conn3, $sql3) or die("Query failed");

  $sql4 ="UPDATE rooms set size_type='{$newname}',adult='{$adult}',child='{$child}' where size_type='{$type}'";
  $result4 = mysqli_query($conn3, $sql4) or die("Query failed1");
  mysqli_close($conn3);
  header("Location: http://localhost/hotel_management_system/admin/room/allRoom.php");
 ?>
