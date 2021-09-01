<?php
$conn1 = mysqli_connect("localhost","root","","hms") or die("Connection failed");
session_start();

if(!isset($_SESSION['username'])){
  header("Location: http://localhost/hotel_management_system/admin/context/contextadmin.php");
}
?>

<?php
  //----------admin------------------
  //--------deletephoto from gallary-----------

  $imgId = $_GET['id'];

  $conn1 = mysqli_connect("localhost","root","","hms") or die("Connection failed");
  $sql1 = "delete from gallary where img_id={$imgId}";
  $result = mysqli_query($conn1, $sql1) or die("Query failed");
  header("Location: http://localhost/hotel_management_system/admin/context/gallarydelete.php");
  mysqli_close($conn1);

 ?>
