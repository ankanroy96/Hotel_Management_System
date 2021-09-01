<?php
$conn1 = mysqli_connect("localhost","root","","hms") or die("Connection failed");
session_start();

if(!isset($_SESSION['username'])){
  header("Location: http://localhost/hotel_management_system/admin/room/roomadmin.php");
}
?>
<?php
  $type=$_POST['room_type'];
  $conn3 = mysqli_connect("localhost","root","","hms") or die("Connection failed");
  $sql3 ="delete from room_type where room_type='$type'";
  $result3 = mysqli_query($conn3, $sql3) or die("Query failed1");
  mysqli_close($conn3);
  $conn2 = mysqli_connect("localhost","root","","hms") or die("Connection failed");
  $sql2 ="delete from rooms where room_type='$type'";
  $result2 = mysqli_query($conn2, $sql2) or die("Query failed2");
  mysqli_close($conn2);

  header("Location: http://localhost/hotel_management_system/admin/room/allRoom.php");
 ?>
