<?php
session_start();

if(!isset($_SESSION['reception_admin'])){
  header("Location: http://localhost/hotel_management_system/admin/reception/reception.php");
}
?>
<?php
$code=$_GET['id'];

$conn9 = mysqli_connect("localhost","root","","hms") or die("Connection failed");
$sql9 = "delete from room_book_info where code='$code'";
$result9 = mysqli_query($conn9, $sql9) or die("Query failed");
header("Location: http://localhost/hotel_management_system/admin/reception/passBookings.php");
mysqli_close($conn9);
 ?>
