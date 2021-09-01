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
        <?php
        //database connection
        $conn = mysqli_connect("localhost","root","","hms") or die("Connection failed");
        $sql = "Select * from about_admin";
        $result = mysqli_query($conn, $sql) or die("Query failed");

        if(mysqli_num_rows($result) >0) {
          $row = mysqli_fetch_assoc($result);
         ?>
        <p class="para-design"><?php echo $row['description'];?></p>
      </div>
      <?php
        }
        mysqli_close($conn);
      ?>
      <div class="row">
        <div class="col-sm-10 offset-1 text-center">
          <img src="images/about.jpg" alt="about us" style="width:100%; height:100%">
        </div>
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
