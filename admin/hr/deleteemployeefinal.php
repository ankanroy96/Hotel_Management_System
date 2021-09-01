<?php
$conn1 = mysqli_connect("localhost","root","","hms") or die("Connection failed");
session_start();

if(!isset($_SESSION['username'])){
  header("Location: http://localhost/hotel_management_system/admin/hr/hradmin.php");
}
?>
<?php
if(isset($_POST['submit'])) {
  $id = $_GET['id'];
  $conn2 = mysqli_connect("localhost","root","","hms") or die("Connection failed");
  $sql2 = "delete from employee where id= $id";
  $result2 = mysqli_query($conn2, $sql2) or die("Query failed");
  header("Location: http://localhost/hotel_management_system/admin/hr/allemployee.php");
  mysqli_close($conn2);
}
?>
