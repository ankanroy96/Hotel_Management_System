
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

    <div class="container-flud">
                        <!----------------------------navbar start---------------------->
    <div class="row">
      <div>
          <nav class="navbar navbar-expand-md navbar-light bg-primary"style="margin-bottom: 0px;">
            <div class="col-lg-2 offset-lg-1">

                <a href="index.php" class="navbar-brand" style="font-size: 50px; color:white"> Hotel Asia </a>
                  </div>
          <div class="col-md-6 col-sm-3 offset-lg-3 offset-md-2">
                <ul class="navbar-nav">
                  <li class="nav-item"> <a href="index.php" class="nav-link text-white menu-icon" style="padding:15px">HOME</a></li>
                  <li class="nav-item"> <a href="about.php" class="nav-link text-white menu-icon" style="padding:15px">ABOUT</a></li>
                  <li class="nav-item"> <a href="#" class="nav-link text-white menu-icon" style="padding:15px">TEAM</a></li>
                  <li class="nav-item"> <a href="gallary.php" class="nav-link text-white menu-icon" style="padding:15px">GALLARY</a></li>
                  <li class="nav-item dropdown text-white"> <a href="#" class="nav-link dropdown-toggle text-white menu-icon" data-toggle="dropdown" style="padding:15px">SERVICES</a>
                    <div class="dropdown-menu bg-secondary">
                      <a href="room.php" class="dropdown-item text-white menu-icon">ROOMS</a>
                      <a href="food.php" class="dropdown-item text-white menu-icon">FOOD</a>
                    </div>
                  </li>


          <ul class="navbar-nav">
            <?php

            if(!isset($_SESSION['roomno'])){
            ?>
            <li class="nav-item"> <a href="roomlogin.php" class="nav-link text-white menu-icon" style="padding:15px">Room Login</a></li>
          <?php }

          else if(isset($_SESSION['roomno'])){

            ?>
            <li class="nav-item dropdown text-white"> <a href="#" class="nav-link dropdown-toggle text-white menu-icon" data-toggle="dropdown" style="padding:15px"><?php echo $_SESSION['roomno'];?></a>
              <div class="dropdown-menu bg-primary">
                <a href="foodOrders.php" class="dropdown-item text-white menu-icon">My Orders</a>
                <a href="logout.php" class="dropdown-item text-white menu-icon">Logout</a>

              </div>
            </li>
          <?php } ?>
          </ul>

        </nav>
      </div>
      </div>
    </div>
  </div>

                          <!----------------------------navbar end---------------------->
  </body>
</html>
