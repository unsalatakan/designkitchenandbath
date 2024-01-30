<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include("con.php");

function sanitizeInput($input) {
    return htmlspecialchars(stripslashes(trim($input)));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = sanitizeInput($_POST["username"]);
    $password = sanitizeInput($_POST["password"]);

    $query = "SELECT * FROM user WHERE `user_name` = '$username' AND `user_password` = '$password'";
    $result = $conn->query($query);

    if ($result->num_rows == 1) {
        while($row = $result->fetch_assoc()) {
            $_SESSION["usertype"] = $row['user_type'];
        }
        $_SESSION["username"] = $username;
        header("Location: ../pages/dashboard.php");
    } else {
        header("Location: ../login.php?error=1");
    }
}

$conn->close();
?>