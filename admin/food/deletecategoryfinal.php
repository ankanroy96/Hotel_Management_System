<?php
$conn1 = mysqli_connect("localhost","root","","hms") or die("Connection failed");
session_start();

if(!isset($_SESSION['username'])){
  header("Location: http://localhost/hotel_management_system/admin/food/foodadmin.php");
}
?>
<?php
echo $id=$_GET['id'];
echo $preposition=$_GET['id1'];

$conn = mysqli_connect("localhost","root","","hms") or die("Connection failed");
$sql = "DELETE from food_category where id = $id";
$result = mysqli_query($conn, $sql) or die("Query failed");

$sql2 = "SELECT * from food_category where position>$preposition";
$result2 = mysqli_query($conn, $sql2) or die("Query failed");
if(mysqli_num_rows($result2)>0){
  while($row6 = mysqli_fetch_assoc($result2)){
  $nid=$row6['id'];
  $p=$row6['position']-1;
    $sql8 = "UPDATE food_category set position=$p where id=$nid";
    $result8 = mysqli_query($conn, $sql8) or die("Query failed3");
  }
}
header("Location: http://localhost/hotel_management_system/admin/food/allcategory.php");

mysqli_close($conn);

 ?>
