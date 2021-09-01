<!---------------------user------------------------>
<!-------------------------about page--------------------->
<?php include 'session.php'; ?>
<!doctype html>
<html>
<head>
  <title>About-Hotel Asia</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css\bootstrap.css">
  <link rel="stylesheet" href="css\about.css">
</head>
<body>
  <div class="container-flud">
    <div class="row">
      <?php
      include 'header.php';
       ?>
    </div>
    <section class="body-background">
    <div class="row">
      <div class="col-sm-10 offset-1">
        <br>
        <br>
        <p style="font-size: 30px;">Our Teams</p>
        <?php
        //database connection
        $conn = mysqli_connect("localhost","root","","hms") or die("Connection failed");
        $sql = "Select * from department";
        $result = mysqli_query($conn, $sql) or die("Query failed");

        if(mysqli_num_rows($result) >0) {
          while ($row = mysqli_fetch_assoc($result)){
         ?>
        <a href="viewTeam.php?dep=<?php echo $row['dp_name']?>" style="font-size: 30px;"><?php echo ucfirst($row['dp_name']).' Team';?></a>
        <br>
      <?php
        }
      }
        mysqli_close($conn);
      ?>
      </div>
    </div>
  </section>
  <div class="row">
    <?php
    include "footer.php";
     ?>
  </div>
  </div>

</body>
</html>
