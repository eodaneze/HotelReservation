<?php
session_start();
require_once('./connection.php');
  if(isset($_POST['login'])){ 
     $email = isset($_POST['email']) ? trim($_POST['email']) : ""; 
     $password = isset($_POST['password']) ? trim($_POST['password']) : "";  
     $conpassword = isset($_POST['conpassword']) ? trim($_POST['conpassword']) : "";  
     
     if($email == "" || $password == "" || $conpassword == ""){
        $_SESSION['error'] = "All fields are required"; 
        header('location: ../userLogin.php');
        exit();
         
     }elseif($password != $conpassword){
        $_SESSION['error'] = "Password mismatch"; 
        header('location: ../userLogin.php');
        exit();
     }
         
     elseif(! filter_var($email, FILTER_VALIDATE_EMAIL)){
        $_SESSION['error'] = "Invalid emeail format"; 
        header('location: ../userLogin.php');
        exit();
     }else{
        //  $hashed_password  = md5($password);
        $sql = "SELECT * FROM users WHERE email = '$email' AND password ='$password' ";
        $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
       $row = mysqli_fetch_assoc($result);
       $name = $row['name'];
       session_start();
       $_SESSION['userId'] = $row['user_id'];

       if(isset($_SESSION['userId'])){
        $_SESSION['success'] = "Welcome ${name}";
        header('location: ../index.php');
        exit();
       }else{
        $_SESSION['error'] = "Email or password is incorrect"; 
        header('location: ../userLogin.php');
        exit();
       }
     }else{
        $_SESSION['error'] = "User Not Found"; 
        header('location: ../userLogin.php');
        exit();
     }
    }
}else{
    $_SESSION['error'] = "An error occured"; 
    header('location: ../userLogin.php');
    exit();
}

    ?>