<?php
$conn1 = mysqli_connect("localhost","root","","hms") or die("Connection failed");
session_start();

if(!isset($_SESSION['username'])){
  header("Location: http://localhost/hotel_management_system/admin/hr/hradmin.php");
}
?>
<?php

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
    move_uploaded_file($file_tmp,"employee_photo/".$file_name);
  }
  else{
    foreach ($errors as $key) {
      // code...
      echo $key."<br>";
      die();
    }
  }
}

  $department = $_GET['id'];
  $fname=$_POST['fname'];
  $lname=$_POST['lname'];
  $fullname=$fname .' '. $lname;
  $country=$_POST['country'];
  $gender=$_POST['gender'];
  $bdate=$_POST['bdate'];
  $address=$_POST['address'];
  $email=$_POST['email'];
  $mobile=$_POST['mobile'];
  $role=$_POST['role'];
  $bsalary=$_POST['bsalary'];

  //Photo


    $conn1 = mysqli_connect("localhost","root","","hms") or die("Connection failed");
    $sql1 = "INSERT INTO employee(fname,lname,fullname,email,address,gender,country,mobile,basalary,
    brithdate,deparment,role,photo) values('{$fname}','{$lname}','{$fullname}','{$email}','{$address}',
    '{$gender}','{$country}','{$mobile}',$bsalary,'{$bdate}','{$department}','{$role}','{$file_name}')";
    $result = mysqli_query($conn1, $sql1) or die("Query failed");
    header("Location: http://localhost/hotel_management_system/admin/hr/allemployee.php");
    mysqli_close($conn1);

 ?>
