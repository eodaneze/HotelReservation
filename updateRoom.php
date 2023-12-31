<?php
  require_once('./header.php');
  require_once('./navbar.php');
  require_once('./sidebar.php');

  
 if(isset($_GET['id'])){
    $room_id = $_GET['id'];
    $sql = "SELECT * FROM rooms WHERE room_id = '$room_id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $name = $row['name'];
    $pic = $row['pic'];
    $price = $row['price'];
    $details = $row['details'];
    $roomCount = $row['roomCount'];
    $rating = $row['rating'];

  }
?>
<body>
<script src="./tinymce/js/tinymce/tinymce.min.js"></script>
  <script>
    // Initialize TinyMCE
    tinymce.init({
      selector: '#myTextarea',
      height: 300,
      plugins: 'advlist autolink lists link image charmap print preview anchor',
      toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright | bullist numlist outdent indent | link image ',
      menubar: 'file edit view insert format tools table help'
    });
  </script>



    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Add Room</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Users</li>
                    <li class="breadcrumb-item active">Profile</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

       <form action="./includes/updateroom.php" method="post" enctype="multipart/form-data">
        <div class="row bg-white shadow p-3">
           <div class="col-lg-6 mb-3">
              <label>Room Name</label>
               <input type="text" name="name" class="form-control" value="<?=$name?>">
           </div>
           <div class="col-lg-6 mb-3">
              <label>Room Rating</label>
               <input type="number" name="rating" class="form-control" value="<?=$rating?>">
               <input type="hidden" name="photo" value="<?=$pic?>">
               <input type="hidden" name="room_id" value="<?=$room_id?>">
           </div>
           <div class="col-lg-6 mb-3">
              <label>Room Price</label>
               <input type="text" name="price" class="form-control" value="<?=$price?>">
           </div>
           <div class="col-lg-6 mb-3">
              <label>Room Count</label>
               <input type="number" name="roomCount" class="form-control" value="<?=$roomCount?>">
           </div>
           <div class="col-lg-6 mb-3">
              <label><img style="width: 7rem;" class="mb-3" src="./includes/roomdp/<?=$pic?>" alt=""></label>
               <input type="file" name="file" class="form-control">
           </div>
           <div class="col-lg-12 mb-3">
                  <label class="fw-bold">Room Details</label>
                  <textarea id="myTextarea"  name="details" id="" cols="30" rows="10" class="form-control"><?=$details?></textarea>
              </div>
              <div class="col-lg-4">
                   <button name="update" style="background-color: #3B518B; border: none; padding: 10px 30px; color: white; text-transform: uppercase; border-radius: 50px">Add Room</button>
              </div>
        </div>
       </form>

    </main><!-- End #main -->
    <?php
     require_once('./alertify.php');
     require_once('./footer.php');
?>
</body>

</html>