<?php
//admin
$msg="";
if(isset($_POST['submit'])){
  $foodname=$_POST['foodname'];
  $category=$_POST['categoryType'];
  $description=$_POST['description'];
  $quantity=$_POST['quantity'];
  $price=$_POST['price'];


  $conn = mysqli_connect("localhost","root","","hms") or die("Connection failed");
  $sql = "Select * from foods where name='$foodname' and quantity=$quantity";
  $result = mysqli_query($conn, $sql) or die("Query failed");

  if(mysqli_num_rows($result)>0){
    $msg="Food is already there.";
  }

  if(mysqli_num_rows($result)==0){
    $sql2 = "INSERT INTO foods(name,food_category,description,quantity,price,status) values('{$foodname}',$category,'{$description}',$quantity,$price,1)";
    $result2 = mysqli_query($conn, $sql2) or die("Query failed2");
    header("Location: http://localhost/hotel_management_system/admin/food/allFoods.php");
  }
  mysqli_close($conn);
}
?>
<!doctype html>
<html>
<head>
  <title>Add Food</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css\bootstrap.css">
  <link rel="stylesheet" href="css\style.css">
  <link rel="stylesheet" href="css\style2.css">

</head>

<body>
  <?php
    include 'header.php';
    include 'sidebar.php';
    ?>
    <form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
    <div class="container-flud">
      <div class="row">
        <h1 class="header">Add Food</h1>
      </div>
      <br>

      <div class="row">
        <!----food name----->
        <div class="offset-4 col-4">
          <div class="form-group">
            <label>Food Name</label>
              <input type="text" class="form-control" name="foodname" id="foodname" placeholder="Enter Food Name" required>
          </div>
        </div>
      </div>
        <!----food name----->

        <div class="row">
          <!----category----->
          <div class="offset-4 col-4">
            <div class="form-group">
              <label>Category Name</label>
              <select name="categoryType" class="form-control" required>
                <option value="" selected disabled>Select Category</option>
                <?php
                //database connection
                $conn3 = mysqli_connect("localhost","root","","hms") or die("Connection failed");
                $sql3 = "Select * from food_category";
                $result3 = mysqli_query($conn3, $sql3) or die("Query failed");


                  while($row = mysqli_fetch_assoc($result3)){
                 ?>
                <option value='<?php echo $row["id"];?>'><?php echo ucfirst($row['category']);?></option>
                <?php
                }
                  mysqli_close($conn3);
                ?>
              </select>
            </div>
          </div>
        </div>

      <div class="row">
        <!----Position----->
        <div class="offset-4 col-4">
          <div class="form-group">
            <label>Description</label>
              <textarea class="form-control" name="description" id="description" placeholder="Enter Description"></textarea>
          </div>
        </div>
      </div>
        <!----Position----->

        <div class="row">
          <!----Position----->
          <div class="offset-4 col-4">
            <div class="form-group">
              <label>Quantity(How many people can eat?)</label>
                <input type="number" class="form-control" name="quantity" id="quantity" placeholder="Enter Quantity" required>
            </div>
          </div>
        </div>
          <!----Position----->

          <div class="row">
            <!----Position----->
            <div class="offset-4 col-4">
              <div class="form-group">
                <label>Price</label>
                  <input type="number" class="form-control" name="price" id="price" placeholder="Enter Price" required>
              </div>
            </div>
          </div>
            <!----Position----->

        <div class="row">
          <div class="offset-4 col-4">
            <div class="form-group">
            <input type="submit" name="submit" id="btn" class="btn btn-primary btn-lg" value="Submit">
          </div>
          </div>
        </div>

        <div class="row">
          <div class="offset-4 col-4">
            <p style="color: red;"><?php echo $msg;?></p>
          </div>
        </div>

      </form>

    </div>
    </div> <!----privious content--->
  </div> <!----privious wapper--->

</body>
</html>
