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
    ?>
    <form action="addRoomFinal.php" method="post" enctype="multipart/form-data">
    <div class="container-flud">
      <div class="row">
        <h1 class="header">Add Room</h1>
      </div>
      <br>


      <div class="row">
        <!----Role----->
        <div class="offset-4 col-4">
          <div class="form-group">
            <label>Room Type</label>
            <select name="room_type" class="form-control">
              <option value="" selected disabled>Select Room Type</option>
              <?php
              //database connection
              $conn = mysqli_connect("localhost","root","","hms") or die("Connection failed");
              $sql = "Select room_type from room_type";
              $result = mysqli_query($conn, $sql) or die("Query failed");


              while($row = mysqli_fetch_assoc($result)){
               ?>
              <option value="<?php echo $row['room_type'];?>"><?php echo strtoupper($row['room_type']);?></option>
              <?php
              }
                mysqli_close($conn);
              ?>
            </select>
          </div>
        </div>
      </div>
        <!----Role----->

        <div class="row">
          <!----Role----->
          <div class="offset-4 col-4">
            <div class="form-group">
              <label>Size Type</label>
              <select name="size_type" class="form-control">
                <option value="" selected disabled>Select Department</option>
                <?php
                //database connection
                $conn = mysqli_connect("localhost","root","","hms") or die("Connection failed");
                $sql = "Select size_type from size_type";
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
          <!----Role----->

      <div class="row">
        <!----Basic Salary----->
        <div class="offset-4 col-4">
          <div class="form-group">
            <label>Price</label>
              <input type="number" class="form-control" name="price" id="price" placeholder="Enter Price" required>
          </div>
        </div>
      </div>
        <!----Basic salary----->

        <div class="row">
          <!----Basic Salary----->
          <div class="offset-4 col-4">
            <div class="form-group">
              <label>Floor</label>
                <input type="number" class="form-control" name="floor" id="floor" placeholder="Enter Floor" required>
            </div>
          </div>
        </div>



        <div class="row">
          <!----Status----->
          <div class="offset-4 col-4">
            <div class="form-group">
              <label>Status</label>
              <select name="status" class="form-control">
                <option value="" selected disabled>Select Status</option>
                <option value="0">Busy</option>
                <option value="1">Ready</option>

              </select>
            </div>
          </div>
        </div>
          <!----Role----->

        <!--------Photo------>
        <div class="row">
          <div class="offset-4 col-4">
            <div class="form-group">
            <label for="exampleinputpassword1">Photo-1:</label>
            <input type="file" id="exampleinputpassword1" name="filetoupload" required>
            <small>Upload jpeg or png or jpg file. Size must be 25mb or less.</small>
          </div>
          </div>
        </div>
        <!--------Photo---->

        <!--------Photo------>
        <div class="row">
          <div class="offset-4 col-4">
            <div class="form-group">
            <label for="exampleinputpassword1">Photo-2:</label>
            <input type="file" id="exampleinputpassword1" name="filetoupload1" required>
            <small>Upload jpeg or png or jpg file. Size must be 25mb or less.</small>
          </div>
          </div>
        </div>
        <!--------Photo---->

        <!--------Photo------>
        <div class="row">
          <div class="offset-4 col-4">
            <div class="form-group">
            <label for="exampleinputpassword1">Photo-3:</label>
            <input type="file" id="exampleinputpassword1" name="filetoupload2" required>
            <small>Upload jpeg or png or jpg file. Size must be 25mb or less.</small>
          </div>
          </div>
        </div>
        <!--------Photo---->

        <!--------Photo------>
        <div class="row">
          <div class="offset-4 col-4">
            <div class="form-group">
            <label for="exampleinputpassword1">Photo-4:</label>
            <input type="file" id="exampleinputpassword1" name="filetoupload3" required>
            <small>Upload jpeg or png or jpg file. Size must be 25mb or less.</small>
          </div>
          </div>
        </div>
        <!--------Photo---->

        <!--------Photo------>
        <div class="row">
          <div class="offset-4 col-4">
            <div class="form-group">
            <label for="exampleinputpassword1">Photo-5:</label>
            <input type="file" id="exampleinputpassword1" name="filetoupload4" required>
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
