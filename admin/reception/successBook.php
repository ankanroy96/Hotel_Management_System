<?php
session_start();

if(!isset($_SESSION['reception_admin'])){
  header("Location: http://localhost/hotel_management_system/admin/reception/reception.php");
}
?>
<?php

$conn = mysqli_connect("localhost","root","","hms") or die("Connection failed");

$sql500 = "Select * from tax_offer where type='room'";
$result500 = mysqli_query($conn, $sql500) or die("Query failed500");
$row500 = mysqli_fetch_assoc($result500);
$Tax=$row500['tax'];


$email=$_SESSION['guestEmail'];
$cindate=$_SESSION['cindate'];
$coutdate=$_SESSION['coutdate'];
$guestName=$_SESSION["guestName"];
$guestMobile=$_SESSION["guestMobile"];
$date1=date_create("$coutdate");
$date2=date_create("$cindate");
$diff=date_diff($date2,$date1);
$days=$diff->format("%a");
if($days==0){
  $days=1;
}
$total=0;

$sql2="SELECT * FROM cart where email='$email' and cindate='$cindate' and coutdate='$coutdate'";
$result2 = mysqli_query($conn, $sql2) or die("Query failed2");
if(mysqli_num_rows($result2) >0) {
  while($row = mysqli_fetch_assoc($result2)){
    $room=$row['room'];
    $rent=$row['price'];
    $advance=(($rent*$days)+(($rent*$days)*($Tax/100)))*(25/100);
		$total=$total+$advance;

    $sql200 ="SELECT * FROM rooms where id=$room";
    $result200 = mysqli_query($conn, $sql200) or die("Query failed2");
    if(mysqli_num_rows($result200) >0) {
      while($row200 = mysqli_fetch_assoc($result200)){
        $type=$row200['room_type'];
        $size=$row200['size_type'];
        $adult=$row200['adult'];
        $child=$row200['child'];

      }
    }

    $YEAR=date("Y");
    $date100 = date_create("$cindate");
    $date101 = date_format($date100, "z")+1;

    $time=time();
    $code= $YEAR*$time*$room+$date101;

    $codefinale = dechex($code);

    $sql3 = "INSERT INTO room_book_info (name,email,mobile,cindate,coutdate,total_days,room_type,room_no,size_type,adult,child,rent,advance,pay_mathod,mail_status,code)
    values('{$guestName}','{$email}','{$guestMobile}','{$cindate}','{$coutdate}',$days,'{$type}',$room,'{$size}',$adult,$child,$rent,$advance,'reception',0,'{$codefinale}')";
    $result3 = mysqli_query($conn, $sql3) or die("Query failed30");

    $sql4 = "INSERT INTO book_room(room, cindate, coutdate) values($room,'{$cindate}','{$coutdate}')";
    $result4 = mysqli_query($conn, $sql4) or die("Query failed4");

  }
}

$sql5="DELETE FROM cart where email='$email' and cindate='$cindate' and coutdate='$coutdate'";
$result5 = mysqli_query($conn, $sql5) or die("Query failed5");

header("Location: http://localhost/hotel_management_system/admin/reception/sendMailBook.php?advance=$total");
mysqli_close($conn);

 ?>
