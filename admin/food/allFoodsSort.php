<?php
$food=$_POST['foodname'];
 ?>
<!doctype html>
<html>
<head>
  <title>All Foods</title>
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
        <h1 style="text-align: center;">All Foods</h1>
      </div>

      <div class="row">
        <div class="col-sm-10 offset-sm-1">
        <table class="table table-striped">
    <?php
    //database connection
    $conn = mysqli_connect("localhost","root","","hms") or die("Connection failed");
    $sql = "Select * from foods where name='$food'";
    $result = mysqli_query($conn, $sql) or die("Query failed");

    ?>
    <tr>
      <th style="text-align: center;">No</th>
      <th style="text-align: center;">Name</th>
      <th style="text-align: center;">Category Name</th>
      <th style="text-align: center;">Description</th>
      <th style="text-align: center;">Quantity</th>
      <th style="text-align: center;">Price</th>
      <th style="text-align: center;">Satus</th>
      </tr>
    <?php
    $no=1;
    while($row = mysqli_fetch_assoc($result)){
     ?>

     <tr>
       <td style="text-align: center;"><?php echo $no;?></td>
       <td style="text-align: center;"><?php echo ucfirst($row['name']);?></td>
       <td style="text-align: center;"><?php echo ucfirst($row['food_category']);?></td>
       <td style="text-align: center;"><?php echo $row['description'];?></td>
       <td style="text-align: center;"><?php echo $row['quantity'];?></td>
       <td style="text-align: center;"><?php echo $row['price'];?></td>
       <td style="text-align: center;"><?php
          if($row['status']==0){
            echo "Unavailable";
          }
          else{
            echo "Available";
          }
       ?></td>
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
