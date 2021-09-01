<!------------ confirm delete employee back work--------------->
<?php

  $deleteID=$_POST['deleteid'];
?>

<!doctype html>
<html>
<head>
  <title></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css\bootstrap.css">
  <link rel="stylesheet" href="css\style.css">
  <link rel="stylesheet" href="css\addemployee.css">

</head>

<body>
  <?php
    include 'header.php';
    include 'sidebar.php';
    ?>
    <form action="deleteemployeefinal.php?id=<?php echo $deleteID?>" method="post">
    <div class="container-flud">
      <div class="row">
        <h1 class="header">Delete Employee</h1>
      </div>
      <br>

      <div class="row">
          <!----Show details----->
      <?php
              //database connection
              $conn = mysqli_connect("localhost","root","","hms") or die("Connection failed");
              $sql = "Select * from employee where id= $deleteID";
              $result = mysqli_query($conn, $sql) or die("Query failed");

              if(mysqli_num_rows($result) >0) {
                ?>
                <table class="table table-striped">
                  <tr>
                    <th>ID</th>
                    <th>Frist Name</th>
                    <th>Last Name</th>
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
                    </tr>

              <?php
              while($row = mysqli_fetch_assoc($result)){
               ?>
               <tr>
                 <td><?php echo $row['id'];?></th>
                 <td><?php echo $row['fname'];?></td>
                 <td><?php echo $row['lname'];?></td>
                 <td><?php echo $row['fullname'];?></td>
                 <td><?php echo $row['gender'];?></td>
                 <td><?php echo $row['country'];?></td>
                 <td><?php echo $row['brithdate'];?></td>
                 <td><?php echo $row['address'];?></td>
                 <td><?php echo $row['email'];?></td>
                 <td><?php echo $row['mobile'];?></td>
                 <td><?php echo $row['deparment'];?></td>
                 <td><?php echo $row['role'];?></td>
                 <td><?php echo $row['basalary'];?></td>
                 </tr>
               </table>
               </div>
               <div class="row">
                 <div class="col-5 m-auto">
                   <img src="employee_photo/<?php echo $row['photo'];?>" alt="" class="img-fluid rounded" style="height:200px; width:200px;">
                 </div>
               </div>
               <br>
               <br>
              <?php
              }
            }
            else{

              echo "No Details Found.";

            }
                mysqli_close($conn);
              ?>

        <!----Show details----->


        <div class="row">
          <div class="col-4 m-auto">
            <p><b>Are you sure to delete this employee?</b></P>
          </div>
        </div>
        <div class="row">
          <div class=" offset-4 col-1">
            <div class="form-group">
            <input type="submit" name="submit" id="btn" class="btn btn-primary btn-lg" value="yes">
          </div>
          </div>
          <div class="offset-1 col-1">

            <a href="allemployee.php" id="btn" class="btn btn-primary btn-lg">No</a>

          </div>
        </div>
      </form>

    </div>
    </div> <!----privious content--->
  </div> <!----privious wapper--->

</body>
</html>
