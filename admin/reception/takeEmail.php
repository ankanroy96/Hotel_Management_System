<?php
session_start();

if(!isset($_SESSION['reception_admin'])){
  header("Location: http://localhost/hotel_management_system/admin/reception/reception.php");
}
?>
<?php
$room=$_GET['room'];
$price=$_GET['price'];
if(isset($_SESSION['guestEmail'])){
  header("Location: http://localhost/hotel_management_system/admin/reception/bookedRooms.php?room=$room&price=$price");
}

 ?>
<!doctype html>
<html>
<head>
  <title>Guest Email</title>
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
        <h1>Guest E-mail</h1>
      </div>

      <br>
      <br>

      <form action="bookedRooms.php?room=<?php echo $room;?>&price=<?php echo $price?>" method="post">
        <div class="row">
          <!----Department----->
          <div class="offset-4 col-4">
            <div class="form-group">
              <input type="text" class="form-control" name="gname" id="gname" placeholder="Guest Name" required>
            </div>
          </div>
          </div>

          <div class="row">
            <!----Department----->
            <div class="offset-4 col-4">
              <div class="form-group">
                <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
              </div>
            </div>
            </div>

            <div class="row">
              <!----Department----->
              <div class="offset-4 col-4">
                <div class="form-group">
                  <input type="text" class="form-control" name="gmobile" id="gmobile" placeholder="Guest Mobile" required>
                </div>
              </div>
              </div>

          <div class="row">
            <div class="offset-5 col-1">
              <div class="form-group">
              <input type="submit" name="submit" id="btn" class="btn btn-primary" value="Submit">
            </div>
            </div>
          </div>
      </form>
    </div> <!----privious content--->
  </div> <!----privious wapper--->

</body>
</html>
