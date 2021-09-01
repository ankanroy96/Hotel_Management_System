<?php

  $dep=$_POST['department'];

 ?>
<!------show all employee----->
<!doctype html>
<html>
<head>
  <title>Roles</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css\bootstrap.css">
  <link rel="stylesheet" href="css\style.css">
  <link rel="stylesheet" href="css\allemployee.css">

</head>

<body>
  <?php
    include 'header.php';
    include 'sidebar.php';
    ?>

    <div class="container-flud">
      <div class="row">
        <h1 class="header"><?php echo strtoupper($dep)?> Department Roles</h1>
      </div>
      <br>

      <div class="row">
          <!----Show details----->
      <?php
              //database connection
              $conn = mysqli_connect("localhost","root","","hms") or die("Connection failed");
              $sql = "Select * from $dep";
              $result = mysqli_query($conn, $sql) or die("Query failed");

              if(mysqli_num_rows($result) >0) {
                ?>
                <table class="table table-striped m-auto" style="width:20%;">

                  <tr>
                    <th>No</th>
                    <th>Role Name</th>
                    </tr>


              <?php
              $n=1;
              while($row = mysqli_fetch_assoc($result)){
               ?>
               <tr>
                 <td><?php echo $n; $n++;?></td>
                 <td><?php echo strtoupper($row['role']);?></td>
                 </tr>
                 <?php
                 }
               }
               else{

               }
                   mysqli_close($conn);
                 ?>
               </table>
               </div>


        <!----Show details----->

    </div>
    </div> <!----privious content--->
  </div> <!----privious wapper--->

</body>
</html>
