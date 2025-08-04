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

    $query = "SELECT * FROM pending_tbl WHERE PReservationID = $id";
    $query_run = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($query_run);

    if($row) {
        $query = "INSERT INTO rejected_tbl (RReservationID, UserID, ActivityID, UtilityID, Status) VALUES ({$row['PReservationID']}, {$row['UserID']}, {$row['ActivityID']}, {$row['UtilityID']}, 'Rejected')";
        $query_run = mysqli_query($con, $query);

        if($query_run) {
            $query = "DELETE FROM pending_tbl WHERE PReservationID = $id";
            $query_run = mysqli_query($con, $query);

            if($query_run) {
                $query = "SELECT Email FROM user_tbl WHERE UserID = ?";
                $stmt = mysqli_prepare($con, $query);
                mysqli_stmt_bind_param($stmt, "i", $row['UserID']);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                $user_row = mysqli_fetch_assoc($result);
                $to_email = $user_row['Email'];
                $subject = 'Reservation Rejected';
                $message = 'Dear User, your reservation has encountered a scheduling conflict.';

                $mail = new PHPMailer(true);
                
                try {
                    // Server settings
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

                echo "<script>alert('Reservation has been rejected');</script>";
                header("Location:../admindashboard.php");
            } else {
                echo "Failed to delete reservation from pending_tbl";
            }
        } else {
            echo "Failed to insert reservation into rejected_tbl";
        }
    } else {
        echo "No reservation found with the provided ID";
    }
} else {
    echo "No ID provided";
}
?>
