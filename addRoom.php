<?php
  require_once('./header.php');
  require_once('./navbar.php');
  require_once('./sidebar.php');

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

       <form action="./includes/addroom.php" method="post" enctype="multipart/form-data">
        <div class="row bg-white shadow p-3">
           <div class="col-lg-6 mb-3">
              <label>Room Name</label>
               <input type="text" name="name" class="form-control">
           </div>
           <div class="col-lg-6 mb-3">
              <label>Room Rating</label>
               <input type="number" name="rating" class="form-control">
           </div>
           <div class="col-lg-6 mb-3">
              <label>Room Price</label>
               <input type="text" name="price" class="form-control">
           </div>
           <div class="col-lg-6 mb-3">
              <label>Room Count</label>
               <input type="number" name="roomCount" class="form-control">
           </div>
           <div class="col-lg-6 mb-3">
              <label>Room Image</label>
               <input type="file" name="file" class="form-control">
           </div>
           <div class="col-lg-12 mb-3">
                  <label class="fw-bold">Room Details</label>
                  <textarea id="myTextarea"  name="details" id="" cols="30" rows="10" class="form-control"></textarea>
              </div>
              <div class="col-lg-4">
                   <button name="add" style="background-color: #3B518B; border: none; padding: 10px 30px; color: white; text-transform: uppercase; border-radius: 50px">Add Room</button>
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