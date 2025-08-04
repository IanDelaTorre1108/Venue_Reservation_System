<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css"/>
    <link rel="shortcut icon" href="img/new sac logo.png">
    <link rel="stylesheet" href="css/myweb.css">
    <script src="js/index.js"></script>
    <title>Venue</title>
    <style>
        .card {
            transition: transform .3s;
            }

            .card:hover {
                transform: scale(1.06);
            }
    </style>
</head>
<body style="background: linear-gradient(to right, rgba(128, 0, 0, .1), rgba(255, 204, 102, .1));">
    <main>
        <nav class="navbar navbar-expand-md sticky-top">
            <div class="container-fluid">
                <a class="navbar-brand me-auto" href=""><img src="img/new sac logo.png" alt="" width="50" height="50"></a>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Navigation Bar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body" id="navbarSupportedContent">
                    <ul class="navbar-nav d-flex justify-content-end flex-grow-1 me-4">
                        <li class="nav-item active"><a class="nav-link link" href="home.php"><i class="fa-solid fa-house"></i> Home</a></li>
                        <li class="nav-item"><a class="nav-link link" href="venue.php" style="border-bottom: 2px solid gold;"><i class="fa-solid fa-location-dot"></i> Venue</a></li>
                        <li class="nav-item"><a class="nav-link link" href="about.php"><i class="fa-solid fa-user-group"></i> About Us</a></li>
                        <li class="nav-item"><a class="nav-link link" href="contact.php"><i class="fa-solid fa-address-book"></i> Contact</a></li>
                    </ul>
                </div>
                </div>
                <a class="nav-admin me-1" href="#" role="button" data-bs-toggle="modal" data-bs-target="#adminLoginModal"><i class="fa-solid fa-user-tie"></i> Admin</a>
                <!-- ADMIN LOGIN -->
                <div class="modal fade" id="adminLoginModal" tabindex="-1" aria-labelledby="adminLoginModalLabel" aria-hidden="true" data-bs-backdrop="static">
                    <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: maroon; color: #ffcc66;">
                            <h5 class="modal-title" id="adminLoginModalLabel" style="text-align: center; width: 100%;">ADMIN LOGIN</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body mt-3">
                        <form action="php/login.php" method="POST">
                            <div class="mb-3 input-group">
                                <i class="fa-solid fa-user input-group-text p-3" style="color: maroon;"></i>
                                <input type="text" class="form-control" name="adminUser" id="adminUsername" placeholder="Username" required>
                            </div>
                            <div class="mb-3 input-group">
                                <i class="fa-solid fa-lock input-group-text p-3" style="color: maroon;"></i>
                                <input type="password" class="form-control" name="adminPass" id="adminPassword" placeholder="Password" required>
                                <span class="input-group-text">
                                    <a href="javascript:void(0);" onclick="togglePasswordVisibility()">
                                        <i class="fa-solid fa-eye-slash" id="showpass" style="color: maroon;"></i>
                                    </a>
                                </span>
                            </div>
                            <div class="text-center my-2">
                                <button type="submit" class="btn btn-primary" style="padding: 5px 5rem;">LOGIN</button>
                            </div>
                        </form>
                        </div>
                    </div>
                    </div>
                </div>
                <div>
                    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation" style="color: #ffcc66;">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
            </div>
        </nav>
    <main id="venue-content">
        <!--VENUE CONTENT-->
        <div class="container-fluid">
            <div class="row text-center d-flex justify-content-evenly">
                <div class="text-center">
                    <h1 class=" nav-title mt-5">DISCOVER</h1>
                    <h4><span style="font-size: 3rem; color: maroon">“</span>Every venue is a gateway to a world of possibilities. Discover yours today.”<span style="font-size: 3rem; color: maroon">”</span></h4>
                </div>
                <div class="card col-md-6 mt-5" style="width: 40rem; padding: 0; border: none; box-shadow: rgba(149, 157, 165, 0.9) 0px 8px 24px;">
                    <img class="card-img-top" src="img/BDH.jpg" alt="Card image cap" width="300" height="300">
                    <div class="card-body">
                        <h4 class="card-title" style="color: maroon;">Bishop Dewit Hall</h4>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum voluptates quisquam, dignissimos assumenda eveniet obcaecati accusamus quia ducimus rem distinctio, autem voluptatum nam reiciendis. Id asperiores earum illo similique ratione.</p>
                        <a href="#" class="details-btn my-2" role="button">Read More</a>
                    </div>
                </div>
                <div class="card col-md-6 mt-5" style="width: 40rem; padding: 0; border: none; box-shadow: rgba(149, 157, 165, 0.9) 0px 8px 24px;">
                    <img class="card-img-top" src="img/BMH.jpg" alt="Card image cap" width="300" height="300">
                    <div class="card-body">
                        <h4 class="card-title" style="color: maroon;">Bishop Martinez Hall</h4>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum voluptates quisquam, dignissimos assumenda eveniet obcaecati accusamus quia ducimus rem distinctio, autem voluptatum nam reiciendis. Id asperiores earum illo similique ratione.</p>
                        <a href="#" class="details-btn my-2" role="button">Read More</a>
                    </div>
                </div>
            </div>
            <div class="row text-center my-5 d-flex justify-content-evenly">
                <div class="card col-md-6 mt-5" style="width: 40rem; padding: 0; border: none; box-shadow: rgba(149, 157, 165, 0.9) 0px 8px 24px;">
                    <img class="card-img-top" src="img/library.jpg" alt="Card image cap" width="300" height="300">
                    <div class="card-body">
                        <h4 class="card-title" style="color: maroon;">Library</h4>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum voluptates quisquam, dignissimos assumenda eveniet obcaecati accusamus quia ducimus rem distinctio, autem voluptatum nam reiciendis. Id asperiores earum illo similique ratione.</p>
                        <a href="#" class="details-btn my-2" role="button">Read More</a>
                    </div>
                </div>
                <div class="card col-md-6 mt-5" style="width: 40rem; padding: 0; border: none; box-shadow: rgba(149, 157, 165, 0.9) 0px 8px 24px;">
                    <img class="card-img-top" src="img/playground.jpg" alt="Card image cap" width="300" height="300">
                    <div class="card-body">
                        <h4 class="card-title" style="color: maroon;">SAC Playground</h4>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum voluptates quisquam, dignissimos assumenda eveniet obcaecati accusamus quia ducimus rem distinctio, autem voluptatum nam reiciendis. Id asperiores earum illo similique ratione.</p>
                        <a href="#" class="details-btn my-2" role="button">Read More</a>
                    </div>
                </div>
            </div>
            <div class="row text-center my-5 d-flex justify-content-evenly">
                <div class="card col-md-6 mt-5" style="width: 40rem; padding: 0; border: none; box-shadow: rgba(149, 157, 165, 0.9) 0px 8px 24px;">
                    <img class="card-img-top" src="img/avr.jpg" alt="Card image cap" width="300" height="300">
                    <div class="card-body">
                        <h4 class="card-title" style="color: maroon;">Audio Visual Room</h4>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum voluptates quisquam, dignissimos assumenda eveniet obcaecati accusamus quia ducimus rem distinctio, autem voluptatum nam reiciendis. Id asperiores earum illo similique ratione.</p>
                        <a href="#" class="details-btn my-2" role="button">Read More</a>
                    </div>
                </div>
                <div class="card col-md-6 mt-5" style="width: 40rem; padding: 0; border: none; box-shadow: rgba(149, 157, 165, 0.9) 0px 8px 24px;">
                    <img class="card-img-top" src="img/rooms.jpg" alt="Card image cap" width="300" height="300">
                    <div class="card-body">
                        <h4 class="card-title" style="color: maroon;">Rooms</h4>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum voluptates quisquam, dignissimos assumenda eveniet obcaecati accusamus quia ducimus rem distinctio, autem voluptatum nam reiciendis. Id asperiores earum illo similique ratione.</p>
                        <a href="#" class="details-btn my-2" role="button">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <main>
        <div class="container-fluid" style="background-color: maroon; height: 13rem;">
            <div class="container">
                <footer class="pt-1 my-3">
                    <ul class="nav justify-content-center pb-3 mb-3 my-4" style="border-bottom: 2px solid #ffcc66;">
                        <li class="nav-item"><a href="#home" class="nav-link link">Home</a></li>
                        <li class="nav-item"><a href="#venue-content" class="nav-link link">Venue</a></li>
                        <li class="nav-item"><a href="#about" class="nav-link link">About</a></li>
                        <li class="nav-item"><a href="#contact" class="nav-link link">Contact</a></li>
                    </ul>
                        <div class="container-fluid">
                            <p class="text-center foot" ><img src="img/new sac logo.png" alt="" width="50" height="50"> &copy; 2024 St. Anthony's College. ~ Designed by Dela Torre&trade; </p>
                        </div>
                </footer>
            </div>
        </div>
    </main>
    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</body>
</html>