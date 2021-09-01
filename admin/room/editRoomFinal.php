<?php
$conn1 = mysqli_connect("localhost","root","","hms") or die("Connection failed");
session_start();

if(!isset($_SESSION['username'])){
  header("Location: http://localhost/hotel_management_system/admin/room/roomadmin.php");
}
?>
<?php
$id=$_GET['id'];
$room_type=$_POST['room_type'];
$size_type=$_POST['size_type'];
$price=$_POST['price'];

$conn3 = mysqli_connect("localhost","root","","hms") or die("Connection failed");

$sql3 ="SELECT * from size_type where size_type='{$size_type}'";
$result3 = mysqli_query($conn3, $sql3) or die("Query failed");
$row = mysqli_fetch_assoc($result3);
$adult=$row['adult'];
$child=$row['child'];

$sql4 ="UPDATE rooms set size_type='{$size_type}',adult='{$adult}',child='{$child}',price=$price, room_type='{$room_type}' where id=$id";
$result4 = mysqli_query($conn3, $sql4) or die("Query failed1");
mysqli_close($conn3);
header("Location: http://localhost/hotel_management_system/admin/room/allRoom.php");

 ?>
