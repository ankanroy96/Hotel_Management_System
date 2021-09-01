<?php
session_start();

if(!isset($_SESSION['reception_admin'])){
  header("Location: http://localhost/hotel_management_system/admin/reception/reception.php");
}
?>
<!doctype html>
<html>
<head>
  <title>Today's Bookings</title>
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
        <h1>Today's Bookings</h1>
      </div>
      <form onsubmit="return validate()" action="passBookingsSort.php" method="post">
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
    date_default_timezone_set('Asia/Dhaka');
    $date=date("m/d/Y");
    $conn = mysqli_connect("localhost","root","","hms") or die("Connection failed");
    $sql = "Select * from room_book_info where cindate<'$date'";
    $result = mysqli_query($conn, $sql) or die("Query failed");

    ?>
    <tr>
      <th style="text-align: center;" rowspan="2">Name</th>
      <th style="text-align: center;" rowspan="2">Email</th>
      <th style="text-align: center;" rowspan="2">Mobile</th>
      <th style="text-align: center;" rowspan="2">Check-In Date</th>
      <th style="text-align: center;" rowspan="2">Check-Out Date</th>
      <th style="text-align: center;" rowspan="2">Room Type</th>
      <th style="text-align: center;" rowspan="2">Room No</th>
      <th style="text-align: center;" rowspan="2">Room Size</th>
      <th style="text-align: center;" colspan="2">Capacity</th>
      <th style="text-align: center;" rowspan="2">Rent(per Day)</th>
      <th style="text-align: center;" rowspan="2">Advance</th>
      <th style="text-align: center;" rowspan="2">Booking Number</th>
      <th style="text-align: center;" colspan="2" rowspan="2">Action</th>
    </tr>

    <tr>
      <th style="text-align: center;">Adult</th>
      <th style="text-align: center;">Child</th>
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
       <td style="text-align: center;"><?php echo $row['adult'];?></td>
       <td style="text-align: center;"><?php echo $row['child'];?></td>
       <td style="text-align: center;"><?php echo $row['rent'];?></td>
       <td style="text-align: center;"><?php echo $row['advance'];?></td>
       <td style="text-align: center;"><?php echo $row['code'];?></td>
       <td style="text-align: center; color: red;"><a href="insertGuests.php?id=<?php echo $row['code']?>" class="delete">Check-In</a></td>
       <td style="text-align: center; color: red;"><a href="cancelPassBooking.php?id=<?php echo $row['code']?>" class="delete">Cancel</a></td>
     </tr>

     <?php
       }
       mysqli_close($conn);
     ?>
   </table>
   </div>
    </div> <!----privious content--->
  </div> <!----privious wapper--->

  <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
  <script language="JavaScript" type="text/javascript">
  $(document).ready(function(){
      $("a.delete").click(function(e){
          if(!confirm('Are you sure?')){
              e.preventDefault();
              return false;
          }
          return true;
      });
  });
  </script>

</body>
</html>
