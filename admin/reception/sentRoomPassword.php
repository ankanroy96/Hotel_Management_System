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
    include 'header.php';
    include 'sidebar.php';
    ?>
    <div class="container-flud">
      <div class="row">
        <h1>Room-login Password</h1>
      </div>
      <br>
      <br>
      <form action="sentRoomPasswordGuest.php" method="post">
        <div class="row">
          <!----Department----->
          <div class="offset-4 col-4">
            <div class="form-group">
              <input type="number" class="form-control" name="roomNumber" id="email" placeholder="Room Number" required>
            </div>
          </div>
          </div>
        <div class="row">
          <div class="offset-4 col-4">
            <div class="form-group">
            <input type="submit" name="submit" id="btn" class="btn btn-primary" value="Search">
            </div>
          </div>
        </div>
      </form>
    </div> <!----privious content--->
  </div> <!----privious wapper--->

</body>
</html>
