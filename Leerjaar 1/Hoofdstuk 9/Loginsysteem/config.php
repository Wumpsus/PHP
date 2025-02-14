<?php
$host = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "studenten_login"; // Database naam

$pdo = new PDO("mysql:host=$host;dbname=$db_name", $db_username, $db_password);

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
