<!------------------------------------admin-----------------
//------------------------------- add photo gallary-------------------->
<!doctype html>
<html>
<head>
  <!---admin---->
  <title>Gallary</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css\bootstrap.css">
  <link rel="stylesheet" href="css\gallary.css">
</head>

<body>
  <div class="container-flud">
    <div class="row">
      <?php
      include 'header.php';
      ?>
    </div>

    <form action="addphoto.php" method="post" enctype="multipart/form-data">
    <div class="row"  style="margin-top: 100px">
      <div class="col-sm-4 m-auto">
        <div class="form-group">
        <label for="exampleinputpassword1"><p  style="font-size: 30px">Upload Photo:</p></label>
        <input type="file" id="exampleinputpassword1" name="filetoupload" required  style="margin-top: 20px">
        <small>Upload jpeg or png or jpg file. Size must be 25mb or less.</small>
      </div>
      </div>
    </div>

   <div class="row">
     <div class="col-sm-4 m-auto">
       <div class="form-group">
       <input type="submit" name="upload" id="btn" class="btn btn-primary" value="Upload" style="margin-top: 5%;">
     </div>
     </div>
   </div>
 </form>

  </div>

</body>

</html>
