<?php
  $id=$_GET['id'];
 ?>
<!doctype html>
<html>
<head>
  <title>Edit Room Photo</title>
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
        <div class="container-flud">
      <div class="row">
        <h1 class="header">Edit Room Photo</h1>
      </div>
      <br>
      <div class="row">
        <div class="col-4 offset-md-4">
          <table class="table table-striped">
            <tr>
              <th>Photo</th>
              <th>Option</th>
              </tr>
            <?php
            //database connection
            $conn = mysqli_connect("localhost","root","","hms") or die("Connection failed");
            $sql = "Select * from rooms where id=$id";
            $result = mysqli_query($conn, $sql) or die("Query failed1");

            if(mysqli_num_rows($result) >0) {
              while($row = mysqli_fetch_assoc($result)){
             ?>
            <tr style="text-align: center;">
              <td><img src="room_photo/<?php echo $row['photo'];?>" alt="" style=" width: 200px; height:100px;"></td>
              <td class="text-center"><a class="btn btn-primary" href="editRoomPhotoTake.php?id=<?php echo $id;?>&photo=<?php echo "photo"?>" role="button">edit</a></td>
            </tr>
            <tr style="text-align: center;">
              <td><img src="room_photo/<?php echo $row['photo2'];?>" alt="" style=" width: 200px; height:100px;"></td>
              <td class="text-center"><a class="btn btn-primary" href="editRoomPhotoTake.php?id=<?php echo $id;?>&photo=<?php echo "photo2"?>" role="button">edit</a></td>
            </tr>
            <tr style="text-align: center;">
              <td><img src="room_photo/<?php echo $row['photo3'];?>" alt="" style=" width: 200px; height:100px;"></td>
              <td class="text-center"><a class="btn btn-primary" href="editRoomPhotoTake.php?id=<?php echo $id;?>&photo=<?php echo "photo3"?>" role="button">edit</a></td>
            </tr>
            <tr style="text-align: center;">
              <td><img src="room_photo/<?php echo $row['photo4'];?>" alt="" style=" width: 200px; height:100px;"></td>
              <td class="text-center"><a class="btn btn-primary" href="editRoomPhotoTake.php?id=<?php echo $id;?>&photo=<?php echo "photo4"?>" role="button">edit</a></td>
            </tr>
            <tr style="text-align: center;">
              <td><img src="room_photo/<?php echo $row['photo5'];?>" alt="" style=" width: 200px; height:100px;"></td>
              <td class="text-center"><a class="btn btn-primary" href="editRoomPhotoTake.php?id=<?php echo $id;?>&photo=<?php echo "photo5"?>" role="button">edit</a></td>
            </tr>

            <?php
              }
            }
              mysqli_close($conn);
            ?>
          </table>
        </div>
      </div>

    </div>
    </div> <!----privious content--->
  </div> <!----privious wapper--->

</body>
</html>
