<!-----------------------------------admin-------------------->
<!----------------------------- delete photo gallary---------------------->
<!doctype html>
<html>
<head>
  <!---admin---->
  <title>Gallary</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css\bootstrap.css">
  <link rel="stylesheet" href="css\gallary.css">
</head>

<body>
  <div class="container-flud">
    <div class="row">
      <?php
      include 'header.php';
      ?>
    </div>
    <div class="row">
      <div class="col-4 offset-md-4">
        <table class="table table-striped">
          <tr>
            <th>Photo</th>
            <th>Option</th>
            </tr>
          <?php
          //database connection
          $conn = mysqli_connect("localhost","root","","hms") or die("Connection failed");
          $sql = "Select * from gallary";
          $result = mysqli_query($conn, $sql) or die("Query failed");

          if(mysqli_num_rows($result) >0) {
            while($row = mysqli_fetch_assoc($result)){
           ?>
          <tr style="text-align: center;">
            <td><img src="upload/<?php echo $row['image'];?>" alt="" style=" width: 200px; height:100px;"></td>
            <td class="text-center"><a class="btn btn-primary delete" href="deletephoto.php?id=<?php echo $row['img_id'];?>" role="button">Delete</a></td>
          </tr>

          <?php
            }
          }
            mysqli_close($conn);
          ?>
        </table>
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

</body>

</html>
