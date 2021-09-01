<?php
$id=$_GET['id'];
session_start();
if(!isset($_SESSION['roomno'])){
  header("Location: http://localhost/hotel_management_system/roomLogin.php");
}

$room=$_SESSION['roomno'];
$orderno=$_SESSION['orderno'];
$foodname=$_POST['foodname'];
$category=$_POST['category'];
$quantity=$_POST['quantity'];
$price=$_POST['price'];
$foodid=$_POST['foodid'];



$conn = mysqli_connect("localhost","root","","hms") or die("Connection failed");
$sql = "SELECT quantity FROM food_cart where food_id=$foodid and room_no=$room and order_no=$orderno";
$result = mysqli_query($conn, $sql) or die("Query failed");

if(mysqli_num_rows($result) > 0 && $quantity>0) {
  while($row = mysqli_fetch_assoc($result)){
    $prequantity=$row['quantity'];
    $newquantity=$prequantity+$quantity;
    $totalprice=$newquantity*$price;
    $sql2 = "UPDATE food_cart set quantity=$newquantity,total_price=$totalprice where food_id=$foodid and room_no=$room and order_no=$orderno";
    $result2 = mysqli_query($conn, $sql2) or die("Query failed2");
  }
}

if(mysqli_num_rows($result) == 0 && $quantity>0) {
    $totalprice=$quantity*$price;
    $sql3 = "INSERT INTO food_cart(food_id,room_no,order_no,food_name,category,quantity,price,total_price) values
    ($foodid,$room,$orderno,'{$foodname}','{$category}',$quantity,$price,$totalprice)";
    $result3 = mysqli_query($conn, $sql3) or die("Query failed3");
}
if($id==1){
header("Location: http://localhost/hotel_management_system/Food.php");
}
else if($id==2){
  header("Location: http://localhost/hotel_management_system/Foodsort.php?type=$category");
}

 ?>
