<?php
session_start();

if(!isset($_SESSION['reception_admin'])){
  header("Location: http://localhost/hotel_management_system/admin/reception/reception.php");
}
?>
<?php
$id=$_GET['id'];

$conn = mysqli_connect("localhost","root","","hms") or die("Connection failed");
$sql = "Select * from room_book_info where code='$id'";
$result = mysqli_query($conn, $sql) or die("Query failed");
if(mysqli_num_rows($result) >0){
  while($row = mysqli_fetch_assoc($result)){
  $name=$row['name'];
  $email=$row['email'];
  $mobile=$row['mobile'];
  $cindate=$row['cindate'];
  $coutdate=$row['coutdate'];
  $total_days=$row['total_days'];
  $room_type=$row['room_type'];
  $room_no=$row['room_no'];
  $size_type=$row['size_type'];
  $adult=$row['adult'];
  $child=$row['child'];
  $rent=$row['rent'];
  $advance=$row['advance'];
  $pay_mathod=$row['pay_mathod'];
  $code=$row['code'];
  }
}

$sql2 = "INSERT INTO current_checkin (name,email,mobile,cindate,coutdate,total_days,room_type,room_no,size_type,adult,child,rent,advance,pay_mathod,mail_status,code)
values('{$name}','{$email}','{$mobile}','{$cindate}','{$coutdate}',$total_days,'{$room_type}',$room_no,'{$size_type}',$adult,$child,$rent,$advance,'{$pay_mathod}',0,'{$code}')";
$result2 = mysqli_query($conn, $sql2) or die("Query failed2");

$sql3 = "DELETE FROM room_book_info where code='$id'";
$result3 = mysqli_query($conn, $sql3) or die("Query failed3");

$time100=time();
$cc2=hexdec($code);
$cc3=$cc2+$time100;
$code2=dechex($cc3);
$sql4 = "INSERT INTO room_login (username,password,order_no) values($room_no,'{$code2}',1)";
$result4 = mysqli_query($conn, $sql4) or die("Query failed4");

$sql5 = "Select * from current_checkin where code='$id'";
$result5 = mysqli_query($conn, $sql5) or die("Query failed5");
if(mysqli_num_rows($result5) >0){
  while($row5 = mysqli_fetch_assoc($result5)){
    $stay_id=$row5['id'];
  }
}

$i=1;
$j=1;

for($i=1;$i<=$adult;$i++){
$Gname=$_POST['guest'.$i];
$Gidtype=$_POST['guestidtype'.$i];
$Gid=$_POST['guestid'.$i];
$stay_id;

$sql6 = "INSERT INTO current_guest(stay_id,name,AorC,id_type,id_num) values($stay_id,'{$Gname}','a','{$Gidtype}','{$Gid}')";
$result6 = mysqli_query($conn, $sql6) or die("Query failed6");
}

for($j=1;$j<=$child;$j++){
$Gname=$_POST['child'.$j];
$Gidtype=$_POST['childidtype'.$j];
$Gid=$_POST['childid'.$j];
$stay_id;

$sql7 = "INSERT INTO current_guest(stay_id,name,AorC,id_type,id_num) values($stay_id,'{$Gname}','c','{$Gidtype}','{$Gid}')";
$result7 = mysqli_query($conn, $sql7) or die("Query failed7");
}

header("Location: http://localhost/hotel_management_system/admin/reception/sendMailCheckin.php?email=$email&room=$room_no&code=$code2&name=$name");
mysqli_close($conn);
 ?>
