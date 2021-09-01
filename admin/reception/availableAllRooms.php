<?php
session_start();

if(!isset($_SESSION['reception_admin'])){
  header("Location: http://localhost/hotel_management_system/admin/reception/reception.php");
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
if(isset($_POST['cindate'])){
$_SESSION['cindate']=$_POST['cindate'];
$_SESSION['sday']=$_POST['sday'];
$_SESSION['coutdate']=$_POST['coutdate'];
}

$sday=$_SESSION['sday'];
$cin=$_SESSION['cindate'];
$cout=$_SESSION['coutdate'];

if($_SESSION['coutdate']==""){
  $_SESSION['coutdate']=date('m-d-Y', strtotime("+$sday days"));
}
 ?>
<!doctype html>
<html>
<head>
  <title>All Available Rooms</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css\bootstrap.css">
  <link rel="stylesheet" href="css\style.css">
  <link rel="stylesheet" href="css\roomtype.css">

  <script>
  setTimeout(function(){
    location.reload();
  },30000);
  </script>

  <script>
  function validate()
			{
				var room_type = document.getElementById("room_type");
				var size_type = document.getElementById("size_type");

				if(room_type.value.trim()=="" && size_type.value.trim()=="")
				{
					alert("Room Type or Size Type Number must be filled.");
					return false;
				}
      }
  </script>

</head>

<body>
  <?php
    include 'header.php';
    include 'sidebar.php';
    ?>
    <div class="container-flud">
      <div class="row">
        <div class="offset-9 col-3">
          <a href="confirm.php" style="font-size:25px;color:blue;"><b>Booked Rooms</b></a>
          <small><br>Click Booked Rooms to proced</small>
        </div>
      </div>
      <div class="row">
        <h1>All Available Rooms</h1>
      </div>
      <form onsubmit="return validate()" action="availableAllRoomsSort.php" method="post">
        <div class="row">
          <!----Department----->
          <div class="offset-6 col-2">
            <div class="form-group">
              <select name="room_type" id="room_type" class="form-control">
                <option value="" selected disabled>Select Room Type</option>
                <option value="all">All</option>

                <?php
                //database connection
                $conn1234 = mysqli_connect("localhost","root","","hms") or die("Connection failed");
                $sql1234 = "Select room_type from room_type";
                $result1234 = mysqli_query($conn1234, $sql1234) or die("Query failed1234");


                while($row1234 = mysqli_fetch_assoc($result1234)){
                 ?>
                <option value="<?php echo $row1234['room_type'];?>"><?php echo strtoupper($row1234['room_type']);?></option>
                <?php
                }
                  mysqli_close($conn1234);
                ?>
              </select>
            </div>
          </div>

          <div class="col-2">
            <div class="form-group">
              <select name="size_type" id="size_type" class="form-control">
                <option value="" selected disabled>Select Size</option>
                <option value="all">All</option>

                <?php
                //database connection
                $conn123 = mysqli_connect("localhost","root","","hms") or die("Connection failed");
                $sql123 = "Select size_type from size_type";
                $result123 = mysqli_query($conn123, $sql123) or die("Query failed123");


                while($row123 = mysqli_fetch_assoc($result123)){
                 ?>
                <option value="<?php echo $row123['size_type'];?>"><?php echo strtoupper($row123['size_type']);?></option>
                <?php
                }
                  mysqli_close($conn123);
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
        <div class="offset-1 col-sm-10">
        <table class="table table-striped">
    <?php
    //database connection
    $conn = mysqli_connect("localhost","root","","hms") or die("Connection failed");
    $sql = "Select * from rooms where status=1";
    $result = mysqli_query($conn, $sql) or die("Query failed");

    ?>
    <tr>
      <th class="text-center"rowspan="2">Room No</th>
      <th class="text-center" rowspan="2">Room Images</th>
      <th class="text-center" rowspan="2">Room Type</th>
      <th class="text-center" rowspan="2">Room Size</th>
      <th class="text-center" colspan="2">Capacity</th>
      <th class="text-center"rowspan="2">Rent(Per Day)</th>
      <th class="text-center" rowspan="2">Action</th>
    </tr>
    <tr>
    <th class="text-center">Adult</th>
    <th class="text-center">Child</th>
    </tr>
    <?php
    if(mysqli_num_rows($result) >0) {
    while($row = mysqli_fetch_assoc($result)){
      $room=$row['id'];

      $sql2 = "Select * from book_room where room=$room and ((cindate>= '$cin' and cindate<= '$cout') or (coutdate>= '$cin' and coutdate<= '$cout'))";
      $result2 = mysqli_query($conn, $sql2) or die("Query failed2");

      if(mysqli_num_rows($result2)==0) {

        $sql4 = "Select * from cart where room=$room and((cindate>= '$cin' and cindate<= '$cout') or (coutdate>= '$cin' and coutdate<= '$cout'))";
        $result4 = mysqli_query($conn, $sql4) or die("Query failed4");
        if(mysqli_num_rows($result4)==0) {

     ?>

     <tr>
       <td style="text-align: center;"><?php echo $row['id'];?></td>
       <td style="text-align: center;">vv</td>
       <td style="text-align: center;"><?php echo ucfirst($row['room_type']);?></td>
       <td style="text-align: center;"><?php echo ucfirst($row['size_type']);?></td>
       <td style="text-align: center;"><?php echo $row['adult'];?></td>
       <td style="text-align: center;"><?php echo $row['child'];?></td>
       <td style="text-align: center;"><?php echo $row['fprice'];?></td>
       <td style="text-align: center;">
         <a href="takeEmail.php?room=<?php echo $room;?>&price=<?php echo $row['fprice']?>" style="color:blue">Book Now</a>
       </td>
     </tr>

     <?php
   }

   if(isset($_SESSION['guestEmail'])){
     $email=$_SESSION['guestEmail'];
   $sql3 = "Select * from cart where email='$email' and room=$room and cindate='$cin' and coutdate='$cout'";
   $result3 = mysqli_query($conn, $sql3) or die("Query failed3");
   if(mysqli_num_rows($result3) >0) {
     ?>
     <tr>
       <td style="text-align: center;"><?php echo $row['id'];?></td>
       <td style="text-align: center;">vv</td>
       <td style="text-align: center;"><?php echo ucfirst($row['room_type']);?></td>
       <td style="text-align: center;"><?php echo ucfirst($row['size_type']);?></td>
       <td style="text-align: center;"><?php echo $row['adult'];?></td>
       <td style="text-align: center;"><?php echo $row['child'];?></td>
       <td style="text-align: center;"><?php echo $row['fprice'];?></td>
       <td style="text-align: center;">
         <a href="cancelBooking.php?room=<?php echo $room?>" style="color: red;">Cancel</a>
       </td>
     </tr>
<?php
 }
}
}
}
}
       mysqli_close($conn);
     ?>
   </table>
   </div>
    </div> <!----privious content--->
  </div> <!----privious wapper--->

</body>
</html>
