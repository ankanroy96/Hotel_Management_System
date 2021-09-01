<?php
session_start();
if(!isset($_SESSION['roomno'])){
  header("Location: http://localhost/hotel_management_system/roomLogin.php");
}
$id=$_GET['id'];
$price=$_GET['price'];
 ?>
<!DOCTYPE html>
<html>
<head>
  <title>Edit Quantity</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css\bootstrap.css">
  <link rel="stylesheet" href="css\room.css">

</head>
<body>

  <br>
  <br>
  <br>

  <div class="row">
    <div class="offset-5 col-4">
      <h1>Edit Quantity</h1>
    </div>
  </div>

  <br>

  <form action="foodCartAction.php?id=1" method="post">
    <div class="row">
      <!----Department----->
      <div class="offset-5 col-1">
        <div class="form-group">
          <input type="hidden" name="fid" id="fid" class="form-control" value="<?php echo $id?>">
          <input type="hidden" name="price" id="price" class="form-control" value="<?php echo $price?>">
          <input type="number" name="quantity" id="quantity" class="form-control" value="1" min="0">
        </div>
      </div>

      <div class="col-1">
        <div class="form-group">
        <input type="submit" name="submit" id="btn" class="btn btn-success" value="Update">
      </div>
      </div>
      </div>

      <br>
      <div class="row">
        <div class="offset-5 col-2">
          <a href="foodCart.php" style="font-size: 30px;">Go back</a>
        </div>
      </div>

  </form>


  <link href="js/jquery.nice-number.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-1.12.4.min.js"
        integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ"
        crossorigin="anonymous">
      </script>
      <script src="js/jquery.nice-number.js"></script>
      <script>
      $(function(){
      $('input[type="number"]').niceNumber();
      });
      </script>

</body>
</html>
