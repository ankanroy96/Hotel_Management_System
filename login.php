<?php
session_start();

if(isset($_SESSION['username'])){
  header("Location: http://localhost/hotel_management_system/index.php");
}
?>
<!doctype html>
<html>
<!-----------------admin-------------->
<!----------------- hr admin----------------->
<head>
  <title>User Login</title>
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
        <h3 class="text-center head-color">User Admin</h3>
      </div>
    </div>
    <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
    <div class="row">
      <div class="col-sm-4 m-auto">
        <div class="form-group">
        <label for="username"></label>
        <input type="email" name="username" id="username" class="form-control" placeholder="E-mail">
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

    <div class="col-sm-4 m-auto">
      <div class="form-group">
      <p style="margin-top: 10px;margin-left: 10px; font-size: 20px;">Not a member? <a href="signup.php">Signup</a></p>
      </div>
    </div>
  </div>
  </form>
  <?php
  //admin
  if(isset($_POST['login'])){
    $conn1 = mysqli_connect("localhost","root","","hms") or die("Connection failed");

    $username = mysqli_real_escape_string($conn1,$_POST['username']);
    $password = $_POST['password'];

    $sql1 = "SELECT * FROM user_info WHERE email = '{$username}' AND password = '{$password}'";
    $result = mysqli_query($conn1, $sql1) or die("Query failed");

    if(mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_assoc($result)){
        session_start();
        $_SESSION['username']=$row['email'];

        header("Location: http://localhost/hotel_management_system/index.php");
      }
    }
    else{
      echo '<div class="alert alert-danger">Username and Password are not matched.</div>';
    }
  }
  ?>
  </div>

</body>

</html>
