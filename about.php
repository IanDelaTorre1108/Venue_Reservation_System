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
    <title>About</title>
    <style>
        @keyframes fadeIn {
        0% {opacity: 0;}
        100% {opacity: 1;}
        }

        #about {
        animation: fadeIn 2s;
        }
    </style>
</head>
<body>
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
                    <li class="nav-item"><a class="nav-link link" href="about.php" style="border-bottom: 2px solid gold;"><i class="fa-solid fa-user-group"></i> About Us</a></li>
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
    <!--ABOUT US CONTENT-->
    <main id="about">
        <div class="container-fluid">
            <div class="row text-center">
                <h1 class="text-center my-2 nav-title">ABOUT US</h1>
                <div class="col-md-4 mt-3" style="height: 35rem;">
                    <img class="img-fluid about-img" src="img/sap.jpg" alt="SAC Image" style="border: .60rem double gold;">
                </div>
                <div class="col-md-8 mt-3">
                    <p style="text-align: justify; font-size: 18px;">St. Anthony's College President, The President of SAC is REV. FR. Edione R. Febrero, JCL. He concurrently heads the diocesan Social Action Center. He is also the manager of DYKA and Spirit FM, and is the national president of the Catholic Media Network. He is the Sole Canon lawyer of the diocese and is the Judicial Vicar of the Dioces of San Jose de Antique. Rev. Fr. Febrero is also reserve Captian of the Philippine Army, and a singer. <br> <br> Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptate quaerat cum assumenda sequi incidunt cumque sint facere eos exercitationem corrupti facilis maxime dolorem harum alias est dolores, delectus reprehenderit qui?Lorem ipsum dolor sit amet consectetur adipisicing elit. <br><br> Laudantium blanditiis quam, pariatur nihil illo dignissimos nesciunt voluptate dolores, aperiam nulla voluptatibus beatae eligendi sunt eum alias. Fugit modi facilis rerum. <br> <br> Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium eos officiis, dolorem quos accusamus voluptate repellendus atque assumenda suscipit nam quam fugiat unde possimus, ullam beatae reprehenderit sunt distinctio quaerat? Lorem ipsum dolor sit amet, consectetur adipisicing elit. <br><br> Consequatur ratione porro recusandae autem, harum blanditiis magni impedit sapiente molestias iure aperiam, beatae temporibus. Dolores ab doloremque natus, quam sed sint!</p>
                </div>
            </div>
        </div>
    </main>
    <main>
        <!-- <div class="px-3 d-flex justify-content-end">
            <a href="#home" style="text-decoration: none;"><i class="fa-solid fa-arrow-up d-flex justify-content-center align-items-center" style="font-size: 1.75rem; color: #ffcc66; background-color: maroon; padding: .75rem; border-radius: 50%; height: 3.5rem; width: 3.5rem;"></i></a>
        </div> -->
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