<?php
session_start();

if($_SESSION['userId']){
   session_unset();
   session_destroy();
   $_SESSION['success'] = "You have logged out successfully!";
   header('location: ../userLogin.php');
}elseif($_SESSION['adminId']){
   session_unset();
   session_destroy();
   header('location: ../adminLogin.php');
}

?>