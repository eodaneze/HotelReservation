<?php 
session_start();
   require_once('./connection.php');
   if(isset($_POST['update'])){
    $name = isset($_POST['name']) ? trim($_POST['name']) : "";
    $rating = isset($_POST['rating']) ? trim($_POST['rating']) : "";
    $roomCount = isset($_POST['roomCount']) ? trim($_POST['roomCount']) : "";
    $price = isset($_POST['price']) ? trim($_POST['price']) : "";
    $details = isset($_POST['details']) ? trim($_POST['details']) : "";
    $room_id = $_POST['room_id'];
    $photo = $_POST['photo'];

    
    $content = mysqli_real_escape_string($conn, $details);

    if($name == "" || $rating == "" || $roomCount == "" || $price == "" || $details == ""){
        $_SESSION['error'] =  "All fileds are required";
        header('location: ../updateRoom.php?id='.$room_id);
     }else{
        if($_FILES['file']['name'] != ''){
            $filename = $_FILES['file']['name'];
            $filetmp = $_FILES['file']['tmp_name'];
            $filesize = $_FILES['file']['size'];
            $filetype = $_FILES['file']['type'];
            $fileexe = explode('.', $filename);
            $fileactualext = strtolower(end($fileexe));
            $allow = array('jpg', 'jpeg','png');

            if(in_array($fileactualext, $allow)){
                if($filesize < 8000000){
                    $pic = uniqid('', true).'.'.$fileactualext;
                    $filedestination = 'roomdp/'.$pic;

                    if(move_uploaded_file($filetmp, $filedestination)){
                        $sql = "UPDATE `rooms` SET `name`='$name',`rating`='$rating',`roomCount`='$roomCount', `price` = '$price', `details` = '$details' , `pic`='$pic'
                        WHERE `room_id` = '$room_id'";
                        $result = mysqli_query($conn, $sql);
                        if($result){
                           unlink('roomdp/'.$photo);
                           $_SUCCESS = 'Room have been updated successfully';
                           header('location: ../updateRoom.php?id='.$room_id);
                        }
                    }else{
                        $_SESSION['error'] =  "Error uploading image";
                        header('location: ../updateRoom.php?id='.$room_id);
                    }
                }else{
                    $_SESSION['error'] =  "File is too large";
                    header('location: ../updateRoom.php?id='.$room_id);
                }
            }else{
                $_SESSION['error'] =  "Unsupported file format";
                header('location: ../updateRoom.php?id='.$room_id);
            }
        }else{
            $sql = "UPDATE `rooms` SET `name`='$name',`rating`='$rating',`roomCount`='$roomCount', `price` = '$price', `details` = '$details' WHERE `room_id` = '$room_id'";
            $result = mysqli_query($conn, $sql);

            if($result){
                $_SUCCESS = 'Room have been updated successfully';
                           header('location: ../updateRoom.php?id='.$room_id);
            }else{
                $_SESSION['error'] =  "Error creating admin";
                header('location: ../updateRoom.php?id='.$room_id);
            }
        }
     }
   }
  
?>