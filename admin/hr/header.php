<?php
$conn1 = mysqli_connect("localhost","root","","hms") or die("Connection failed");
session_start();

if(!isset($_SESSION['username'])){
  header("Location: http://localhost/hotel_management_system/admin/hr/hradmin.php");
}
?>
<!doctype html>
<html>
<!--------------------admin------------------------->
<!---------------------header of context admin--------------->
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css\bootstrap.css">
</head>

<body>
  <div class="container-flud">
    <div class="row">
      <h1 class="bg-primary text-center"style="font-size: 50px; margin-bottom: 0px; color:white;">Hotel Asia</h1>
    </div>
  </div>
</body>
</html>
