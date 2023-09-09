<?php
    require_once('./connection.php');
  if(isset($_POST['login'])){
     $email = $_POST['email'];
     $password = $_POST['password']; 
     $conpassword = $_POST['conpassword']; 
     
     if($email == "" || $password == ""){
        $_SESSION['error'] = "All fields are required"; 
        header('location: ../adminLogin.php');
        exit();
     }elseif(! filter_var($email, FILTER_VALIDATE_EMAIL)){
        $_SESSION['error'] = "Invalid email format"; 
        header('location: ../adminLogin.php');
        exit();
     }elseif($password !== $conpassword){
        $_SESSION['error'] = "Password mismatch"; 
        header('location: ../adminLogin.php');
        exit();
     }
     else{
        // $new_password = md5($password);
       $sql = "SELECT * FROM admin WHERE email = '$email' AND password = '$password'";
       $result = mysqli_query($conn, $sql);

       if(mysqli_num_rows($result) > 0){
         $row = mysqli_fetch_assoc($result);

         session_start();
         $_SESSION['adminId'] = $row['admin_id'];
         
         if(isset($_SESSION['adminId'])){
            $_SESSION['success'] = "Login successful"; 
            header('location: ../adminPanel.php');
            exit();
         }else{
            $_SESSION['error'] = "User not found"; 
            header('location: ../adminLogin.php');
            exit();
         }
       }else{
        $_SESSION['error'] = "Email or password is incorrect"; 
        header('location: ../adminLogin.php');
        exit();
       }
   }
}

 ?>