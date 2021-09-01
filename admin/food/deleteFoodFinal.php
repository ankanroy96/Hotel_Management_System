<?php
$conn1 = mysqli_connect("localhost","root","","hms") or die("Connection failed");
session_start();

if(!isset($_SESSION['username'])){
  header("Location: http://localhost/hotel_management_system/admin/food/foodadmin.php");
}
?>
<?php
$id=$_GET['id'];

$conn = mysqli_connect("localhost","root","","hms") or die("Connection failed");
$sql = "DELETE from foods where id = $id";
$result = mysqli_query($conn, $sql) or die("Query failed");


header("Location: http://localhost/hotel_management_system/admin/food/allFoods.php");

mysqli_close($conn);

 ?>
