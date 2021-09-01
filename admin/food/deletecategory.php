<!doctype html>
<html>
<head>
  <title>Delete Category</title>
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
        <h1 style="text-align: center;">Delete Category</h1>
      </div>
      <form action="deletecategorysort.php" method="post">
        <div class="row">
          <!----Department----->
          <div class="offset-9 col-2">
            <div class="form-group">
              <select name="categoryType" class="form-control" required>
                <option value="" selected disabled>Select Category</option>
                <?php
                //database connection
                $conn3 = mysqli_connect("localhost","root","","hms") or die("Connection failed");
                $sql3 = "Select category from food_category";
                $result3 = mysqli_query($conn3, $sql3) or die("Query failed");


                  while($row = mysqli_fetch_assoc($result3)){
                 ?>
                <option value="<?php echo $row['category'];?>"><?php echo ucfirst($row['category']);?></option>
                <?php
                }
                  mysqli_close($conn3);
                ?>
              </select>
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
        <div class="col-sm-6 offset-sm-3">
        <table class="table table-striped">
    <?php
    //database connection
    $conn = mysqli_connect("localhost","root","","hms") or die("Connection failed");
    $sql = "Select * from food_category order by position";
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
       <td style="text-align: center;"><a href="deletecategoryfinal.php?id=<?php echo $row['id'];?>&id1=<?php echo $row['position'];?>" class="btn btn-danger delete">Delete</a></td>

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
  <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
  <script language="JavaScript" type="text/javascript">
  $(document).ready(function(){
      $("a.delete").click(function(e){
          if(!confirm('After delete a category all foods of that category will be deleted. Are you sure?')){
              e.preventDefault();
              return false;
          }
          return true;
      });
  });
  </script>

</body>
</html>
