<?php
if(isset($_POST['update'])){
  $work=$_POST['work'];
  $new=$_POST['new'];

  $conn5 = mysqli_connect("localhost","root","","hms") or die("Connection failed");

if($work==1){
  $sql5 = "UPDATE tax_offer set tax=$new where type='food'";
}
else if ($work==2) {
  $sql5 = "UPDATE tax_offer set discount=$new where type='food'";
}

  $result5= mysqli_query($conn5, $sql5) or die("Query failed");

  header("Location: http://localhost/hotel_management_system/admin/food/tax_offer.php");
  mysqli_close($conn5);
}
 ?>
<?php
if(isset($_GET['id'])){
  $work=$_GET['id'];
  if($work==1){
    $tax=$_GET['tax'];
  }
  else if($work==2){
    $discount=$_GET['discount'];
  }
}
 ?>

 <!doctype html>
 <html>
 <head>
   <title>Edit Tax or Offer</title>
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
         <h1 style="text-align: center;">Edit
           <?php
           if($work==1){
             echo 'Tax';
           }
           else if($work==2){
             echo 'Discount';
           }
            ?>
         </h1>
       </div>
       <form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
         <div class="row">
           <!----Department----->
           <div class="offset-4 col-4">
             <div class="form-group">
               <label>Previous:</label>
               <input type="hidden" name="work" id="work" class="form-control" value="<?php echo $work?>">
               <input type="text" name="ptax" id="ptax" class="form-control" placeholder=""  value="<?php
               if($work==1){
                 echo $tax."%";
               }
               else if($work==2){
                 echo $discount."%";
               }
               ?>" readonly>
             </div>
           </div>
           </div>

           <div class="row">
             <!----Department----->
             <div class="offset-4 col-4">
               <div class="form-group">
                 <label>Enter New:</label>
                 <input type="number" name="new" id="new" class="form-control" placeholder="Enter New" required>
               </div>
             </div>
             </div>

             <div class="row">
               <div class="offset-5 col-1">
                 <div class="form-group">
                 <input type="submit" name="update" id="btn" class="btn btn-primary" value="Update">
                </div>
              </div>
             </div>

           </div>
       </form>

     </div> <!----privious content--->
   </div> <!----privious wapper--->

 </body>
 </html>

 <?php
if(isset($_POST['update'])){
  echo '1';
}
  ?>
