<?php
$conn1 = mysqli_connect("localhost","root","","hms") or die("Connection failed");
session_start();

if(!isset($_SESSION['username'])){
  header("Location: http://localhost/hotel_management_system/admin/context/contextadmin.php");
}
?>

<!doctype html>
<html>
<!--------------------admin------------------------->
<!---------------------header of context admin--------------->
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css\bootstrap.css">

  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
  <div class="container-flud">
    <div class="row">
      <h1 class="bg-primary text-center"style="font-size: 50px; margin-bottom: 0px;">Hotel Asia</h1>
    </div>
    <div class="row">
        <nav class="navbar navbar-expand-md navbar-light bg-secondary">
          <div class="col-2 offset-1">
            <a href="contact.php" class="navbar-brand" style="font-size: 30px; color:white; margin-top: 0px;">Context Admin</a>
          </div>
  <div class="col-4 offset-5">
        <ul class="navbar-nav">
          <li class="nav-item"> <a href="contact.php" class="nav-link text-white menu-icon" style="padding:15px">CONTACTS</a></li>
          <li class="nav-item"> <a href="about.php" class="nav-link text-white menu-icon" style="padding:15px">ABOUT</a></li>
          <li class="nav-item dropdown text-white"> <a href="#" class="nav-link dropdown-toggle text-white menu-icon" data-toggle="dropdown" style="padding:15px">GALLARY</a>
            <div class="dropdown-menu bg-secondary">
              <a href="gallaryadd.php" class="dropdown-item text-white menu-icon">ADD IMAGE</a>
              <a href="gallarydelete.php" class="dropdown-item text-white menu-icon">DELETE IMAGE</a>
            </div>
          </li>
          <li class="nav-item"> <a href="logout.php" class="nav-link text-white menu-icon" style="padding:15px">LOGOUT</a></li>
        </ul>
        </div>
      </nav>
    </div>
</div>
</body>
</html>
