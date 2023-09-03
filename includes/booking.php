<?php
  session_start();
  if(isset($_SESSION['userId'])){
     echo $_SESSION['userId'];
  }else{
     $_SESSION['error'] = "Please Login in first to book a room!";
     header('location: ../userLogin.php');
  }

?>