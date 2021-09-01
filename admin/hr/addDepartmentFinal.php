<?php
$conn1 = mysqli_connect("localhost","root","","hms") or die("Connection failed");
session_start();

if(!isset($_SESSION['username'])){
  header("Location: http://localhost/hotel_management_system/admin/hr/hradmin.php");
}
?>
<?php
  $depname=$_POST['newdep'];
  $conn3 = mysqli_connect("localhost","root","","hms") or die("Connection failed");
  $sql3 ="INSERT INTO department(dp_name) values ('{$depname}')";
  $result3 = mysqli_query($conn3, $sql3) or die("Query failed");
  mysqli_close($conn3);
  $conn2 = mysqli_connect("localhost","root","","hms") or die("Connection failed");
  $sql2 ="CREATE TABLE $depname ( id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, role VARCHAR(30) NOT NULL UNIQUE)";
  $result2 = mysqli_query($conn2, $sql2) or die("Query failed2");
  mysqli_close($conn2);

  header("Location: http://localhost/hotel_management_system/admin/hr/allemployee.php");

 ?>
