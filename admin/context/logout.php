<?php
//--------------Admin
//------------------context admin logout-------------------------

$conn1 = mysqli_connect("localhost","root","","hms") or die("Connection failed");

session_start();
session_unset();
session_destroy();

header("Location: http://localhost/hotel_management_system/admin/context/contextadmin.php");

 ?>
