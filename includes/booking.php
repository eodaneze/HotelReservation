<?php
  session_start();
  require_once('./connection.php');
  if(isset($_SESSION['userId'])){
     $user_id = $_SESSION['userId'];
     if(isset($_POST['book'])){
      $room_id = $_POST['room_id'];
      $check_in = $_POST['check_in'];
      $check_out = $_POST['check_out'];
      $adult = $_POST['adult'];
      $children = $_POST['children'];
      $status  = "checked-in";
      
      if($check_in == "" || $check_out == "" || $adult == "" || $children == ""){
         $_SESSION['error'] = "All fields are required";
      }else{
         // check if room is avalable 
         $checkSql = "SELECT roomCount from rooms WHERE room_id = '$room_id'";
         $checkResult = mysqli_query($conn, $checkSql);
         $row = mysqli_fetch_assoc($checkResult);
         $room_Count = $row['roomCount'];

         if($room_Count > 0){
            //  decrement the room count by 1;
            $updateSql = "UPDATE rooms SET roomCount = '$room_Count' - 1 WHERE room_id = '$room_id'";
            $updateResult = mysqli_query($conn, $updateSql);
            $sql = "INSERT INTO booking(room_id, user_id, checkin_date, checkout_date, adult, children, status)VALUES('$room_id', '$user_id',  '$check_in', '$check_out', '$adult', '$children', '$status')";
            $result = mysqli_query($conn, $sql);
             $_SESSION['success'] = "Your booking was successful";
             header('location: ../viewBookingDetails.php?id='.$room_id);
         }else{
             $_SESSION['error'] = "Room is not avalable";
             header('location: ../index.php');
         }
         
      
        }
      }else{
         echo "bad request";
      }
  }else{
     $_SESSION['error'] = "Please Login in first to book a room!";
     header('location: ../userLogin.php');
  }

?>