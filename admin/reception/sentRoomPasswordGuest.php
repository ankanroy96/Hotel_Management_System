<?php
session_start();

if(!isset($_SESSION['reception_admin'])){
  header("Location: http://localhost/hotel_management_system/admin/reception/reception.php");
}
?>
<!doctype html>
<html>
<head>
  <title>Guests</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css\bootstrap.css">
  <link rel="stylesheet" href="css\style.css">
  <link rel="stylesheet" href="css\roomtype.css">

</head>

<body>
  <?php
  $room=$_POST['roomNumber'];
    include 'header.php';
    include 'sidebar.php';
    ?>
    <div class="container-flud">
      <div class="row">
        <h1><?php echo "'".$room."' Guests";?></h1>
      </div>

      <div class="row">
        <div class="offset-2 col-sm-8">
        <table class="table table-striped table-responsive">
          <tr>
            <th style="text-align: center;">Name</th>
            <th style="text-align: center;">Adult or Child</th>
            <th style="text-align: center;">Id Type</th>
            <th style="text-align: center;">Id Number</th>
            <th style="text-align: center;">Mobile</th>
            <th style="text-align: center;">Action</th>
          </tr>
    <?php
    //database connection
    $conn = mysqli_connect("localhost","root","","hms") or die("Connection failed");
    $sql = "Select * from current_checkin where room_no='$room'";
    $result = mysqli_query($conn, $sql) or die("Query failed");
    if(mysqli_num_rows($result)){
      while($row = mysqli_fetch_assoc($result)){
        $id=$row['id'];

        $sql2 = "Select * from current_guest where stay_id='$id' order by AorC asc";
        $result2 = mysqli_query($conn, $sql2) or die("Query failed2");
        if(mysqli_num_rows($result2)){
          while($row2 = mysqli_fetch_assoc($result2)){
    ?>
     <tr>
       <td style="text-align: center;"><?php echo ucfirst($row2['name']);?></td>
       <td style="text-align: center;"><?php if($row2['AorC']=='a'){echo 'Adult';} else if($row2['AorC']=='c'){echo 'Child';}?></td>
       <td style="text-align: center;"><?php echo $row2['id_type'];?></td>
       <td style="text-align: center;"><?php echo $row2['id_num'];?></td>
       <td style="text-align: center;"><?php echo $row2['mobile'];?></td>
       <td style="text-align: center;"><a href="sentRoomPasswordEmail.php?room=<?php echo $room;?>&name=<?php echo ucfirst($row2['name']);?>" style="color:blue;">Send Password</a></td>
       </tr>
     <?php
       }
     }
   }
 }

       mysqli_close($conn);
     ?>
   </table>
   </div>
    </div> <!----privious content--->
  </div> <!----privious wapper--->

</body>
</html>
