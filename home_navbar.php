<?php require_once('./includes/connection.php') ?> 
 <!-- Header Start -->
 <style>
    .navbar-top{
         position: sticky;
         top: 0;
         z-index: 10;
    }
 </style>
 <div class="container-fluid bg-dark px-0 navbar-top">
            <div class="row gx-0">
                <div class="col-lg-3 bg-dark d-none d-lg-block">
                    <a href="index.php" class="navbar-brand w-100 h-100 m-0 p-0 d-flex align-items-center justify-content-center">
                        <h1 class="m-0 text-primary text-uppercase">Hotelier</h1>
                    </a>
                </div>
                <div class="col-lg-9">
                    <div class="row gx-0 bg-white d-none d-lg-flex">
                        <div class="col-lg-7 px-5 text-start">
                            <div class="h-100 d-inline-flex align-items-center py-2 me-4">
                                <i class="fa fa-envelope text-primary me-2"></i>
                                <p class="mb-0">info@hotelier.com</p>
                            </div>
                            <div class="h-100 d-inline-flex align-items-center py-2">
                                <i class="fa fa-phone-alt text-primary me-2"></i>
                                <p class="mb-0">+2348164869025</p>
                            </div>
                        </div>
                        <div class="col-lg-5 px-5 text-end">
                            <div class="d-inline-flex align-items-center py-2">
                                <a class="me-3" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="me-3" href=""><i class="fab fa-twitter"></i></a>
                                <a class="me-3" href=""><i class="fab fa-linkedin-in"></i></a>
                                <a class="me-3" href=""><i class="fab fa-instagram"></i></a>
                                <a class="" href=""><i class="fab fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                    <nav class="navbar navbar-expand-lg bg-dark navbar-dark p-3 p-lg-0">
                        <a href="index.php" class="navbar-brand d-block d-lg-none">
                            <h1 class="m-0 text-primary text-uppercase">Hotelier</h1>
                        </a>
                        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                            <div class="navbar-nav mr-auto py-0">
                                <a href="index.php" class="nav-item nav-link active">Home</a>
                                <a href="about.php" class="nav-item nav-link">About</a>
                                <a href="service.php" class="nav-item nav-link">Services</a>
                                <a href="room.php" class="nav-item nav-link">Rooms</a>
                                <div class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                                    <div class="dropdown-menu rounded-0 m-0">
                                        <a href="booking.php" class="dropdown-item">Booking</a>
                                        <a href="team.php" class="dropdown-item">Our Team</a>
                                        <a href="testimonial.php" class="dropdown-item">Testimonial</a>
                                    </div>
                                </div>
                                <a href="contact.php" class="nav-item nav-link">Contact</a>
                                <?php 
                                  if(isset($_SESSION['userId'])){
                                     $userId = $_SESSION['userId'];
                                     $sql = "SELECT * FROM users WHERE user_id = '$userId'";
                                     $result = mysqli_query($conn, $sql);
                                     $row = mysqli_fetch_assoc($result);
                                     $name = $row['name'];
                                     $email = $row['email'];
                                     $address = $row['address'];
                                     $phone = $row['phone'];
                                     $getFirstname = explode(' ', $name);
                                     $firstname = $getFirstname[0];


                                     ?>
                                          <div class="nav-item dropdown">
                                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Welcome <?=$firstname?></a>
                                            <div class="dropdown-menu rounded-0 m-0">
                                                <a href="./myAccount.php" class="dropdown-item">My Account</a>
                                                <a href="./includes/logout.php" class="dropdown-item">Logout</a>
                                                
                                            </div>
                                      </div>
                                     <?php
                                     
                                  }else{
                                    ?>
                                            <div class="nav-item dropdown">
                                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Account</a>
                                            <div class="dropdown-menu rounded-0 m-0">
                                                <a href="./userRegister.php" class="dropdown-item">Register</a>
                                                <a href="./userLogin.php" class="dropdown-item">Login</a>
                                                
                                            </div>
                                        </div>
                                  <?php
                                  }
                                
                                ?>
                               
                            </div>
                            
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Header End -->