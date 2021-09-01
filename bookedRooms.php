<?php
session_start();
if(!isset($_SESSION['username'])){
  header("Location: http://localhost/hotel_management_system/index.php");
}
$email=$_SESSION["username"];
$room=$_GET['room'];
$price=$_GET['price'];
$cin=$_SESSION["cindate"];
$cout=$_SESSION["coutdate"];
$loc=$_GET['loc'];

$okk=0;

$conn = mysqli_connect("localhost","root","","hms") or die("Connection failed");

$sql999000= "Select COUNT(id) AS no from cart where email='$email'";
$result999000 = mysqli_query($conn, $sql999000) or die("Query failed999000");
$row999000 = mysqli_fetch_assoc($result999000);
$no=$row999000['no']." ";

echo $no;

if ($no>=5) {
  $okk=1;
  $_SESSION["id"]=3;
  header("Location: http://localhost/hotel_management_system/lastCheck.php");
}

$sql2 = "Select * from cart where room=$room and ((cindate>= '$cin' and cindate<= '$cout') or (coutdate>= '$cin' and coutdate<= '$cout'))";
$result2 = mysqli_query($conn, $sql2) or die("Query failed2");

if(mysqli_num_rows($result2) >0 && $okk==0){
  $okk=1;
  $_SESSION["id"]=1;
  header("Location: http://localhost/hotel_management_system/lastCheck.php");
}

$sql3 = "Select * from book_room where room=$room and((cindate>= '$cin' and cindate<= '$cout') or (coutdate>= '$cin' and coutdate<= '$cout'))";
$result3 = mysqli_query($conn, $sql3) or die("Query failed3");

if(mysqli_num_rows($result3) >0 && $okk==0){
  $okk=1;
  $_SESSION["id"]=2;
  header("Location: http://localhost/hotel_management_system/lastCheck.php");
}

if($okk==0){
  $time=time()+1800;
$sql = "INSERT INTO cart (email, room, price,cindate,coutdate,etime) VALUES ('{$email}',$room,$price,'{$cin}','{$cout}',$time)";
$result = mysqli_query($conn, $sql) or die("Query failed");
if($loc==1){
header("Location: http://localhost/hotel_management_system/selectAllRoom.php");
}
else if($loc==2){
header("Location: http://localhost/hotel_management_system/selectAvailableRoom.php");

}
}
mysqli_close($conn);
?>
