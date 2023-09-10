<?php
 require_once('./home_header.php');
 require_once('./home_navbar.php');

 if(isset($_GET['id'])){
    $room_id = $_GET['id'];
    $sql = "SELECT * FROM rooms WHERE room_id = '$room_id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $name = $row['name'];
    $pic = $row['pic'];
    $price = $row['price'];
    $details = $row['details'];
    $roomCount = $row['roomCount'];

  }
?>
<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Page Header Start -->
        <div class="container-fluid page-header mb-5 p-0" style="background-image: url(./assets/img/carousel-1.jpg)">
            <div class="container-fluid page-header-inner py-5">
                <div class="container text-center pb-5">
                    <h1 class="display-3 text-white mb-3 animated slideInDown"><?=$name?></h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Pages</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">MyAccount</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Page Header End -->


  
      <!-- my account start -->
       <div class="container">
         <div class="row">
              <div class="col-lg-4 py-4" style="background-color: #0F172B;">
                   <div class="account_left mb-3">
                       <a href="./myAccount.php"><p style="color: #fff; padding: 10px"><i class="fa fa-user"></i> Account Overview</p></a>
                   </div>
                   <div class="account_left mb-3">
                       <a href=""><p style="color: #EEA01E; background-color: #f0f0f0; padding: 10px"><i class="fa-solid fa-house"></i> Bookings</p></a>
                   </div>
                   <div class="account_left mb-3">
                       <a href="./setting.php"><p style="color: white;  padding: 10px"><i class="fa-solid fa-gear"></i> Settings</p></a>
                   </div>
                   <div class="account_left mb-3">
                       <a href="./includes/logout.php"><p style="color: white;  padding: 10px"><i class="fa-solid fa-right-from-bracket"></i> Logout</p></a>
                   </div>
                   
              </div>
              <div class="col-lg-8">
                <h4>My Bookings</h4>

                <div class="table-responsive">
                   <table class="table tabke-bordered">
                       <thead>
                          <tr>
                              <th>S/N</th>
                              <th>Room name</th>
                              <th>NO of Rooms</th>
                              <th>Check In</th>
                              <th>Check Out</th>
                              <th>Booked On</th>
                              <th>Status</th>
                          </tr>
                       </thead>
                       <tbody>
                           
                       </tbody>
                   </table>
                
                </div>
              </div>
         </div>
       </div>
      <!--end of my account start -->
      
     


        

     <?php require_once('./home_footer.php') ?>

        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    
  <?php
   require_once('./script.php');
   require_once('./alertify.php');
    ?>
</body>

</html>