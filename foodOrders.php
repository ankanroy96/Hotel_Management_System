<?php
include 'session.php';
if(!isset($_SESSION['roomno'])){
  header("Location: http://localhost/hotel_management_system/roomLogin.php");
}
$room=$_SESSION['roomno'];
$orderno=$_SESSION['orderno'];
?>
<!doctype html>
<html>
<head>
  <title>Order Details</title>
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
    $sql = "Select * from food_orders where room_no=$room order by order_id desc";
    $result = mysqli_query($conn, $sql) or die("Query failed");

    ?>
    <tr>
      <th style="text-align: center;">No</th>
      <th style="text-align: center;">Order No</th>
      <th style="text-align: center;">Order Id</th>
      <th style="text-align: center;">Order Date & Time</th>
      <th style="text-align: center;">Status</th>
      <th style="text-align: center;">Details</th>
      </tr>
    <?php
    $no=1;
    while($row = mysqli_fetch_assoc($result)){
     ?>

     <tr>
       <td style="text-align: center;"><?php echo $no;?></td>
       <td style="text-align: center;"><?php echo $row['order_no'];?></td>
       <td style="text-align: center;"><?php echo $row['order_id'];?></td>
       <td style="text-align: center;"><?php echo $row['order_time'];?></td>
       <td style="text-align: center;"><?php
       if($row['status']==0){
         echo "Order Placed";
       }
       else if($row['status']==1){
         echo "Order Confirmed";
       }
       else if($row['status']==2){
         echo "Order Delivered";
       }
       else if($row['status']==3){
         echo "Order Canceled";
       }
       ?></td>
       <td style="text-align: center;"><a href="foodOrdersDetail.php?id=<?php echo $row['order_id']?>&status=<?php echo $row['status']?>">Show Details</a></td>
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
