<!------------------------------admin-----------------
//--------------------- add photo to gallary------------------>

<?php
$conn1 = mysqli_connect("localhost","root","","hms") or die("Connection failed");
session_start();

if(!isset($_SESSION['username'])){
  header("Location: http://localhost/hotel_management_system/admin/context/contextadmin.php");
}
?>

<?php
//admin
if(isset($_FILES['filetoupload'])){
  $errors = array();

  $file_name = $_FILES['filetoupload']['name'];
  $file_size = $_FILES['filetoupload']['size'];
  $file_tmp = $_FILES['filetoupload']['tmp_name'];
  $file_type = $_FILES['filetoupload']['type'];
  $file_ext = end(explode('.',$file_name));
  $extensions = array("jpeg","JPEG","jpg","JPG","PNG","png");

  if(in_array($file_ext,$extensions)===false){

    $errors[]="This type is not allow. Upload jpeg or png or jpg file.";
  }

  if($file_size > 26214400){

    $errors[]="This file is too large. File size must be 25mb or less.";
  }

  if(empty($errors) == true){
    move_uploaded_file($file_tmp,"upload/".$file_name);
  }
  else{
    foreach ($errors as $key) {
      // code...
      echo $key."<br>";
      die();
    }
  }

  $conn1 = mysqli_connect("localhost","root","","hms") or die("Connection failed");
  $sql1 = "INSERT INTO gallary(image) values('{$file_name}')";
  $result = mysqli_query($conn1, $sql1) or die("Query failed");
  header("Location: http://localhost/hotel_management_system/admin/context/gallaryadd.php");
  mysqli_close($conn1);
}
 ?>
