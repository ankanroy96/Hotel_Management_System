<?php
include 'session.php';
if(!isset($_SESSION['roomno'])){
  header("Location: http://localhost/hotel_management_system/roomLogin.php");
}
$room=$_SESSION['roomno'];
$orderno=$_SESSION['orderno'];
$id=$_GET['id'];
$status=$_GET['status'];
?>
<!doctype html>
<html>
<head>
  <title>Confirm Foods</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css\bootstrap.css">
  <link rel="stylesheet" href="css\room.css">

</head>

<body>
  <?php
    include 'foodheader.php';
    ?>
    <div class="container-flud">
      <div class="row" style="margin-top:30px;">
        <h1 style="text-align: center;">Order Food Details</h1>
      </div>

      <br>
      <br>
      <br>

      <div class="row">
        <div class="col-sm-6 offset-sm-3">
        <table class="table table-striped">
    <?php
    //database connection
    $conn = mysqli_connect("localhost","root","","hms") or die("Connection failed");
    if($status==0){
    $sql = "Select * from request_food where order_id=$id";
  }
  else if($status==1){
  $sql = "Select * from confirm_food where order_id=$id";
}
  else if($status==2 || $status==3){
    $sql = "Select * from final_foods where order_id=$id";
}
    $result = mysqli_query($conn, $sql) or die("Query failed");

    ?>
    <tr>
      <th style="text-align: center;">No</th>
      <th style="text-align: center;">Food Name</th>
      <th style="text-align: center;">Category</th>
      <th style="text-align: center;">Quantity</th>
      <th style="text-align: center;">Price (Per Unit)</th>
      <th style="text-align: center;">Total Price</th>
      </tr>
    <?php
    $no=1;
    while($row = mysqli_fetch_assoc($result)){
     ?>

     <tr>
       <td style="text-align: center;"><?php echo $no;?></td>
       <td style="text-align: center;"><?php echo ucfirst($row['food_name']);?></td>
       <td style="text-align: center;"><?php echo ucfirst($row['category']);?></td>
       <td style="text-align: center;"><?php echo $row['quantity'];?></td>
       <td style="text-align: center;"><?php echo $row['price'];?></td>
       <td style="text-align: center;"><?php echo $row['total_price'];?></td>
     </tr>
     <?php
     $no++;
       }
       mysqli_close($conn);
     ?>
   </table>
   </div>
    </div> <!----privious content--->
  </div> <!----privious wapper--->

</body>
</html>
