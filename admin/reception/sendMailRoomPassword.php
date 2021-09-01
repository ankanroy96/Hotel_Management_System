<?php
session_start();

if(!isset($_SESSION['reception_admin'])){
  header("Location: http://localhost/hotel_management_system/admin/reception/reception.php");
}
?>
<?php
$username=$_SESSION['reception_admin'];
 ?>
<?php
$email=$_POST["email"];
$room=$_POST["room"];
$name=$_POST["name"];

$conn = mysqli_connect("localhost","root","","hms") or die("Connection failed");
$sql = "Select * from room_login where username='$room'";
$result = mysqli_query($conn, $sql) or die("Query failed");
if(mysqli_num_rows($result)){
  while($row = mysqli_fetch_assoc($result)){
    $code=$row['password'];
  }
}

$to_email = $email;
$subject = "Room Login Password. HOTEL ASIA";
$body = "Sir/Madam $name, <br>Welcome to Hotel Asia. Your room number is '$room'. Your room login password is '$code'.<br>
<br>
Thank you for choosing us.
<br>Regards<br>
TEAM HOTEL ASIA.
";

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


$_SESSION['reception_admin']=$username;

header("Location: http://localhost/hotel_management_system/admin/reception/allBookings.php");

mysqli_close($conn);

?>
