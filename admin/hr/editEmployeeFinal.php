<?php
  $id=$_POST['ID'];
 ?>
<!------edit employee----->

<!doctype html>
<html>
<head>
  <title>Edit Employee</title>
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
        <h1 class="header"><?php echo $id?> Employee Details</h1>
      </div>
      <br>

      <div class="row">
        <div class="col-sm-4 offset-sm-4">
        <table class="table table-striped">
          <?php
          //database connection
          $conn = mysqli_connect("localhost","root","","hms") or die("Connection failed");
          $sql = "Select * from employee where id=$id";
          $result = mysqli_query($conn, $sql) or die("Query failed");

          if(mysqli_num_rows($result) >0) {
            $row = mysqli_fetch_assoc($result);
           ?>
          <tr>
            <th>Frist Name</th>
            <td><?php echo $row['fname'];?></td>
            <td class="text-center"><a class="btn btn-primary" href="fristname.php?id=<?php echo $id?>" role="button">Edit</a></td>
          </tr>
          <tr>
            <th>Last Name</th>
            <td><?php echo $row['lname'];?></td>
            <td class="text-center"><a class="btn btn-primary" href="lastname.php?id=<?php echo $id?>" role="button">Edit</a></td>
          </tr>
          <tr>
            <th>Gender</th>
            <td><?php echo $row['gender'];?></td>
            <td class="text-center"><a class="btn btn-primary" href="gender.php?id=<?php echo $id?>" role="button">Edit</a></td>
          </tr>
          <tr>
            <th>Country</th>
            <td><?php echo $row['country'];?></td>
            <td class="text-center"><a class="btn btn-primary" href="country.php?id=<?php echo $id?>" role="button">Edit</a></td>
          </tr>
          <tr>
            <th>Brith Date</th>
            <td><?php echo $row['brithdate'];?></td>
            <td class="text-center"><a class="btn btn-primary" href="brithdate.php?id=<?php echo $id?>" role="button">Edit</a></td>
          </tr>
          <tr>
            <th>E-mail</th>
            <td><?php echo $row['email'];?></td>
            <td class="text-center"><a class="btn btn-primary" href="email.php?id=<?php echo $id?>" role="button">Edit</a></td>
          </tr>
          <tr>
            <th>Address</th>
            <td><?php echo $row['address'];?></td>
            <td class="text-center"><a class="btn btn-primary" href="address.php?id=<?php echo $id?>" role="button">Edit</a></td>
          </tr>
          <tr>
            <th>Mobile</th>
            <td><?php echo $row['mobile'];?></td>
            <td class="text-center"><a class="btn btn-primary" href="mobile.php?id=<?php echo $id?>" role="button">Edit</a></td>
          </tr>
          <tr>
            <th>Basic Salary</th>
            <td><?php echo $row['basalary'];?></td>
            <td class="text-center"><a class="btn btn-primary" href="basicsalary.php?id=<?php echo $id?>" role="button">Edit</a></td>
          </tr>
          <tr>
            <th>Department</th>
            <td><?php echo $row['deparment'];?></td>
            <td class="text-center"><a class="btn btn-primary" href="departmentedit.php?id=<?php echo $id?>" role="button">Edit</a></td>
          </tr>
          <tr>
            <th>Role</th>
            <td><?php echo $row['role'];?></td>
            <td class="text-center"><a class="btn btn-primary" href="roleedit.php?id=<?php echo $id?>&id1=<?php echo $row['deparment']?>" role="button">Edit</a></td>
          </tr>

          <?php
            }
            mysqli_close($conn);
          ?>
        </table>

    </div>
    </div> <!----privious content--->
  </div> <!----privious wapper--->

</body>
</html>
