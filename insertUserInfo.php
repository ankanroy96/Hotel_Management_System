<?php
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
  else if(mysqli_num_rows($result6) >0) {
    $errors['n'] = "National ID is alredy used.";
  }

  $sql7 = "SELECT * FROM user_info where passportno='$passport'";
  $result7 = mysqli_query($conn5, $sql7) or die("Query failed");
  else if(mysqli_num_rows($result7) >0) {
    $errors['p'] = "Passport Number is alredy used.");
  }

else{
if(isset($_FILES['filetoupload'])){
  $errors = array();

  $file_name = $_FILES['filetoupload']['name'];
  $file_size = $_FILES['filetoupload']['size'];
  $file_tmp = $_FILES['filetoupload']['tmp_name'];
  $file_type = $_FILES['filetoupload']['type'];
  $ext = explode('.',$file_name);
  $file_ext = array_pop($ext);
  $extensions = array("jpeg","JPEG","jpg","JPG","PNG","png");

  if(in_array($file_ext,$extensions)===false){

    $errors[]="This type is not allow. Upload jpeg or png or jpg file.";
  }

  if($file_size > 26214400){

    $errors[]="This file is too large. File size must be 25mb or less.";
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
    password,cstatus,cindate,coutdate,advance_payment,photo) values('{$fname}','{$lname}','{$fullname}','{$country}','{$gender}',
    '{$bdate}','${nid}','{$passport}','{$address}','{$email}','{$mobile}','{$password}',0,'0','0',0,'{$file_name}')";
    $result = mysqli_query($conn5, $sql1) or die("Query failed");
    header("Location: http://localhost/hotel_management_system/index.php");
    mysqli_close($conn5);
}
 ?>
