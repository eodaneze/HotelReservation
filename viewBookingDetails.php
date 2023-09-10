<?php
  require_once('./home_header.php');
  require_once('./home_navbar.php');
  if(isset($_GET['bookingId'])){
     $booking_id = $_GET['bookingId'];
     $sql = "SELECT * FROM booking WHERE booking_id = '$booking_id'";
     $result = mysqli_query($conn, $sql);
     $row = mysqli_fetch_assoc($result);
    $room_id = $row['room_id'];
    $checkin_date = $row['checkin_date'];
    $checkout_date = $row['checkout_date'];
    $roomCount = $row['room_no'];

      // Convert the dates to DateTime objects for calculations
      $startDateTime = new DateTime($checkin_date);
      $endDateTime = new DateTime($checkout_date);
      // get the difference in dates
      $interval = $startDateTime->diff($endDateTime);
      // get number of days;
      $numberOfDays = $interval->format('%a');
    $sql2 = "SELECT * FROM rooms WHERE room_id = '$room_id'";
    $result2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_assoc($result2);
    $pic = $row2['pic'];
    $name = $row2['name'];
    $price = $row2['price'];
    $totalPrice = $price * $numberOfDays * $roomCount;
  
  }
?>
<div class="container">
     <div class="row">
      <h3>Booking Payment</h3>
      <div class="col-lg-5">
        <img class="img-fluid" src="./includes/roomdp/<?=$pic?>" alt="">
      </div>
      <div class="col-lg-3">
        Number of Rooms: <?=$roomCount?>
        <?php
            if($numberOfDays > 1){
              ?><h5><?=$numberOfDays?> Days</h5><?php
            }else{
              ?><h5><?=$numberOfDays?> Day</h5><?php
            }
            
            ?>
            <small class="bg-primary text-white rounded py-1 px-3"><i class="fa fa-naira-sign"></i><?=number_format($price, 2)?>/Night</small>
            <h5>Total Price: <i class="fa fa-naira-sign"></i><?=number_format($totalPrice, 2)?></h5>
            
          </div>
        <div class="col-lg-4">
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Note:</strong> Pay Now to complete your reservation
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
        </div>
     </div>
</div>
<?php
  require_once('./alertify.php');
  require_once('./home_footer.php');
?>