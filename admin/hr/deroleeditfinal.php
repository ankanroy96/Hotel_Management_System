<?php
$conn1 = mysqli_connect("localhost","root","","hms") or die("Connection failed");
session_start();

if(!isset($_SESSION['username'])){
  header("Location: http://localhost/hotel_management_system/admin/hr/hradmin.php");
}
?>
<?php
  $id=$_GET['id'];
  $id1=$_GET['id1'];
  $new=$_POST['newrole'];
  $conn1 = mysqli_connect("localhost","root","","hms") or die("Connection failed");
  $sql1 = "update employee set deparment='{$id1}',role='{$new}' where id=$id";
  $result = mysqli_query($conn1, $sql1) or die("Query failed");
  header("Location: http://localhost/hotel_management_system/admin/hr/allemployee.php");
  mysqli_close($conn1);
?>
