<?php
session_start();

if(!isset($_SESSION['reception_admin'])){
  header("Location: http://localhost/hotel_management_system/admin/reception/reception.php");
}
?>
<?php

$rec=$_SESSION['reception_admin'];
$advance=$_GET["advance"];
$email=$_SESSION['guestEmail'];
$cindate=$_SESSION['cindate'];
$coutdate=$_SESSION['coutdate'];
$name=$_SESSION["guestName"];
$guestMobile=$_SESSION["guestMobile"];

$rooms=array();
$codes=array();
$roomType=array();
$n=0;

$conn = mysqli_connect("localhost","root","","hms") or die("Connection failed");
$sql1="SELECT * FROM room_book_info where email='$email' and cindate='$cindate' and coutdate='$coutdate' and mail_status=0";
$result1 = mysqli_query($conn, $sql1) or die("Query failed1");
if(mysqli_num_rows($result1) >0) {
  while($row = mysqli_fetch_assoc($result1)){

    $rooms[$n] = $row['room_no'];
    $roomType[$n] = $row['room_type'];
    $codes[$n] = $row['code'];
    $n=$n+1;
  }
}
$a=$n;

$body2=" ";
$k=0;

$to_email = $email;
$subject = "Room Booking Confirmation. HOTEL ASIA";
$body1 = "Sir/Madam $name, <br>Your booking for room(s) is successful.<br>
Your room(s) and booking number(s):<br>";
foreach($rooms as $value){

    $body2= $body2."Room: ".$value."($roomType[$k])"." => Booking Number: "."$codes[$k]"."<br>";
    $k=$k+1;
}

$body3="
<br>
<br>
Your advance payment: $advance taka.
<br>
Thank you for choosing us.
<br>Regards<br>
TEAM HOTEL ASIA.
";

$body= $body1.$body2.$body3;
$headers = [
  "MIME-Version: 1.0",
  "Content-type: text/html; charset=ISO-8859-1",
  "From: ankan.roy31@gmail.com"
];

$headers= implode("\r\n", $headers);

if (mail($to_email, $subject, $body, $headers)) {
   echo "Email successfully sent to $to_email...";
} else {
   echo "Email sending failed...";
}

session_start();
$_SESSION['reception_admin']=$rec;

$sql15="UPDATE room_book_info set mail_status=1 where email='$email' and cindate='$cindate' and coutdate='$coutdate'";
$result15 = mysqli_query($conn, $sql15) or die("Query failed15");

header("Location: http://localhost/hotel_management_system/admin/reception/todayBookings.php");

mysqli_close($conn);

?>
