<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "poll";

// Verbind met de database
$conn = new mysqli($servername, $username, $password, $database);

// Controleert verbinding
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
