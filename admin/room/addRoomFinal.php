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

if(isset($_FILES['filetoupload1'])){
  $errors1 = array();

  $file_name1 = $_FILES['filetoupload1']['name'];
  $file_size1 = $_FILES['filetoupload1']['size'];
  $file_tmp1 = $_FILES['filetoupload1']['tmp_name'];
  $file_type1 = $_FILES['filetoupload1']['type'];
  $ext1 = explode('.',$file_name1);
  $file_ext1 = array_pop($ext1);
  $extensions1 = array("jpeg","JPEG","jpg","JPG","PNG","png");

  if(in_array($file_ext1,$extensions1)===false){

    $errors1[]="This type is not allow. Upload jpeg or png or jpg file.";
  }

  if($file_size1 > 26214400){

    $errors1[]="This file is too large. File size must be 25mb or less.";
  }

  if(empty($errors1) == true){
    move_uploaded_file($file_tmp1,"room_photo/".$file_name1);
  }
  else{
    foreach ($errors1 as $key1) {
      // code...
      echo $key1."<br>";
      die();
    }
  }
}

if(isset($_FILES['filetoupload2'])){
  $errors2 = array();

  $file_name2 = $_FILES['filetoupload2']['name'];
  $file_size2 = $_FILES['filetoupload2']['size'];
  $file_tmp2 = $_FILES['filetoupload2']['tmp_name'];
  $file_type2 = $_FILES['filetoupload2']['type'];
  $ext2 = explode('.',$file_name2);
  $file_ext2 = array_pop($ext2);
  $extensions2 = array("jpeg","JPEG","jpg","JPG","PNG","png");

  if(in_array($file_ext2,$extensions2)===false){

    $errors2[]="This type is not allow. Upload jpeg or png or jpg file.";
  }

  if($file_size2 > 26214400){

    $errors2[]="This file is too large. File size must be 25mb or less.";
  }

  if(empty($errors2) == true){
    move_uploaded_file($file_tmp2,"room_photo/".$file_name2);
  }
  else{
    foreach ($errors2 as $key2) {
      // code...
      echo $key2."<br>";
      die();
    }
  }
}

if(isset($_FILES['filetoupload3'])){
  $errors3 = array();

  $file_name3 = $_FILES['filetoupload3']['name'];
  $file_size3 = $_FILES['filetoupload3']['size'];
  $file_tmp3 = $_FILES['filetoupload3']['tmp_name'];
  $file_type3 = $_FILES['filetoupload3']['type'];
  $ext3 = explode('.',$file_name3);
  $file_ext3 = array_pop($ext3);
  $extensions3 = array("jpeg","JPEG","jpg","JPG","PNG","png");

  if(in_array($file_ext3,$extensions3)===false){

    $errors3[]="This type is not allow. Upload jpeg or png or jpg file.";
  }

  if($file_size3 > 26214400){

    $errors3[]="This file is too large. File size must be 25mb or less.";
  }

  if(empty($errors3) == true){
    move_uploaded_file($file_tmp3,"room_photo/".$file_name3);
  }
  else{
    foreach ($errors3 as $key3) {
      // code...
      echo $key3."<br>";
      die();
    }
  }
}

if(isset($_FILES['filetoupload4'])){
  $errors4 = array();

  $file_name4 = $_FILES['filetoupload4']['name'];
  $file_size4 = $_FILES['filetoupload4']['size'];
  $file_tmp4 = $_FILES['filetoupload4']['tmp_name'];
  $file_type4 = $_FILES['filetoupload4']['type'];
  $ext4 = explode('.',$file_name4);
  $file_ext4 = array_pop($ext4);
  $extensions4 = array("jpeg","JPEG","jpg","JPG","PNG","png");

  if(in_array($file_ext4,$extensions4)===false){

    $errors4[]="This type is not allow. Upload jpeg or png or jpg file.";
  }

  if($file_size4 > 26214400){

    $errors4[]="This file is too large. File size must be 25mb or less.";
  }

  if(empty($errors4) == true){
    move_uploaded_file($file_tmp4,"room_photo/".$file_name4);
  }
  else{
    foreach ($errors4 as $key4) {
      // code...
      echo $key4."<br>";
      die();
    }
  }
}


  $type=$_POST['room_type'];
  $price=$_POST['price'];
  $status=$_POST['status'];
  $size=$_POST['size_type'];
  $floor=$_POST['floor'];

  $conn3 = mysqli_connect("localhost","root","","hms") or die("Connection failed");

  $sql45 ="SELECT * from rooms where flooor=$floor";
  $result45 = mysqli_query($conn3, $sql45) or die("Query failed45");
  if(mysqli_num_rows($result45) == 0) {
    $flRoom=1;
  }
  else{
    $sql46 ="SELECT MAX(floor_room_no) AS flroom from rooms where flooor=$floor";
    $result46 = mysqli_query($conn3, $sql46) or die("Query failed46");
    $row46 = mysqli_fetch_assoc($result46);
    $flRoom=$row46['flroom']+1;
  }

  $RoomNumber=($floor*1000)+$flRoom;

  $sql4 ="SELECT * from size_type where size_type='{$size}'";
  $result4 = mysqli_query($conn3, $sql4) or die("Query failed");
  $row = mysqli_fetch_assoc($result4);
  $adult=$row['adult'];
  $child=$row['child'];

  $sql100 ="SELECT * from tax_offer where type='room'";
  $result100 = mysqli_query($conn3, $sql100) or die("Query failed100");
  $row100 = mysqli_fetch_assoc($result100);

  $RoomDiscount=$row100['discount'];
  $FinalPrice=$price-($price*($RoomDiscount/100));


  $sql3 ="INSERT INTO rooms(id,room_type,flooor,floor_room_no,price,fprice,size_type,adult,child,photo,status,photo2,photo3,photo4,photo5) values ($RoomNumber,'{$type}',$floor,$flRoom,'{$price}',$FinalPrice,'{$size}',$adult,$child,'{$file_name}','{$status}','{$file_name1}','{$file_name2}','{$file_name3}','{$file_name4}')";
  $result3 = mysqli_query($conn3, $sql3) or die("Query failed");
  mysqli_close($conn3);
  header("Location: http://localhost/hotel_management_system/admin/room/allRoom.php");
 ?>
