<?php
  require_once('./header.php');
  require_once('./navbar.php');
  require_once('./sidebar.php');

?>
<main class="main" id="main">
    <div class="pagetitle">
            <h1>View Admin</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div>
    <div class="table-responsive">
         <table class="table table-bordered bg-white p-3 border">
              <thead>
                 <tr align="center">
                     <th>S/N</th>
                     <th>Profile</th>
                     <th>Name</th>
                     <th>Email</th>
                     <th>Role</th>
                     <th>Operations</th>
                 </tr>
              </thead>
              <tbody>
                  <?php
                    $sql = "SELECT * FROM admin";
                    $result = mysqli_query($conn, $sql);
                    $num = 1;
                    while($row = mysqli_fetch_assoc($result)){
                         $name = $row['name'];
                         $pic = $row['pic'];
                         $email = $row['email'];
                         $role = $row['role'];
                         $id = $row['admin_id'];
                         ?>
                            <tr align="center">
                                 <td><a href=""><?=$num++?></a></td>
                                 <td><img style="width: 3rem; height: 3rem; border-radius: 50%" src="./includes/admindp/<?=$pic?>" alt=""></td>
                                 <td><?=$name?></td>
                                 <td><?=$email?></td>
                                 <td class="<?=$role == 'superAdmin' ? 'bg-light p-3' : ''?>"><?=$role?></td>
                                 <td>
                                    <a href="./updateAdmin.php?id=<?=$id?>"><button class="btn btn-success">Edit</button></a>
                                    <a href=""><button class="btn btn-danger">Delete</button></a>
                                 </td>
                            </tr>
                         
                         <?php
                    }
                  ?>
              </tbody>
         </table>
    </div>
</main>

<?php
require_once('./alertify.php');
require_once("./footer.php");
?>