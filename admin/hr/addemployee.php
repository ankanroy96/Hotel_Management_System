<?php
  $department=$_POST['department'];
 ?>
<!doctype html>
<html>
<head>
  <title>Add Employee</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css\bootstrap.css">
  <link rel="stylesheet" href="css\style.css">
  <link rel="stylesheet" href="css\addemployee.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <script>
  $(function(){
    var dtToday = new Date();

    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    year = year -18;
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();

    var minDate= year + '-' + month + '-' + day;

    $('#bdate').attr('max', minDate);
});
  </script>
</head>
<body>
  <?php
    include 'header.php';
    include 'sidebar.php';
    ?>
    <form action="employeeadd.php?id=<?php echo $department?>" method="post" enctype="multipart/form-data">
    <div class="container-flud">
      <div class="row">
        <h1 class="header">Add Employee</h1>
      </div>
      <br>
      <div class="row">
        <!----Name----->
        <div class="offset-1 col-4">
          <div class="form-group">
            <label>First Name</label>
            <input type="text" class="form-control" name="fname" id="fname" placeholder="First Name" required>
          </div>
        </div>
        <div class="offset-1 col-4">
          <div class="form-group">
            <label>Last Name</label>
            <input type="text" class="form-control" name="lname" id="lname" placeholder="Last Name" required>
          </div>
        </div>
      </div>
      <!----Name----->

      <div class="row">
        <!----Country----->
        <div class="offset-1 col-4">
          <div class="form-group">
            <label>Country</label>
              <input type="text" class="form-control" name="country" id="country" placeholder="Country" required>
          </div>
        </div>
      </div>
        <!----Country----->

      <div class="row">
        <!----Gender----->
        <div class="offset-1 col-2">
          <div class="form-group">
            <label>Gender</label>
            <div class="form-check">
              <input type="radio" class="form-check-input" name="gender" id="malegen" value="Male" required>
              <label for="malegen" class="form-check-label">Male</label>
            </div>
            <div class="form-check">
              <input type="radio" class="form-check-input" name="gender" id="femalegen" value="Female">
              <label for="femalegen" class="form-check-label">Female</label>
            </div>
            <div class="form-check">
              <input type="radio" class="form-check-input" name="gender" id="othergen" value="Other">
              <label for="othergen" class="form-check-label">Other</label>
            </div>
          </div>
        </div>
      </div>
      <!----Gender----->

      <div class="row">
        <!----Brithdate----->
        <div class="offset-1 col-4">
          <div class="form-group">
            <label>Brith Date</label>
              <input type="date" class="form-control" name="bdate" id="bdate" required>
          </div>
        </div>
      </div>
        <!----Brithdate----->

      <div class="row">
        <!----Address----->
        <div class="offset-1 col-9">
          <div class="form-group">
            <label>Address</label>
              <input type="text" class="form-control" name="address" id="address" placeholder="Address" required>
          </div>
        </div>
      </div>
            <!----Address----->

      <div class="row">
      <div class="offset-1 col-4">
        <!-------Email------>
        <div class="form-group">
          <label>E-mail</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="E-mail" required>
        </div>
        </div>
        <div class="offset-1 col-4">
          <!-------Mobile------>
          <div class="form-group">
            <label>Mobile</label>
              <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Mobile" required>
          </div>
      </div>
      <!-------Mobile------>
      </div>

      <div class="row">
        <!----Role----->
        <div class="offset-1 col-4">
          <div class="form-group">
            <label>Role</label>
            <select name="role" class="form-control">
              <option value="" selected disabled>Select Department</option>
              <?php
              //database connection
              $conn = mysqli_connect("localhost","root","","hms") or die("Connection failed");
              $sql = "Select role from $department";
              $result = mysqli_query($conn, $sql) or die("Query failed");


                while($row = mysqli_fetch_assoc($result)){
               ?>
              <option value="<?php echo $row['role'];?>"><?php echo strtoupper($row['role']);?></option>
              <?php
              }
                mysqli_close($conn);
              ?>
            </select>
          </div>
        </div>
      </div>
        <!----Role----->

      <div class="row">
        <!----Basic Salary----->
        <div class="offset-1 col-4">
          <div class="form-group">
            <label>Basic Salary</label>
              <input type="number" class="form-control" name="bsalary" id="bsalary" placeholder="Basic Salary" required>
          </div>
        </div>
      </div>
        <!----Basic salary----->

        <!--------Photo------>
        <div class="row">
          <div class="offset-1 col-4">
            <div class="form-group">
            <label for="exampleinputpassword1">Photo:</label>
            <input type="file" id="exampleinputpassword1" name="filetoupload" required>
            <small>Upload jpeg or png or jpg file. Size must be 25mb or less.</small>
          </div>
          </div>
        </div>
        <!--------Photo---->


        <div class="row">
          <div class="offset-1 col-4">
            <div class="form-group">
            <input type="submit" name="submit" id="btn" class="btn btn-primary btn-lg" value="Submit">
          </div>
          </div>
        </div>
      </form>

    </div>
    </div> <!----privious content--->
  </div> <!----privious wapper--->

</body>
</html>
