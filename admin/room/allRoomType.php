<!doctype html>
<html>
<head>
  <title>Rooms Type</title>
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
        <h1>Rooms Types</h1>
      </div>

      <div class="row">
        <div class="col-sm-4 offset-sm-4">
        <table class="table table-striped">
    <?php
    //database connection
    $conn = mysqli_connect("localhost","root","","hms") or die("Connection failed");
    $sql = "Select room_type from room_type";
    $result = mysqli_query($conn, $sql) or die("Query failed1");

    ?>
    <tr>
      <th style="text-align: center;">Room Type</th>
      <th style="text-align: center;">Total Rooms</th>
    </tr>
    <?php
    while($row = mysqli_fetch_assoc($result)){
      $type=$row['room_type'];
     ?>

     <tr>
       <td style="text-align: center;"><?php echo $row['room_type'];?></td>
       <?php
       //database connection
       $conn2 = mysqli_connect("localhost","root","","hms") or die("Connection failed2");
       $sql2 = "Select count(room_type) as total from rooms where room_type='$type'";
       $result2 = mysqli_query($conn2, $sql2) or die("Query failed");
       $row2 = mysqli_fetch_assoc($result2);
       ?>
       <td style="text-align: center;"><?php echo $row2['total'];?></td>
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
