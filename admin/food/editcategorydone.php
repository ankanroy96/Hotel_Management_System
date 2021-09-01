<?php
$conn1 = mysqli_connect("localhost","root","","hms") or die("Connection failed");
session_start();

if(!isset($_SESSION['username'])){
  header("Location: http://localhost/hotel_management_system/admin/food/foodadmin.php");
}
?>
<?php
$id=$_POST['id'];
$preposition=$_POST['preposition'];
$precname=$_POST['precname'];
$cname=$_POST['cname'];
$position=$_POST['position'];
$status=$_POST['status'];
$error=0;

$conn = mysqli_connect("localhost","root","","hms") or die("Connection failed");


if($precname!=$cname && $error==0){
  $sql = "Select * from food_category where category='$cname'";
  $result = mysqli_query($conn, $sql) or die("Query failed");
  if(mysqli_num_rows($result)>0){
    ?>
    <p style="font-size: 20px;">Category is already there.<br></p>
    <a href="editcategoryfinal.php?id=<?php echo $id;?>&id1=<?php echo $preposition;?>" style="font-size: 20px;">Go back</a>
<?php
$error++;
  }
  if(mysqli_num_rows($result)==0){
    $sql2 = "UPDATE food_category set category='$cname' where id=$id";
    $result2 = mysqli_query($conn, $sql2) or die("Query failed2");
  }
}

if($preposition!=$position && $error==0){

  if($preposition>$position){
    $sql3 = "Select * from food_category where position>=$position and position<$preposition";
    $result3 = mysqli_query($conn, $sql3) or die("Query failed3");
    if(mysqli_num_rows($result3)>0){
      while($row3 = mysqli_fetch_assoc($result3)){
        $nid=$row3['id'];
        $p=$row3['position']+1;
        $sql4 = "UPDATE food_category set position=$p where id=$nid";
        $result4 = mysqli_query($conn, $sql4) or die("Query failed4");
      }
  }
  $sql5 = "UPDATE food_category set position=$position where id=$id";
  $result5 = mysqli_query($conn, $sql5) or die("Query failed5");
  }

  if($preposition<$position){
    $sql6 = "Select * from food_category where position<=$position and position>$preposition";
    $result6 = mysqli_query($conn, $sql6) or die("Query failed6");
    if(mysqli_num_rows($result6)>0){
      while($row6 = mysqli_fetch_assoc($result6)){
      $nid=$row6['id'];
      $p=$row6['position']-1;
        $sql8 = "UPDATE food_category set position=$p where id=$nid";
        $result8 = mysqli_query($conn, $sql8) or die("Query failed3");
      }
    }
    $sql9 = "UPDATE food_category set position=$position where id=$id";
    $result9 = mysqli_query($conn, $sql9) or die("Query failed4");
  }
}
  if($error==0){
    $sql7 = "UPDATE food_category set status=$status where id=$id";
    $result7 = mysqli_query($conn, $sql7) or die("Query failed7");
    header("Location: http://localhost/hotel_management_system/admin/food/allcategory.php");
  }
mysqli_close($conn);

 ?>
