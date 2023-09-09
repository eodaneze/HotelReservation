<?php 
session_start();
require_once("./connection.php");
 if(isset($_POST['add'])){
    $name = isset($_POST['name']) ? trim($_POST['name']) : "";
    $rating = isset($_POST['rating']) ? trim($_POST['rating']) : "";
    $roomCount = isset($_POST['roomCount']) ? trim($_POST['roomCount']) : "";
    $price = isset($_POST['price']) ? trim($_POST['price']) : "";
    $details = isset($_POST['details']) ? trim($_POST['details']) : "";

    $content = mysqli_real_escape_string($conn, $details);

    
    
    
     
     if($name == "" || $rating == "" || $roomCount == "" || $price == "" || $details == ""){
        // echo "all fields are required";
        // die();
        $_SESSION['error'] = "All Fields are required"; 
         header('location:../addRoom.php');
         exit();
     }else{
        $name = trimData($name);
        $rating = trimData($rating);
        $roomCount = trimData($roomCount);
        $price = trimData($price);
        $details = trimData($details);
     }

     if($_FILES['file']['name'] != ''){
        $filename = $_FILES['file']['name'];
        $filetmp = $_FILES['file']['tmp_name'];
        $filesize = $_FILES['file']['size'];
        $filetype = $_FILES['file']['type'];
        $fileext = explode('.', $filename);
        $fileactualext = strtolower(end($fileext));

        $allow = array('jpg', 'jpeg', 'png', 'gif');
        if(in_array($fileactualext, $allow)){
            if($filesize < 8000000){
                $pic = uniqid('',true).'.'.$fileactualext;
                $filedestination = 'roomdp/'.$pic;

                if(move_uploaded_file($filetmp, $filedestination)){
                    $md = date('Y-m-d H:i:s');
                   
                    $sql = "INSERT INTO  rooms(name, price, rating, roomCount, pic, details)VALUES('$name','$price', '$rating', '$roomCount','$pic', '$content ')";

                    $result = mysqli_query($conn, $sql);
                    if($result){
                        $_SESSION['success'] = "New room have ben added successfully";
                        header("location: ../addRoom.php");
                        return false;
                    }else{
                        $_SESSION['error'] = "error creating room";
						header("location: ../addRoom.php");
						return false;
                    }
                }else{
                    $_SESSION['error'] = "error uploading room image";
                    header("location: ../addRoom.php");
                    return false;
                }
        }else{
            $_SESSION['error'] = "room image is too large";
            header("location: ../addRoom.php");
			return false;
        }
     }else{
        $_SESSION['error'] = "Unsupported file format";
        header("location: ../addRoom.php");
        return false;
     }
 }else{
    $_SESSION['error'] = "Please Upload an image";
    header("location: ../addRoom.php");
    return false;
 }
 }else{
    $_SESSION['error'] = "Please login first";
    header("location: ../index.php");
    return false;
 }
 
 function trimData($data){
    $data = htmlspecialchars($data);
    $data = trim($data);
    $data = stripcslashes($data);

    return $data;
}

?>