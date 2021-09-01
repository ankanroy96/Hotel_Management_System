<?php
session_start();

if(!isset($_SESSION['reception_admin'])){
  header("Location: http://localhost/hotel_management_system/admin/reception/reception.php");
}
?>
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
        $id=$_SESSION['id'];
      ?>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="row">
      <div class="offset-3 col-6">
        <?php
        if($id==1){
         ?>
        <p style="font-size:20px;">Somebody add it to his wishlist. If he dosen't confirm, it will be available in 30 minutes.</p>
        <a href="availableAllRooms.php" class="btn btn-primary" style="margin-top:20px;">Other Available Rooms</a>
      <?php }?>

      <?php
      if($id==2){
       ?>
      <p style="font-size:20px;">Somebody just booked this room.</p>
      <a href="availableAllRooms.php" class="btn btn-primary" style="margin-top:20px;">Other Available Rooms</a>
    <?php }?>
      </div>
    </div>

  </div>
</div>
</body>
</html>
