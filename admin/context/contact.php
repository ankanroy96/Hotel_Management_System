<!------------------------------admin------------------
//--------------------------- context admin contacts ---------------------------->


<!doctype html>
<html>
<head>
  <title>contact</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css\bootstrap.css">
  <link rel="stylesheet" href="css\contact.css">
</head>
<body>
  <div class="container-flud">
    <div class="row">
      <?php
      include "header.php";
      ?>
    </div>
    <div class="row" style="margin-top: 100px">
      <div class="col-sm-4 offset-sm-4">
      <table class="table table-striped">
        <?php
        //database connection
        $conn = mysqli_connect("localhost","root","","hms") or die("Connection failed");
        $sql = "Select * from contacts";
        $result = mysqli_query($conn, $sql) or die("Query failed");

        if(mysqli_num_rows($result) >0) {
          $row = mysqli_fetch_assoc($result);
         ?>
        <tr>
          <th>Mobile</th>
          <td><?php echo $row['mobile'];?></td>
          <td class="text-center"><a class="btn btn-primary" href="mobile.php" role="button">Edit</a></td>
        </tr>
        <tr>
          <th>E-mail</th>
          <td><?php echo $row['email'];?></td>
          <td class="text-center"><a class="btn btn-primary" href="email.php" role="button">Edit</a></td>
        </tr>
        <tr>
          <th>Facebook</th>
          <td><?php echo $row['facebook'];?></td>
          <td class="text-center"><a class="btn btn-primary" href="facebook.php" role="button">Edit</a></td>
        </tr>
        <tr>
          <th>Twitter</th>
          <td><?php echo $row['twitter'];?></td>
          <td class="text-center"><a class="btn btn-primary" href="twitter.php" role="button">Edit</a></td>
        </tr>
        <tr>
          <th>Google</th>
          <td><?php echo $row['google'];?></td>
          <td class="text-center"><a class="btn btn-primary" href="google.php" role="button">Edit</a></td>
        </tr>
        <tr>
          <th>Address</th>
          <td><?php echo $row['address'];?></td>
          <td class="text-center"><a class="btn btn-primary" href="address.php" role="button">Edit</a></td>
        </tr>
        <?php
          }
          mysqli_close($conn);
        ?>
      </table>
    </div>
    </div>
  </div>
</body>
</html>
