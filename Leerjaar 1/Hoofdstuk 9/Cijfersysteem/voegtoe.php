<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $leerling = $_POST['leerling'];
    $cijfer = $_POST['cijfer'];
    $vak = $_POST['vak'];
    $docent = $_POST['docent'];

    $sql = "INSERT INTO cijfer (leerling, cijfer, vak, docent) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$leerling, $cijfer, $vak, $docent]);

    header("Location: cijfersysteem.php");
}
?>
