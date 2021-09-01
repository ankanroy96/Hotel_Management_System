<?php
session_start();

if(!isset($_SESSION['reception_admin'])){
  header("Location: http://localhost/hotel_management_system/admin/reception/reception.php");
}
?>
<!doctype html>
<html>
<head>
  <title>checkout</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css\bootstrap.css">

  <style>
  @media print {
  #printPageButton {
    display: none;
  }
}
  </style>
</head>

<body>
  <div class="container-flud" style="margin:10px;">
    <div class="row">
      <div class="offset-11 col-1">
        <button id="printPageButton" onclick="window.print()" class="btn btn-primary">Print</button>
      </div>
    </div>

    <div class="row">
      <div class="offset-1 col-5">
        <h1>HOTEL ASIA</h1>
        <?php
        $conn = mysqli_connect("localhost","root","","hms") or die("Connection failed");
        $sql = "Select * from contacts";
        $result = mysqli_query($conn, $sql) or die("Query failed");
        while($row = mysqli_fetch_assoc($result)){
          ?>
        <h5><?php echo $row['address']; ?></h5>
        <h5>Mobile: <?php echo $row['mobile']; ?></h5>
        <h5>E-mail: <?php echo $row['email']; ?></h5>
      <?php } ?>
      </div>
      <div class="offset-4 col-2">
        <?php
        date_default_timezone_set('Asia/Dhaka');
        $date=date("m/d/Y");
        echo '<br><h5>Date: '.$date.'</h5>';
         ?>
      </div>
    </div>

    <br>
    <br>
    <br>

    <div class="row">
      <div class="offset-1 col-3">
        <?php
        foreach ($_SESSION['ckoutroom'] as $key) {
          $id=$key;
          break;
        }

        $conn = mysqli_connect("localhost","root","","hms") or die("Connection failed");
        $sql1 = "Select * from current_checkin where id=$id";
        $result1 = mysqli_query($conn, $sql1) or die("Query failed1");
        while($row1 = mysqli_fetch_assoc($result1)){
         ?>
        <h6>Guest Name: <?php echo $row1['name']; ?></h6>
        <h6>Mobile: <?php echo $row1['mobile']; ?></h6>
        <h6>E-mail: <?php echo $row1['email'];} ?></h6>
      </div>
      <div class="col-3">
        <h6>Total Rooms: <?php echo count($_SESSION['ckoutroom']); ?></h6>
        <h6>Room Numbers: <?php
        $ele=count($_SESSION['ckoutroom']);
        $elel=1;
        foreach ($_SESSION['ckoutroom'] as $key) {
          $sql3 = "Select * from current_checkin where id=$key";
          $result3 = mysqli_query($conn, $sql3) or die("Query failed3");
          while($row3 = mysqli_fetch_assoc($result3)){
          echo $row3['room_no'];
          if($elel<$ele)
          {echo ',';}
          $elel++;
        }
      }
         ?></h6>
      </div>
    </div>

    <br>
    <br>
    <br>

    <div class="row">
      <div class="offset-2 col-8">
        <table class="table table-striped">
          <tr>
            <th class="text-center">Services</th>
            <th class="text-center">Details</th>
            <th class="text-center">Amount(Taka)</th>
          </tr>

          <?php
          $totalroomrent=0;
          $totalfoodcost=0;
          $totaladvance=0;
          foreach ($_SESSION['ckoutroom'] as $key) {
            $sql4 = "Select * from current_checkin where id=$key";
            $result4 = mysqli_query($conn, $sql4) or die("Query failed4");
            while($row4 = mysqli_fetch_assoc($result4)){
            $room= $row4['room_no'];
            $cin= $row4['cindate'];
            $cout= $row4['coutdate'];
            $rent= $row4['rent'];
            $advance= $row4['advance'];
            $date1=date_create("$cout");
            $date2=date_create("$cin");
            $date3=date_create("$date");
            $diff1=date_diff($date2,$date1);
            $diff2=date_diff($date2,$date3);
            $days1=$diff1->format("%a"); //normal leave
            $days2=$diff2->format("%a"); //early leave
            if($days2==0){
                $days2=1;
            }
            if($days1==0){
                $days1=1;
            }
            ?>

            <tr>
              <td class="text-center">Room rent of room no: <?php echo $room; ?>
                <br>
                Check-in date: <?php echo $cin; ?>
                <?php if($days1>$days2){ ?>
                Check-out: <?php echo $date; ?>
              <?php }
                else{
               ?>
               Check-out: <?php echo $cout; }?>
              </td>

              <td class="text-center">
                <?php if($days1>$days2){ ?>
                  <?php echo $days2.' days'; ?>
                <?php }
                else{
                  ?>
                  <?php echo $days1.' days'; }?>
              </td>


              <td class="text-center">
                <?php if($days1>$days2){ ?>
                  <?php $roomrent=$rent*$days2; echo $roomrent;
                  $advance=($advance/$days1)*$days2;
                  ?>
                <?php }
                else{
                  ?>
                  <?php $roomrent=$rent*$days1; echo $roomrent; }
                  $advance=$advance;
                  ?>

              </td>
              <?php
              $totaladvance=$totaladvance+$advance;
              $totalroomrent=$totalroomrent+$roomrent;
               ?>
            </tr>

            <?php
            $sql5 = "Select sum(final_price) as total from food_orders where room_no=$room and status=2";
            $result5 = mysqli_query($conn, $sql5) or die("Query failed5");
            while($row5 = mysqli_fetch_assoc($result5)){
             ?>
            <tr>
              <td class="text-center"><?php echo 'Food cost of room: '.$room; ?></td>
              <td class="text-center"></td>
              <td class="text-center"><?php echo $row5['total']; $totalfoodcost=$totalfoodcost+$row5['total'];?></td>
            </tr>
            <?php
          }
          }
        }
           ?>
        </table>
      </div>
    </div>
    <div class="row">
      <div class="offset-1 col-4">
        <?php
        $gg=1;
        $sql6 = "Select * from tax_offer";
        $result6 = mysqli_query($conn, $sql6) or die("Query failed6");
        while($row6 = mysqli_fetch_assoc($result6)){
          if($gg==1){
          $foodtax=$row6['tax'];
          $foodtaxamount=$totalfoodcost*($foodtax/100);
          $fooddiscount=$row6['discount'];
          $gg=2;
        }
        else{
          $roomtax=$row6['tax'];
          $roomtaxamount=$totalroomrent*($roomtax/100);
          $roomdiscount=$row6['discount'];
        }
        }
        echo 'Total Room Rent: '.$totalroomrent.' Taka<br>';
        echo 'Total Room Tax: '.$roomtaxamount.' Taka<br>';
        echo 'Total Food Cost: '.$totalfoodcost.' Taka<br>';
        echo 'Total Food Tax: '.$foodtaxamount.' Taka<br>';
        echo 'Total Advance: '.$totaladvance.' Taka<br>';
        $finaltotal=$totalroomrent+$roomtaxamount+$totalfoodcost+$foodtaxamount-$totaladvance;
        echo '<p><b>Amount to pay: '.$finaltotal.' Taka</b></p><br>';
        ?>
      </div>
    </div>

    <div class="row">
      <div class="col-6 m-auto">
        <h2>THANK YOU FOR YOUR VISIT</h2>
      </div>
    </div>

    <br>
    <br>

    <div class="row">
      <div class="col-2 m-auto">
        <a href="checkoutFinal.php" id="printPageButton" class="btn btn-primary delete">Proceed</a>
      </div>
    </div>

  </div>

  <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
  <script language="JavaScript" type="text/javascript">
  $(document).ready(function(){
      $("a.delete").click(function(e){
          if(!confirm('Payment complete?')){
              e.preventDefault();
              return false;
          }
          return true;
      });
  });
  </script>

</body>
</html>
