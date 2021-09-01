<<?php
include 'session.php';
if(!isset($_SESSION['username'])){
  header("Location: http://localhost/hotel_management_system/index.php");
}
 ?>
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
    $row5 = mysqli_fetch_assoc($result5);

    $nidOld=$row5['nid'];
    $passportOld=$row5['passportno'];
  }

  $sql6 = "SELECT * FROM user_info where nid='$nid'";
  $result6 = mysqli_query($conn5, $sql6) or die("Query failed");
  if(mysqli_num_rows($result6) >0) {
    $row6 = mysqli_fetch_assoc($result6);
    if($row6['nid']!="$nidOld"){
    $errors['n'] = "National ID is alredy used.";
  }}

  $sql7 = "SELECT * FROM user_info where passportno='$passport'";
  $result7 = mysqli_query($conn5, $sql7) or die("Query failed");
  if(mysqli_num_rows($result7) >0) {
    $row7 = mysqli_fetch_assoc($result7);
    if($row7['passportno']!="$passportOld"){
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

  if($photoName == $nid && $photoName == $passport){

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


  //Photo

    $sql1 = "UPDATE user_info set fristname='{$fname}', lastname='{$lname}',fullname='{$fullname}',country='{$country}',gender='{$gender}',
    brithdate='{$bdate}',nid='{$nid}',passportno='{$passport}',address='{$address}',mobile='{$mobile}',photo='{$file_name}' where email='$email'";
    $result = mysqli_query($conn5, $sql1) or die("Query failed2");
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

				if(nid.value.trim()=="" && passport.value.trim()=="")
				{
					alert("National Id or Passport Number must be filled.");
					return false;
				}
      }
  </script>
</head>
<body>

  <div class="container-flud">
    <form onsubmit="return validate()" action="<?php $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
      <?php

      $email=$_SESSION['username'];
      $check="";
      $conn10 = mysqli_connect("localhost","root","","hms") or die("Connection failed");
      $sql10 = "SELECT * FROM user_info where email='$email'";
      $result10= mysqli_query($conn10, $sql10) or die("Query failed");
      if(mysqli_num_rows($result10) >0) {
        $row10 = mysqli_fetch_assoc($result10);
      ?>
      <div class="row text-center">
        <div class="col-md-8 offset-md-2">
          <h1 class="header">Hotel Asia</h1>
          <h3 class="header">Edit Profile</h3>
        </div>
      </div>
      <br>

      <div class="row">
        <!----Name----->
        <div class="offset-md-2 col-md-4">
          <div class="form-group">
            <label for="fname">First Name</label>
            <input type="text" class="form-control" name="fname" id="fname" placeholder="First Name" value="<?php echo $row10['fristname'] ?>" required>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="lname">Last Name</label>
            <input type="text" class="form-control" name="lname" id="lname" placeholder="Last Name" value="<?php echo $row10['lastname'] ?>" required>
          </div>
        </div>
      </div>
      <!----Name----->

      <div class="row">
        <!----Country----->
        <div class="offset-md-2 col-md-4">
          <div class="form-group">
            <label for="country">Country</label>
              <input type="text" class="form-control" name="country" id="country" placeholder="Country" value="<?php echo $row10['country'] ?>" required>
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
              <input type="radio" class="form-check-input" name="gender" id="malegen" value="Male" <?php if($row10['gender']=="Male"){$check="checked";} echo $check;?> required>
              <label for="malegen" class="form-check-label">Male</label>
            </div>
            <?php $check=""; ?>
            <div class="form-check">
              <input type="radio" class="form-check-input" name="gender" id="femalegen" value="Female" <?php if($row10['gender']=="Female"){$check="checked";} echo $check;?>>
              <label for="femalegen" class="form-check-label">Female</label>
            </div>
            <?php $check=""; ?>
            <div class="form-check">
              <input type="radio" class="form-check-input" name="gender" id="othergen" value="Other" <?php if($row10['gender']=="Other"){$check="checked";} echo $check;?>>
              <label for="othergen" class="form-check-label">Other</label>
            </div>
            <?php $check=""; ?>
          </div>
        </div>
      </div>
      <!----Gender----->

      <div class="row">
        <!----Brithdate----->
        <div class="offset-md-2 col-md-4">
          <div class="form-group">
            <label for="bdate">Brith Date</label>
              <input type="date" class="form-control" name="bdate" id="bdate" value="<?php echo $row10['brithdate'] ?>" required>
          </div>
        </div>
      </div>
        <!----Brithdate----->

        <div class="row">
          <!----ID----->
          <div class="offset-md-2 col-md-4">
            <div class="form-group">
              <label for="nid">National ID</label>
              <input type="text" class="form-control" name="nid" id="nid" placeholder="National ID" value="<?php echo $row10['nid'] ?>" >
              <p class="text-danger"><?php if(isset($errors['n'])) echo $errors['n'];?></p>
              <small>National ID or Password Number must be filled.</small>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="lname">Passport Number</label>
              <input type="text" class="form-control" name="passno" id="passno" placeholder="Passport Number" value="<?php echo $row10['passportno'] ?>" >
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
              <input type="text" class="form-control" name="address" id="address" placeholder="Address" value="<?php echo $row10['address'] ?>" required>
          </div>
        </div>
      </div>
            <!----Address----->

      <div class="row">
      <div class="offset-md-2 col-md-4">
        <!-------Email------>
        <div class="form-group">
          <label for="email">E-mail</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="E-mail" value="<?php echo $row10['email'] ?>" readonly>
            <p class="text-danger"><?php if(isset($errors['e'])) echo $errors['e'];?></p>
        </div>
        </div>
        <div class="col-md-4">
          <!-------Mobile------>
          <div class="form-group">
            <label for="mobile">Mobile</label>
              <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Mobile" value="<?php echo $row10['mobile'] ?>" required>
          </div>
      </div>
      <!-------Mobile------>
      </div>

      <!--------Photo------>
        <div class="row">
          <div class="offset-md-2 col-md-3">
            <div class="form-group">
            <label for="exampleinputpassword1">Photo:</label>
            <input type="file" id="exampleinputpassword1" name="filetoupload" required>
            <small>Upload jpeg or png or jpg file. Size must be 25mb or less.</small>
          </div>
          </div>
        </div>
        <!--------Photo---->


        <div class="row">
          <div class="offset-md-2 col-md-4">
            <div class="form-group">
            <input type="submit" name="submit" id="btn" class="btn btn-primary btn-lg" value="Update">
          </div>
          </div>
        </div>
      </form>
      <?php
    }
    mysqli_close($conn10);
       ?>

    </div>
    </div> <!----privious content--->
  </div> <!----privious wapper--->

</body>
</html>
