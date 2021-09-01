<!------------------------user ------------------------->
<!------------------------ footer-------------------->
<!doctype html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css\bootstrap.css">
  <link rel="stylesheet" href="css\footer.css">
</head>
<body>
  <!-- Footer -->
<footer class="bg-primary text-center text-lg-start">
  <!-- Grid container -->
  <div class="container p-4">
    <!--Grid row-->
    <div class="row">
      <!--Grid column-->
      <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
        <h5 class="text-uppercase text-white text_size">CONTACT WITH US</h5><br>
        <?php
        //database connection
        $conn = mysqli_connect("localhost","root","","hms") or die("Connection failed");
        $sql = "Select * from contacts";
        $result = mysqli_query($conn, $sql) or die("Query failed");

        if(mysqli_num_rows($result) >0) {
        $row = mysqli_fetch_assoc($result);
         ?>
      <section class="text-white text_size2">
        <p >MOBILE NO: <?php echo $row['mobile'];?></p>
        <p>E-MAIL: <?php echo $row['email'];?></p>
        <p>ADDRESS: <?php echo $row['address'];?></p>
      </section>
      </div>
      <!--Grid column-->

      <!--Grid column-->
      <div class="col-lg-3 col-md-6 mb-4 mb-md-0 offset-lg-3 ">
        <h5 class="text-uppercase mb-0 text-white text_size">VISIT US</h5><br>

        <ul class="list-unstyled text_size2">
          <li>
            <a href="<?php echo $row['facebook'];?>" class="text-white">FACEBOOK</a>
          </li>
          <li>
            <a href="<?php echo $row['twitter'];?>" class="text-white">TWITTER</a>
          </li>
          <li>
            <a href="<?php echo $row['google'];?>" class="text-white">GOOGLE</a>
          </li>
        </ul>
        <?php
          }
          mysqli_close($conn);
        ?>
      </div>
      <!--Grid column-->
    </div>
    <!--Grid row-->
  </div>
  <!-- Grid container -->

  <!-- Copyright -->
  <div class="text-center p-3 text-white text_size2" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2017 Hotel Asia. All Rights Reserved | Design by
    <a class="text-white" href="#">Ankan Roy</a>
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->
</body>
</html>
