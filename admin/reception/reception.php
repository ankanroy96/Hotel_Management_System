<?php
session_start();

if(isset($_SESSION['reception_admin'])){
  header("Location: http://localhost/hotel_management_system/admin/reception/allBookings.php");
}
?>
<!doctype html>
<html>
<!-----------------admin-------------->
<!----------------- reception----------------->
<head>
  <title>reception</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css\bootstrap.css">
  <link rel="stylesheet" href="css\reception.css">
</head>

<body>

  <div class="container-flud distance">

    <div class="row">
      <div class="col-sm-5 m-auto">
        <h1 class="text-center head-color"style="margin-bottom: 2px;">Hotel Asia</h1>
      </div>
    </div>
    <div class="row"  style="margin-top: 0;">
      <div class="col-sm-5 m-auto">
        <h3 class="text-center head-color">Reception</h3>
      </div>
    </div>
    <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
    <div class="row">
      <div class="col-sm-4 m-auto">
        <div class="form-group">
        <label for="username"></label>
        <input type="text" name="username" id="username" class="form-control" placeholder="Username">
      </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-4 m-auto">
        <div class="form-group">
        <label for="password"></label>
        <input type="password" name="password" id="password" class="form-control" placeholder="Password">
      </div>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-4 m-auto">
        <div class="form-group">
        <input type="submit" name="login" class="btn btn-primary" value="Login"style="margin-top: 5%;">
      </div>
      </div>
    </div>
  </form>

  </div>

  </body>

  </html>

  <?php
  //admin
  if(isset($_POST['login'])){
    $conn1 = mysqli_connect("localhost","root","","hms") or die("Connection failed");

    $username = mysqli_real_escape_string($conn1,$_POST['username']);
    $password = $_POST['password'];

    $sql1 = "SELECT * FROM reception_admin WHERE username = '{$username}' AND password = '{$password}'";
    $result = mysqli_query($conn1, $sql1) or die("Query failed");

    if(mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_assoc($result)){
        $_SESSION['reception_admin']=$row['username'];

        header("Location: http://localhost/hotel_management_system/admin/reception/allBookings.php");
      }
    }
    else{
      echo '<div class="alert alert-danger">Username and Password are not matched.</div>';
    }
  }
  ?>
