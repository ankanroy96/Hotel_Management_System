<!---------------------------user side------------------>
<?php
session_start();
if(!isset($_SESSION['roomno'])){
  header("Location: http://localhost/hotel_management_system/roomLogin.php");
}
$room=$_SESSION['roomno'];
$orderno=$_SESSION['orderno'];
$finalfinalprice=$_GET['id'];
$discount=$_GET['discount'];

date_default_timezone_set('Asia/Dhaka');
$date=date("m/d/Y h:ia");

$conn = mysqli_connect("localhost","root","","hms") or die("Connection failed");
$sql = "INSERT INTO food_orders(room_no,order_no,final_price,status,notify,order_time) values ($room,$orderno,$finalfinalprice,0,0,'{$date}')";
$result = mysqli_query($conn, $sql) or die("Query failed");

$sql2 = "Select order_id from food_orders where room_no=$room and order_no=$orderno";
$result2 = mysqli_query($conn, $sql2) or die("Query failed2");
while($row2 = mysqli_fetch_assoc($result2)){
  $orderid=$row2['order_id'];
}

$sql3 = "Select * from food_cart where room_no=$room and order_no=$orderno";
$result3 = mysqli_query($conn, $sql3) or die("Query failed3");
while($row3 = mysqli_fetch_assoc($result3)){
  $foodname=$row3['food_name'];
  $category=$row3['category'];
  $quantity=$row3['quantity'];
  $price=$row3['price'];
  $totalprice=$row3['total_price'];

  $fprice=$price-($price*($discount/100));
  $totalprice=$fprice*$quantity;

  $sql4 = "INSERT INTO request_food(order_id,food_name,category,quantity,price,total_price) values ($orderid,'{$foodname}','{$category}',$quantity,$fprice,$totalprice)";
  $result4 = mysqli_query($conn, $sql4) or die("Query failed4");
}

$sql5 = "DELETE FROM food_cart where room_no=$room and order_no=$orderno";
$result5 = mysqli_query($conn, $sql5) or die("Query failed5");

$_SESSION['orderno']=$orderno+1;
$new=$_SESSION['orderno'];

$sql6 = "UPDATE room_login set order_no=$new where username=$room";
$result6 = mysqli_query($conn, $sql6) or die("Query failed6");

header("Location: http://localhost/hotel_management_system/food.php");

 ?>
