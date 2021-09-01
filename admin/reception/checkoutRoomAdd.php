<?php
session_start();

if(!isset($_SESSION['reception_admin'])){
  header("Location: http://localhost/hotel_management_system/admin/reception/reception.php");
}
?>
<?php
if (!isset($_SESSION['ckoutroom'])){
  $_SESSION['ckoutroom']=array();
}
$id=$_GET['id'];
$action=$_GET['action'];
echo $id;

if($action==2){

$roomcheck= in_array($id,$_SESSION['ckoutroom']);

if($roomcheck==0){
  array_push($_SESSION['ckoutroom'],$id);
}
}

else if($action==1||$action==3){
  $roomcheck= array_search($id,$_SESSION['ckoutroom']);

  unset($_SESSION['ckoutroom'][$roomcheck]);
}
if($action==3){
  header("Location: http://localhost/hotel_management_system/admin/reception/checkoutConfirm.php");
}
else{
header("Location: http://localhost/hotel_management_system/admin/reception/checkout.php");
}
 ?>
