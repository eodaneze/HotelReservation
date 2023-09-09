<?php
session_start();
require_once('./connection.php');
  if(isset($_POST['add'])){
     $name = $_POST['name']; 
     $email = $_POST['email']; 
     $password = $_POST['password']; 
     
     $sql2 = "SELECT * FROM admin WHERE email = '$email'";
     $result2 = mysqli_query($conn, $sql2);
     
     if($name == "" || $email == "" || $password == ""){
        $_SESSION['error'] = "All fields are required"; 
        header('location: ../addAdmin.php');
        exit();
     }
     elseif(mysqli_num_rows($result2) > 0){
        $_SESSION['error'] = "Email already exist"; 
        header('location: ../addAdmin.php');
        exit();
     }
     elseif(! filter_var($email, FILTER_VALIDATE_EMAIL)){
        $_SESSION['error'] = "Invalid email format"; 
        header('location: ../addAdmin.php');
        exit();
     }else{
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
                    $filedestination = 'admindp/'.$pic;
                    $role = "admin";
                    if(move_uploaded_file($filetmp, $filedestination)){
                         $sql = "INSERT INTO admin(name, email, password, pic, role)VALUES('$name', '$email', '$password', '$pic', '$role')";
                          $result = mysqli_query($conn, $sql);
                          if($result){
                            $_SESSION['success'] = "New admin have been added successfully"; 
                            header('location: ../addAdmin.php');
                            exit();
                           }else{
                            $_SESSION['error'] = "Error creating admin"; 
                            header('location: ../addAdmin.php');
                            exit();
                           }
                    }else{
                        $_SESSION['error'] = "Error uploading admin picture"; 
                        header('location: ../addAdmin.php');
                        exit();
                    }
                }else{
                    $_SESSION['error'] = "Unsupported file format"; 
                    header('location: ../addAdmin.php');
                    exit();
                }
            }else{
                $_SESSION['error'] = "Please upload a picture"; 
                header('location: ../addAdmin.php');
                exit();
            }
         }
     }
}

?>




<!-- else{
       $sql = "INSERT INTO register(name, email, password)VALUES('$name', '$email', '$password')";
       $result = mysqli_query($conn, $sql);
    if($result){
        $success = urlencode("Your Registration was successful!!"); 
        header('location: ../addAdmin.php?success='.$success);
        exit();
    }else{
          $error = urlencode("Failed To Register User"); 
        header('location: ../addAdmin.php?error='.$error);
        exit();
    }
   } -->