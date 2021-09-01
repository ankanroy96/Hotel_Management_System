<?php
session_start();
if(!isset($_SESSION['roomno'])){
  header("Location: http://localhost/hotel_management_system/roomLogin.php");
}
$conn = mysqli_connect("localhost","root","","hms") or die("Connection failed");
$sql = "Select * from food_orders where notify=0";
$result = mysqli_query($conn, $sql) or die("Query failed");
$count=mysqli_num_rows($result);

 ?>
 <?php echo $count;?>
