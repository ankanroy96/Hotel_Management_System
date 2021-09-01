<!----------------------------------------user--------->
<!------------------------------------index page------------------>
<?php
$gg=1;
$conn = mysqli_connect("localhost","root","","hms") or die("Connection failed");
$sql6 = "Select * from tax_offer";
$result6 = mysqli_query($conn, $sql6) or die("Query failed6");
while($row6 = mysqli_fetch_assoc($result6)){
  if($gg==1){
  $fooddiscount=$row6['discount'];
  $gg=2;
}
else{
  $roomdiscount=$row6['discount'];
}
}
 ?>
<?php
include 'session.php';
 ?>
<!doctype html>
<html>
<head>
  <title>Home-Hotel Asia</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css\bootstrap.css">
  <link rel="stylesheet" href="css\index.css">
</head>
<body>
<div class="container-flud">

  <div class="row">
    <?php
    include 'header.php';
    ?>
  </div>

  <div class="row">
  <!-------Carousel Start------->
  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <div class="banner" style="background-image: url(images/Home_1.jpg);"></div>
      <div class="carousel-caption" style="margin-bottom: 100px">
        <h2> HOTEL ASIA</2>
        <h3>WE KNOW WHAT YOU LOVE<h3>
        <h4>WELCOME TO OUR HOTELS</h4>
        <?php
        if($roomdiscount>0){
          echo '<h2 style="color:black; font-size:30px;">'.$roomdiscount.'% discount on all room rents.</h2>';
        }
        if($roomdiscount>0&&$fooddiscount>0){
          echo '<h2 style="color:black; font-size:30px;">&</h2>';
        }
        if($fooddiscount>0){
          echo '<h2 style="color:black; font-size:30px;">'.$fooddiscount.'% discount on all foods.</h2>';
        }
         ?>
        <a class="btn btn-primary btn-lg"href="room.php">BOOK ROOM<a/>
      </div>
    </div>
    <div class="item">
      <div class="banner" style="background-image: url(images/Home_2.jpg);"></div>
      <div class="carousel-caption" style="margin-bottom: 100px">
        <h2> HOTEL ASIA</h2>
        <h3>STAY WITH FRIENDS & FAMILIES<h3>
        <h4>COME & ENJOY PRECIOUS MOMENT WITH US </h4>
        <?php
        if($roomdiscount>0){
          echo '<h2 style="color:black; font-size:30px;">'.$roomdiscount.'% discount on all room rents.</h2>';
        }
        if($roomdiscount>0&&$fooddiscount>0){
          echo '<h2 style="color:black; font-size:30px;">&</h2>';
        }
        if($fooddiscount>0){
          echo '<h2 style="color:black; font-size:30px;">'.$fooddiscount.'% discount on all foods.</h2>';
        }
         ?>
        <a class="btn btn-primary btn-lg"href="room.php">BOOK ROOM<a/>
      </div>
    </div>
    <div class="item">
      <div class="banner" style="background-image: url(images/Home_3.jpg);"></div>
      <div class="carousel-caption" style="margin-bottom: 100px">
        <h2> HOTEL ASIA</h2>
        <h3>WANT LUXURIOUS VACATION?<h3>
        <h4>GET ACCOMMODATION TODAY</h4>
        <?php
        if($roomdiscount>0){
          echo '<h2 style="color:black; font-size:30px;">'.$roomdiscount.'% discount on all room rents.</h2>';
        }
        if($roomdiscount>0&&$fooddiscount>0){
          echo '<h2 style="color:black; font-size:30px;">&</h2>';
        }
        if($fooddiscount>0){
          echo '<h2 style="color:black; font-size:30px;">'.$fooddiscount.'% discount on all foods.</h2>';
        }
         ?>
        <a class="btn btn-primary btn-lg"href="room.php">BOOK ROOM<a/>
      </div>
    </div>

  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>

<div class="row">
  <?php
  include 'footer.php';
   ?>
</div>

</div>
</body>
</html>
