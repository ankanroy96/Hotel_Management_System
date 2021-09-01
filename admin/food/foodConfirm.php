<?php
$conn1 = mysqli_connect("localhost","root","","hms") or die("Connection failed");
session_start();

if(!isset($_SESSION['username'])){
  header("Location: http://localhost/hotel_management_system/admin/food/foodadmin.php");
}
?>
<?php
$work=$_GET['id'];
$orderid=$_GET['orderid'];
$conn = mysqli_connect("localhost","root","","hms") or die("Connection failed");

if($work==1){
  $sql = "Select * from request_food where order_id=$orderid";
  $result = mysqli_query($conn, $sql) or die("Query failed");
  if(mysqli_num_rows($result)>0){
    while($row = mysqli_fetch_assoc($result)){
      $foodname=$row['food_name'];
      $category=$row['category'];
      $quantity=$row['quantity'];
      $price=$row['price'];
      $totalprice=$row['total_price'];

      $sql2 = "INSERT INTO confirm_food(order_id,food_name,category,quantity,price,total_price) values ($orderid,'{$foodname}','{$category}',$quantity,$price,$totalprice)";
      $result2 = mysqli_query($conn, $sql2) or die("Query failed2");
    }
  }

  $sql3 = "DELETE FROM request_food where order_id=$orderid";
  $result3 = mysqli_query($conn, $sql3) or die("Query failed3");

  $sql4 = "UPDATE food_orders set status=1, notify=1 where order_id=$orderid";
  $result4 = mysqli_query($conn, $sql4) or die("Query failed4");
}

if($work==2){
  $sql7 = "Select * from request_food where order_id=$orderid";
  $result7 = mysqli_query($conn, $sql7) or die("Query failed7");
  if(mysqli_num_rows($result7)>0){
    while($row7 = mysqli_fetch_assoc($result7)){
      $foodname=$row7['food_name'];
      $category=$row7['category'];
      $quantity=$row7['quantity'];
      $price=$row7['price'];
      $totalprice=$row7['total_price'];

      $sql8 = "INSERT INTO final_foods(order_id,food_name,category,quantity,price,total_price) values ($orderid,'{$foodname}','{$category}',$quantity,$price,$totalprice)";
      $result8 = mysqli_query($conn, $sql8) or die("Query failed8");
    }
  }

  $sql5 = "DELETE FROM request_food where order_id=$orderid";
  $result5 = mysqli_query($conn, $sql5) or die("Query failed5");

  $sql6 = "UPDATE food_orders set status=3, notify=1 where order_id=$orderid";
  $result6 = mysqli_query($conn, $sql6) or die("Query failed6");
}

header("Location: http://localhost/hotel_management_system/admin/food/confirmFoodsList.php");
 ?>
