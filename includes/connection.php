<?php
  $host = "localhost:3307";
  $username = "root";
  $password = "";
  $dbname = "hotelReservation";
   $conn = mysqli_connect($host, $username, $password, $dbname);

   if(!$conn){
        echo "Database connection failed";
   }
?>