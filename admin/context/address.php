<!--------------------------admin------------
//--------------------- edit address-------------------------------->

<?php
$conn1 = mysqli_connect("localhost","root","","hms") or die("Connection failed");
session_start();

if(!isset($_SESSION['username'])){
  header("Location: http://localhost/hotel_management_system/admin/context/contextadmin.php");
}
?>

<!doctype html>
<html>
<head>
  <title>Update Address</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css\bootstrap.css">
  <link rel="stylesheet" href="css\contextadmin.css">
</head>
<body>
  <div class="container-flud distance">

    <?php
    //database connection
    $conn = mysqli_connect("localhost","root","","hms") or die("Connection failed");
    $sql = "Select * from contacts";
    $result = mysqli_query($conn, $sql) or die("Query failed");

    if(mysqli_num_rows($result) >0) {
      $row = mysqli_fetch_assoc($result);
     ?>
     <form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
     <div class="row">
       <div class="col-sm-4 m-auto">
         <div class="form-group">
         <label>Current Address:</label>
         <input type="text" id="username" class="form-control-plaintext" value="<?php echo $row['address'];?>" readonly>
       </div>
       </div>
     </div>
    <div class="row">
      <div class="col-sm-4 m-auto">
        <div class="form-group">
        <label for="newaddress"></label>
        <input type="text" name="newaddress" id="newaddress" class="form-control" placeholder="Enter New Address" required>
      </div>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-4 m-auto">
        <div class="form-group">
        <input type="submit" name="update" id="btn" class="btn btn-primary" value="Update" style="margin-top: 5%;">
      </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-4 m-auto">
          <a class="btn btn-primary" href="contact.php" role="button" style="margin-top: 5%;">Cancel</a>
      </div>
      <?php
        }
        mysqli_close($conn);
      ?>
    </div>
  </form>
  </div>

  <?php

  if(isset($_POST['update'])) {
    $new_mob=$_POST['newaddress'];
    $conn1 = mysqli_connect("localhost","root","","hms") or die("Connection failed");
    $sql1 = "update contacts set address='{$new_mob}'";
    $result = mysqli_query($conn1, $sql1) or die("Query failed");
    header("Location: http://localhost/hotel_management_system/admin/context/contact.php");
    mysqli_close($conn1);
  }
  ?>
</body>
</html>
