<?php
include 'session.php';
/*if(!isset($_SESSION['username'])){
  header("Location: http://localhost/hotel_management_system/index.php");
}*/
 ?>
<?php
$val_id=urlencode($_POST['val_id']);
$store_id=urlencode("hotel607d38a03da85");
$store_passwd=urlencode("hotel607d38a03da85@ssl");
$requested_url = ("https://sandbox.sslcommerz.com/validator/api/validationserverAPI.php?val_id=".$val_id."&store_id=".$store_id."&store_passwd=".$store_passwd."&v=1&format=json");

$handle = curl_init();
curl_setopt($handle, CURLOPT_URL, $requested_url);
curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, false); # IF YOU RUN FROM LOCAL PC
curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false); # IF YOU RUN FROM LOCAL PC

$result = curl_exec($handle);

$code = curl_getinfo($handle, CURLINFO_HTTP_CODE);

if($code == 200 && !( curl_errno($handle)))
{

	# TO CONVERT AS ARRAY
	# $result = json_decode($result, true);
	# $status = $result['status'];

	# TO CONVERT AS OBJECT
	$result = json_decode($result);

	# TRANSACTION INFO
	$status = $result->status;
	$tran_date = $result->tran_date;
	$tran_id = $result->tran_id;
	$val_id = $result->val_id;
	$amount = $result->amount;
	$store_amount = $result->store_amount;
	$bank_tran_id = $result->bank_tran_id;
	$card_type = $result->card_type;

	# EMI INFO
	$emi_instalment = $result->emi_instalment;
	$emi_amount = $result->emi_amount;
	$emi_description = $result->emi_description;
	$emi_issuer = $result->emi_issuer;

	# ISSUER INFO
	$card_no = $result->card_no;
	$card_issuer = $result->card_issuer;
	$card_brand = $result->card_brand;
	$card_issuer_country = $result->card_issuer_country;
	$card_issuer_country_code = $result->card_issuer_country_code;

	# API AUTHENTICATION
	$APIConnect = $result->APIConnect;
	$validated_on = $result->validated_on;
	$gw_version = $result->gw_version;

} else {

	echo "Failed to connect with SSLCOMMERZ";
}
 ?>
<?php

$conn = mysqli_connect("localhost","root","","hms") or die("Connection failed");

$sql500 = "Select * from tax_offer where type='room'";
$result500 = mysqli_query($conn, $sql500) or die("Query failed500");
$row500 = mysqli_fetch_assoc($result500);
$Tax=$row500['tax'];


$email=$_GET["id"];
$cindate=$_GET["id1"];
$coutdate=$_GET["id2"];
$room_type=$_GET["id3"];
$date1=date_create("$coutdate");
$date2=date_create("$cindate");
$diff=date_diff($date2,$date1);
$days=$diff->format("%a");
if($days==0){
  $days=1;
}
$total=0;

$sql1="SELECT * FROM user_info where email='$email'";
$result1 = mysqli_query($conn, $sql1) or die("Query failed1");
$row = mysqli_fetch_assoc($result1);

$name=$row['fullname'];
$mobile=$row['mobile'];



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
    values('{$name}','{$email}','{$mobile}','{$cindate}','{$coutdate}',$days,'{$room_type}',$room,'{$size}',$adult,$child,$rent,$advance,'{$card_type}',0,'{$codefinale}')";
    $result3 = mysqli_query($conn, $sql3) or die("Query failed30");

    $sql4 = "INSERT INTO book_room(room, cindate, coutdate) values($room,'{$cindate}','{$coutdate}')";
    $result4 = mysqli_query($conn, $sql4) or die("Query failed4");

  }
}

$sql5="DELETE FROM cart where email='$email' and cindate='$cindate' and coutdate='$coutdate'";
$result5 = mysqli_query($conn, $sql5) or die("Query failed5");

header("Location: http://localhost/hotel_management_system/sendMail.php?id=$email&id1=$cindate&id2=$coutdate&id3=$room_type&id4=$name&id5=$total");
mysqli_close($conn);

 ?>
