<!-----------------add department hr--------------->
<!doctype html>
<html>
<head>
  <title>Edit Size Type</title>
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
    <form action="editSizeTypeFinal.php" method="post">
    <div class="container-flud">
      <div class="row">
        <h1 class="header">Edit Size Type</h1>
      </div>
      <br>

      <div class="row">
        <!----Department----->
        <div class="offset-4 col-4">
          <div class="form-group">
            <label>Size Type</label>
            <select name="size_type" class="form-control" required>
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
          <!----Room Type----->
          <div class="col-4 m-auto">
            <div class="form-group">
              <label>Enter New Name</label>
              <input type="text" class="form-control" name="newname" id="newname">
              <small>If you doesn't want to change the size name, leave it empty.</small>
            </div>
          </div>
        </div>

      <div class="row">
          <!----Room Type----->
          <div class="col-4 m-auto">
            <div class="form-group">
              <label>Enter Adult Number</label>
              <input type="number" class="form-control" name="adult" id="adult" required>
            </div>
          </div>
        </div>

        <div class="row">
            <!----Room Type----->
            <div class="col-4 m-auto">
              <div class="form-group">
                <label>Enter Child Number</label>
                <input type="number" class="form-control" name="child" id="child" required>
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
