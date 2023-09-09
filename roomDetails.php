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
        <div class="container-fluid page-header mb-5 p-0" style="background-image: url(./includes/roomdp/<?=$pic?>);">
            <div class="container-fluid page-header-inner py-5">
                <div class="container text-center pb-5">
                    <h1 class="display-3 text-white mb-3 animated slideInDown"><?=$name?></h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Pages</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Register</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Page Header End -->


     <!-- room details content -->
     <div class="container" style="margin-bottom: 200px;">
         <div class="row g-4">
             <div class="col-lg-6">
                 <img style="width: 100%;" src="./includes/roomdp/<?=$pic?>" alt="">
             </div>
             <div class="col-lg-6">
                 <h3><?=$name?></h3>
                 <small class="bg-primary text-white rounded py-1 px-3"><i class="fa fa-naira-sign"></i><?=number_format($price, 2)?>/Night</small>
                 <p><?=$details?></p>
                 <h5>Status: <?=$roomCount > 0 ? 'Available' : 'Unavailable'?></h5>
                 <h5>Remaining: <?=$roomCount?> <?=$roomCount > 1 ? 'rooms' : 'room'?></h5>
                
             </div>
         </div>
     </div>
     <!-- end of room details content -->

      <!-- Booking Start -->
      <div class="container-fluid booking pb-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container">
                <div class="bg-white shadow" style="padding: 35px;">
                   <form action="./includes/booking.php" method="post">
                        <div class="row g-2">
                        <div class="col-md-10">
                            <div class="row g-2">
                                <div class="col-md-3">
                                    <div class="date" id="date1" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input"
                                            placeholder="Check in" name="check_in" data-target="#date1" data-toggle="datetimepicker" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="date" id="date2" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" placeholder="Check out" name="check_out" data-target="#date2" data-toggle="datetimepicker"/>
                                    </div>
                                </div>
                                <input type="hidden" name="room_id" value="<?=$room_id?>">
                              
                                <div class="col-md-3">
                                   <input type="number" name="adult" class="form-control" placeholder="Adult">
                                </div>
                                <div class="col-md-3">
                                     <input type="number" name="children" class="form-control" placeholder="Children">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                          <?php

                                if($roomCount > 0){
                                    ?> <button class="btn btn-primary w-100" name="book">Book</button><?php
                                }else{
                                    ?> <button class="btn btn-primary w-100" name="book" disabled>Book</button><?php
                                }
                            ?>
                        </div>
                    </div>
                   </form>
                </div>
            </div>
        </div>
        <!-- Booking End -->

        

     <?php require_once('./home_footer.php') ?>

        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>
  <?php
   require_once('./script.php');
   require_once('./alertify.php');
    ?>
</body>

</html>