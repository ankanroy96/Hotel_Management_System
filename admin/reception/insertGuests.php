<?php
session_start();

if(!isset($_SESSION['reception_admin'])){
  header("Location: http://localhost/hotel_management_system/admin/reception/reception.php");
}
?>
<?php
$id=$_GET['id'];

$conn = mysqli_connect("localhost","root","","hms") or die("Connection failed");
$sql = "Select * from room_book_info where code='$id'";
$result = mysqli_query($conn, $sql) or die("Query failed");
if(mysqli_num_rows($result) >0){
  while($row = mysqli_fetch_assoc($result)){
    $adult=$row['adult'];
    $child=$row['child'];
  }
}
$i=1;
$j=1;
?>
<!doctype html>
<html>
<head>
  <title>Add Guest</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css\bootstrap.css">
  <link rel="stylesheet" href="css\style.css">
</head>
<body>
  <div class="container-flud">
    <form action="confirmCheck-in.php?id=<?php echo $id;?>" method="post">
      <div class="row text-center">
        <div class="col-md-8 offset-md-2">
          <h1 class="header">Hotel Asia</h1>
          <br>
          <h3 class="header">Insert Guest Info</h3>
        </div>
      </div>
      <br>

      <?php for($i=1;$i<=$adult;$i++){ ?>
      <div class="row">
        <div class="offset-md-2 col-md-4">
          <div class="form-group">
            <label>Guest <?php echo $i;?>:(Adult)</label>
            <input type="text" class="form-control" name="guest<?php echo $i;?>" id="guest<?php echo $i;?>" placeholder="Guest Name" required>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="offset-md-2 col-md-4">
          <div class="form-group">
            <label>Id Type:</label>
            <input list="idtype" class="form-control" name="guestidtype<?php echo $i;?>" id="idtype<?php echo $i;?>" placeholder="ID Type" required>
            <datalist id="idtype">
              <option value="Passport">
              <option value="National ID">
              <option value="Driving License">
            </datalist>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="offset-md-2 col-md-4">
          <div class="form-group">
            <label>Id Number:</label>
            <input type="text" class="form-control" name="guestid<?php echo $i;?>" id="id<?php echo $i;?>" placeholder="ID Type" required>
          </div>
        </div>
      </div>

      <br>

      <?php
      }
       ?>

       <?php for($j=1;$j<=$child;$j++){ ?>
       <div class="row">
         <div class="offset-md-2 col-md-4">
           <div class="form-group">
             <label>Guest <?php echo $j;?>:(Child)</label>
             <input type="text" class="form-control" name="child<?php echo $j;?>" id="guest<?php echo $j;?>" placeholder="Guest Name" required>
           </div>
         </div>
       </div>

       <div class="row">
         <div class="offset-md-2 col-md-4">
           <div class="form-group">
             <label>Id Type:</label>
             <input list="idtyp" class="form-control" name="childidtype<?php echo $j;?>" id="childidtype<?php echo $j;?>" placeholder="ID Type" required>
             <datalist id="idtyp">
               <option value="Brith Certificate">
               <option value="Passport">
               <option value="School ID">
             </datalist>
           </div>
         </div>
       </div>

       <div class="row">
         <div class="offset-md-2 col-md-4">
           <div class="form-group">
             <label>Id Number:</label>
             <input type="text" class="form-control" name="childid<?php echo $j;?>" id="childid<?php echo $j;?>" placeholder="ID Type" required>
           </div>
         </div>
       </div>

       <br>

       <?php
       }
        ?>

      <div class="row">
        <div class="offset-md-2 col-md-4">
          <div class="form-group">
          <input type="submit" name="submit" id="btn" class="btn btn-primary btn-lg" value="Insert">
        </div>
        </div>
      </div>

    </form>
  </div>
</body>
</html>
