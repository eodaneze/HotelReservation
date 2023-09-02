<?php
session_start();
require_once('./connection.php');
   if(isset($_POST['register'])){
   	  $name = $_POST['name']; 
     $email = $_POST['email']; 
     $address = $_POST['address']; 
     $phone = $_POST['phone']; 
     $password = $_POST['password']; 
    


     if($name == "" || $email == "" || $address == "" || $phone== "" || $password == "" ){
        $_SESSION['error'] = "All fields are required";
        header('location: ../userRegister.php');
        exit();

     }else{
     	$sql = "INSERT INTO user (name, email, phone, address, password)VALUES('$name', '$email', '$phone', '$address', '$password')";

     	$result = mysqli_query($conn, $sql);
     	if($result){
            $_SESSION['success'] = "Registration successful";
            header('location: ../userLogin.php');
            exit();
     	}else{
            $_SESSION['error'] = "An error occured";
            header('location: ../userRegister.php');
            exit();
     	}
     }
   }

?>