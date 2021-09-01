<?php
include'session.php';
 ?>
<!--------------------------------user--------------------------->
<!---------------------------gallary page-------------------------->
<!doctype html>
<html>
<head>
  <!-----user--->
  <title>Gallary-Hotel Asia</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css\bootstrap.css">
  <link rel="stylesheet" href="css\gallary.css">
</head>

<body>
  <div class="container-flud">
    <div class="row">
      <?php
        include 'header.php';
       ?>
    </div>
    <div class="row">
      <div class="col-3 m-auto">
        <h1 class="head-size">OUR GALLARY</h1>
      </div>
    </div>


    <div class="row">
      <?php
      //database connection
      $conn = mysqli_connect("localhost","root","","hms") or die("Connection failed");
      $sql = "Select * from gallary";
      $result = mysqli_query($conn, $sql) or die("Query failed");

      if(mysqli_num_rows($result) >0) {
        while($row = mysqli_fetch_assoc($result)){
       ?>
      <div class="col-3 inner">
        <a href="showphoto.php?id=<?php echo $row['image'];?>"><img src="admin/context/upload/<?php echo $row['image'];?>" alt="" class="img-fluid img-thumbnail rounded" style="width:400px; height:300px;"></a>
      </div>
      <?php
        }
      }
        mysqli_close($conn);
      ?>
    </div>


  </div>
</body>

</html>
