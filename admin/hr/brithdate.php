<!---------------------------admin------------------
//---------------------- edit Brithdate------------------>
<?php
$conn1 = mysqli_connect("localhost","root","","hms") or die("Connection failed");
session_start();

if(!isset($_SESSION['username'])){
  header("Location: http://localhost/hotel_management_system/admin/hr/hradmin.php");
}
?>
<?php
  $id=$_GET['id'];
 ?>
<!doctype html>
<html>
<head>
  <title>Update Brith Date</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css\bootstrap.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <script>
  $(function(){
    var dtToday = new Date();

    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    year = year -18;
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();

    var minDate= year + '-' + month + '-' + day;

    $('#bdate').attr('max', minDate);
});
</script>
</head>
<body>
  <div class="container-flud">

    <?php
    //database connection
    $conn = mysqli_connect("localhost","root","","hms") or die("Connection failed");
    $sql = "Select brithdate from employee where id=$id";
    $result = mysqli_query($conn, $sql) or die("Query failed");

    if(mysqli_num_rows($result) >0) {
      $row = mysqli_fetch_assoc($result);
     ?>
     <form action="brithdatefinal.php?id=<?php echo $id?>" method="post">
     <div class="row">
       <div class="col-sm-4 m-auto">
         <div class="form-group">
         <label>Brihdate:</label>
         <input type="text" id="fname" class="form-control-plaintext" value="<?php echo $row['brithdate'];?>" readonly>
       </div>
       </div>
     </div>
     <div class="row">
       <!----Brithdate----->
       <div class="col-4 m-auto">
         <div class="form-group">
           <label>Brith Date</label>
             <input type="date" class="form-control" name="newbdate" id="bdate" required>
         </div>
       </div>
     </div>
       <!----Brithdate----->

    <div class="row">
      <div class="col-sm-4 m-auto">
        <div class="form-group">
        <input type="submit" name="update" id="btn" class="btn btn-primary" value="Update" style="margin-top: 5%;">
      </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-4 m-auto">
          <a class="btn btn-primary" href="allemployee.php" role="button" style="margin-top: 5%;">Cancel</a>
      </div>
      <?php
        }
        mysqli_close($conn);
      ?>
    </div>
  </form>
  </div>


</body>
</html>
