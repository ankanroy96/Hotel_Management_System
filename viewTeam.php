<!---------------------user------------------------>
<!-------------------------about page--------------------->
<?php include 'session.php';
$dep=$_GET['dep'];
?>
<!doctype html>
<html>
<head>
  <title>About-Hotel Asia</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css\bootstrap.css">
  <link rel="stylesheet" href="css\about.css">
</head>
<body>
  <div class="container-flud">
    <div class="row">
      <?php
      include 'header.php';
       ?>
    </div>
    <section class="body-background">
    <div class="row">
      <div class="col-sm-10 col-lg-6 offset-3">
        <br>
        <br>
        <p style="font-size: 30px; text-align: center;"><?php echo ucfirst($dep).' Team';?></p>
        <table class="table table-striped" style="font-size: 20px;">
          <tr>
            <th style="text-align: center;">Full Name</th>
            <th style="text-align: center;">E-mail</th>
            <th style="text-align: center;">Role</th>
            <th style="text-align: center;">Photo</th>
          </tr>
        <?php
        //database connection
        $conn = mysqli_connect("localhost","root","","hms") or die("Connection failed");
        $sql = "Select * from employee where deparment='$dep'";
        $result = mysqli_query($conn, $sql) or die("Query failed");

        if(mysqli_num_rows($result) >0) {
          while ($row = mysqli_fetch_assoc($result)){
         ?>
         <tr>
           <td style="text-align: center;"><?php echo ucfirst($row['fullname']);?></td>
           <td style="text-align: center;"><?php echo $row['fullname'];?></td>
           <td style="text-align: center;"><?php echo ucfirst($row['role']);?></td>
           <td style="text-align: center;"><img src="admin\hr\employee_photo\<?php echo $row['photo'];?>" alt="Girl in a jacket" width="100" height="100"></td>
         </tr>
      <?php
        }
      }
        mysqli_close($conn);
      ?>
      </div>
    </div>
  </table>
  </section>
  <div class="row">
    <?php
    include "footer.php";
     ?>
  </div>
  </div>

</body>
</html>
