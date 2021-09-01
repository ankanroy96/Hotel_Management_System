<!-----------------add department hr--------------->
<!doctype html>
<html>
<head>
  <title>Delete Size Type</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css\bootstrap.css">
  <link rel="stylesheet" href="css\style.css">
  <link rel="stylesheet" href="css\roomtype.css">


</head>

<body>
  <?php
    include 'header.php';
    include 'sidebar.php';
    ?>
    <form action="deleteSizeTypeFinal.php" method="post">
    <div class="container-flud">
      <div class="row">
        <h1 class="header">Delete Size Type</h1>
      </div>
      <br>

      <div class="row">
        <!----Department----->
        <div class="offset-4 col-4">
          <div class="form-group">
            <label>Delete Size Type</label>
            <select name="de_size_type" class="form-control" required>
              <option value="" selected disabled>Select Department</option>
              <?php
              //database connection
              $conn = mysqli_connect("localhost","root","","hms") or die("Connection failed");
              $sql = "Select * from size_type";
              $result = mysqli_query($conn, $sql) or die("Query failed");

              while($row = mysqli_fetch_assoc($result)){
               ?>
              <option value="<?php echo $row['size_type'];?>"><?php echo strtoupper($row['size_type']);?></option>
              <?php
              }
                mysqli_close($conn);
              ?>
            </select>
          </div>
        </div>
      </div>

      <div class="row">
        <!----Department----->
        <div class="offset-4 col-4">
          <div class="form-group">
            <label>Replace Size Type</label>
            <select name="re_size_type" class="form-control" required>
              <option value="" selected disabled>Select Department</option>
              <?php
              //database connection
              $conn = mysqli_connect("localhost","root","","hms") or die("Connection failed");
              $sql = "Select * from size_type";
              $result = mysqli_query($conn, $sql) or die("Query failed");

              while($row = mysqli_fetch_assoc($result)){
               ?>
              <option value="<?php echo $row['size_type'];?>"><?php echo strtoupper($row['size_type']);?></option>
              <?php
              }
                mysqli_close($conn);
              ?>
            </select>
          </div>
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
