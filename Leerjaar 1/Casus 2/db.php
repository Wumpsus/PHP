<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "newswebsite";

$mysqli = new mysqli($servername, $username, $password, $dbname);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

function getNews() {
    global $mysqli;
    $sql = "SELECT * FROM news";
    $result = $mysqli->query($sql);
    $news = [];
    while ($row = $result->fetch_assoc()) {
        $news[] = $row;
    }
    return $news;
}
?>
