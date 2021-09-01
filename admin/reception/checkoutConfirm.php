<?php
session_start();

if(!isset($_SESSION['reception_admin'])){
  header("Location: http://localhost/hotel_management_system/admin/reception/reception.php");
}
?>
<!--------------------------------user--------------------------->
<!---------------------------room page-------------------------->
<!doctype html>
<html>
<head>
  <!-----user--->
  <title>Confirm Checkout</title>
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
    <div class="row bg-light">
      <div class="col-4 m-auto">
        <p style="font-size: 30px; color: black;"><b>Check-out Rooms</b></p>
      </div>
    </div>

    <div class="row">
      <div class="col-6 m-auto">
        <table class="table table-striped">
          <tr>
            <th class="text-center">Room No</th>
            <th class="text-center">Action</th>
          </tr>


             <?php if(isset($_SESSION['ckoutroom'])){
               foreach ($_SESSION['ckoutroom'] as $key){
                 $conn = mysqli_connect("localhost","root","","hms") or die("Connection failed");
                 $sql = "Select * from current_checkin where id=$key";
                 $result = mysqli_query($conn, $sql) or die("Query failed");
                 while($row = mysqli_fetch_assoc($result)){
                ?>
                <tr>
                  <td class="text-center"><?php echo $row['room_no']; ?></td>
                  <td class="text-center">
                    <a href="checkoutRoomAdd.php?id=<?php echo $key;?>&action=3" style="color: red">Cancel</a>
             </td>
             </tr>
           <?php }}} ?>


        </table>

      </div>


      <div class="row">
        <div class="col-2 m-auto">
          <a href="checkoutPrint.php" class="btn btn-primary">Confirm Booking</a>
        </div>
      </div>

    </div>

</div>
</body>
</html>
