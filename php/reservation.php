<?php
    include('database.php');
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Activity Table
        $activity = $_POST['activity'];
        $venue = $_POST['venue'];
        $timestart = $_POST['timestart'];
        $timestart = date('h:i', strtotime($timestart));
        $timeend = $_POST['timeend'];
        $timeend = date('h:i', strtotime($timeend));
        $date = $_POST['date'];

        $stmt = $con->prepare("SELECT * FROM activity_tbl WHERE Venue = ? AND Date = ? AND ((TimeStart <= ? AND TimeEnd > ?) OR (TimeStart < ? AND TimeEnd >= ?) OR (? <= TimeStart AND ? >= TimeEnd))");
        $stmt->bind_param("ssssssss", $venue, $date, $timestart, $timeend, $timestart, $timeend, $timestart, $timeend);

        $stmt->execute();

        $result = $stmt->get_result();

        // Check if there's a conflict
        if ($result->num_rows > 0) {
            $_SESSION['alert'] = 'Conflict reservation'; 
            header("Location: ../home.php");
            exit;
        } else {
            // No conflict, insert the new reservation
            $stmt = $con->prepare("INSERT INTO activity_tbl (Activity, Venue, TimeStart, TimeEnd, Date) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $activity, $venue, $timestart, $timeend, $date);
            $stmt->execute();

            if ($stmt->error) {
                echo "Failed to insert into activity table: " . $stmt->error;
            } else {
                $activityid = $con->insert_id;
            }

            // User Table
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $email = $_POST['email'];
            $department = $_POST['department'];
            $payment = isset($_POST['payment']) && !empty($_POST['payment']) ? $_POST['payment'] : 0;

            $stmt = $con->prepare("INSERT INTO user_tbl (FirstName, LastName, Email, Department, Payment) VALUES (?,?,?,?,?)");
            $stmt->bind_param("ssssi", $fname, $lname, $email, $department, $payment);
            $stmt->execute();

            if ($stmt->error) {
                echo "Failed to insert into user table: " . $stmt->error;
            } else {
                $userid = $con->insert_id;
            }

            // Utility Table
            $elight = isset($_POST['elight']) ? 1 : 0;
            $qlight = isset($_POST['qlight']) && !empty($_POST['qlight']) ? $_POST['qlight'] : NULL;

            $eelectricfan = isset($_POST['eelectricfan']) ? 1 : 0;
            $qelectricfan = isset($_POST['qelectricfan']) && !empty($_POST['qelectricfan']) ? $_POST['qelectricfan'] : NULL;

            $echair = isset($_POST['echair']) ? 1 : 0;
            $qchair = isset($_POST['qchair']) && !empty($_POST['qchair']) ? $_POST['qchair'] : NULL;

            $etable = isset($_POST['etable']) ? 1 : 0;
            $qtable = isset($_POST['qtable']) && !empty($_POST['qtable']) ? $_POST['qtable'] : NULL;

            $ebackdrop = isset($_POST['ebackdrop']) ? 1 : 0;
            $qbackdrop = isset($_POST['qbackdrop']) && !empty($_POST['qbackdrop']) ? $_POST['qbackdrop'] : NULL;

            $evan = isset($_POST['evan']) ? 1 : 0;
            $qvan = isset($_POST['qvan']) && !empty($_POST['qvan']) ? $_POST['qvan'] : NULL;

            $soperator = isset($_POST['soperator']) ? 1 : 0;
            $ssoundsystem = isset($_POST['ssoundsystem']) ? 1 : 0;
            $sphysicalarrangment = isset($_POST['sphysicalarrangment']) ? 1 : 0;

            $stmt = $con->prepare("INSERT INTO utility_tbl (ELight, QLight, EELectricFan, QElectricFan, EChair, QChair, ETable, QTable, EBackdrop, QBackdrop, EVan, QVan, SOperator, SSoundSystem, SPhysicalArrangment) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sisisisisisisss", $elight, $qlight, $eelectricfan, $qelectricfan, $echair, $qchair, $etable, $qtable, $ebackdrop, $qbackdrop, $evan, $qvan, $soperator, $ssoundsystem, $sphysicalarrangment);
            $stmt->execute();

            if ($stmt->error) {
                echo "Failed to insert into utility table: " . $stmt->error;
            } else {
                $utilityid = $con->insert_id;
            }

            // Insert all the IDs into the pending_tbl
            $stmt = $con->prepare("INSERT INTO pending_tbl (UserID, UtilityID, ActivityID, Status) VALUES (?, ?, ?, ?)");
            $status = 'Pending';
            $stmt->bind_param("iiis", $userid, $utilityid, $activityid, $status);
            $stmt->execute();

            if ($stmt->error) {
                echo "Failed to insert into pending table: " . $stmt->error;
            } else {
                header("Location:../home.php");
            }
        }
    }

?> 