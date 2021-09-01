<?php
session_start();
if(!isset($_SESSION['roomno'])){
  header("Location: http://localhost/hotel_management_system/roomLogin.php");
}
$work=$_GET['id'];
$room=$_SESSION['roomno'];
$orderno=$_SESSION['orderno'];

$conn = mysqli_connect("localhost","root","","hms") or die("Connection failed");

if($work==1){
  $newquantity=$_POST['quantity'];
  $price=$_POST['price'];
  $foodid=$_POST['fid'];
  if($newquantity==0){
    $sql = "DELETE FROM food_cart where food_id=$foodid and room_no=$room and order_no=$orderno";
    $result = mysqli_query($conn, $sql) or die("Query failed");
  }
  else{
    $totalprice=$newquantity*$price;
    $sql2 = "UPDATE food_cart set quantity=$newquantity,total_price=$totalprice where food_id=$foodid and room_no=$room and order_no=$orderno";
    $result2 = mysqli_query($conn, $sql2) or die("Query failed2");
  }
}

if($work==2){
  $foodid=$_GET['id1'];
  $sql3 = "DELETE FROM food_cart where food_id=$foodid and room_no=$room and order_no=$orderno";
  $result3 = mysqli_query($conn, $sql3) or die("Query failed3");
}
header("Location: http://localhost/hotel_management_system/foodcart.php");
 ?>
