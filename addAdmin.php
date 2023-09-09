<?php
  require_once('./header.php');
  require_once('./navbar.php');
  require_once('./sidebar.php');

?>
<main class="main" id="main">
    <div class="pagetitle">
            <h1>Add Admin</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div>
    <form method="post" enctype="multipart/form-data" action="./includes/addAdmin.php">
         <div class="row bg-white shadow p-3">
             <div class="col-lg-6 mb-4">
                <label>Name</label>
                 <input name="name" type="text" class="form-control">
             </div>
             <div class="col-lg-6 mb-4">
                <label>Email</label>
                 <input name="email" type="email" class="form-control">
             </div>
             <div class="col-lg-6 mb-4">
                <label>Password</label>
                 <input name="password" type="password" class="form-control">
             </div>
             <div class="col-lg-6 mb-4">
                <label>Profile</label>
                 <input type="file" name="file" class="form-control">
             </div>
             <div class="col-lg-6">
                  <button name="add" class="btn btn-primary">Add Admin</button>
             </div>
         </div>
    </form>
</main>

<?php
require_once('./alertify.php');
require_once("./footer.php");
?>