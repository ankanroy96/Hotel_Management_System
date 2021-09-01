<?php
$conn1 = mysqli_connect("localhost","root","","hms") or die("Connection failed");
session_start();

if(!isset($_SESSION['username'])){
  header("Location: http://localhost/hotel_management_system/admin/room/roomadmin.php");
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
    move_uploaded_file($file_tmp,"room_photo/".$file_name);
  }
  else{
    foreach ($errors as $key) {
      // code...
      echo $key."<br>";
      die();
    }
  }
}


  $type=$_POST['newtype'];
  $des=$_POST['description'];
  $conn3 = mysqli_connect("localhost","root","","hms") or die("Connection failed");
  $sql3 ="INSERT INTO room_type(room_type,photo,description) values ('{$type}','{$file_name}','{$des}')";
  $result3 = mysqli_query($conn3, $sql3) or die("Query failed");
  mysqli_close($conn3);
  header("Location: http://localhost/hotel_management_system/admin/room/allRoom.php");
 ?>
