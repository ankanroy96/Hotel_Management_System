<!doctype html>
<html>
<head>
  <title>All Foods</title>
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
        <h1 style="text-align: center;">All Foods</h1>
      </div>
      <form action="allFoodsSort.php" method="post">
        <div class="row">
          <!----Department----->
          <div class="offset-9 col-2">
            <div class="form-group">
              <input type="text" name="foodname" id="foodname" class="form-control" placeholder="Food Name">
            </div>
          </div>

          <div class="col-1">
            <div class="form-group">
            <input type="submit" name="submit" id="btn" class="btn btn-primary" value="Search">
          </div>
          </div>
          </div>
      </form>
      <div class="row">
        <div class="col-sm-10 offset-sm-1">
        <table class="table table-striped">
    <?php
    //database connection
    $conn = mysqli_connect("localhost","root","","hms") or die("Connection failed");
    $sql = "Select f.name as name, fc.category as food_category,f.description as description,f.quantity as quantity,
    f.price as price, f.status as status from foods f join food_category fc on f.food_category=fc.id order by fc.position";
    $result = mysqli_query($conn, $sql) or die("Query failed");

    ?>
    <tr>
      <th style="text-align: center;">No</th>
      <th style="text-align: center;">Name</th>
      <th style="text-align: center;">Category Name</th>
      <th style="text-align: center;">Description</th>
      <th style="text-align: center;">Quantity</th>
      <th style="text-align: center;">Price</th>
      <th style="text-align: center;">Satus</th>
      </tr>
    <?php
    $no=1;
    while($row = mysqli_fetch_assoc($result)){
     ?>

     <tr>
       <td style="text-align: center;"><?php echo $no;?></td>
       <td style="text-align: center;"><?php echo ucfirst($row['name']);?></td>
       <td style="text-align: center;"><?php echo ucfirst($row['food_category']);?></td>
       <td style="text-align: center;"><?php echo $row['description'];?></td>
       <td style="text-align: center;"><?php echo $row['quantity'];?></td>
       <td style="text-align: center;"><?php echo $row['price'];?></td>
       <td style="text-align: center;"><?php
          if($row['status']==0){
            echo "Unavailable";
          }
          else{
            echo "Available";
          }
       ?></td>
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
