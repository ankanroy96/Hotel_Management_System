<?php
include 'session.php';
if(isset($_GET['email'])){
  $_SESSION['username']=$_GET['email'];
  $_SESSION["cindate"]=$_GET['id1'];
  $_SESSION["coutdate"]=$_GET['id2'];
  $_SESSION["room_type"]=$_GET['id3'];
}
if(!isset($_SESSION['username'])){
  header("Location: http://localhost/hotel_management_system/index.php");
}
 ?>
<!--------------------------------user--------------------------->
<!---------------------------room page-------------------------->
<!doctype html>
<html>
<head>
  <!-----user--->
  <title>Payment fail</title>
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

    <div class="row">
      <div class="col-4 m-auto">
        <p style="font-size:50px; margin-top:50px; color:red;">Payment Failed.</p>
      </div>
    </div>

    <div class="row">
      <div class="col-4 m-auto">
        <a href="confirm.php" class="btn btn-primary"style="font-size:30px; margin-top:30px;">Retry</a>
      </div>
    </div>

  </div>
</div>
</body>
</html>
