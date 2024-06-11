<?php
define("DATABASE", "rekenmachine");
define("SERVERNAME", "localhost");
define("USERNAME", "root");
define("PASSWORD", "");
define("CRUD_TABLE", "berekeningen");

try {
    $conn = new PDO("mysql:host=" . SERVERNAME . ";dbname=" . DATABASE, USERNAME, PASSWORD);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
