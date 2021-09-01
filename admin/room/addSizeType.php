<!-----------------add department hr--------------->
<!doctype html>
<html>
<head>
  <title>Add Size Type</title>
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
    <form action="addSizeTypeFinal.php" method="post">
    <div class="container-flud">
      <div class="row">
        <h1 class="header">Add Size Type</h1>
      </div>
      <br>

    <div class="row">
        <!----Room Type----->
        <div class="col-4 m-auto">
          <div class="form-group">
            <label>Enter Size Type</label>
            <input type="text" class="form-control" name="newtype" id="newtype" required>
          </div>
        </div>
      </div>
        <!----Room Type----->

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
