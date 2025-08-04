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
    <title>Contact</title>
</head>
<body class="img" style="margin: 0; padding: 0;">
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
                    <li class="nav-item"><a class="nav-link link" href="venue.php"><i class="fa-solid fa-location-dot"></i> Venue</a></li>
                    <li class="nav-item"><a class="nav-link link" href="about.php"><i class="fa-solid fa-user-group"></i> About Us</a></li>
                    <li class="nav-item"><a class="nav-link link" href="contact.php" style="border-bottom: 2px solid gold;"><i class="fa-solid fa-address-book"></i> Contact</a></li>
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
    <!--CONTACT CONTENT-->
    <main id="contact">
        <div class="container-fluid" style="padding-bottom: .25rem;">
            <div class="row my-3">
                <h1 class="text-center my-5" style="color: white;">CONTACT US</h1>
                <div class="col-md-6 my-5" style="color: white">
                    <form action="" style="background-color: rgba(128,0,0,0.6); padding: 1rem; border-radius: 10px;"  >
                        <h4 class="mb-4">Feel free to message us!</h4>
                        <div class="my-2">
                            <label for="" style="font-size: 18px;"><strong>Name:</strong></label>
                            <input type="text" class="form-control" required>
                        </div>
                        <div class="my-2">
                            <label for="" style="font-size: 18px;"><strong>Email:</strong></label>
                            <input type="text" class="form-control" required>
                        </div>
                        <div class="my-2">
                            <label for="" style="font-size: 18px;"><strong>Message:</strong></label>
                            <textarea class="form-control" name="" id="" cols="30" rows="10" style="height: 15rem;"></textarea>
                        </div>
                        <div class="text-center my-2">
                            <button type="submit" style="text-decoration: none; padding: .50rem 7rem; color: maroon; border-radius: 10px; background-color: #ffcc66; margin: 17px 0; font-weight: 500; font-size: 18px;">SUBMIT</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-6" style="color: maroon;">
                    <div class="my-5">
                    <h3 style="color: white">Where to find us?</h3>
                        <p style="font-size: 18px; color: white;"><i class="fa-solid fa-location-dot"></i> Brgy. San Angel, San Jose de Buenavista, Philippines, 5700</p>
                        <div class="map-container embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4558.078340558558!2d121.9499888449978!3d10.738764191631489!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33ae3835763704f5%3A0x1738551452527d3b!2sSt.%20Anthony's%20College!5e0!3m2!1sen!2sph!4v1716792066416!5m2!1sen!2sph" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" width="100%" height="505"></iframe>
                                
                        </div>
                        
                    </div>
                </div>
                <div class="container-fluid mb-5">
                    <div class="row" style="color: maroon;">
                        <div class="col-md-4 m-5">
                            <div class="info-card" style="height: 12rem;">
                                <h3>Opening Hours:</h3>
                                <p>Monday-Friday: 8:00 AM - 4:30 PM <br> Saturday: 8:00 AM - 11:30 AM <br> Sunday: Closed</p>
                            </div>
                        </div>
                        <div class="col-md-4 d-flex flex-column m-5">
                            <div class="info-card">
                                <h3>Contact Info:</h3>
                                <a class="contact-link my-1" href=""><i class="fa-solid fa-phone"></i><span>(036) 540 9236</span></a>
                                <a class="contact-link my-1" href=""><i class="fa-solid fa-envelope"></i><span>info@sac.edu.ph</span></a>
                                <a class="contact-link my-1" href=""><i class="fa-solid fa-globe"></i><span>https://www.sac.edu.ph/</span></a>
                                <a class="contact-link my-1" href=""><i class="fa-brands fa-facebook"></i><span>St. Anthony College</span></a>
                            </div>
                        </div>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</body>
</html>