<!doctype html>
<html>
<head>
  <title>All Rooms</title>
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
        <h1>All Rooms</h1>
      </div>
      <form action="typeRooms.php" method="post">
        <div class="row">
          <!----Department----->
          <div class="offset-9 col-2">
            <div class="form-group">
              <select name="roomType" class="form-control" required>
                <option value="" selected disabled>Select Room Type</option>
                <?php
                //database connection
                $conn3 = mysqli_connect("localhost","root","","hms") or die("Connection failed");
                $sql3 = "Select room_type from room_type";
                $result3 = mysqli_query($conn3, $sql3) or die("Query failed");


                  while($row = mysqli_fetch_assoc($result3)){
                 ?>
                <option value="<?php echo $row['room_type'];?>"><?php echo strtoupper($row['room_type']);?></option>
                <?php
                }
                  mysqli_close($conn3);
                ?>
              </select>
            </div>
          </div>

          <div class="col-1">
            <div class="form-group">
            <input type="submit" name="submit" id="btn" class="btn btn-primary" value="Search">
          </div>
          </div>
          </div>
      </form>
      <div class="row">
        <div class="col-sm-4 offset-sm-4">
        <table class="table table-striped">
    <?php
    //database connection
    $conn = mysqli_connect("localhost","root","","hms") or die("Connection failed");
    $sql = "Select * from rooms";
    $result = mysqli_query($conn, $sql) or die("Query failed");

    ?>
    <tr>
      <th style="text-align: center;">Room Number</th>
      <th style="text-align: center;">Room Type</th>
      <th style="text-align: center;">Size Type</th>
      <th style="text-align: center;">Adult</th>
      <th style="text-align: center;">Child</th>
      <th style="text-align: center;">Price</th>
      <th style="text-align: center;">Status</th>
    </tr>
    <?php
    while($row = mysqli_fetch_assoc($result)){
     ?>

     <tr>
       <td style="text-align: center;"><?php echo $row['id'];?></td>
       <td style="text-align: center;"><?php echo ucfirst($row['room_type']);?></td>
       <td style="text-align: center;"><?php echo ucfirst($row['size_type']);?></td>
       <td style="text-align: center;"><?php echo $row['adult'];?></td>
       <td style="text-align: center;"><?php echo $row['child'];?></td>
       <td style="text-align: center;"><?php echo $row['price'];?></td>
       <td style="text-align: center;"><?php
       if ($row['status']){
         echo "Ready";
       }
       else {
         echo "Busy";
       }
       ?></td>

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
