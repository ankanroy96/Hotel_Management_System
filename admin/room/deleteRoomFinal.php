<?php
$conn1 = mysqli_connect("localhost","root","","hms") or die("Connection failed");
session_start();

if(!isset($_SESSION['username'])){
  header("Location: http://localhost/hotel_management_system/admin/room/roomadmin.php");
}
?>
<?php
  $id=$_POST['id'];


  $conn3 = mysqli_connect("localhost","root","","hms") or die("Connection failed");
  $sql3 ="DELETE FROM rooms WHERE id= $id";
  $result3 = mysqli_query($conn3, $sql3) or die("Query failed");
  mysqli_close($conn3);
  header("Location: http://localhost/hotel_management_system/admin/room/allRoom.php");
 ?>
