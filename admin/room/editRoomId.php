<!doctype html>
<html>
<head>
  <title>Edit Room</title>
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
    <form action="editRoom.php" method="post" enctype="multipart/form-data">
    <div class="container-flud">
      <div class="row">
        <h1 class="header">Edit Room</h1>
      </div>
      <br>


      <div class="row">
        <!----Basic Salary----->
        <div class="offset-4 col-4">
          <div class="form-group">
            <label>Enter Room Id</label>
              <input type="text" class="form-control" name="id" id="id" placeholder="Enter ID" required>
          </div>
        </div>
      </div>
        <!----Basic salary----->

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
