<?php
include 'session.php';
 ?>

<!--------------------------------user--------------------------->
<!---------------------------food page-------------------------->
<!doctype html>
<html>
<head>
  <!-----user--->
  <title>Food-Hotel Asia</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css\bootstrap.css">
  <link rel="stylesheet" href="css\room.css">



</head>

<body>
  <div class="container-flud">
    <div class="row">
      <?php
        include 'foodheader.php';
      ?>
    </div>
    <div class="row bg-light">
      <div class="offset-10 col-2">
        <a href="foodCart.php" style="font-size: 40px;">My Cart</a>
      </div>
    </div>
    <br>
    <br>
    <br>
    <div class="row">
      <h1 style="text-align: center;">All Foods</h1>
    </div>

    <form action="foodSort.php" method="post">
      <div class="row">
        <!----Department----->
        <div class="offset-9 col-2">
          <div class="form-group">
            <select name="categoryType" class="form-control" required>
              <option value="" selected disabled>Select Category</option>
              <option value="all">All</option>
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


  <?php
  //database connection
  $conn = mysqli_connect("localhost","root","","hms") or die("Connection failed");

  $sql1 = "Select * from tax_offer where type='food'";
  $result1 = mysqli_query($conn, $sql1) or die("Query failed1");
  $row1 = mysqli_fetch_assoc($result1);
  $foodtax=$row1['tax'];
  $fooddiscount=$row1['discount'];

  $sql = "Select f.id as id,f.name as name, fc.category as food_category,f.description as description,f.quantity as quantity,
  f.price as price, f.status as status from foods f join food_category fc on f.food_category=fc.id where f.status=1
  and fc.status=1 order by fc.position";
  $result = mysqli_query($conn, $sql) or die("Query failed");
  ?>
  <div class="row">
    <div class="col-4 offset-5">
      <?php if($fooddiscount>0){ ?>
      <h3 style="color: red;"><?php echo $fooddiscount?>% discount on full menu</h3>
    <?php } ?>
    </div>
  </div>
  <br>
  <br>
  <div class="row">
    <div class="col-sm-8 offset-sm-2">
    <table class="table table-striped">
  
  <?php
  $no=1;
  while($row = mysqli_fetch_assoc($result)){
    if($no==1){
      $caName=$row['food_category'];
      ?>
      <tr>
        <td> </td>
        <td style="font-size:40px;"><?php echo $caName; ?></td>
      </tr>
  <?php
    }
    if($caName!=$row['food_category']){
      $caName=$row['food_category'];
      ?>
      <tr>
        <td> </td>
        <td style="font-size:40px;"><?php echo $caName; ?></td>
      </tr>  <?php
    }
   ?>

   <tr>
     <td style="text-align: center;"><?php echo $no;?></td>
     <td style="text-align: left;"><section style="font-size: 20px;"><?php echo '<b>'.ucfirst($row['name']).'</b>';?></section><?php echo $row['description'];?></td>
     <td style="text-align: center;"><?php echo $row['quantity']." person(s)";?></td>
     <?php
     if($fooddiscount==0){
     echo '<td style="text-align: center;">'.$row['price'].'</td>';
   }
   else{
     $discount=$row['price']*($fooddiscount/100);
     $fprice=$row['price']-$discount;
   echo '<td style="text-align: center;"><s>'.$row['price'].' taka</s><br><b>'.$fprice.'</b>'.' taka</td>';
 }
     ?>
     <?php if(isset($_SESSION['roomno'])){?>
     <td style="text-align: center; width:20%;">
       <form action="foodCartInsert.php?id=1" method="post">
         <div class="row">
           <!----Department----->
           <div class="col-6">
             <div class="form-group">

               <input type="hidden" name="foodid" id="foodid" class="form-control" value="<?php echo $row['id'];?>">
               <input type="hidden" name="foodname" id="foodname" class="form-control" value="<?php echo $row['name'];?>">
               <input type="hidden" name="category" id="category" class="form-control" value="<?php echo $row['food_category'];?>">
               <input type="hidden" name="price" id="price" class="form-control" value="<?php echo $row['price'];?>">

               <input type="number" name="quantity" id="quantity" class="form-control" value="0" min="0">
             </div>
           </div>

           <div class="col-3">
             <div class="form-group">
             <input type="submit" name="submit" id="btn" class="btn btn-success" value="order">
           </div>
           </div>
           </div>
       </form>
     </td>
     <?php } ?>
   </tr>

   <?php
   $no++;
     }
     mysqli_close($conn);
   ?>
 </table>
 </div>
  </div>

  </div>
</div>
<link href="js/jquery.nice-number.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-1.12.4.min.js"
      integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ"
      crossorigin="anonymous">
    </script>
    <script src="js/jquery.nice-number.js"></script>
    <script>
    $(function(){
    $('input[type="number"]').niceNumber();
    });
    </script>

</body>
</html>
