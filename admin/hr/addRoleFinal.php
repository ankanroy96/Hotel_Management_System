<?php

  $dep=$_POST['department'];

 ?>
<!------show all employee----->
<!doctype html>
<html>
<head>
  <title>Add Role</title>
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
        <h1 class="header">Role</h1>
      </div>
      <br>

      <form action="addRolelast.php?id=<?php echo $dep?>" method="post">
        <div class="offset-4 col-4">
          <div class="form-group">
            <label>Role Name</label>
              <input type="text" class="form-control" name="role" id="role" required>
          </div>
        </div>
          <div class="row">
            <div class="offset-4 col-4">
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
