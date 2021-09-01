<?php
include 'session.php';
 ?>
<!--------------------------------user--------------------------->
<!---------------------------room page-------------------------->
<!doctype html>
<html>
<head>
  <!-----user--->
  <title>Room-Hotel Asia</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css\bootstrap.css">
  <link rel="stylesheet" href="css\room.css">
</head>

<body>
  <div class="container-flud">

    <div class="row">
      <?php
        include 'header.php';
      ?>
    </div>
    <div class="row justify-content-center" style="margin-left:20px;">

      <?php
      //database connection
      $conn = mysqli_connect("localhost","root","","hms") or die("Connection failed");
      $sql = "Select * from room_type";
      $result = mysqli_query($conn, $sql) or die("Query failed");

      if(mysqli_num_rows($result) >0) {
        while($row = mysqli_fetch_assoc($result)){
       ?>
      <div class="col-lg-4" style="margin-top:20px;">
        <div class="card shadow" style="width: 40rem;">
          <div class="inner">
            <img src="admin/room/room_photo/<?php echo $row['photo'];?>" class="card-img-top" alt="ROOM IMAGE" style="width: 40rem; height: 20rem;">
            </div>
            <div class="card-body text-center">
              <h3 class="card-title"><?php echo strtoupper($row['room_type']);?></h3>
              <p class="card-text"><?php echo $row['description'];?></p>
              <a href="onlyViewRoom.php?type=<?php echo $row['room_type'];?>" class="btn btn-primary">View Rooms</a>
              <?php
              if(isset($_SESSION['username'])){
               ?>
              <a href="bookNow.php?type=<?php echo $row['room_type'];?>" class="btn btn-primary">Book now</a>
            <?php } ?>
            </div>
          </div>
      </div>
      <?php
        }
      }
        mysqli_close($conn);
      ?>


  </div>
</div>
</body>
</html>
