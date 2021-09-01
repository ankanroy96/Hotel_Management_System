<?php
session_start();

if(isset($_SESSION['roomno'])){
  header("Location: http://localhost/hotel_management_system/Food.php");
}
?>
<!doctype html>
<html>
<!-----------------admin-------------->
<!----------------- hr admin----------------->
<head>
  <title>Room Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css\bootstrap.css">
  <link rel="stylesheet" href="css\login.css">
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
        <h3 class="text-center head-color">Room Login</h3>
      </div>
    </div>
    <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
    <div class="row">
      <div class="col-sm-4 m-auto">
        <div class="form-group">
        <label for="roomno"></label>
        <input type="number" name="roomno" id="roomno" class="form-control" placeholder="Room No">
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

  </div>
  </form>
  <?php
  //admin
  if(isset($_POST['login'])){
    $conn1 = mysqli_connect("localhost","root","","hms") or die("Connection failed");

    $username = mysqli_real_escape_string($conn1,$_POST['roomno']);
    $password = $_POST['password'];

    $sql1 = "SELECT * FROM room_login WHERE username = '{$username}' AND password = '{$password}'";
    $result = mysqli_query($conn1, $sql1) or die("Query failed");

    if(mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_assoc($result)){
        session_start();
        $_SESSION['roomno']=$row['username'];
        $_SESSION['orderno']=$row['order_no'];

        header("Location: http://localhost/hotel_management_system/Food.php");
      }
    }
    else{
      echo '<div class="alert alert-danger">Room No and Password are not matched.</div>';
    }
  }
  ?>
  </div>

</body>

</html>
