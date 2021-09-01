<?php
include 'session.php';
if(!isset($_SESSION['roomno'])){
  header("Location: http://localhost/hotel_management_system/roomLogin.php");
}
$room=$_SESSION['roomno'];
$orderno=$_SESSION['orderno'];
?>
<!--------------------------------user--------------------------->
<!---------------------------food page-------------------------->
<!doctype html>
<html>
<head>
  <!-----user--->
  <title>My Cart</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css\bootstrap.css">
  <link rel="stylesheet" href="css\room.css">

</head>

<body>
  <div class="container-flud">
    <div class="row">
      <?php
        include 'foodheader.php';
      ?>
    </div>
    <br>
    <br>
    <br>
    <div class="row">
      <h1 style="text-align: center;">My Cart</h1>
    </div>


    <div class="row">
      <div class="col-sm-8 offset-sm-2">
      <table class="table table-striped">
  <?php
  //database connection
  $conn = mysqli_connect("localhost","root","","hms") or die("Connection failed");

  $sql1 = "Select * from tax_offer where type='food'";
  $result1 = mysqli_query($conn, $sql1) or die("Query failed1");
  $row1 = mysqli_fetch_assoc($result1);
  $foodtax=$row1['tax'];
  $fooddiscount=$row1['discount'];

  $sql = "Select * from food_cart where room_no='$room' and order_no='$orderno'";
  $result = mysqli_query($conn, $sql) or die("Query failed");

  ?>
  <tr>
    <th style="text-align: center;">No</th>
    <th style="text-align: center;">Food Name</th>
    <th style="text-align: center;">Category Name</th>
    <th style="text-align: center;">Quantity</th>
    <th style="text-align: center;">Price(Per Unit)</th>
    <th style="text-align: center;">Total Price</th>
    <?php if(isset($_SESSION['roomno'])){?>
    <th colspan="2" style="text-align: center; width: 20%;">Action</th>
  <?php } ?>
    </tr>
  <?php
  $no=1;
  $finalprice=0;
  while($row = mysqli_fetch_assoc($result)){
    $finalprice=$finalprice+$row['total_price'];

   ?>

   <tr>
     <td style="text-align: center;"><?php echo $no;?></td>
     <td style="text-align: center;"><?php echo ucfirst($row['food_name']);?></td>
     <td style="text-align: center;"><?php echo ucfirst($row['category']);?></td>
     <td style="text-align: center;"><?php echo $row['quantity'];?></td>
     <td style="text-align: center;"><?php echo $row['price'];?></td>
     <td style="text-align: center;"><?php echo $row['total_price'];?></td>

     <?php if(isset($_SESSION['roomno'])){?>
     <td style="text-align: center;"><a href="foodEditAction.php?id=<?php echo $row['food_id'];?>&price=<?php echo $row['price'];?>" class="btn btn-primary">Edit Quantity</a></td>
     <td style="text-align: center;"><a href="foodCartAction.php?id=2&id1=<?php echo $row['food_id'];?>" class="btn btn-danger delete">Delete</a></td>
     <?php } ?>
   </tr>

   <?php
   $no++;
     }
     mysqli_close($conn);
   ?>
 </table>
 </div>
 </div>

 <<?php
    $discount=$finalprice*($fooddiscount/100);
    $tax=($finalprice-$discount)*($foodtax/100);
    $fprice=($finalprice-$discount)+$tax;
  ?>

  <div class="row">
    <div class="offset-sm-3 col-4">
      <p style="font-size: 20px;"><b>Total: <?php echo $finalprice;?> Taka<b></p>
    </div>
  </div>

  <div class="row">
    <div class="offset-sm-3 col-4">
      <p style="font-size: 20px;"><b>Discount: <?php echo $discount."Taka($fooddiscount";?>% discount)<b></p>
    </div>
  </div>

  <div class="row">
    <div class="offset-sm-3 col-4">
      <p style="font-size: 20px;"><b>Tax: <?php echo $tax;?><b> Taka</p>
    </div>
  </div>

  <div class="row">
    <div class="offset-sm-3 col-4">
      <p style="font-size: 20px;"><b>Total Price: <?php echo $fprice;?> Taka<b></p>
    </div>
  </div>

 <div class="row">
   <div class="offset-5 col-1">
     <a href="foodConfirm.php?id=<?php echo $fprice?>&discount=<?php echo $fooddiscount?>" class="btn btn-success delete">Confirm</a>
   </div>
   <div class=" col-1">
     <a href="food.php" class="btn btn-primary">Continue Ordering</a>
   </div>
 </div>

  </div>
</div>
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script language="JavaScript" type="text/javascript">
$(document).ready(function(){
    $("a.delete").click(function(e){
        if(!confirm('Are you sure?')){
            e.preventDefault();
            return false;
        }
        return true;
    });
});
</script>
</body>
</html>
