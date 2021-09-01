<!--------------------------------user--------------------------->
<!---------------------------room page-------------------------->
<!doctype html>
<html>
<head>
  <!-----user--->
  <title>Room Select</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css\bootstrap.css">
  <link rel="stylesheet" href="css\room.css">

</head>

<body>
  <div class="container-flud">

    <div class="row">
      <?php
        include 'header.php';
        $type=$_GET["type"];
      ?>
    </div>

    <br>
    <br>
    <br>

    <div class="row text-center">
      <?php
      //database connection
      $conn = mysqli_connect("localhost","root","","hms") or die("Connection failed");
      $sql100 = "Select * from tax_offer where type='room'";
      $result100 = mysqli_query($conn, $sql100) or die("Query failed100");

      if(mysqli_num_rows($result100) >0) {
        while($row100 = mysqli_fetch_assoc($result100)){
          $roomtax=$row100['tax'];
          echo '<h3 class="text-primary">'.$row100['tax'].'% Tax will be added with room price</h3>';
          if($row100['discount']>0){
            $roomdiscount=$row100['discount'];
            echo '<h3 class="text-danger"><br>'.$row100['discount'].'% Discount on all room price</h3>';
          }
        }}
       ?>
    </div>

    <br>
    <br>
    <br>

    <div class="row text-center">
      <h1>All <?php echo $type?> Rooms</h1>
    </div>

    <div class="row">
      <div class="offset-3 col-6">
        <table class="table table-striped">
          <tr>
            <th class="text-center"rowspan="2">Room No</th>
            <th class="text-center" rowspan="2">Room Images</th>
            <th class="text-center" rowspan="2">Room Size</th>
            <th class="text-center" colspan="2">Capacity</th>
            <th class="text-center"rowspan="2">Price(Per Day)</th>

          </tr>
          <th class="text-center">Adult</th>
          <th class="text-center">Child</th>
          <tr>

          </tr>
          <?php
          //database connection
          $sql = "Select * from rooms where room_type='$type'";
          $result = mysqli_query($conn, $sql) or die("Query failed");

          if(mysqli_num_rows($result) >0) {
            while($row = mysqli_fetch_assoc($result)){

           ?>
           <tr>

             <td class="text-center"><?php echo $row['id'];?></td>
             <td class="text-center"><a href="viewRooms.php?room=<?php echo $row['id'];?>">View Room</a></td>
             <td class="text-center"><?php echo $row['size_type'];?></td>
             <td class="text-center"><?php echo $row['adult'];?></td>
             <td class="text-center"><?php echo $row['child'];?></td>
             <?php if($roomdiscount==0){?>
             <td class="text-center"><?php echo $row['price'];?></td>
           <?php }
           else if($roomdiscount>0){
             $finalroomprice=$row['price']-($row['price']*($roomdiscount/100));
           ?>
           <td class="text-center"><?php echo '<s>'.$row['price'].'</s><br>'; echo $finalroomprice;?></td>
         <?php } ?>
           </tr>
           <?php
         }}
             mysqli_close($conn);
           ?>
        </table>
      </div>
    </div>

</div>
</body>
</html>
