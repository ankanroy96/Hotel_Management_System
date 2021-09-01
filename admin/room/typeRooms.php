<?php
  $type=$_POST['roomType'];
 ?>
<!doctype html>
<html>
<head>
  <title><?php echo ucfirst($type);?> Rooms</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css\bootstrap.css">
  <link rel="stylesheet" href="css\style.css">
  <link rel="stylesheet" href="css\roomtype.css">

</head>

<body>
  <?php
    include 'header.php';
    include 'sidebar.php';
    ?>
    <div class="container-flud">
      <div class="row">
        <h1><?php echo ucfirst($type);?> Rooms</h1>
      </div>

      <div class="row">
        <div class="col-sm-4 offset-sm-4">
        <table class="table table-striped">
    <?php
    //database connection
    $conn = mysqli_connect("localhost","root","","hms") or die("Connection failed");
    $sql = "Select * from rooms where room_type='$type'";
    $result = mysqli_query($conn, $sql) or die("Query failed");

    ?>
    <tr>
      <th style="text-align: center;">Room Number</th>
      <th style="text-align: center;">Room Type</th>
      <th style="text-align: center;">Size Type</th>
      <th style="text-align: center;">Adult</th>
      <th style="text-align: center;">Child</th>
      <th style="text-align: center;">Price</th>
      <th style="text-align: center;">Status</th>
    </tr>
    <?php
    while($row = mysqli_fetch_assoc($result)){
     ?>

     <tr>
       <td style="text-align: center;"><?php echo $row['id'];?></td>
       <td style="text-align: center;"><?php echo ucfirst($row['room_type']);?></td>
       <td style="text-align: center;"><?php echo ucfirst($row['size_type']);?></td>
       <td style="text-align: center;"><?php echo $row['adult'];?></td>
       <td style="text-align: center;"><?php echo $row['child'];?></td>
       <td style="text-align: center;"><?php echo $row['price'];?></td>
       <td style="text-align: center;"><?php
       if ($row['status']){
         echo "Ready";
       }
       else {
         echo "Busy";
       }
       ?></td>
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
