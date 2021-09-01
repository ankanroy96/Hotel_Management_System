<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title></title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>ROOM ADMIN</h3>
            </div>

            <ul class="list-unstyled components">
              <li>
                  <a href="allRoom.php">All Rooms</a>
              </li>
              <li>
                  <a href="searchRoomId.php">Search an Room</a>
              </li>
              <li>
                  <a href="#RoomSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Room Type</a>
                  <ul class="collapse list-unstyled" id="RoomSubmenu">
                    <li>
                        <a href="allRoomType.php">All Types</a>
                    </li>
                      <li>
                          <a href="addroomtype.php">Add Room Type</a>
                      </li>
                      <li>
                          <a href="deleteRoomType.php">Delete Room Type</a>
                      </li>
                  </ul>
              </li>
              <li>
                  <a href="#SizeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Room Size Type</a>
                  <ul class="collapse list-unstyled" id="SizeSubmenu">
                    <li>
                        <a href="allSizeType.php">All Sizes</a>
                    </li>
                      <li>
                          <a href="addSizeType.php">Add Size Type</a>
                      </li>
                      <li>
                          <a href="editsizetype.php">Edit Size Type</a>
                      </li>
                      <li>
                          <a href="deletesizetype.php">Delete Size Room Type</a>
                      </li>
                  </ul>
              </li>
                <li class="active">
                    <a href="#editSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Rooms</a>
                    <ul class="collapse list-unstyled" id="editSubmenu">
                      <li>
                          <a href="addRoom.php">Add New Room</a>
                      </li>
                        <li>
                            <a href="editRoomId.php">Edit Room</a>
                        </li>
                        <li>
                            <a href="deleteRoom.php">Delete Room</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="tax_offer.php">Tax & Offer</a>
                </li>
                <li>
                    <a href="logout.php">Logout</a>
                </li>
              </ul>
        </nav>


        <!-- Page Content  -->
        <div id="content">
          <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
              <button type="button" id="sidebarCollapse" class="btn btn-info">
                <i class="fas fa-align-left"></i>
                  <span>Toggle Sidebar</span>
              </button>
            </div>
          </nav>


    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
</body>

</html>
