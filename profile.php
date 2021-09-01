<?php
include 'session.php';
if(!isset($_SESSION['username'])){
  header("Location: http://localhost/hotel_management_system/index.php");
}
 ?>
<?php
//session_start();

$fullname=$_GET['id'];
?>
<!doctype html>
<html>
<head>
  <!-----user--->
  <title>Profile</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css\bootstrap.css">
  <link rel="stylesheet" href="css\gallary.css">
</head>

<body>
  <div class="container-flud">
    <div class="row">
      <?php
        include 'header.php';
        if(!isset($_SESSION['username'])){
          header("Location: http://localhost/hotel_management_system/index.php");
        }
        $user=$_SESSION['username'];
       ?>
    </div>
    <div class="row">
      <div class="col-4 m-auto">
        <h1 class="head-size"><?Php echo $fullname?>'s Profile</h1>
      </div>
    </div>



      <?php
      //database connection
      $conn = mysqli_connect("localhost","root","","hms") or die("Connection failed");
      $sql = "Select * from user_info where email='$user'";
      $result = mysqli_query($conn, $sql) or die("Query failed");

      if(mysqli_num_rows($result) >0) {
        while($row = mysqli_fetch_assoc($result)){
       ?>

       <div class="row">
         <!----Name----->
         <div class="offset-md-2 col-md-4">
           <div class="form-group">
             <label for="fname">First Name</label>
             <input type="text" class="form-control" name="fname" id="fname" placeholder="First Name" value="<?php echo $row['fristname']?>" readonly>
           </div>
         </div>
         <div class="col-md-4">
           <div class="form-group">
             <label for="lname">Last Name</label>
             <input type="text" class="form-control" name="lname" id="lname" placeholder="Last Name" value="<?php echo $row['lastname']?>" readonly>
           </div>
         </div>
       </div>
       <!----Name----->

       <div class="row">
         <!----Country----->
         <div class="offset-md-2 col-md-4">
           <div class="form-group">
             <label for="country">Country</label>
               <input type="text" class="form-control" name="country" id="country" placeholder="Country" value="<?php echo $row['country']?>" readonly>
           </div>
         </div>
       </div>
         <!----Country----->

         <div class="row">
           <!----Gender----->
           <div class="offset-md-2 col-md-4">
             <div class="form-group">
               <label for="country">Gender</label>
                 <input type="text" class="form-control" name="country" id="country" placeholder="Country" value="<?php echo $row['gender']?>" readonly>
             </div>
           </div>
         </div>
       <!----Gender----->

       <div class="row">
         <!----Brithdate----->
         <div class="offset-md-2 col-md-4">
           <div class="form-group">
             <label for="bdate">Brith Date</label>
               <input type="date" class="form-control" name="bdate" id="bdate" value="<?php echo $row['brithdate']?>" readonly>
           </div>
         </div>
       </div>
         <!----Brithdate----->

         <div class="row">
           <!----ID----->
           <div class="offset-md-2 col-md-4">
             <div class="form-group">
               <label for="nid">National ID</label>
               <input type="text" class="form-control" name="nid" id="nid" placeholder="National ID" value="<?php echo $row['nid']?>" readonly>
             </div>
           </div>
           <div class="col-md-4">
             <div class="form-group">
               <label for="lname">Passport Number</label>
               <input type="text" class="form-control" name="passno" id="passno" placeholder="Passport Number" value="<?php echo $row['passportno']?>" readonly>
             </div>
           </div>
         </div>
         <!----ID----->

       <div class="row">
         <!----Address----->
         <div class="offset-md-2 col-md-8">
           <div class="form-group">
             <label for="address">Address</label>
               <input type="text" class="form-control" name="address" id="address" placeholder="Address" value="<?php echo $row['address']?>" readonly>
           </div>
         </div>
       </div>
             <!----Address----->

       <div class="row">
       <div class="offset-md-2 col-md-4">
         <!-------Email------>
         <div class="form-group">
           <label for="email">E-mail</label>
             <input type="email" class="form-control" name="email" id="email" placeholder="E-mail" value="<?php echo $row['email']?>" readonly>
         </div>
         </div>
         <div class="col-md-4">
           <!-------Mobile------>
           <div class="form-group">
             <label for="mobile">Mobile</label>
               <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Mobile" value="<?php echo $row['mobile']?>" readonly>
           </div>
       </div>
       <!-------Mobile------>
       </div>

       <!--------Photo------>
         <div class="row">
           <div class="offset-md-2 col-md-3">
             <p><b>Photo:</b></p>
            <img src="user_photo/<?php echo $row['photo'];?>" alt="" class="img-fluid img-thumbnail rounded" style="width:400px; height:300px;">
           </div>
         </div>
         <!--------Photo---->


      <?php
        }
      }
        mysqli_close($conn);
      ?>


  </div>
</body>

</html>
