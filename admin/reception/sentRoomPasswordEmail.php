<?php
session_start();

if(!isset($_SESSION['reception_admin'])){
  header("Location: http://localhost/hotel_management_system/admin/reception/reception.php");
}
?>
<!doctype html>
<html>
<head>
  <title>Room-login Password</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css\bootstrap.css">
  <link rel="stylesheet" href="css\style.css">
  <link rel="stylesheet" href="css\roomtype.css">

</head>

<body>
  <?php
    $room=$_GET['room'];
    $name=$_GET['name'];
    include 'header.php';
    include 'sidebar.php';
    ?>
    <div class="container-flud">
      <div class="row">
        <h1>Room-login Password</h1>
      </div>
      <br>
      <br>
      <form action="sendMailRoomPassword.php" method="post">
        <div class="row">
          <!----Department----->
          <div class="offset-4 col-4">
            <div class="form-group">
              <input type="hidden" class="form-control" name="name" id="room" Value="<?php echo $name?>">
              <input type="hidden" class="form-control" name="room" id="room" Value="<?php echo $room?>">
              <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
            </div>
          </div>
          </div>
        <div class="row">
          <div class="offset-4 col-4">
            <div class="form-group">
            <input type="submit" name="submit" id="btn" class="btn btn-primary" value="Send Password">
            </div>
          </div>
        </div>
      </form>
    </div> <!----privious content--->
  </div> <!----privious wapper--->

</body>
</html>
