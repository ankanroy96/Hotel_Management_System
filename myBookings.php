<?php
include 'session.php';
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
        $email=$_SESSION['username'];
      ?>
    </div>

    <br>
    <br>
    <br>

    <div class="row">
      <div class="offset-2 col-8">
        <table class="table table-striped table-bordered">
          <tr>
            <th class="text-center" rowspan="2">No</th>
            <th class="text-center" rowspan="2">Room No</th>
            <th class="text-center" rowspan="2">Room Type</th>
            <th class="text-center" colspan="2">Capacity</th>
            <th class="text-center" rowspan="2">Check-In Date</th>
            <th class="text-center" rowspan="2">Check-Out Date</th>
            <th class="text-center" rowspan="2">Rent Per Day</th>
            <th class="text-center" rowspan="2">Advance</th>
          </tr>

          <tr>
            <th class="text-center">Adult</th>
            <th class="text-center">Child</th>
          </tr>
          <?php
          $conn = mysqli_connect("localhost","root","","hms") or die("Connection failed");
          $sql = "Select * from room_book_info where email='$email'";
          $result = mysqli_query($conn, $sql) or die("Query failed");
          $no=0;
          if(mysqli_num_rows($result) >0) {
            while($row = mysqli_fetch_assoc($result)){
              $no=$no+1;
          ?>
          <tr>
            <td class="text-center"><?php echo $no?></td>
            <td class="text-center"><?php echo $row['room_no']?></td>
            <td class="text-center"><?php echo $row['room_type']?></td>
            <td class="text-center"><?php echo $row['adult']?></td>
            <td class="text-center"><?php echo $row['child']?></td>
            <td class="text-center"><?php echo $row['cindate']?></td>
            <td class="text-center"><?php echo $row['coutdate']?></td>
            <td class="text-center"><?php echo $row['rent']?></td>
            <td class="text-center"><?php echo $row['advance']?></td>
          </tr>

          <?php
          }
        }
            mysqli_close($conn);
          ?>


        </table>
      </div>
    </div>

</div>
</body>
</html>
