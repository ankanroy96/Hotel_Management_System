<!------show department employee----->
<?php
  $department=$_POST['department'];
?>
<!doctype html>
<html>
<head>
  <title>Department Employee</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css\bootstrap.css">
  <link rel="stylesheet" href="css\style.css">
  <link rel="stylesheet" href="css\allemployee.css">

</head>

<body>
  <?php
    include 'header.php';
    include 'sidebar.php';
    ?>

    <div class="container-flud">
      <div class="row">
        <h1 class="header"><?php echo strtoupper($department)?> Employee Details</h1>
      </div>
      <br>

      <form action="roleemployee.php?id=<?php echo $department?>" method="post">
        <div class="row">
          <!----Department----->
          <div class="offset-9 col-2">
            <div class="form-group">
              <select name="role" class="form-control" required>
                <option value="" selected disabled>Select Role</option>
                <?php
                //database connection
                $conn3 = mysqli_connect("localhost","root","","hms") or die("Connection failed");
                $sql3 = "Select role from $department";
                $result3 = mysqli_query($conn3, $sql3) or die("Query failed");


                  while($row = mysqli_fetch_assoc($result3)){
                 ?>
                <option value="<?php echo $row['role'];?>"><?php echo strtoupper($row['role']);?></option>
                <?php
                }
                  mysqli_close($conn3);
                ?>
              </select>
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
          <!----Show details----->
      <?php
              //database connection
              $conn = mysqli_connect("localhost","root","","hms") or die("Connection failed");
              $sql = "Select * from employee where deparment='$department'";
              $result = mysqli_query($conn, $sql) or die("Query failed");

              if(mysqli_num_rows($result) >0) {
                ?>
                <table class="table table-striped">
                  <tr>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>Gender</th>
                    <th>Country</th>
                    <th>Brith Date</th>
                    <th>Address</th>
                    <th>E-mail</th>
                    <th>Mobile</th>
                    <th>Department</th>
                    <th>Role</th>
                    <th>Basic Salary</th>
                    <th>Photo</th>
                    </tr>

              <?php
              while($row = mysqli_fetch_assoc($result)){
               ?>
               <tr>
                 <td><?php echo $row['id'];?></th>
                 <td><?php echo $row['fullname'];?></td>
                 <td><?php echo $row['gender'];?></td>
                 <td><?php echo $row['country'];?></td>
                 <td><?php echo $row['brithdate'];?></td>
                 <td><?php echo $row['address'];?></td>
                 <td><?php echo $row['email'];?></td>
                 <td><?php echo $row['mobile'];?></td>
                 <td><?php echo strtoupper($row['deparment']);?></td>
                 <td><?php echo strtoupper($row['role']);?></td>
                 <td><?php echo $row['basalary'];?></td>
                 <td><img src="employee_photo/<?php echo $row['photo'];?>" alt="" class="img-fluid rounded" style="height:100px; width:100px;"></td>
                 </tr>
                 <?php
                 }
               }
               else{

               }
                   mysqli_close($conn);
                 ?>
               </table>
               </div>


        <!----Show details----->

    </div>
    </div> <!----privious content--->
  </div> <!----privious wapper--->

</body>
</html>
