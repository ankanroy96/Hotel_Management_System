<!doctype html>
<html>
<head>
  <title>Add Room</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css\bootstrap.css">
  <link rel="stylesheet" href="css\style.css">
  <link rel="stylesheet" href="css\roomtype.css">

</head>

<body>
  <?php
    include 'header.php';
    include 'sidebar.php';

    $id=$_GET['id'];
    $photo=$_GET['photo'];
    ?>
    <form action="editRoomPhotoFinal.php?id=<?php echo $id;?>&photo=<?php echo $photo?>" method="post" enctype="multipart/form-data">
    <div class="container-flud">
      <div class="row">
        <h1 class="header">Upload Room Photos</h1>
      </div>
      <br>



        <!--------Photo------>
        <div class="row">
          <div class="offset-4 col-4">
            <div class="form-group">
            <label for="exampleinputpassword1">Photo:</label>
            <input type="file" id="exampleinputpassword1" name="filetoupload" required>
            <small>Upload jpeg or png or jpg file. Size must be 25mb or less.</small>
          </div>
          </div>
        </div>
        <!--------Photo---->

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
