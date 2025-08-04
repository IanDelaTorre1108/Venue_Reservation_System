<?php
include ('database.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer autoloader
require '../PHPMailer-master/src/Exception.php';
require '../PHPMailer-master/src/PHPMailer.php';
require '../PHPMailer-master/src/SMTP.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM pending_tbl WHERE PReservationID = ?";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);

    if($row) {
        $query = "INSERT INTO approved_tbl (AReservationID, UserID, ActivityID, UtilityID, Status) VALUES (?, ?, ?, ?, 'Approved')";
        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, "iiii", $row['PReservationID'], $row['UserID'], $row['ActivityID'], $row['UtilityID']);
        $query_run = mysqli_stmt_execute($stmt);

        if($query_run) {
            $query = "DELETE FROM pending_tbl WHERE PReservationID = ?";
            $stmt = mysqli_prepare($con, $query);
            mysqli_stmt_bind_param($stmt, "i", $id);
            $query_run = mysqli_stmt_execute($stmt);

            if($query_run) {
                $query = "SELECT Email FROM user_tbl WHERE UserID = ?";
                $stmt = mysqli_prepare($con, $query);
                mysqli_stmt_bind_param($stmt, "i", $row['UserID']);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                $user_row = mysqli_fetch_assoc($result);
                $to_email = $user_row['Email'];
                $subject = 'Reservation Approved';
                $message = 'Reservation ID: ' . $row['PReservationID'] . '<br>Dear User, we are pleased to inform you that your reservation has been approved!';

                $mail = new PHPMailer(true);
                
                try {
                    // Server Settings
                    $mail->isSMTP();
                    $mail->Host       = 'smtp.gmail.com';
                    $mail->SMTPAuth   = true;
                    $mail->Username   = 'lexterdelatorre321@gmail.com'; 
                    $mail->Password   = 'ucejpjcxguzyhgup'; 
                    $mail->SMTPSecure = 'ssl';
                    $mail->Port       = 465;
                
                    // Recipients
                    $mail->setFrom('lexterdelatorre321@gmail.com', 'Ian Lexter');
                    $mail->addAddress($to_email);
                
                    // Content
                    $mail->isHTML(true);
                    $mail->Subject = $subject;
                    $mail->Body    = $message;
                
                    $mail->send();
                    echo 'Email has been sent';
                } catch (Exception $e) {
                    echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }

                echo "<script>alert('Reservation approved successfully');</script>";
                header('Location: ../admindashboard.php'); 
                exit; 
            } else {
                echo "Failed to delete reservation from pending_tbl";
            }
        } else {
            echo "Failed to insert reservation into approved_tbl";
        }
    } else {
        echo "No reservation found with the provided ID";
    }
} else {
    echo "No ID provided";
}
?>
