<!doctype html>
<html>
<head>
  <title>Delete Department</title>
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
    <form action="deleteDepartmentFinal.php" method="post">
    <div class="container-flud">
      <div class="row">
        <h1 class="header">Delete Department</h1>
      </div>
      <br>

      <div class="row">
        <!----Department----->
        <div class="offset-4 col-4">
          <div class="form-group">
            <label>Department</label>
            <select name="department" class="form-control">
              <option value="" selected disabled>Select Department</option>
              <?php
              //database connection
              $conn = mysqli_connect("localhost","root","","hms") or die("Connection failed");
              $sql = "Select dp_name from department";
              $result = mysqli_query($conn, $sql) or die("Query failed");

              while($row = mysqli_fetch_assoc($result)){
               ?>
              <option value="<?php echo $row['dp_name'];?>"><?php echo strtoupper($row['dp_name']);?></option>
              <?php
              }
                mysqli_close($conn);
              ?>
            </select>
          </div>
        </div>
      </div>
      
        <!----Department----->
        <div class="row">
          <div class="offset-4 col-4">
        <small>After deleting a department, all employee info of that department will also be deleted.</small>
      </div>
    </div>
        <div class="row">
          <div class="col-4 m-auto">
            <div class="form-group">
            <input type="submit" name="submit" id="btn" class="btn btn-primary btn-lg" value="Submit">
          </div>
          </div>
        </div>
      </form>

    </div>
    </div> <!----privious content--->
  </div> <!----privious wapper--->

</body>
</html>
