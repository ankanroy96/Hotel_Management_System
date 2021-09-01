<!--------------------------------user--------------------------->
<!---------------------------gallary page-------------------------->
<!doctype html>
<html>
<head>
  <!-----user--->
  <title>Gallary-Hotel Asia</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css\bootstrap.css">
  <link rel="stylesheet" href="css\gallary.css">
</head>

<body>
  <div class="container-flud bg-dark">
    <div class="row">
      <div class="col-1 offset-11">
      <a href="gallary.php"type="button" class="btn-close btn-close-white" aria-label="Close" style="padding-left: 80px; font-size: 30px;"></a>
    </div>
    </diV>
    <div class="row">
      <div class="col-10 m-auto">
        <?php
        $imgId = $_GET['id'];
        ?>
        <img src="admin/context/upload/<?php echo $imgId ?>"  alt="" class="img-fluid img-thumbnail rounded">
      </div>
    </div>
  </div>
</body>

</html>
