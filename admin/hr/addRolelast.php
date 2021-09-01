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
  $conn1 = mysqli_connect("localhost","root","","hms") or die("Connection failed");
  $sql1 = "insert into $dep(role) values('{$role}')";
  $result = mysqli_query($conn1, $sql1) or die("Query failed");
  header("Location: http://localhost/hotel_management_system/admin/hr/allemployee.php");
  mysqli_close($conn1);
?>
