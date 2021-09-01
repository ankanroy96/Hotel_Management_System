<!---------------------------admin------------------
//---------------------- edit role------------------>
<?php
$conn1 = mysqli_connect("localhost","root","","hms") or die("Connection failed");
session_start();

if(!isset($_SESSION['username'])){
  header("Location: http://localhost/hotel_management_system/admin/hr/hradmin.php");
}
?>
<?php
  $id=$_GET['id'];
  $dep=$_GET['id1'];
 ?>
<!doctype html>
<html>
<head>
  <title>Update Role</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css\bootstrap.css">
</head>
<body>
  <div class="container-flud">


     <form action="roleeditfinal.php?id=<?php echo $id?>&id1=<?php echo $dep?>" method="post">
       <div class="row">
         <!----Department----->
         <div class="offset-4 col-4">
           <div class="form-group">
             <label>Role</label>
             <select name="newrole" class="form-control">
               <option value="" selected disabled>Select Department</option>
               <?php
               //database connection
               $conn = mysqli_connect("localhost","root","","hms") or die("Connection failed");
               $sql = "Select role from $dep";
               $result = mysqli_query($conn, $sql) or die("Query failed");


                 while($row = mysqli_fetch_assoc($result)){
                ?>
               <option value="<?php echo $row['role'];?>"><?php echo strtoupper($row['role']);?></option>
               <?php
               }
                 mysqli_close($conn);
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
    </div>
  </form>
  </div>


</body>
</html>
