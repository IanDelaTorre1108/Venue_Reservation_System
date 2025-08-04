
<?php
    include('php/database.php');
    session_start();

    if (isset($_SESSION['alert'])) {
        echo "<script>alert('" . $_SESSION['alert'] . "');</script>"; 
        unset($_SESSION['alert']); 
    }
?>
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
    <title>ReservEase</title>
    <style>
        .img-card {
            border: .50rem double maroon;
        }
    </style>
</head>
<body>
    <main id="home">
        <nav class="navbar navbar-expand-md sticky-top">
            <div class="container-fluid">
                <a class="navbar-brand me-auto" href=""><img src="img/new sac logo.png" alt="" width="50" height="50"></a>
            <div class="offcanvas offcanvas-end mx-2" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Navigation Bar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body" id="navbarSupportedContent">
                    <ul class="navbar-nav d-flex justify-content-end flex-grow-1 me-4">
                        <li class="nav-item active"><a class="nav-link link" href="home.php" style="border-bottom: 2px solid gold;"><i class="fa-solid fa-house"></i> Home</a></li>
                        <li class="nav-item"><a class="nav-link link" href="venue.php"><i class="fa-solid fa-location-dot"></i> Venue</a></li>
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
        <main>
            <!-- RESERVATION FORM -->
            <div class="modal fade p-2 mt-5" id="reservationModal" tabindex="-1" aria-labelledby="reservationModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
                <div class="modal-dialog modal-dialog-centered Reservation">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: maroon; color: #ffcc66;">
                            <h5 class="modal-title" id="reservationModalLabel" style="text-align: center; width: 100%;">RESERVATION FORM</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="reservationform" action="php/reservation.php" method="POST">
                                <!-- User & Event Information -->
                                <h5 class="text-center py-2" style="color: maroon; background-color: #ffcc66;">User & Event Information</h5>
                                <div class="row my-3">
                                        <label class="mb-1" for="">Full Name <span style="color: red;">*</span></label>
                                    <div class="col">
                                        <input type="text" name="fname" class="form-control" placeholder="First Name" required>
                                    </div>
                                    <div class="col">
                                        <input type="text" name="lname" class="form-control" placeholder="Last Name" required>
                                    </div>
                                </div>
                                <div class="my-3">
                                    <label class="mb-1" for="">Email <span style="color: red;">*</span></label>
                                    <input type="email" name="email" class="form-control" required>
                                </div>
                                <div class="my-3">
                                    <label class="mb-1" for="">Department <span style="color: red;">*</span></label>
                                    <select name="department" id="department" class="form-select" required>
                                        <option value="" selected disabled>Select a department</option>
                                        <option value="Guest">Guest</option>
                                        <option value="ETD">ETD</option>
                                        <option value="DTE">DTE</option>
                                        <option value="TED">TED</option>
                                        <option value="MARED">MARED</option>
                                        <option value="ND">ND</option>
                                        <option value="LAD">LAD</option>
                                        <option value="CJED">CJED</option>
                                        <option value="BED">BED</option>
                                    </select>
                                </div>
                                <div class="my-3">
                                    <label class="mb-1" for="venue">Venue <span style="color: red;">*</span></label>
                                    <select name="venue" id="venue" class="form-select" onchange="toggleRoomType(); calculatePayment();" required>
                                        <option value="" selected disabled>Select a venue</option>
                                        <option value="Bishop Dewit Hall">Bishop Dewit Hall</option>
                                        <option value="Bishop Martinez Hall">Bishop Martinez Hall</option>
                                        <option value="Audio Visual Room">Audio Visual Room</option>
                                        <option value="SAC Playground">SAC Playground</option>
                                        <option value="Rooms">Rooms</option>
                                    </select>
                                </div>
                                <div id="roomType" style="display: none;">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="roomType" id="academic" value="academic" onclick="calculatePayment()">
                                        <label class="form-check-label" for="academic">Academic</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="roomType" id="nonAcademic" value="nonAcademic" onclick="calculatePayment()">
                                        <label class="form-check-label" for="nonAcademic">Non-Academic</label>
                                    </div>
                                </div>
                                <div class="my-3">
                                    <label class="mb-1" for="">Activity <span style="color: red;">*</span></label>
                                    <input type="text" name="activity" class="form-control" required>
                                </div>
                                <div class="my-3">
                                    <label class="mb-1" for="">Time Start <span style="color: red;">*</span></label>
                                    <input type="time" id="timestart" name="timestart" class="form-control" required>
                                </div>
                                <div class="my-3">
                                    <label class="mb-1" for="">Time End <span style="color: red;">*</span></label>
                                    <input type="time" id="timeend" name="timeend" class="form-control" required>
                                </div>
                                <div>
                                    <label class="mb-1" for="">Reservation  Date <span style="color: red;">*</span></label>
                                    <input type="date" name="date" id="date" class="form-control" required>
                                </div>
                                <!-- Equipments -->
                                <div class="mt-3">
                                    <h5 class="text-center my-3 py-2" style="color: maroon; background-color: #ffcc66;">Equipments</h5>
                                    <div class="row mt-4">
                                        <div class="col-md-3">
                                            <h6>Equipment</h6>
                                        </div>
                                        <div class="col-md-3">
                                            <h6>Quantity</h6>
                                        </div>
                                    </div>
                                    <div class="row my-2">
                                        <div class="col-md-3 d-flex align-items-center">
                                            <input type="checkbox" name="elight" id="" value="true">
                                            <label class="px-2" for="">Light</label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="number" name="qlight" class="form-control" >
                                        </div>
                                    </div>
                                    <div class="row my-2">
                                        <div class="col-md-3 d-flex align-items-center">
                                            <input type="checkbox" name="eelectricfan" id="" >
                                            <label class="px-2" for="">Electric Fan</label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="number" name="qelectricfan" class="form-control" >
                                        </div>
                                    </div>
                                    <div class="row my-2">
                                        <div class="col-md-3 d-flex align-items-center">
                                            <input type="checkbox" name="echair" id="">
                                            <label class="px-2" for="">Chair</label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="number" name="qchair" class="form-control" >
                                        </div>
                                    </div>
                                    <div class="row my-2">
                                        <div class="col-md-3 d-flex align-items-center">
                                            <input type="checkbox" name="etable" id="">
                                            <label class="px-2" for="">Table</label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="number" name="qtable" class="form-control"  >
                                        </div>
                                    </div>
                                    <div class="row my-2">
                                        <div class="col-md-3 d-flex align-items-center">
                                            <input type="checkbox" name="ebackdrop" id="">
                                            <label class="px-2" for="">Backdrop</label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="number" name="qbackdrop" class="form-control" >
                                        </div>
                                    </div>
                                    <div class="row my-2">
                                        <div class="col-md-3 d-flex align-items-center">
                                            <input type="checkbox" name="evan" id="">
                                            <label class="px-2" for="">Van</label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="number" name="qvan" class="form-control " >
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <!-- Services -->
                                    <h5 class="text-center py-2" style="color: maroon; background-color: #ffcc66;">Services</h5>
                                    <div class="row">
                                        <div class="col-md-12 my-2">
                                            <input type="checkbox" name="soperator" id="">
                                            <label class="px-2" for="">Operator</label>
                                        </div>
                                        <div class="col-md-12 my-2">
                                            <input type="checkbox" name="ssoundsystem" id="">
                                            <label class="px-2" for="">Sound System</label>
                                        </div>
                                        <div class="col-md-12 my-2">
                                            <input type="checkbox" name="sphysicalarrangment" id="" >
                                            <label class="px-2" for="">Physical Arrangement</label>
                                        </div>
                                    </div>
                                </div>
                                <h5 class="my-3">Amount to pay:</h5>
                                <div class="my-3 form-group row">
                                    <label class="col-md-2 col-form-label" for="payment">Payment (PHP):</label>
                                    <div class="col-md-10">
                                        <input type="number" id="payment" name="payment" class="form-control" disabled>
                                    </div>
                                </div>
                                <div class="text-center my-4">
                                    <button class="btn btn-success mx-2 my-1" type="submit" value="Submit" style="padding: 5px 5rem;" onclick="return confirm('Confirm Reservation? ');">Submit</button>
                                    <button class="btn btn-secondary mx-2 my-1" type="reset" style="padding: 5px 5.25rem;">Clear</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--HOME CONTENT-->
            <div id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="img1">
    
                        </div>
                    <div class="container">
                            <div class="carousel-caption text-start">
                                <h1>Book Your Moment</h1>
                                <p>Where Every Reservation Crafts a Story.</p>
                                <p><a class="btn btn-lg "style="background-color: maroon; color: #ffcc66" href="" data-bs-toggle="modal" data-bs-target="#reservationModal">Book Reservation Now</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="img2">
    
                        </div>
                        <div class="container">
                        <div class="carousel-caption">
                            <h1>Seize the Date</h1>
                            <p>Your Event’s Destiny Awaits with a Single Reservation.</p>
                            <p><a class="btn btn-lg" style="background-color: maroon; color: #ffcc66;" href="#" data-bs-toggle="modal" data-bs-target="#reservationModal">Sign up today</a></p>
                        </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="img3">
    
                        </div>  
                    <div class="container">
                        <div class="carousel-caption text-end">
                            <h1>Craft Your Celebration</h1>
                            <p>A Reservation is the Blueprint of Unforgettable Moments.</p>
                            <p><a class="btn btn-lg "style="background-color: maroon; color: #ffcc66;" href="#" data-bs-toggle="modal" data-bs-target="#reservationModal">Check Venue</a></p>
                        </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev"type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </main>
    
        <div class="mt-5">
            <div class="container-fluid pb-5" style="border-bottom: 3px solid maroon; width: 80%;">
                <h1 class="text-center mb-5" style="color: maroon;">How It Works?</h1>
                <div class="row text-center">
                    <div class="col-md-4">
                        <i id="discoverIcon" class="fa-solid fa-magnifying-glass"></i>
                        <h3 class="title">DISCOVER</h3>
                        <p class="content">Browse Venue to create your shortlist</p>
                    </div>
                    <div class="col-md-4">
                        <i id="shortlistIcon" class="fa-solid fa-table-list"></i>
                        <h3 class="title">SHORTLIST</h3>
                        <p class="content">Curate Your Favorites and Compare to Find the Perfect Venue</p>
                    </div>
                    <div class="col-md-4">
                        <i id="bookIcon" class="fa-solid fa-calendar-check"></i>
                        <h3 class="title">BOOK</h3>
                        <p class="content">Book Seamlessly with our System</p>
                    </div>
                </div>
            </div>
        </div>
        <main class="venue container-fluid">
            <div class="container-fluid con">
                <div class="text-center">
                    <h1 class=" nav-title">DISCOVER</h1>
                    <h4><span style="font-size: 3rem; color: maroon">“</span>Discover the perfect venue, create unforgettable <span style="font-size: 3rem; color: maroon">”</span></h4>
                </div>
                <div class="card-container mt-5 d-flex">
                    <article class="card-article">
                        <img src="img/BDH.jpg" alt="image1" class="img-card img-fluid">
                        <div class="card-data">
                            <h4 class="card-title">Bishop Dewit Hall</h4>
                            <span class="card-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. .</span><br>
                            <a href="venue.php" class="card-button">View Details</a>
                        </div>
                    </article>
                    <article class="card-article">
                        <img src="img/BMH.jpg" alt="image1" class="img-card img-fluid">
                        <div class="card-data">
                            <h4 class="card-title">Bishop Martinez Hall</h4>
                            <span class="card-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. </span><br>
                            <a href="venue.php" class="card-button">View Details</a>
                        </div>
                    </article>
                    <article class="card-article">
                            <img src="img/playground.jpg" alt="image1" class="img-card img-fluid">
                        <div class="card-data">
                            <h4 class="card-title">SAC Playground</h4>
                            <span class="card-description">Lorem ipsum dolor sit amet consectetur adipisicing elit.</span><br>
                            <a href="venue.php" class="card-button">View Details</a>
                        </div>
                    </article>
                </div>
                <div class="card-container mt-5 d-flex">
                    <article class="card-article">
                        <img src="img/avr.jpg" alt="image1" class="img-card img-fluid">
                        <div class="card-data">
                            <h4 class="card-title">Audio Visual Room</h4>
                            <span class="card-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. .</span><br>
                            <a href="venue.php" class="card-button">View Details</a>
                        </div>
                    </article>
                    <article class="card-article">
                        <img src="img/library.jpg" alt="image1" class="img-card img-fluid">
                        <div class="card-data">
                            <h4 class="card-title">Library</h4>
                            <span class="card-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. </span><br>
                            <a href="venue.php" class="card-button">View Details</a>
                        </div>
                    </article>
                    <article class="card-article">
                            <img src="img/rooms.jpg" alt="image1" class="img-card img-fluid">
                        <div class="card-data">
                            <h4 class="card-title">Room</h4>
                            <span class="card-description">Lorem ipsum dolor sit amet consectetur adipisicing elit.</span><br>
                            <a href="venue.php" class="card-button">View Details</a>
                        </div>
                    </article>
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
    </main>
    
    <!-- <script>
        $(document).ready(function(){
            $('#timestart').timepicker({ 'timeFormat': 'h:i A' });
            $('#timeend').timepicker({ 'timeFormat': 'h:i A' });
        }); 
    </script> -->
    <script>
        function calculatePayment() {
            var department = document.getElementById("department").value;
            var venue = document.getElementById("venue").value;
            var paymentInput = document.getElementById("payment");
        
            if (department === "Guest") {
                switch (venue) {
                    case "Bishop Dewit Hall":
                        paymentInput.value = 400;
                        break;
                    case "Bishop Martinez Hall":
                        paymentInput.value = 300;
                        break;
                    case "Audio Visual Room":
                        paymentInput.value = 300;
                        break;
                    case "Rooms":
                        var roomType = document.querySelector('input[name="roomType"]:checked').value;
                        if (roomType === "academic") {
                            paymentInput.value = 1800;
                        } else if (roomType === "nonAcademic") {
                            paymentInput.value = 600;
                        } else {
                            paymentInput.value = "";
                        }
                        break;
                    case "SAC Playground":
                        paymentInput.value = 0;
                        break;
                    default:
                        paymentInput.value = "";
                }
            } else {
                paymentInput.value = "";
            }
        }
        
        function toggleRoomType() {
            var venue = document.getElementById("venue").value;
            var roomTypeDiv = document.getElementById("roomType");
        
            if (venue === "Rooms") {
                roomTypeDiv.style.display = "block";
            } else {
                roomTypeDiv.style.display = "none";
            }
        }
    </script>
    <!-- <script>
    function showAlert() {
        alert('Confirm Reservation?');
        document.getElementById('myForm').style.display = 'none';
        return true;
    }
    </script> -->
    <script>
        window.onload = function() {
            var checkboxes = document.querySelectorAll("input[type=checkbox]");
            var quantityInputs = document.querySelectorAll("input[type=number]");
    
            for (let i = 0; i < checkboxes.length; i++) {
                checkboxes[i].addEventListener('change', function() {
                    if (this.checked) {
                        quantityInputs[i].disabled = false;
                    } else {
                        quantityInputs[i].disabled = true;
                        quantityInputs[i].value = '';
                    }
                });
            }
        }
    </script>
    <script>
        function togglePasswordVisibility() {
        var passwordInput = document.getElementById('adminPassword');
        var passwordIcon = document.getElementById('showpass');

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            passwordIcon.classList.remove('fa-eye-slash');
            passwordIcon.classList.add('fa-eye');
        } else {
            passwordInput.type = "password";
            passwordIcon.classList.remove('fa-eye');
            passwordIcon.classList.add('fa-eye-slash');
        }
    }
    </script>
    <script>
        window.onload = function(){
			var today = new Date();
			var dd = String(today.getDate()).padStart(2, '0');
			var mm = String(today.getMonth() + 1).padStart(2, '0');
			var yyyy = today.getFullYear();

			today = yyyy + '-' + mm + '-' + dd;
			document.getElementById("date").setAttribute("min", today);
		};

    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</body>
</html>