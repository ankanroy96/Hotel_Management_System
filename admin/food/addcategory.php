<?php
//admin
$msg="";
if(isset($_POST['submit'])){
  $category=$_POST['cname'];
  $position=$_POST['position'];

  $conn = mysqli_connect("localhost","root","","hms") or die("Connection failed");
  $sql = "Select * from food_category where category='$category'";
  $result = mysqli_query($conn, $sql) or die("Query failed");

  if(mysqli_num_rows($result)>0){
    $msg="Category is already there.";
  }
  if(mysqli_num_rows($result)==0){
    $sql2 = "Select * from food_category where position=$position";
    $result2 = mysqli_query($conn, $sql2) or die("Query failed2");
    if(mysqli_num_rows($result2)==0){
      $sql3 = "INSERT INTO food_category(category,position) values('{$category}',$position)";
      $result3 = mysqli_query($conn, $sql3) or die("Query failed3");
    }
    if(mysqli_num_rows($result2)>0){
      $sql4 = "Select * from food_category";
      $result4 = mysqli_query($conn, $sql4) or die("Query failed4");

      if(mysqli_num_rows($result4)>0){
        while($row4 = mysqli_fetch_assoc($result4)){
          $id=$row4['id'];
          $no=$row4['position'];
          $nofinal=$row4['position']+1;
          if($no>=$position){
            $sql5 = "UPDATE food_category set position=$nofinal where id=$id";
            $result5 = mysqli_query($conn, $sql5) or die("Query failed5");

          }
        }
      }
      $sql6 = "INSERT INTO food_category(category,position,status) values('{$category}',$position,1)";
      $result6 = mysqli_query($conn, $sql6) or die("Query failed6");
    }
  }
  header("Location: http://localhost/hotel_management_system/admin/food/allcategory.php");
  mysqli_close($conn);
}
?>
<!doctype html>
<html>
<head>
  <title>Add Category</title>
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
        <h1 class="header">Add Category</h1>
      </div>
      <br>

      <div class="row">
        <!----Category----->
        <div class="offset-4 col-4">
          <div class="form-group">
            <label>Category Name</label>
              <input type="text" class="form-control" name="cname" id="cname" placeholder="Enter Ctegory Name" required>
          </div>
        </div>
      </div>
        <!----Category----->

      <div class="row">
        <!----Position----->
        <div class="offset-4 col-4">
          <div class="form-group">
            <label>Position</label>
              <input type="number" class="form-control" name="position" id="position" placeholder="Enter Position" required>
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
