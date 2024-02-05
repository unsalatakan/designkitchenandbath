<?php
$servername = "167.99.112.155";  // replace with your actual server name
$username = "dtzbuhqbge";      // replace with your actual username
$password = "wrw4dEdXqt";      // replace with your actual password
$dbname = "dtzbuhqbge";   // replace with your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>