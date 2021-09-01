<!doctype html>
<html>
  <head>
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css\bootstrap.css">
    <link rel="stylesheet" href="css\header.css">

    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  </head>
  <body>
    <?php
    //database connection
    $conn = mysqli_connect("localhost","root","","hms") or die("Connection failed");
    $sql = "Select * from contacts";
    $result = mysqli_query($conn, $sql) or die("Query failed");

    if(mysqli_num_rows($result) >0) {
     ?>
            <!---------------------top bar start----------------------->
    <div class="container-flud">

      <section class="bg-light">
      <div class="row">
        <div class="col-lg-3" style="font-size:30px; ">
          <?php
          $row = mysqli_fetch_assoc($result);
           ?>
          <span class="text-black">
          <a href="<?php echo $row['facebook'];?>"><i class="fab fa-facebook-square roy"></i></a>
          </span>
          <span class="text-black">
            <a href="<?php echo $row['twitter'];?>"><i class="fab fa-twitter-square roy"></i></a>
          </span>
          <span class="text-black">
            <a href="<?php echo $row['google'];?>"><i class="fab fa-google-plus-square roy"></i></a>
          </span>
        </div>
        <div class="col-4 offset-5" style="font-size:20px;">
          <span class="text-black roy">
            <i class="fas fa-phone-alt"></i>
            <?php echo $row['mobile'];
            ?>
          </span>
          <span class="text-black roy">
            |
          </span>
          <span class="text-black roy">
            <a href="mailto:info@example.com" style="color:black"><i class="fas fa-envelope"><?php echo $row['email'];?></i></a>
          </span>
        </div>
      </div>
  </section>
  <?php
    }
    mysqli_close($conn);
  ?>
                        <!----------------------------top bar end---------------------->

                        <!----------------------------navbar start---------------------->


    <div class="row">
      <div>
          <nav class="navbar navbar-expand-md navbar-light bg-secondary"style="margin-bottom: 0px;">
      <div class="col-lg-2 offset-lg-1">

          <a href="index.php" class="navbar-brand" style="font-size: 50px; color:white"> Hotel Asia </a>
            </div>
    <div class="col-md-6 offset-lg-3 offset-md-2">
          <ul class="navbar-nav">
            <li class="nav-item"> <a href="index.php" class="nav-link text-white menu-icon" style="padding:15px">HOME</a></li>
            <li class="nav-item"> <a href="about.php" class="nav-link text-white menu-icon" style="padding:15px">ABOUT</a></li>
            <li class="nav-item"> <a href="team.php" class="nav-link text-white menu-icon" style="padding:15px">TEAM</a></li>
            <li class="nav-item"> <a href="gallary.php" class="nav-link text-white menu-icon" style="padding:15px">GALLARY</a></li>
            <li class="nav-item dropdown text-white"> <a href="#" class="nav-link dropdown-toggle text-white menu-icon" data-toggle="dropdown" style="padding:15px">SERVICES</a>
              <div class="dropdown-menu bg-secondary">
                <a href="room.php" class="dropdown-item text-white menu-icon">ROOMS</a>
                <a href="food.php" class="dropdown-item text-white menu-icon">FOOD</a>
              </div>
            </li>

            <?php

            if(!isset($_SESSION['username'])){
            ?>
            <li class="nav-item"> <a href="login.php" class="nav-link text-white menu-icon" style="padding:15px">Login</a></li>
          <?php }

          else if(isset($_SESSION['username'])){

            $conn1 = mysqli_connect("localhost","root","","hms") or die("Connection failed");

            $sql1 = "SELECT * FROM user_info WHERE email = '{$_SESSION['username']}'";
            $result = mysqli_query($conn1, $sql1) or die("Query failed");

            if(mysqli_num_rows($result) > 0) {
              while($row = mysqli_fetch_assoc($result)){
                $fullname=$row['fullname'];
              }}
            ?>
            <li class="nav-item dropdown text-white"> <a href="#" class="nav-link dropdown-toggle text-white menu-icon" data-toggle="dropdown" style="padding:15px"><?php echo $fullname?></a>
              <div class="dropdown-menu bg-secondary">
                <a href="profile.php?id=<?php echo $fullname?>" class="dropdown-item text-white menu-icon">Profile</a>
                <a href="editProfile.php" class="dropdown-item text-white menu-icon">Edit Profile</a>
                <a href="password.php" class="dropdown-item text-white menu-icon">Change Password</a>
                <a href="myBookings.php" class="dropdown-item text-white menu-icon">My Bookings</a>
                <a href="logout.php" class="dropdown-item text-white menu-icon">Logout</a>

              </div>
            </li>
          <?php } ?>

          </ul>
        </div>
        </nav>
      </div>
      </div>
    </div>

                          <!----------------------------navbar end---------------------->
  </body>
</html>
