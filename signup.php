<?php
  if(isset($_POST['submit'])){
  $nid=$_POST['nid'];
  $passport=$_POST['passno'];
  $email=$_POST['email'];
  $errors=array();

  $conn5 = mysqli_connect("localhost","root","","hms") or die("Connection failed");
  $sql5 = "SELECT * FROM user_info where email='$email'";
  $result5= mysqli_query($conn5, $sql5) or die("Query failed");
  if(mysqli_num_rows($result5) >0) {
    $errors['e'] = "Email is alredy used.";
  }

  $sql6 = "SELECT * FROM user_info where nid='$nid'";
  $result6 = mysqli_query($conn5, $sql6) or die("Query failed");
  if(mysqli_num_rows($result6) >0) {
    $row6 = mysqli_fetch_assoc($result6);
    if($row6['nid']!=""){
    $errors['n'] = "National ID is alredy used.";
  }}

  $sql7 = "SELECT * FROM user_info where passportno='$passport'";
  $result7 = mysqli_query($conn5, $sql7) or die("Query failed");
  if(mysqli_num_rows($result7) >0) {
    $row7 = mysqli_fetch_assoc($result7);
    if($row7['passportno']!=""){
    $errors['p'] = "Passport Number is alredy used.";
  }}

if(count($errors)==0){
if(isset($_FILES['filetoupload'])){
  $errors = array();

  $file_name = $_FILES['filetoupload']['name'];
  $file_size = $_FILES['filetoupload']['size'];
  $file_tmp = $_FILES['filetoupload']['tmp_name'];
  $file_type = $_FILES['filetoupload']['type'];
  $ext = explode('.',$file_name);
  $photoName=$ext[0];
  $file_ext = array_pop($ext);
  $extensions = array("jpeg","JPEG","jpg","JPG","PNG","png");

  if(in_array($file_ext,$extensions)===false){

    $errors[]="This type is not allow. Upload jpeg or png or jpg file.";
  }

  if($file_size > 26214400){

    $errors[]="This file is too large. File size must be 25mb or less.";
  }

  if($photoName != $nid && $photoName != $passport){

    $errors[]="This file name is not right.";
  }

  if(empty($errors) == true){
    move_uploaded_file($file_tmp,"user_photo/".$file_name);
  }
  else{
    foreach ($errors as $key) {
      // code...
      echo $key."<br>";
      die();
    }
  }
}


  $fname=$_POST['fname'];
  $lname=$_POST['lname'];
  $fullname=$fname .' '. $lname;
  $country=$_POST['country'];
  $gender=$_POST['gender'];
  $bdate=$_POST['bdate'];
  $address=$_POST['address'];
  $mobile=$_POST['mobile'];
  $password=$_POST['password'];

  //Photo

    $sql1 = "INSERT INTO user_info(fristname,lastname,fullname,country,gender,brithdate,nid,passportno,address,email,mobile,
    password,photo) values('{$fname}','{$lname}','{$fullname}','{$country}','{$gender}',
    '{$bdate}','{$nid}','{$passport}','{$address}','{$email}','{$mobile}','{$password}','{$file_name}')";
    $result = mysqli_query($conn5, $sql1) or die("Query failed");
    header("Location: http://localhost/hotel_management_system/index.php");
    mysqli_close($conn5);
}}

 ?>

<!doctype html>
<html>
<head>
  <title>User Registration</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css\bootstrap.css">
  <link rel="stylesheet" href="css\style.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <script>
  $(function(){
    var dtToday = new Date();

    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    year = year -18;
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();

    var minDate= year + '-' + month + '-' + day;

    $('#bdate').attr('max', minDate);
});
  </script>

  <script>
  function validate()
			{
				var nid = document.getElementById("nid");
				var passport = document.getElementById("passno");
        var password = document.getElementById("password");

				if(nid.value.trim()=="" && passport.value.trim()=="")
				{
					alert("National Id or Passport Number must be filled.");
					return false;
				}
        if(password.value.length < 8){
          alert("Password lenght must be equal or greater than 8.");
					return false;
        }
      }
  </script>
</head>
<body>

  <div class="container-flud">
    <form onsubmit="return validate()" action="<?php $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
      <div class="row text-center">
        <div class="col-md-8 offset-md-2">
          <h1 class="header">Hotel Asia</h1>
          <h3 class="header">User Registration</h3>
        </div>
      </div>
      <br>

      <div class="row">
        <!----Name----->
        <div class="offset-md-2 col-md-4">
          <div class="form-group">
            <label for="fname">First Name</label>
            <input type="text" class="form-control" name="fname" id="fname" placeholder="First Name" value="<?= isset($_POST['fname']) ? $_POST['fname'] : ''; ?>" required>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="lname">Last Name</label>
            <input type="text" class="form-control" name="lname" id="lname" placeholder="Last Name" value="<?= isset($_POST['lname']) ? $_POST['lname'] : ''; ?>" required>
          </div>
        </div>
      </div>
      <!----Name----->

      <div class="row">
        <!----Country----->
        <div class="offset-md-2 col-md-4">
          <div class="form-group">
            <label for="country">Country</label>
              <input type="text" class="form-control" name="country" id="country" placeholder="Country" value="<?= isset($_POST['country']) ? $_POST['country'] : ''; ?>" required>
          </div>
        </div>
      </div>
        <!----Country----->

      <div class="row">
        <!----Gender----->
        <div class="offset-md-2 col-md-2">
          <div class="form-group">
            <label>Gender</label>
            <div class="form-check">
              <input type="radio" class="form-check-input" name="gender" id="malegen" value="Male" required>
              <label for="malegen" class="form-check-label">Male</label>
            </div>
            <div class="form-check">
              <input type="radio" class="form-check-input" name="gender" id="femalegen" value="Female">
              <label for="femalegen" class="form-check-label">Female</label>
            </div>
            <div class="form-check">
              <input type="radio" class="form-check-input" name="gender" id="othergen" value="Other">
              <label for="othergen" class="form-check-label">Other</label>
            </div>
          </div>
        </div>
      </div>
      <!----Gender----->

      <div class="row">
        <!----Brithdate----->
        <div class="offset-md-2 col-md-4">
          <div class="form-group">
            <label for="bdate">Brith Date</label>
              <input type="date" class="form-control" name="bdate" id="bdate" value="<?= isset($_POST['bdate']) ? $_POST['bdate'] : ''; ?>" required>
          </div>
        </div>
      </div>
        <!----Brithdate----->

        <div class="row">
          <!----ID----->
          <div class="offset-md-2 col-md-4">
            <div class="form-group">
              <label for="nid">National ID</label>
              <input type="text" class="form-control" name="nid" id="nid" placeholder="National ID" value="<?= isset($_POST['nid']) ? $_POST['nid'] : ''; ?>" >
              <p class="text-danger"><?php if(isset($errors['n'])) echo $errors['n'];?></p>
              <small>National ID or Password Number must be filled.</small>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="lname">Passport Number</label>
              <input type="text" class="form-control" name="passno" id="passno" placeholder="Passport Number" value="<?= isset($_POST['passno']) ? $_POST['passno'] : ''; ?>" >
              <p class="text-danger"><?php if(isset($errors['p'])) echo $errors['p'];?></p>
              <small>National ID or Password Number must be filled.</small>
            </div>
          </div>
        </div>
        <!----ID----->

      <div class="row">
        <!----Address----->
        <div class="offset-md-2 col-md-8">
          <div class="form-group">
            <label for="address">Address</label>
              <input type="text" class="form-control" name="address" id="address" placeholder="Address" value="<?= isset($_POST['address']) ? $_POST['address'] : ''; ?>" required>
          </div>
        </div>
      </div>
            <!----Address----->

      <div class="row">
      <div class="offset-md-2 col-md-4">
        <!-------Email------>
        <div class="form-group">
          <label for="email">E-mail</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="E-mail" value="<?= isset($_POST['email']) ? $_POST['email'] : ''; ?>" required>
            <p class="text-danger"><?php if(isset($errors['e'])) echo $errors['e'];?></p>
        </div>
        </div>
        <div class="col-md-4">
          <!-------Mobile------>
          <div class="form-group">
            <label for="mobile">Mobile</label>
              <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Mobile" value="<?= isset($_POST['mobile']) ? $_POST['mobile'] : ''; ?>" required>
          </div>
      </div>
      <!-------Mobile------>
      </div>

      <div class="row">
        <!----Password----->
        <div class="offset-md-2 col-md-4">
          <div class="form-group">
            <label for="password">Password</label>
              <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
              <small>Password lenght must be equal or greater than 8.</small>
          </div>
        </div>
      </div>
        <!----Password----->

        <!--------Photo------>
        <div class="row">
          <div class="offset-md-2 col-md-3">
            <div class="form-group">
            <label for="exampleinputpassword1">Photo:</label>
            <input type="file" id="exampleinputpassword1" name="filetoupload" required>
            <small>Upload jpeg or png or jpg file. Size must be 25mb or less. And photo name must be same as your NID or Passport Number.</small>
          </div>
          </div>
        </div>
        <!--------Photo---->


        <div class="row">
          <div class="offset-md-2 col-md-4">
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
