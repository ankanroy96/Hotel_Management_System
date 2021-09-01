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
        <h1 class="header">Search Employee Details</h1>
      </div>
      <br>

      <form action="editEmployeeFinal.php" method="post">
        <div class="row">
          <!----Department----->
          <div class="col-4 m-auto">
              <div class="form-group">
                <label>Enter ID</label>
                <input type="text" class="form-control" name="ID" id="ID" required>
              </div>
            </div>
          </div>
          <div class="row">
          <div class="col-1 m-auto">
            <div class="form-group">
            <input type="submit" name="submit" id="btn" class="btn btn-primary" value="Search">
          </div>
          </div>
          </div>
      </form>

    </div>
    </div> <!----privious content--->
  </div> <!----privious wapper--->

</body>
</html>
