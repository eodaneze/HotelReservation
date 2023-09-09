
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="./adminPanel.php">
                <i class="bi bi-grid" style="color: #293A6C;"></i>
                <span style="color: #293A6C;">Admmin Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#"
                style="color: #293A6C;">
                <i class="bi bi-menu-button-wide"></i><span>Rooms</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="./viewrooms.php">
                        <i class="bi bi-circle"></i><span>View Rooms</span>
                    </a>
                </li>
                <li>
                    <a href="./addRoom.php">
                        <i class="bi bi-circle"></i><span>Add Rooms</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Components Nav -->






        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
            <i class='bx bx-building-house'></i><span>Bookings</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="./viewSeller.php">
                        <i class="bi bi-circle"></i><span>View Booking</span>
                    </a>
                </li>
            </ul>
            <?php

                  if(isset($_SESSION['adminId'])){
                     $admin_id = $_SESSION['adminId'];
                     
                     $sql = "SELECT * FROM admin WHERE admin_id = '$admin_id' AND role = 'superAdmin'";
                     $result = mysqli_query($conn, $sql);
                     $row = mysqli_fetch_assoc($result);
                       if($row){

                          ?>
                            <li class="nav-item">
                                    <a class="nav-link collapsed" data-bs-target="#icons-navs" data-bs-toggle="collapse" href="#">
                                        <i class="bi bi-people"></i><span>Manage Admin</span><i class="bi bi-chevron-down ms-auto"></i>
                                    </a>
                                    <ul id="icons-navs" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                                        <li>
                                            <a href="./viewAdmins.php">
                                                <i class="bi bi-circle"></i><span>View Admins </span>
                                            </a>
                                            <a href="./addAdmin.php">
                                                <i class="bi bi-circle"></i><span>Add Admin</span>
                                            </a>
                                        </li>
                                    </ul>
                            </li>
                          <?php
                       }
                    
                     
                  }
                  
                ?>
                            



    </ul>

</aside><!-- End Sidebar-->