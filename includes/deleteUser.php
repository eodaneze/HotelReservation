<?php
  session_start();
  require_once('./connection.php');
  if(isset($_SESSION['userId'])){
    $user_id = $_SESSION['userId'];
    $sql = "DELETE FROM users WHERE user_id = '$user_id'";
    $result = mysqli_query($conn, $sql);
    if($result){
      $_SESSION['success'] = "Your account have been deleted successfully";
      header('location: ../userRegister.php');
    }else{
      $_SESSION['error'] = "Error deleting account";
      header('location: ../myAccount.php');
    }
  }

?>