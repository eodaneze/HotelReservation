<?php
  require_once('./header.php');
  require_once('./navbar.php');
  require_once('./sidebar.php');

?>

<body>
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>View Rooms</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Users</li>
                    <li class="breadcrumb-item active">Profile</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

     <div class="all-rooms">
        <div class="row">
            <?php
                   $sql = "SELECT * FROM rooms";
                   $result = mysqli_query($conn, $sql);
                   while($row = mysqli_fetch_assoc($result)){
                    $name = $row['name'];
                    $pic = $row['pic'];
                      ?>
                          <div class="col-lg-3 p-2 text-center">
                                <img class="img-fluid" src="./includes/roomdp/<?=$pic?>" alt="">
                                <div class="pagetitle">
                                    <h1 class="text-cente mb-3"><?=$name?></h1>
                                    <a href="./updateRoom.php?id=<?=$row['room_id']?>"><button class="btn btn-success">Edit</button></a>
                                    <a href=""><button class="btn btn-danger">Delete</button></a>
                                </div>
                         </div>
                      <?php
                   }
            ?>
          
           
        </div>
     </div>
    </main><!-- End #main -->
    <?php
     require_once('./alertify.php');
     require_once('./footer.php');
?>
</body>

</html>