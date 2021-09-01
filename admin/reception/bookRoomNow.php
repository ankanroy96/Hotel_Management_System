<?php
session_start();

if(!isset($_SESSION['reception_admin'])){
  header("Location: http://localhost/hotel_management_system/admin/reception/reception.php");
}
?>
<?php
unset ($_SESSION["guestEmail"]);
unset ($_SESSION["guestName"]);
unset ($_SESSION["guestMobile"]);
 ?>
<!doctype html>
<html>
<head>
  <title>Book Room</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css\bootstrap.css">
  <link rel="stylesheet" href="css\style.css">
  <link rel="stylesheet" href="css\roomtype.css">

  <link rel="stylesheet" href="js/jquery-ui.min.css">


  <script>
			function validate()
			{

        var coutdate1 =document.getElementById("coutdate").value;
				var sday = document.getElementById("sday").value;
				var cindate = new Date(document.getElementById("cindate").value);
				var coutdate = new Date(document.getElementById("coutdate").value);


        if(coutdate1=="" && sday=="")
        {
					alert("Insert Check-out date or stay day.");
					return false;
				}
        else if(coutdate1!="" && sday!=""){
          var diff=(coutdate-cindate)/(1000*60*60*24);
          if(cindate-coutdate==0){
            diff=1;
          }
          if(diff!=sday){
            alert("Insert correct Check-out date and stay day.");
  					return false;
          }
          else {
            return true;
          }
        }
        else
          return true;


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
        <h1>Book Room</h1>
      </div>
      <form onsubmit="return validate()" action="availableAllRooms.php" method="post">
        <div class="offset-4 col-4">
          <div class="form-group">
            <label>Check-In Date</label>
              <input type="text" class="form-control" name="cindate" id="cindate" value="<?php date_default_timezone_set('Asia/Dhaka');
              echo $date=date("m/d/Y");?>" readonly>
          </div>
        </div>

        <div class="row">
          <div class="offset-4 col-4">
            <div class="form-group">
              <label>Check-Out Date</label>
                <input type="text" class="form-control" name="coutdate" id="coutdate" autocomplete="off">
            </div>
          </div>
        </div>

        <script src="js/jquery-3.6.0.min.js"></script>
        <script src="js/jquery-ui.min.js"></script>
          <script>
            $( function() {
              $( "#coutdate" ).datepicker({
                changeMonth: true,
                changeYear: true,
                maxDate: '3M',
                minDate: '0D'
              });
            } );
            </script>

            <div class="row">
              <div class="offset-4 col-4">
                <div class="form-group">
                  <label>How many days?</label>
                    <input type="number" class="form-control" name="sday" id="sday" autocomplete="off" min="1">
                </div>
              </div>
            </div>

          <div class="row">
            <div class=" offset-4 col-1">
              <div class="form-group">
              <input type="submit" name="submit" id="btn" class="btn btn-primary" value="Search">
            </div>
            </div>
          </div>
      </form>

    </div> <!----privious content--->
  </div> <!----privious wapper--->

</body>
</html>
