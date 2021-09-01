<?php
  $id=$_POST['id'];
 ?>
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
    <form action="editRoomFinal.php?id=<?php echo $id?>" method="post" enctype="multipart/form-data">
    <div class="container-flud">
      <div class="row">
        <h1 class="header">Edit Room</h1>
      </div>
      <br>


      <div class="row">
        <!----Role----->
        <div class="offset-4 col-4">
          <div class="form-group">
            <label>Room Type</label>
            <select name="room_type" class="form-control">
              <?php
              //database connection
              $conn = mysqli_connect("localhost","root","","hms") or die("Connection failed");
              $sql = "Select room_type from room_type";
              $result = mysqli_query($conn, $sql) or die("Query failed");


              while($row = mysqli_fetch_assoc($result)){
                $sql1 = "Select * from rooms where id=$id";
                $result1 = mysqli_query($conn, $sql1) or die("Query failed");
                while($row1 = mysqli_fetch_assoc($result1)){
                  if($row['room_type']==$row1['room_type']){
                    $select="selected";
                  }
                  else{
                    $select="";
                  }

                 echo "<option {$select} value='{$row['room_type']}'>{$row['room_type']}</option>";

            }}
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
                <?php
                //database connection
                $conn = mysqli_connect("localhost","root","","hms") or die("Connection failed");
                $sql = "Select size_type from size_type";
                $result = mysqli_query($conn, $sql) or die("Query failed");


                while($row = mysqli_fetch_assoc($result)){
                  $sql1 = "Select * from rooms where id=$id";
                  $result1 = mysqli_query($conn, $sql1) or die("Query failed");
                  while($row1 = mysqli_fetch_assoc($result1)){
                    if($row['size_type']==$row1['size_type']){
                      $select="selected";
                    }
                    else{
                      $select="";
                    }

                   echo "<option {$select} value='{$row['size_type']}'>{$row['size_type']}</option>";

              }}
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
            <?php
            $conn5 = mysqli_connect("localhost","root","","hms") or die("Connection failed");
            $sql5 = "Select price from rooms where id=$id";
            $result5 = mysqli_query($conn5, $sql5) or die("Query failed");
            $row5 = mysqli_fetch_assoc($result5)
            ?>
              <input type="number" class="form-control" name="price" id="price" value="<?php echo $row5['price'];?>" required>
              <?php
              mysqli_close($conn5);
               ?>
          </div>
        </div>
      </div>
        <!----Basic salary----->

        <!--------Photo------>
        <div class="row">
          <div class="offset-4 col-4" style="font-size: 30px; margin-bottom: 10px; color: blue;">
            <a href="editRoomPhoto.php?id=<?php echo $id;?>"><u>Edit Rooms Photo</u></a>
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
