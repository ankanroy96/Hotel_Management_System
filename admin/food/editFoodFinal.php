<?php
$id=$_GET['id'];
?>
<!doctype html>
<html>
<head>
  <title>Edit Food</title>
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
    <form action="editFoodDone.php" method="post">
    <div class="container-flud">
      <div class="row">
        <h1 class="header">Edit Food</h1>
      </div>
      <br>

      <?php
      //database connection
      $conn = mysqli_connect("localhost","root","","hms") or die("Connection failed");
      $sql = "Select * from foods where id=$id";
      $result = mysqli_query($conn, $sql) or die("Query failed");
      while($row = mysqli_fetch_assoc($result)){
        $s1="";
        $s2="";
        if($row['status']==0){
          $s1="selected";
        }
        else{
          $s2="selected";
        }
       ?>

      <div class="row">
        <!----Category----->
        <div class="offset-4 col-4">
          <div class="form-group">
            <label>Food Name</label>
              <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $id?>">
              <input type="hidden" class="form-control" name="pfoodname" id="pfoodname" value="<?php echo $row['name']?>">
              <input type="hidden" class="form-control" name="pquantity" id="pquantity" value="<?php echo $row['quantity']?>">
              <input type="text" class="form-control" name="foodname" id="food" placeholder="Enter Food Name" value="<?php echo $row['name']?>" required>
          </div>
        </div>
      </div>
        <!----Category----->

        <div class="row">
          <!----category----->
          <div class="offset-4 col-4">
            <div class="form-group">
              <label>Category Name</label>
              <select name="categoryType" class="form-control" required>
                <option value="" selected disabled>Select Category</option>
                <?php
                //database connection
                $sql3 = "Select * from food_category";
                $result3 = mysqli_query($conn, $sql3) or die("Query failed");
                $select="";
              while($row3 = mysqli_fetch_assoc($result3)){
                if($row3['id']==$row['food_category']){
                  $select="selected";
                }
                else{
                  $select="";
                }
                 ?>
                <option <?php echo $select;?> value='<?php echo $row3["id"];?>'><?php echo ucfirst($row3['category']);?></option>
                <?php
                }
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
              <textarea class="form-control" name="description" id="description" placeholder="Enter Description"><?php echo $row['description']?></textarea>
          </div>
        </div>
      </div>
        <!----Position----->

        <div class="row">
          <!----Position----->
          <div class="offset-4 col-4">
            <div class="form-group">
              <label>Quantity(How many people can eat?)</label>
                <input type="number" class="form-control" name="quantity" id="quantity" placeholder="Enter Quantity" value="<?php echo $row['quantity']?>" required>
            </div>
          </div>
        </div>
          <!----Position----->

          <div class="row">
            <!----Position----->
            <div class="offset-4 col-4">
              <div class="form-group">
                <label>Price</label>
                  <input type="number" class="form-control" name="price" id="pricce" placeholder="Enter price" value="<?php echo $row['price']?>" required>
              </div>
            </div>
          </div>
            <!----Position----->

            <div class="row">
              <!----Role----->
              <div class="offset-4 col-4">
                <div class="form-group">
                  <label>Status</label>
                  <select name="status" class="form-control">
                    <option value="0" <?php echo $s1;?>>Unavailable</option>
                    <option value="1" <?php echo $s2;?>>Available</option>
                  </select>
                </div>
              </div>
            </div>
              <!----Role----->

        <?php
        }
          mysqli_close($conn);
        ?>



        <div class="row">
          <div class="offset-4 col-4">
            <div class="form-group">
            <input type="submit" name="submit" id="btn" class="btn btn-primary btn-lg" value="Submit">
          </div>
          </div>
        </div>
      </form>

    </div>
    </div> <!----privious content--->
  </div> <!----privious wapper--->

</body>
</html>
