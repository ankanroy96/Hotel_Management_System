<!-------------------------admin---------------
//---------------------- context admin about page------------------>

<!doctype html>
<html>
<head>
  <title>About</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css\bootstrap.css">
  <link rel="stylesheet" href="css\about.css">
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
        $sql = "Select * from about_admin";
        $result = mysqli_query($conn, $sql) or die("Query failed");

        if(mysqli_num_rows($result) >0) {
          $row = mysqli_fetch_assoc($result);
         ?>
        <tr>
          <th>Description:</th>
          <td><p style="text-align: justify"><?php echo $row['description'];?></p></td>
          <td class="text-center"><a class="btn btn-primary" href="about_description.php" role="button">Edit</a></td>
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
