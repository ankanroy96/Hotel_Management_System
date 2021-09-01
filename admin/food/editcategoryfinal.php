<?php
$id=$_GET['id'];
$PrePosition=$_GET['id1'];
?>
<!doctype html>
<html>
<head>
  <title>Edit Category</title>
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
    <form action="editcategorydone.php" method="post">
    <div class="container-flud">
      <div class="row">
        <h1 class="header">Edit Category</h1>
      </div>
      <br>

      <?php
      //database connection
      $conn = mysqli_connect("localhost","root","","hms") or die("Connection failed");
      $sql = "Select * from food_category where id=$id";
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
            <label>Category Name</label>
              <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $id?>">
              <input type="hidden" class="form-control" name="preposition" id="preposition" value="<?php echo $PrePosition?>">
              <input type="hidden" class="form-control" name="precname" id="precname" value="<?php echo $row['category']?>">
              <input type="text" class="form-control" name="cname" id="cname" placeholder="Enter Ctegory Name" value="<?php echo $row['category']?>" required>
          </div>
        </div>
      </div>
        <!----Category----->

      <div class="row">
        <!----Position----->
        <div class="offset-4 col-4">
          <div class="form-group">
            <label>Position</label>
              <input type="number" class="form-control" name="position" id="position" placeholder="Enter Position" value="<?php echo $row['position']?>" required>
          </div>
        </div>
      </div>
        <!----Position----->
        <?php
        }
          mysqli_close($conn);
        ?>

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
