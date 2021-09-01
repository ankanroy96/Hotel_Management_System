<?php
$conn1 = mysqli_connect("localhost","root","","hms") or die("Connection failed");
session_start();

if(!isset($_SESSION['username'])){
  header("Location: http://localhost/hotel_management_system/admin/room/roomadmin.php");
}
?>
<?php

  $detype=$_POST['de_size_type'];
  $retype=$_POST['re_size_type'];


  if($detype==$retype){
    echo "Delete size and Replace size can't be same.";
    echo '<a href="deletesizetype.php">Go Back</a>';
  }
  else{
  $conn3 = mysqli_connect("localhost","root","","hms") or die("Connection failed");

  $sql3 ="SELECT * from size_type where size_type='{$retype}'";
  $result3 = mysqli_query($conn3, $sql3) or die("Query failed");
  $row = mysqli_fetch_assoc($result3);
  $adult=$row['adult'];
  $child=$row['child'];

  $sql4 ="UPDATE rooms set size_type='{$retype}',adult='{$adult}',child='{$child}' where size_type='{$detype}'";
  $result4 = mysqli_query($conn3, $sql4) or die("Query failed1");

  $sql3 ="DELETE from size_type where size_type='{$detype}'";
  $result3 = mysqli_query($conn3, $sql3) or die("Query failed1");

  mysqli_close($conn3);
  header("Location: http://localhost/hotel_management_system/admin/room/allRoom.php");
}
 ?>
