<?php
session_start();

if(!isset($_SESSION['reception_admin'])){
  header("Location: http://localhost/hotel_management_system/admin/reception/reception.php");
}
?>
<?php
foreach ($_SESSION['ckoutroom'] as $key) {
  $conn = mysqli_connect("localhost","root","","hms") or die("Connection failed");
  $sql1 = "INSERT INTO all_checkin (id, name, email, mobile, cindate, coutdate, room_type, room_no, size_type) SELECT id, name, email, mobile, cindate, coutdate, room_type, room_no, size_type FROM current_checkin WHERE id=$key;";
  $result1 = mysqli_query($conn, $sql1) or die("Query failed1");

  $sql2 = "INSERT INTO all_guest SELECT * FROM current_guest WHERE stay_id=$key;";
  $result2 = mysqli_query($conn, $sql2) or die("Query failed2");

  $sql5 = "SELECT room_no FROM current_checkin WHERE id=$key;";
  $result5 = mysqli_query($conn, $sql5) or die("Query failed5");
  $row5 = mysqli_fetch_assoc($result5);
  $room=$row5['room_no'];

  $sql3 = "DELETE FROM current_guest WHERE stay_id=$key;";
  $result3 = mysqli_query($conn, $sql3) or die("Query failed3");

  $sql4 = "DELETE FROM current_checkin WHERE id=$key;";
  $result4 = mysqli_query($conn, $sql4) or die("Query failed4");

  $sql6 = "DELETE FROM room_login WHERE username=$room;";
  $result6 = mysqli_query($conn, $sql6) or die("Query failed6");

  $sql7 = "DELETE FROM food_orders WHERE room_no=$room;";
  $result7 = mysqli_query($conn, $sql7) or die("Query failed7");
}

header("Location: http://localhost/hotel_management_system/admin/reception/allBookings.php");

 ?>
