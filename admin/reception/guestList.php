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
    $id=$_GET['id'];

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
        <div class="offset-2 col-sm-8">
        <table class="table table-striped table-responsive">
    <?php
    //database connection
    $conn = mysqli_connect("localhost","root","","hms") or die("Connection failed");
    $sql = "Select * from all_guest where stay_id=$id";
    $result = mysqli_query($conn, $sql) or die("Query failed");

    ?>
    <tr>
      <th style="text-align: center;">Name</th>
      <th style="text-align: center;">Adult or Child</th>
      <th style="text-align: center;">Id Type</th>
      <th style="text-align: center;">Id Number</th>
      <th style="text-align: center;">Mobile</th>
    </tr>

    <?php
    while($row = mysqli_fetch_assoc($result)){
     ?>

     <tr>
       <td style="text-align: center;"><?php echo ucfirst($row['name']);?></td>
       <td style="text-align: center;"><?php
       if($row['AorC']=='a'){
         echo "Adult";
       }
       else{
         echo "Child";
       }
       ?></td>
       <td style="text-align: center;"><?php echo $row['id_type'];?></td>
       <td style="text-align: center;"><?php echo $row['id_num'];?></td>
       <td style="text-align: center;"><?php echo $row['mobile'];?></td>
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
