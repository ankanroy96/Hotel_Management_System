<?php
$orderid=$_GET['id'];
$room=$_GET['room'];
 ?>
<!doctype html>
<html>
<head>
  <title>Confirm Foods</title>
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
        <h1 style="text-align: center;">Confirm Foods Of Room <?php echo $room;?></h1>
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
    $sql = "Select * from confirm_food where order_id=$orderid";
    $result = mysqli_query($conn, $sql) or die("Query failed");

    ?>
    <tr>
      <th style="text-align: center;">No</th>
      <th style="text-align: center;">Food Name</th>
      <th style="text-align: center;">Category Name</th>
      <th style="text-align: center;">Quantity</th>
      <th style="text-align: center;">Price</th>
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
    <div class="row">
      <div class="offset-4 col-1">
        <a href="foodConfirmFinal.php?id=1&orderid=<?php echo $orderid?>" class="btn btn-success delete">Delivered</a>
      </div>
      <div class="offset-1 col-1">
        <a href="foodConfirmFinal.php?id=2&orderid=<?php echo $orderid?>" class="btn btn-danger delete">Cancel</a>
      </div>
    </div>

  </div> <!----privious wapper--->
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
