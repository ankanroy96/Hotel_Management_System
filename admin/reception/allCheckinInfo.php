<?php
session_start();

if(!isset($_SESSION['reception_admin'])){
  header("Location: http://localhost/hotel_management_system/admin/reception/reception.php");
}
?>
<!doctype html>
<html>
<head>
  <title>All Bookings</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css\bootstrap.css">
  <link rel="stylesheet" href="css\style.css">
  <link rel="stylesheet" href="css\roomtype.css">

  <script>
  function validate()
			{
				var email = document.getElementById("email");
				var code = document.getElementById("code");

				if(email.value.trim()=="" && code.value.trim()=="")
				{
					alert("Email or Booking Number must be filled.");
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
        <h1>All Bookings</h1>
      </div>
      <form onsubmit="return validate()" action="allBookingsort.php" method="post">
        <div class="row">
          <!----Department----->
          <div class="offset-6 col-2">
            <div class="form-group">
              <input type="email" class="form-control" name="email" id="email" placeholder="Email">
            </div>
          </div>

          <div class="col-2">
            <div class="form-group">
              <input type="text" class="form-control" name="code" id="code" placeholder="Booking Number">
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
        <div class="col-sm-12">
        <table class="table table-striped table-responsive">
    <?php
    //database connection
    $conn = mysqli_connect("localhost","root","","hms") or die("Connection failed");
    $sql = "Select * from all_checkin";
    $result = mysqli_query($conn, $sql) or die("Query failed");

    ?>
    <tr>
      <th style="text-align: center;" >Name</th>
      <th style="text-align: center;" >Email</th>
      <th style="text-align: center;" >Mobile</th>
      <th style="text-align: center;" >Check-In Date</th>
      <th style="text-align: center;" >Check-Out Date</th>
      <th style="text-align: center;" >Room Type</th>
      <th style="text-align: center;" >Room No</th>
      <th style="text-align: center;" >Room Size</th>
      <th style="text-align: center;" >Guest List</th>
    </tr>


    <?php
    while($row = mysqli_fetch_assoc($result)){
     ?>

     <tr>
       <td style="text-align: center;"><?php echo ucfirst($row['name']);?></td>
       <td style="text-align: center;"><?php echo $row['email'];?></td>
       <td style="text-align: center;"><?php echo $row['mobile'];?></td>
       <td style="text-align: center;"><?php echo $row['cindate'];?></td>
       <td style="text-align: center;"><?php echo $row['coutdate'];?></td>
       <td style="text-align: center;"><?php echo $row['room_type'];?></td>
       <td style="text-align: center;"><?php echo $row['room_no'];?></td>
       <td style="text-align: center;"><?php echo $row['size_type'];?></td>
       <td style="text-align: center; color: blue;"><a href="guestList.php?id=<?php echo $row['id'];?>">Guest List</a></td>
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
