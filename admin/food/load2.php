<?php
$conn1 = mysqli_connect("localhost","root","","hms") or die("Connection failed");
session_start();

if(!isset($_SESSION['username'])){
  header("Location: http://localhost/hotel_management_system/admin/food/foodadmin.php");
}
?>
<?php
$conn = mysqli_connect("localhost","root","","hms") or die("Connection failed");
$sql = "Select * from food_orders where notify=0 order by order_id asc";
$result = mysqli_query($conn, $sql) or die("Query failed");
if(mysqli_num_rows($result)>0){
  while($row = mysqli_fetch_assoc($result)){
    ?>
    <a class="dropdown-item text-primary" href="requestedFoods.php?id=<?php echo $row['order_id']?>&room=<?php echo $row['room_no']?>"> A new order from room <?php echo $row['room_no']?></a>
    <div class="dropdown-divider"></div>
<?php
  }
}
else{
  echo '<p class="dropdown-item text-danger font-weight-bold" href="">No New Orders.</p>';
}
?>
