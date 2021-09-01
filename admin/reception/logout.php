<?php
session_start();

if(!isset($_SESSION['reception_admin'])){
  header("Location: http://localhost/hotel_management_system/admin/reception/reception.php");
}
?>
<?php
//--------------Admin
//------------------context admin logout-------------------------

$conn1 = mysqli_connect("localhost","root","","hms") or die("Connection failed");

session_unset();
session_destroy();

header("Location: http://localhost/hotel_management_system/admin/reception/reception.php");

 ?>
