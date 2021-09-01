<?php
$room=$_GET['room'];
 ?>
<!doctype html>
<html>
<head>
  <!-----user--->
  <title><?php echo $room;?> Room Photo</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css\bootstrap.css">
  <link rel="stylesheet" href="css\gallary.css">
</head>

<body>
  <div class="container-flud">
    <div class="row">
      <?php
        include 'header.php';
       ?>
    </div>
    <div class="row">
      <div class="col-4 m-auto">
        <h1 class="head-size"><?php echo $room;?> Room Photo</h1>
      </div>
    </div>


    <div class="row">
      <?php
      //database connection
      $conn = mysqli_connect("localhost","root","","hms") or die("Connection failed");
      $sql = "Select * from rooms where id=$room";
      $result = mysqli_query($conn, $sql) or die("Query failed");

      if(mysqli_num_rows($result) >0) {
        $row = mysqli_fetch_assoc($result);
       ?>

      <div class="col-3 inner">
        <a href="showRoomphoto2.php?id=<?php echo $row['photo'];?>&id1=<?php echo $room ?>"><img src="admin/room/room_photo/<?php echo $row['photo'];?>" alt="" class="img-fluid img-thumbnail rounded" style="width:400px; height:300px;"></a>
      </div>
      <div class="col-3 inner">
        <a href="showRoomphoto2.php?id=<?php echo $row['photo2'];?>&id1=<?php echo $room ?>"><img src="admin/room/room_photo/<?php echo $row['photo2'];?>" alt="" class="img-fluid img-thumbnail rounded" style="width:400px; height:300px;"></a>
      </div>
      <div class="col-3 inner">
        <a href="showRoomphoto2.php?id=<?php echo $row['photo3'];?>&id1=<?php echo $room ?>"><img src="admin/room/room_photo/<?php echo $row['photo3'];?>" alt="" class="img-fluid img-thumbnail rounded" style="width:400px; height:300px;"></a>
      </div>
      <div class="col-3 inner">
        <a href="showRoomphoto2.php?id=<?php echo $row['photo4'];?>&id1=<?php echo $room ?>"><img src="admin/room/room_photo/<?php echo $row['photo4'];?>" alt="" class="img-fluid img-thumbnail rounded" style="width:400px; height:300px;"></a>
      </div>
      <div class="offset-4 col-4 inner">
        <a href="showRoomphoto2.php?id=<?php echo $row['photo5'];?>&id1=<?php echo $room ?>"><img src="admin/room/room_photo/<?php echo $row['photo5'];?>" alt="" class="img-fluid img-thumbnail rounded" style="width:400px; height:300px;"></a>
      </div>

      <?php

      }
        mysqli_close($conn);
      ?>
    </div>


  </div>
</body>

</html>
