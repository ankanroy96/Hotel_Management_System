<!doctype html>
<html>
<head>
  <title>All Orders</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css\bootstrap.css">
  <link rel="stylesheet" href="css\style.css">

</head>

<body>
  <?php
    include 'header.php';
    include 'sidebar.php';
    ?>
    <div class="container-flud">
      <div class="row">
        <h1 style="text-align: center;">All Orders</h1>
      </div>
      <form action="allOrdersSort.php" method="post">
        <div class="row">
          <!----Department----->
          <div class="offset-9 col-2">
            <input type="text" name="order_id" id="order_id" class="form-control" placeholder="Enter Order id" required>
          </div>

          <div class="col-1">
            <div class="form-group">
            <input type="submit" name="submit" id="btn" class="btn btn-primary" value="Search">
          </div>
          </div>
          </div>
      </form>
      <div class="row">
        <div class="col-sm-8 offset-sm-2">
        <table class="table table-striped">
          <?php
          //database connection
          $conn = mysqli_connect("localhost","root","","hms") or die("Connection failed");
          $sql = "Select * from food_orders order by order_id desc";
          $result = mysqli_query($conn, $sql) or die("Query failed");

          ?>
          <tr>
            <th style="text-align: center;">No</th>
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
             <td style="text-align: center;color: blue;"><a href="foodOrdersDetail.php?id=<?php echo $row['order_id']?>&status=<?php echo $row['status']?>">Show Details</a></td>
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
