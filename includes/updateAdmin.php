<?php 
session_start();
   require_once('./connection.php');
   if(isset($_POST['update'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $admin_id = $_POST['admin_id'];
    $photo = $_POST['photo'];

    if($name == "" || $email == "" || $role == ""){
        $_SESSION['error'] =  "All fileds are required";
        header('location: ../updateAdmin.php?id='.$admin_id);
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
                    $filedestination = 'admindp/'.$pic;

                    if(move_uploaded_file($filetmp, $filedestination)){
                        $sql = "UPDATE `admin` SET `name`='$name',`email`='$email',`role`='$role',`pic`='$pic'
                        WHERE `admin_id` = '$admin_id'";
                        $result = mysqli_query($conn, $sql);
                        if($result){
                           unlink('admindp/'.$photo);
                           $_SUCCESS = 'Admin have been updated successfully';
                           header('location: ../updateAdmin.php?id='.$admin_id);
                        }
                    }else{
                        $_SESSION['error'] =  "Error uploading image";
                        header('location: ../updateAdmin.php?id='.$admin_id);
                    }
                }else{
                    $_SESSION['error'] =  "File is too large";
                    header('location: ../updateAdmin.php?id='.$admin_id);
                }
            }else{
                $_SESSION['error'] =  "Unsupported file format";
                header('location: ../updateAdmin.php?id='.$admin_id);
            }
        }else{
            $sql = "UPDATE `admin` SET `name`='$name',`email`='$email',`role`='$role'
                        WHERE  `admin_id` = '$admin_id'";
            $result = mysqli_query($conn, $sql);

            if($result){
                $_SUCCESS = 'Admin have been updated successfully';
                           header('location: ../updateAdmin.php?id='.$admin_id);
            }else{
                $_SESSION['error'] =  "Error creating admin";
                header('location: ../updateAdmin.php?id='.$admin_id);
            }
        }
     }
   }else{
      if(isset($_POST['updatePass'])){
        $admin_id = $_POST['admin_id'];
        $password = $_POST['password']; 
        $newpassword = $_POST['newpassword'];
        $renewPassword = $_POST['renewpassword'];

        $sql = "SELECT * FROM admin WHERE admin_id = '$admin_id'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $oldPassword = $row['password'];

         if($password == "" || $newpassword == "" || $renewPassword == ""){
            $_SESSION['error'] = "All fields are required";
            header('location: ../updateAdmin.php?id='.$admin_id);
        }elseif($password !== $oldPassword){
            $_SESSION['error'] = "The current password is wrong";
            header('location: ../updateAdmin.php?id='.$admin_id);

         }elseif($newpassword !== $renewPassword){
            $_SESSION['error'] = "Password mismatch";
            header('location: ../updateAdmin.php?id='.$admin_id);
         }else{
            $sql = "UPDATE `admin` SET `password` = '$newpassword' WHERE `admin_id` = '$admin_id'";
      			$result = mysqli_query($conn, $sql);
            if($result){
                $_SESSION['success'] = "Password have been updated successfully";
                header('location: ../updateAdmin.php?id='.$admin_id);
            }else{
                $_SESSION['error'] = "Error updating password";
                header('location: ../updateAdmin.php?id='.$admin_id);
            }
         }
      }
   }
?>