<?php
$conn1 = mysqli_connect("localhost","root","","hms") or die("Connection failed");
session_start();

if(!isset($_SESSION['username'])){
  header("Location: http://localhost/hotel_management_system/admin/hr/hradmin.php");
}
?>
<?php
  $dep=$_GET['id'];
  $role=$_POST['role'];
  $conn3 = mysqli_connect("localhost","root","","hms") or die("Connection failed");
  $sql3 ="delete from $dep where role='$role'";
  $result3 = mysqli_query($conn3, $sql3) or die("Query failed1");
  mysqli_close($conn3);
  $conn2 = mysqli_connect("localhost","root","","hms") or die("Connection failed");
  $sql2 ="delete from employee where deparment='$dep' and role='$role'";
  $result2 = mysqli_query($conn2, $sql2) or die("Query failed2");
  mysqli_close($conn2);
  header("Location: http://localhost/hotel_management_system/admin/hr/allemployee.php");
 ?>
