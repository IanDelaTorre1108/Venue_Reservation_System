<?php
    include('database.php');
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['adminUser'];
        $pass = $_POST['adminPass'];

        $stmt = $con->prepare("SELECT * FROM admin_tbl WHERE Username = ? AND Password = ?");
        $stmt->bind_param("ss", $username, $pass);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows > 0) {
            $_SESSION["username"] = $username;
            header("Location:../admindashboard.php");
            exit;
        } else {
            echo "Invalid username or password.";
        }
    }
?>
