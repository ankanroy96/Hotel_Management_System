<?php
include 'session.php';
if(!isset($_SESSION['username'])){
  header("Location: http://localhost/hotel_management_system/index.php");
}
 ?>
<?php
$time=time();
$conn9 = mysqli_connect("localhost","root","","hms") or die("Connection failed");
$sql9 = "delete from cart where etime<$time";
$result9 = mysqli_query($conn9, $sql9) or die("Query failed");
mysqli_close($conn9);
 ?>

<?php
//session_start();

?>
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

  <script>
  setTimeout(function(){
    location.reload();
  },30000);
  </script>

</head>

<body>
  <div class="container-flud">

    <div class="row">
      <?php
        include 'header.php';
        $email=$_SESSION['username'];
        $cin=$_SESSION["cindate"];
        $cout=$_SESSION["coutdate"];
        $type=$_SESSION["room_type"];
        $size=$_SESSION["size_type"];
      ?>
    </div>
    <div class="row bg-light">
      <div class="offset-3 col-2">
        <a href="selectAllRoom.php" style="font-size: 20px;"> All <?php echo $type?> Rooms</a><br>
      </div>
      <div class="offset-1 col-2">
        <a href="selectAvailableRoom.php" style="font-size: 20px;"> Available <?php echo $type?> Rooms</a><br>
      </div>
      <div class="offset-2 col-2">
        <a href="confirm.php" style="font-size: 30px;"> Booked Rooms</a><br>
        <small style="font-size: 15px;">Click Booked Rooms to proced</small>
      </div>
    </div>

    <div class="row">
      <div class="offset-3 col-6">
        <p style="font-size:20px; text-align: justify;"><b>Note: You can book 5 rooms. After adding a room pay within 30 minute. Otherwise the room will automaticlly be deleted from your booked list.</b></p>
      </div>
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
            <th class="text-center"rowspan="2">Price</th>
            <th class="text-center" rowspan="2">Action</th>
          </tr>
          <th class="text-center">Adult</th>
          <th class="text-center">Child</th>
          <tr>

          </tr>
          <?php
          //database connection
          if($size=="all"){
          $sql = "Select * from rooms where room_type='$type'";
        }
        else{
        $sql = "Select * from rooms where room_type='$type' and size_type= '$size'";
      }
          $result = mysqli_query($conn, $sql) or die("Query failed");

          if(mysqli_num_rows($result) >0) {
            while($row = mysqli_fetch_assoc($result)){
              $room=$row['id'];
              $ookk=0;
           ?>
           <tr>

             <td class="text-center"><?php echo $row['id'];?></td>
             <td class="text-center"><a href="viewRooms.php?room=<?php echo $room;?>">View Room</a></td>
             <td class="text-center"><?php echo $row['size_type'];?></td>
             <td class="text-center"><?php echo $row['adult'];?></td>
             <td class="text-center"><?php echo $row['child'];?></td>
             <?php if($row['price']==$row['fprice']){ ?>
             <td class="text-center"><?php echo $row['price'];?></td>
           <?php }
           else {
             ?>
             <td class="text-center"><s><?php echo $row['price'].'</s><br>'; echo $row['fprice'];?></td>
           <?php } ?>
             <td class="text-center">
               <?php if($row['status']==0){
                 echo "Not Avaible";
                 $ookk=1;
               }

               $sql2 = "Select * from book_room where room=$room and((cindate>= '$cin' and cindate<= '$cout') or (coutdate>= '$cin' and coutdate<= '$cout'))";
               $result2 = mysqli_query($conn, $sql2) or die("Query failed2");
               if(mysqli_num_rows($result2) >0 && $ookk==0) {
                echo "Not Avaible";
                $ookk=1;
               }

               $sql3 = "Select * from cart where room=$room and email='$email' and cindate='$cin' and coutdate='$cout'";
               $result3 = mysqli_query($conn, $sql3) or die("Query failed2");
               if(mysqli_num_rows($result3) >0 && $ookk==0) {?>
                 <a href="cancelBooking.php?room=<?php echo $row['id']?>&id=1" style="color: red;">Cancel</a>
                <?php $ookk=1;
               }

               $sql4 = "Select * from cart where room=$room and((cindate>= '$cin' and cindate<= '$cout') or (coutdate>= '$cin' and coutdate<= '$cout'))";
               $result4 = mysqli_query($conn, $sql4) or die("Query failed4");
               if(mysqli_num_rows($result4) >0 && $ookk==0) {
                echo "Not Avaible";
                $ookk=1;
               }

             else if($ookk==0){
               ?>
               <a href="bookedRooms.php?room=<?php echo $room;?>&price=<?php echo $row['fprice']?>&loc=1">Book Now</a>
             <?php } ?>

             </td>
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
