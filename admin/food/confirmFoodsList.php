<!doctype html>
<html>
<head>
  <title>Confirm Foods List</title>
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
        <h1 style="text-align: center;">Confirm Foods list</h1>
      </div>

      <div class="row">
        <div class="col-sm-6 offset-sm-3">
        <table class="table table-striped">
    <?php
    //database connection
    $conn = mysqli_connect("localhost","root","","hms") or die("Connection failed");
    $sql = "Select * from food_orders where status=1 order by order_id asc";
    $result = mysqli_query($conn, $sql) or die("Query failed");

    ?>
    <tr>
      <th style="text-align: center;">No</th>
      <th style="text-align: center;">Room No</th>
      <th style="text-align: center;">Order</th>
      </tr>
    <?php
    while($row = mysqli_fetch_assoc($result)){
      $i=1;
     ?>

     <tr>
       <td style="text-align: center;"><?php echo $i;?></td>
       <td style="text-align: center;"><?php echo $row['room_no'];?></td>
       <td style="text-align: center; color: blue;"><a href="confirmFoods.php?id=<?php echo $row['order_id']?>&room=<?php echo $row['room_no']?>">See Order</a></td>

     </tr>

     <?php
     $i++;
       }
       mysqli_close($conn);
     ?>
   </table>
   </div>
    </div> <!----privious content--->
  </div> <!----privious wapper--->

</body>
</html>
