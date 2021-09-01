<?php
include 'session.php';
if(!isset($_SESSION['username'])){
  header("Location: http://localhost/hotel_management_system/index.php");
}
$time=time();
$conn9 = mysqli_connect("localhost","root","","hms") or die("Connection failed");
$sql9 = "delete from cart where etime<$time";
$result9 = mysqli_query($conn9, $sql9) or die("Query failed");
mysqli_close($conn9);
 ?>

<!doctype html>
<html>
<head>
  <!-----user--->
  <title>Room-Hotel Asia</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css\bootstrap.css">
  <link rel="stylesheet" href="css\room.css">

  <link rel="stylesheet" href="js/jquery-ui.min.css">

</head>

<body>
  <div class="container-flud">

    <div class="row">
      <?php
        include 'header.php';
      ?>
    </div>

    <form onsubmit="return validate()" action="bookDateFinal.php" method="post">

        <div class="row" style="margin-top: 50px;">
          <!----Brithdate----->
          <div class="offset-4 col-4">
            <div class="form-group">
              <label>Check-In Date</label>
                <input type="text" class="form-control" name="cindate" id="cindate" autocomplete="off" required>
            </div>
          </div>
        </div>
          <!----Brithdate----->
          <script src="js/jquery-3.6.0.min.js"></script>
          <script src="js/jquery-ui.min.js"></script>

          <script>
            $( function() {
              $( "#cindate" ).datepicker({
                changeMonth: true,
                changeYear: true,
                maxDate: '3M',
                minDate: '1D'
              });
            } );
            </script>

            <div class="row">
              <div class="offset-4 col-4">
                <div class="form-group">
                  <label>Check-Out Date</label>
                    <input type="text" class="form-control" name="coutdate" id="coutdate" autocomplete="off" required>
                </div>
              </div>
            </div>


              <script>
                $( function() {
                  $( "#coutdate" ).datepicker({
                    changeMonth: true,
                    changeYear: true,
                    maxDate: '3M',
                    minDate: '1D'
                  });
                } );
                </script>

                <div class="row">
                  <div class="offset-4 col-4">
                    <div class="form-group">
                      <label>Size Type</label>
                      <select name="size_type" class="form-control" required>
                        <option value="" selected disabled>Select Size</option>
                        <option value="all">All</option>

                        <?php
                        //database connection
                        $conn = mysqli_connect("localhost","root","","hms") or die("Connection failed");
                        $sql = "Select size_type from size_type";
                        $result = mysqli_query($conn, $sql) or die("Query failed");


                        while($row = mysqli_fetch_assoc($result)){
                         ?>
                        <option value="<?php echo $row['size_type'];?>"><?php echo strtoupper($row['size_type']);?></option>
                        <?php
                        }
                          mysqli_close($conn);
                        ?>
                      </select>
                    </div>
                  </div>
                </div>


        <div class="row">
          <div class="offset-4 col-4">
            <div class="form-group">
            <input type="submit" name="submit" id="btn" class="btn btn-primary btn-lg" value="Submit">
          </div>
          </div>
        </div>
      </form>
  </div>
  <script>
			function validate()
			{
				var email = document.getElementById("email");
				var cindate = new Date(document.getElementById("cindate").value);
				var coutdate = new Date(document.getElementById("coutdate").value);

				if(cindate>coutdate)
				{
					alert("Input Correct Date.");
					return false;
				}
				else
					return true;
			}
			</script>
</body>
</html>
