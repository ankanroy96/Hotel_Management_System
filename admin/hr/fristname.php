<!---------------------------admin------------------
//---------------------- edit fname------------------>
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
  <title>Update Frist Name</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css\bootstrap.css">
</head>
<body>
  <div class="container-flud">

    <?php
    //database connection
    $conn = mysqli_connect("localhost","root","","hms") or die("Connection failed");
    $sql = "Select fname,lname from employee where id=$id";
    $result = mysqli_query($conn, $sql) or die("Query failed");

    if(mysqli_num_rows($result) >0) {
      $row = mysqli_fetch_assoc($result);
      $lname= $row['lname'];
     ?>
     <form action="fristnamefinal.php?id=<?php echo $id?>&id1=<?php echo $lname?>" method="post">
     <div class="row">
       <div class="col-sm-4 m-auto">
         <div class="form-group">
         <label>Current Frist Name:</label>
         <input type="text" id="fname" class="form-control-plaintext" value="<?php echo $row['fname'];?>" readonly>
       </div>
       </div>
     </div>
    <div class="row">
      <div class="col-sm-4 m-auto">
        <div class="form-group">
        <label for="newfname"></label>
        <input type="text" name="newfname" id="newfname" class="form-control" placeholder="Enter New Frist Name" required>
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
