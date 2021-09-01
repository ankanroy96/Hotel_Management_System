<?php
session_start();

if(!isset($_SESSION['reception_admin'])){
  header("Location: http://localhost/hotel_management_system/admin/reception/reception.php");
}
?>
<?php

if(isset($_POST['email'])){
  $_SESSION['guestEmail']=$_POST['email'];
  $_SESSION['guestName']=$_POST['gname'];
  $_SESSION['guestMobile']=$_POST['gmobile'];
}
$email=$_SESSION["guestEmail"];
$room=$_GET['room'];
$price=$_GET['price'];
$cin=$_SESSION["cindate"];
$cout=$_SESSION["coutdate"];

$okk=0;

$conn = mysqli_connect("localhost","root","","hms") or die("Connection failed");
$sql2 = "Select * from cart where room=$room and ((cindate>= '$cin' and cindate<= '$cout') or (coutdate>= '$cin' and coutdate<= '$cout'))";
$result2 = mysqli_query($conn, $sql2) or die("Query failed2");

if(mysqli_num_rows($result2) >0){
  $okk=1;
  $_SESSION["id"]=1;
  header("Location: http://localhost/hotel_management_system/admin/reception/lastCheck.php");
}

$sql3 = "Select * from book_room where room=$room and((cindate>= '$cin' and cindate<= '$cout') or (coutdate>= '$cin' and coutdate<= '$cout'))";
$result3 = mysqli_query($conn, $sql3) or die("Query failed3");

if(mysqli_num_rows($result3) >0 && $okk==0){
  $okk=1;
  $_SESSION["id"]=2;
  header("Location: http://localhost/hotel_management_system/admin/reception/lastCheck.php");
}

if($okk==0){
  $time=time()+1800;
  echo $time;
$sql = "INSERT INTO cart (email, room, price,cindate,coutdate,etime) VALUES ('{$email}',$room,$price,'{$cin}','{$cout}',$time)";
$result = mysqli_query($conn, $sql) or die("Query failed");

header("Location: http://localhost/hotel_management_system/admin/reception/availableAllRooms.php");
}
mysqli_close($conn);
?>
