<?php
include 'session.php';
if(!isset($_SESSION['username'])){
  header("Location: http://localhost/hotel_management_system/index.php");
}
 ?>
<?php
  if(isset($_POST['submit'])){
  $password=$_POST['password'];
  $newPassword=$_POST['newpassword'];
  session_start();
  $email=$_SESSION['username'];

  $conn5 = mysqli_connect("localhost","root","","hms") or die("Connection failed");
  $sql5 = "SELECT * FROM user_info where email='$email' and password='$password'";
  $result5= mysqli_query($conn5, $sql5) or die("Query failed");
  if(mysqli_num_rows($result5) >0) {

    $sql1 = "UPDATE user_info set password='$newPassword' where email='$email'";
    $result = mysqli_query($conn5, $sql1) or die("Query failed");
    header("Location: http://localhost/hotel_management_system/index.php");
    mysqli_close($conn5);
}
}

 ?>

<!doctype html>
<html>
<head>
  <title>Change Password</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css\bootstrap.css">
  <link rel="stylesheet" href="css\style.css">
</head>
<body>

  <div class="container-flud">
    <form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
      <div class="row text-center">
        <div class="col-md-8 offset-md-2">
          <h3 class="header">Change Password</h3>
        </div>
      </div>
      <br>

      <div class="row">
        <!----Password----->
        <div class="offset-md-4 col-md-4">
          <div class="form-group">
            <label for="password">Password</label>
              <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
          </div>
        </div>
      </div>
        <!----Password----->

        <div class="row">
          <!----Password----->
          <div class="offset-md-4 col-md-4">
            <div class="form-group">
              <label for="newpassword">Password</label>
                <input type="password" class="form-control" name="newpassword" id="newpassword" placeholder="New Password" required>
            </div>
          </div>
        </div>
          <!----Password----->

        <div class="row">
          <div class="offset-md-4 col-md-4">
            <div class="form-group">
            <input type="submit" name="submit" id="btn" class="btn btn-primary btn-lg" value="Register">
          </div>
          </div>
        </div>
      </form>

    </div>
    </div> <!----privious content--->
  </div> <!----privious wapper--->

</body>
</html>
