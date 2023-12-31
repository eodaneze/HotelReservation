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
      $room_no = $_POST['room_no'];
      $status  = "checked-in";
      
      if($check_in == "" || $check_out == "" || $adult == "" || $children == ""){
         $_SESSION['error'] = "All fields are required";
         header('location: ../roomDetails.php?id='.$room_id);
      }else{
         $checkSql = "SELECT roomCount from rooms WHERE room_id = '$room_id'";
         $checkResult = mysqli_query($conn, $checkSql);

         if($checkResult){
            $row = mysqli_fetch_assoc($checkResult);
            $dbRoomNo = $row['roomCount'];
            
            $newRoomNo = $dbRoomNo - $room_no;

            if($room_no > $dbRoomNo){
               $_SESSION['error'] = 'Avaliable room is less than the selected room number!. Please check another room';
               header('location: ../roomDetails.php?id='.$room_id);
            }else{
               $sql = "INSERT INTO booking(room_id, user_id, checkin_date, checkout_date, room_no, adult, children, status)VALUES('$room_id', '$user_id',  '$check_in', '$check_out', '$room_no', '$adult', '$children', '$status')";
               $result = mysqli_query($conn, $sql);
   
                $newBookingId = mysqli_insert_id($conn);
                   //  set the room count to be the difference between the room the room in the db and the one the use selected in the frontend
                  $updateSql = "UPDATE rooms SET roomCount = '$newRoomNo' WHERE room_id = '$room_id'";
                  $updateResult = mysqli_query($conn, $updateSql);
                $_SESSION['success'] = "Your booking was successful";
                header('location: ../viewBookingDetails.php?bookingId='.$newBookingId);
            }
         }else{
            echo "Error: ".mysqli_error($conn);
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