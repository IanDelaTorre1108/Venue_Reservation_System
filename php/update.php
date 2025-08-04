<?php
include('database.php');

$errormessage = '';
$successmessage = '';

$id = "";
$fname = "";
$lname = "";
$email = "";
$department = "";
$payment = "";

$activity = "";
$venue = "";
$timestart = "";
$timeend = "";
$date = "";

$elight = "";
$qlight = "";
$eelectricfan = "";
$qelectricfan = "";
$echair = "";
$qchair = "";
$etable = "";
$qtable = "";
$ebackdrop = "";
$qbackdrop = "";
$evan = "";
$qvan = "";
$soperator = "";
$ssoundsystem = "";
$sphysicalarrangment = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $id = $_GET["id"];

    // Fetch user table
    $sql_user = "SELECT FirstName, LastName, Email, Department, Payment FROM user_tbl WHERE userID = ?";
    $stmt_user = $con->prepare($sql_user);
    $stmt_user->bind_param("i", $id);
    $stmt_user->execute();
    $result_user = $stmt_user->get_result();
    $row_user = $result_user->fetch_assoc();

    if ($row_user) {
        $fname = $row_user['FirstName'];
        $lname = $row_user['LastName'];
        $email = $row_user['Email'];
        $department = $row_user['Department'];
        $payment = $row_user['Payment'];
    }

    // Fetch activity table
    $sql_activity = "SELECT Activity, Venue, TimeStart, TimeEnd, Date FROM activity_tbl WHERE ActivityID = ?";
    $stmt_activity = $con->prepare($sql_activity);
    $stmt_activity->bind_param("i", $id);
    $stmt_activity->execute();
    $result_activity = $stmt_activity->get_result();
    $row_activity = $result_activity->fetch_assoc();

    if ($row_activity) {
        $activity = $row_activity['Activity'];
        $venue = $row_activity['Venue'];
        $timestart = date('h:i', strtotime($row_activity['TimeStart']));
        $timeend = date('h:i', strtotime($row_activity['TimeEnd']));
        $date = $row_activity['Date'];
    }
    // Fetch utility table
    $sql_utility = "SELECT ELight, QLight, EElectricFan, QElectricFan, EChair, QChair, ETable, QTable, EBackdrop, QBackdrop, EVan, QVan, SOperator, SSoundSystem, SPhysicalArrangment FROM utility_tbl WHERE UtilityID = ?";
    $stmt_utility = $con->prepare($sql_utility);
    $stmt_utility->bind_param("i", $id);
    $stmt_utility->execute();
    $result_utility = $stmt_utility->get_result();
    $row_utility = $result_utility->fetch_assoc();

    if ($row_utility) {
        $elight = $row_utility['ELight'];
        $qlight = $row_utility['QLight'];
        
        $eelectricfan = $row_utility['EElectricFan'];
        $qelectricfan = $row_utility['QElectricFan'];

        $echair = $row_utility['EChair'];
        $qchair = $row_utility['QChair'];

        $etable = $row_utility['ETable'];
        $qtable = $row_utility['QTable'];

        $ebackdrop = $row_utility['EBackdrop'];
        $qbackdrop = $row_utility['QBackdrop'];

        $evan = $row_utility['EVan'];
        $qvan = $row_utility['QVan'];

        $soperator = $row_utility['SOperator'];
        $ssoundsystem = $row_utility['SSoundSystem'];
        $sphysicalarrangment = $row_utility['SPhysicalArrangment'];
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {

    // Retrieve form data
    $id = $_POST['id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $department = $_POST['department'];
    $payment = isset($_POST['payment']) ? $_POST['payment'] : "";
    $activity = $_POST['activity'];
    $venue = $_POST['venue'];
    $timestart = $_POST['timestart'];
    $timeend = $_POST['timeend'];
    $date = $_POST['date'];

    // Update user information
    $sql_user_update = "UPDATE user_tbl SET FirstName = ?, LastName = ?, Email = ?, Department = ?, Payment = ? WHERE userID = ?";
    $stmt_user_update = $con->prepare($sql_user_update);
    $stmt_user_update->bind_param("sssssi", $fname, $lname, $email, $department, $payment, $id);
    $result_user_update = $stmt_user_update->execute();

    // Update activity information
    $sql_activity_update = "UPDATE activity_tbl SET Activity = ?, Venue = ?, TimeStart = ?, TimeEnd = ?, Date = ? WHERE ActivityID = ?";
    $stmt_activity_update = $con->prepare($sql_activity_update);
    $stmt_activity_update->bind_param("sssssi", $activity, $venue, $timestart, $timeend, $date, $id);
    $result_activity_update = $stmt_activity_update->execute();

    // Retrieve utility data from form
    $elight = isset($_POST['elight']) ? 1 : 0;
    $qlight = isset($_POST['qlight']) ? $_POST['qlight'] : 0;
    $eelectricfan = isset($_POST['eelectricfan']) ? 1 : 0;
    $qelectricfan = isset($_POST['qelectricfan']) ? $_POST['qelectricfan'] : 0;
    $echair = isset($_POST['echair']) ? 1 : 0;
    $qchair = isset($_POST['qchair']) ? $_POST['qchair'] : 0;
    $etable = isset($_POST['etable']) ? 1 : 0;
    $qtable = isset($_POST['qtable']) ? $_POST['qtable'] : 0;
    $ebackdrop = isset($_POST['ebackdrop']) ? 1 : 0;
    $qbackdrop = isset($_POST['qbackdrop']) ? $_POST['qbackdrop'] : 0;
    $evan = isset($_POST['evan']) ? 1 : 0;
    $qvan = isset($_POST['qvan']) ? $_POST['qvan'] : 0;
    $soperator = isset($_POST['soperator']) ? 1 : 0;
    $ssoundsystem = isset($_POST['ssoundsystem']) ? 1 : 0;
    $sphysicalarrangment = isset($_POST['sphysicalarrangment']) ? 1 : 0;

    // Update utility information
    $sql_utility_update = "UPDATE utility_tbl SET ELight = ?, QLight = ?, EElectricFan = ?, QElectricFan = ?, EChair = ?, QChair = ?, ETable = ?, QTable = ?, EBackdrop = ?, QBackdrop = ?, EVan = ?, QVan = ?, SOperator = ?, SSoundSystem = ?, SPhysicalArrangment = ? WHERE UtilityID = ?";
    $stmt_utility_update = $con->prepare($sql_utility_update);
    $stmt_utility_update->bind_param("sisisisisisisssi", $elight, $qlight, $eelectricfan, $qelectricfan, $echair, $qchair, $etable, $qtable, $ebackdrop, $qbackdrop, $evan, $qvan, $soperator, $ssoundsystem, $sphysicalarrangment, $id);
    $result_utility_update = $stmt_utility_update->execute();

    // Check if all updates were successful
    if ($result_user_update && $result_activity_update && $result_utility_update) {
        $successmessage = "Data updated successfully.";
    } else {
        $errormessage = "Error updating data.";
    }

    // Close prepared statements
    $stmt_user_update->close();
    $stmt_activity_update->close();
    $stmt_utility_update->close();
    echo "<script>alert('Data Updated successfully');</script>";
    header("Location:../admindashboard.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/admindashboard.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css"/>
    <title></title>
    <style>
    </style>
</head>
<body>
    <div class="update-form" id="update-form" style="width: 100%;">
					<div class="tabular-wrapper my-4">
                    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" style = "margin: 1rem 15rem; box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px; padding: 1rem; border-radius: .50rem" >
                                <!-- User & Event Information -->
								<input type="hidden" name="id" value="<?php echo $id; ?>">
                                <h5 class="text-center py-2" style="color: maroon; background-color: #ffcc66;">User & Event Information</h5>
                                <div class="row my-3">
                                        <label class="mb-1" for="">Full Name <span style="color: red;">*</span></label>
                                    <div class="col">
                                        <input type="text" id="fname" name="fname" value="<?php echo $fname; ?>" class="form-control" placeholder="First Name" required>
                                    </div>
                                    <div class="col">
                                        <input type="text" id="lname" name="lname" value="<?php echo $lname; ?>" class="form-control" placeholder="Last Name" required>
                                    </div>
                                </div>      
                                <div class="my-3">
                                    <label class="mb-1" for="">Email <span style="color: red;">*</span></label>
                                    <input type="email" id="email" name="email" value="<?php echo $email; ?>" class="form-control" required>
                                </div>
                                <div class="my-3">
                                    <label class="mb-1" for="">Department <span style="color: red;">*</span></label>
                                    <select name="department" id="department" class="form-select" required>
                                        <option value="" selected disabled>Select a department</option>
                                        <option value="Guest" <?php echo $department == 'Guest'? 'selected' : ''; ?>>Guest</option>
                                        <option value="ETD" <?php echo $department == 'ETD'? 'selected' : ''; ?>>ETD</option>
                                        <option value="DTE" <?php echo $department == 'DTE'? 'selected' : ''; ?>>DTE</option>
                                        <option value="TED" <?php echo $department == 'TED'? 'selected' : ''; ?>>TED</option>
                                        <option value="MARED" <?php echo $department == 'MARED'? 'selected' : ''; ?>>MARED</option>
                                        <option value="ND" <?php echo $department == 'ND'? 'selected' : ''; ?>>ND</option>
                                        <option value="LAD" <?php echo $department == 'LAD'? 'selected' : ''; ?>>LAD</option>
                                        <option value="CJED" <?php echo $department == 'CJED'? 'selected' : ''; ?>>CJED</option>
                                        <option value="BED" <?php echo $department == 'BED'? 'selected' : ''; ?>>BED</option>
                                    </select>
                                </div>
                                <div class="my-3">
                                    <label class="mb-1" for="venue">Venue <span style="color: red;">*</span></label>
                                    <select name="venue" id="venue" class="form-select" onchange="toggleRoomType(); calculatePayment();" required>
                                        <option value="" selected disabled>Select a venue</option>
                                        <option value="Bishop Dewit Hall" <?php echo $venue == 'Bishop Dewit Hall'? 'selected' : ''; ?>>Bishop Dewit Hall</option>
                                        <option value="Bishop Martinez Hall" <?php echo $venue == 'Bishop Martinez Hall'? 'selected' : ''; ?>>Bishop Martinez Hall</option>
                                        <option value="Audio Visual Room" <?php echo $venue == 'Audio Visual Room'? 'selected' : ''; ?>>Audio Visual Room</option>
                                        <option value="SAC Playground" <?php echo $venue == 'SAC Playground'? 'selected' : ''; ?>>SAC Playground</option>
                                        <option value="Rooms" <?php echo $venue == 'Rooms'? 'selected' : ''; ?>>Rooms</option>
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
                                    <input type="text" id="activity" value="<?php echo $activity; ?>" name="activity" class="form-control" required>
                                </div>
                                <div class="my-3">
                                    <label class="mb-1" for="">Time Start <span style="color: red;">*</span></label>
                                    <input type="time" id="timestart" value="<?php echo $timestart; ?>" name="timestart" class="form-control" required>
                                </div>
                                <div class="my-3">
                                    <label class="mb-1" for="">Time End <span style="color: red;">*</span></label>
                                    <input type="time" id="timeend" value="<?php echo $timeend; ?>" name="timeend" class="form-control" required>
                                </div>
                                <div>
                                    <label class="mb-1" for="">Reservation Date <span style="color: red;">*</span></label>
                                    <input type="date" id="date" value="<?php echo $date; ?>" name="date" class="form-control" required>
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
                                            <input type="checkbox" name="elight" id="elight" <?php echo $elight == 1 ? 'checked' : ''; ?>>
                                            <label class="px-2" for="">Light</label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="number" id="qlight" value="<?php echo $qlight; ?>" name="qlight" class="form-control" >
                                        </div>
                                    </div>
                                    <div class="row my-2">
                                        <div class="col-md-3 d-flex align-items-center">
                                            <input type="checkbox" name="eelectricfan" id="eelectricfan" <?php echo $eelectricfan == 1 ? 'checked' : ''; ?>>
                                            <label class="px-2" for="">Electric Fan</label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="number" id="qelectricfan" value="<?php echo $qelectricfan; ?>" name="qelectricfan" class="form-control" >
                                        </div>
                                    </div>
                                    <div class="row my-2">
                                        <div class="col-md-3 d-flex align-items-center">
                                            <input type="checkbox" name="echair" id="echair" <?php echo $echair == 1 ? 'checked' : ''; ?>>
                                            <label class="px-2" for="">Chair</label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="number" id="qchair" value="<?php echo $qchair; ?>" name="qchair" class="form-control" >
                                        </div>
                                    </div>
                                    <div class="row my-2">
                                        <div class="col-md-3 d-flex align-items-center">
                                            <input type="checkbox" name="etable" id="etable" <?php echo $etable == 1 ? 'checked' : ''; ?>>
                                            <label class="px-2" for="">Table</label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="number" id="qtable" value="<?php echo $qtable; ?>" name="qtable" class="form-control"  >
                                        </div>
                                    </div>
                                    <div class="row my-2">
                                        <div class="col-md-3 d-flex align-items-center">
                                            <input type="checkbox" name="ebackdrop" id="ebackdrop" <?php echo $ebackdrop == 1 ? 'checked' : ''; ?>>
                                            <label class="px-2" for="">Backdrop</label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="number" id="qbackdrop" value="<?php echo $qbackdrop; ?>" name="qbackdrop" class="form-control" >
                                        </div>
                                    </div>
                                    <div class="row my-2">
                                        <div class="col-md-3 d-flex align-items-center">
                                            <input type="checkbox" name="evan" id="evan" <?php echo $evan == 1 ? 'checked' : ''; ?>>
                                            <label class="px-2" for="">Van</label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="number" id="qvan" value="<?php echo $qvan; ?>" name="qvan" class="form-control " >
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <!-- Services -->
                                    <h5 class="text-center py-2" style="color: maroon; background-color: #ffcc66;">Services</h5>
                                    <div class="row">
                                        <div class="col-md-12 my-2">
                                            <input type="checkbox" name="soperator" id="soperator" <?php echo $soperator == 1 ? 'checked' : ''; ?>>
                                            <label class="px-2" for="">Operator</label>
                                        </div>
                                        <div class="col-md-12 my-2">
                                            <input type="checkbox" name="ssoundsystem" id="ssoundsystem" <?php echo $ssoundsystem == 1 ? 'checked' : ''; ?>>
                                            <label class="px-2" for="">Sound System</label>
                                        </div>
                                        <div class="col-md-12 my-2">
                                            <input type="checkbox" name="sphysicalarrangment" id="sphysicalarrangment" <?php echo $sphysicalarrangment == 1 ? 'checked' : ''; ?>>
                                            <label class="px-2" for="">Physical Arrangement</label>
                                        </div>
                                    </div>
                                </div>
                                <h5 class="my-3">Amount to pay:</h5>
                                <div class="my-3 form-group row">
                                    <label class="col-md-2 col-form-label" for="payment">Payment (PHP):</label>
                                    <div class="col-md-10">
                                        <input type="number" id="payment" name="payment" value="<?php echo $payment; ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="text-center my-4">
                                    <button class="btn btn-primary mx-2 my-1" name="update" type="submit" value="Submit" style="padding: 5px 5rem;">Update</button>
                                    <button class="btn btn-secondary mx-2 my-1" type="reset" style="padding: 5px 5.25rem;">Clear</button>
                                </div>
                            </form>
					</div>	
				</div>
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
    </script> -->
    <!-- Disable Past Date -->
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
