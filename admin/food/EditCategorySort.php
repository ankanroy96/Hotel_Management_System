<<?php
$category=$_POST['categoryType'];
 ?>
<!doctype html>
<html>
<head>
  <title>Edit Category</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css\bootstrap.css">
  <link rel="stylesheet" href="css\style.css">

</head>

<body>
  <?php
    include 'header.php';
    include 'sidebar.php';
    ?>
    <div class="container-flud">
      <div class="row">
        <h1 style="text-align: center;">Edit Category</h1>
      </div>

      <div class="row">
        <div class="col-sm-6 offset-sm-3">
        <table class="table table-striped">
    <?php
    //database connection
    $conn = mysqli_connect("localhost","root","","hms") or die("Connection failed");
    $sql = "Select * from food_category where category='$category'";
    $result = mysqli_query($conn, $sql) or die("Query failed");

    ?>
    <tr>
      <th style="text-align: center;">Category No</th>
      <th style="text-align: center;">Category Name</th>
      <th style="text-align: center;">Position</th>
      <th style="text-align: center;">Status</th>
      <th style="text-align: center;">Action</th>
      </tr>
    <?php
    $no=1;
    while($row = mysqli_fetch_assoc($result)){
     ?>

     <tr>
       <td style="text-align: center;"><?php echo $no;?></td>
       <td style="text-align: center;"><?php echo ucfirst($row['category']);?></td>
       <td style="text-align: center;"><?php echo ucfirst($row['position']);?></td>
       <td style="text-align: center;"><?php
          if($row['status']==0){
            echo "Unavailable";
          }
          else{
            echo "Available";
          }
       ?></td>
       <td style="text-align: center;"><a href="editcategoryfinal.php?id=<?php echo $row['id'];?>&id1=<?php echo $row['position'];?>" class="btn btn-primary">Edit</a></td>

     </tr>

     <?php
     $no++;
       }
       mysqli_close($conn);
     ?>
   </table>
   </div>
    </div> <!----privious content--->
  </div> <!----privious wapper--->

</body>
</html>
