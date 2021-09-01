<!doctype html>
<html>
<head>
  <title>Delete Employee</title>
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
    <form action="employeedelete.php" method="post">
    <div class="container-flud">
      <div class="row">
        <h1 class="header">Delete Employee</h1>
      </div>
      <br>

    <div class="row">
        <!----Department----->
        <div class="col-4 m-auto">
          <div class="form-group">
            <label>Enter Employee ID You Want To Delete</label>
            <input type="text" class="form-control" name="deleteid" id="deleteid" placeholder="Enter ID" required>
          </div>
        </div>
      </div>
        <!----Department----->


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
