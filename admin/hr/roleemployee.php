<!------show role employee----->
<?php
  $department=$_GET['id'];
  $role=$_POST['role'];
?>
<!doctype html>
<html>
<head>
  <title>Role Employee</title>
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
        <h1 class="header"><?php echo strtoupper($department)?> <?php echo strtoupper($role)?> Details</h1>
      </div>
      <br>

      <div class="row">
          <!----Show details----->
      <?php
              //database connection
              $conn = mysqli_connect("localhost","root","","hms") or die("Connection failed");
              $sql = "Select * from employee where deparment='$department' and role='$role'";
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
