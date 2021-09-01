<?php
$conn1 = mysqli_connect("localhost","root","","hms") or die("Connection failed");
session_start();

if(!isset($_SESSION['username'])){
  header("Location: http://localhost/hotel_management_system/admin/food/foodadmin.php");
}
?>
<?php
$id=$_POST['id'];
$pfoodname=$_POST['pfoodname'];
$foodname=$_POST['foodname'];
$pquantity=$_POST['pquantity'];
$quantity=$_POST['quantity'];
$category=$_POST['categoryType'];
$price=$_POST['price'];
$status=$_POST['status'];
$description=$_POST['description'];
$error=0;

$conn = mysqli_connect("localhost","root","","hms") or die("Connection failed");


if($pfoodname!=$foodname && $error==0){
  $sql = "Select * from foods where name='$foodname' and quantity='$quantity'";
  $result = mysqli_query($conn, $sql) or die("Query failed");
  if(mysqli_num_rows($result)>0){
    ?>
    <p style="font-size: 20px;">Food is already there.<br></p>
    <a href="editFoodFinal.php?id=<?php echo $id;?>" style="font-size: 20px;">Go back</a>
<?php
$error++;
  }
  if(mysqli_num_rows($result)==0){
    $sql2 = "UPDATE foods set name='$foodname' where id=$id";
    $result2 = mysqli_query($conn, $sql2) or die("Query failed2");
  }
}

if($pquantity!=$quantity && $error==0){
  $sql100 = "Select * from foods where name='$foodname' and quantity='$quantity'";
  $result100 = mysqli_query($conn, $sql100) or die("Query failed100");
  if(mysqli_num_rows($result100)>0){
    ?>
    <p style="font-size: 20px;">Food is already there.<br></p>
    <a href="editFoodFinal.php?id=<?php echo $id;?>" style="font-size: 20px;">Go back</a>
<?php
$error++;
  }
  if(mysqli_num_rows($result100)==0){
    $sql200 = "UPDATE foods set quantity='$quantity' where id=$id";
    $result200 = mysqli_query($conn, $sql200) or die("Query failed200");
  }
}

  if($error==0){
    $sql7 = "UPDATE foods set status=$status, food_category=$category,description='$description',price=$price where id=$id";
    $result7 = mysqli_query($conn, $sql7) or die("Query failed7");
    header("Location: http://localhost/hotel_management_system/admin/food/allfoods.php");
  }
mysqli_close($conn);

 ?>
