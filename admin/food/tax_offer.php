<!doctype html>
<html>
<head>
  <title>Tax & Discount</title>
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
        <h1 style="text-align: center;">Tax and Discount</h1>
      </div>

      <br>
      <br>

      <div class="row">
        <div class="col-sm-6 offset-sm-3">
        <table class="table table-striped">
    <?php
    //database connection
    $conn = mysqli_connect("localhost","root","","hms") or die("Connection failed");
    $sql = "Select * from tax_offer where type='food'";
    $result = mysqli_query($conn, $sql) or die("Query failed");

    ?>
    <?php
    while($row = mysqli_fetch_assoc($result)){
     ?>

     <tr>
       <th style="text-align: center;">Tax</th>
       <td style="text-align: center;"><?php echo $row['tax'];?>%</td>
       <td style="text-align: center; color: blue;"><a href="tax_offerEdit.php?id=1&tax=<?php echo $row['tax'];?>">Edit</a></td>
     </tr>

     <tr>
       <th style="text-align: center;">Discount</th>
       <td style="text-align: center;"><?php echo $row['discount'];?>%</td>
       <td style="text-align: center; color: blue;"><a href="tax_offerEdit.php?id=2&discount=<?php echo $row['discount'];?>">Edit</a></td>
     </tr>

     <?php
       }
       mysqli_close($conn);
     ?>
   </table>
   </div>
    </div> <!----privious content--->
  </div> <!----privious wapper--->

</body>
</html>
