?>
<!-----------------add department hr--------------->
<!doctype html>
<html>
<head>
  <title>Add Department</title>
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
    <form action="addDepartmentFinal.php" method="post">
    <div class="container-flud">
      <div class="row">
        <h1 class="header">Add Department</h1>
      </div>
      <br>

    <div class="row">
        <!----Department----->
        <div class="col-4 m-auto">
          <div class="form-group">
            <label>Enter Department Name</label>
            <input type="text" class="form-control" name="newdep" id="newdep" required>
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
