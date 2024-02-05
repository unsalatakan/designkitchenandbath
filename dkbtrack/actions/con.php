<?php
$servername = "localhost";  // replace with your actual server name
$username = "root";      // replace with your actual username
$password = "";      // replace with your actual password
$dbname = "dkb_track";   // replace with your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>