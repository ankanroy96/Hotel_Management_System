<!doctype html>
<html>
<head>
  <title>Rooms Size Type</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css\bootstrap.css">
  <link rel="stylesheet" href="css\style.css">
  <link rel="stylesheet" href="css\roomtype.css">

</head>

<body>
  <?php
    include 'header.php';
    include 'sidebar.php';
    ?>
    <div class="container-flud">
      <div class="row">
        <h1>Rooms Size Types</h1>
      </div>

      <div class="row">
        <div class="col-sm-4 offset-sm-4">
        <table class="table table-striped">
    <?php
    //database connection
    $conn = mysqli_connect("localhost","root","","hms") or die("Connection failed");
    $sql = "Select * from size_type";
    $result = mysqli_query($conn, $sql) or die("Query failed1");

    ?>
    <tr>
      <th style="text-align: center;">Size Type</th>
      <th style="text-align: center;">Adult</th>
      <th style="text-align: center;">Child</th>
    </tr>
    <?php
    while($row = mysqli_fetch_assoc($result)){
     ?>
     <tr>
       <td style="text-align: center;"><?php echo $row['size_type']?></td>
       <td style="text-align: center;"><?php echo $row['adult']?></td>
       <td style="text-align: center;"><?php echo $row['child']?></td>
     </tr>
     <?php
       }
       mysqli_close($conn);
     ?>
   </table>
   </div>
    </div> <!----privious content--->
  </div> <!----privious wapper--->

</body>
</html>
