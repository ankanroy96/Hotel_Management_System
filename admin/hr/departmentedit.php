<!---------------------------admin------------------
//---------------------- edit department------------------>
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
  <title>Update Department</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css\bootstrap.css">
</head>
<body>
  <div class="container-flud">

    <?php
    //database connection
    $conn = mysqli_connect("localhost","root","","hms") or die("Connection failed");
    $sql = "Select deparment from employee where id=$id";
    $result = mysqli_query($conn, $sql) or die("Query failed");

    if(mysqli_num_rows($result) >0) {
      $row = mysqli_fetch_assoc($result);
     ?>
     <form action="deroleedit.php?id=<?php echo $id?>" method="post">
     <div class="row">
       <div class="col-sm-4 m-auto">
         <div class="form-group">
         <label>Current Department:</label>
         <input type="text" id="fname" class="form-control-plaintext" value="<?php echo $row['deparment'];?>" readonly>
       </div>
       </div>
     </div>
     <div class="row">
       <!----Department----->
       <div class="offset-4 col-4">
         <div class="form-group">
           <label>New Department</label>
           <select name="newdepartment" class="form-control">
             <option value="" selected disabled>Select Department</option>
             <?php
             //database connection
             $conn1 = mysqli_connect("localhost","root","","hms") or die("Connection failed");
             $sql1 = "Select dp_name from department";
             $result1 = mysqli_query($conn1, $sql1) or die("Query failed");

             while($row = mysqli_fetch_assoc($result1)){
              ?>
             <option value="<?php echo $row['dp_name'];?>"><?php echo strtoupper($row['dp_name']);?></option>
             <?php
             }
               mysqli_close($conn1);
             ?>
           </select>
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
