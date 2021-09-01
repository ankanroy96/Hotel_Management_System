<?php
session_start();

if(!isset($_SESSION['reception_admin'])){
  header("Location: http://localhost/hotel_management_system/admin/reception/reception.php");
}
?>
<!--------------------------------user--------------------------->
<!---------------------------room page-------------------------->
<!doctype html>
<html>
<head>
  <!-----user--->
  <title>Confirm Booking</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css\bootstrap.css">
  <link rel="stylesheet" href="css\room.css">

  <script>
  setTimeout(function(){
    location.reload();
  },60000);
  </script>

</head>

<body>
  <div class="container-flud">

    <div class="row">
      <?php
        include 'header.php';
        $email=$_SESSION["guestEmail"];
        $cin=$_SESSION["cindate"];
        $cout=$_SESSION["coutdate"];
        $date1=date_create("$cout");
        $date2=date_create("$cin");
        $diff=date_diff($date2,$date1);
        $days=$diff->format("%a");
        if($days==0){
          $days=1;
        }
      ?>
    </div>
    <div class="row bg-light">
      <div class="col-3 m-auto">
        <p style="font-size: 30px;"> Booked Rooms details</p>
      </div>
    </div>

    <div class="row">
      <div class="col-3 offset-3">
        <p> Check-In Date: <?php echo $cin?></p>
      </div>
    </div>

    <div class="row">
      <div class="col-3 offset-3">
        <p> Check-Out Date: <?php echo $cout?></p>
      </div>
    </div>

    <div class="row">
      <div class="col-3 offset-3">
        <p> Total Day(s): <?php echo $days;?></p>
      </div>
    </div>

    <div class="row">
      <div class="col-6 m-auto">
        <table class="table table-striped">
          <tr>
            <th class="text-center">Room No</th>
            <th class="text-center">Price(Per day)</th>
          </tr>
          <?php
          $tprice=0;
          //database connection
          $conn = mysqli_connect("localhost","root","","hms") or die("Connection failed");
          $sql = "Select * from cart where email='$email' and cindate='$cin' and coutdate='$cout'";
          $result = mysqli_query($conn, $sql) or die("Query failed");

          if(mysqli_num_rows($result) >0) {
            while($row = mysqli_fetch_assoc($result)){
              $tprice=$tprice+$row['price'];
           ?>
           <tr>

             <td class="text-center"><?php echo $row['room'];?></td>
             <td class="text-center"><?php echo $row['price'];?></td>

           </tr>
           <?php
         }}

             $FinalPrice=$tprice*$days;
             $sql500 = "Select * from tax_offer where type='room'";
             $result500 = mysqli_query($conn, $sql500) or die("Query failed500");
             $row500 = mysqli_fetch_assoc($result500);
             $Tax=$row500['tax'];
             $ntax=$FinalPrice*($Tax/100);
             $lastPrice=$FinalPrice+($FinalPrice*($Tax/100));
             $advance=$lastPrice*(25/100);
             mysqli_close($conn);
           ?>
        </table>

      </div>

      <div class="row">
        <div class="col-3 offset-3">
          <p> Total Amount: <?php echo $FinalPrice?> taka.</p>
        </div>
      </div>
      <div class="row">
        <div class="col-3 offset-3">
          <p> Tax Amount: <?php echo $ntax?> taka.</p>
        </div>
      </div>
      <div class="row">
        <div class="col-3 offset-3">
          <p> Total Amount(including tax): <?php echo $lastPrice?> taka.</p>
        </div>
      </div>
      <div class="row">
        <div class="col-3 offset-3">
          <p> Advance Amount: <?php echo $advance?> taka.</p>
        </div>
      </div>

      <br>
      <br>
      <div class="row">
        <div class="col-2 m-auto">
          <a href="successBook.php?advance=<?php echo $advance?>" class="btn btn-primary con">Confirm Booking</a>
        </div>
      </div>
    </div>
</div>

<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script language="JavaScript" type="text/javascript">
$(document).ready(function(){
    $("a.delete").click(function(e){
        if(!confirm('Are you sure?')){
            e.preventDefault();
            return false;
        }
        return true;
    });
});
</script>
<script language="JavaScript" type="text/javascript">
$(document).ready(function(){
    $("a.con").click(function(e){
        if(!confirm('Advance Clear?')){
            e.preventDefault();
            return false;
        }
        return true;
    });
});
</script>

</body>
</html>
