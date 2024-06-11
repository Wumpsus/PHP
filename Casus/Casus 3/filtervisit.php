<?php
include 'config.php';

if(isset($_POST['month']) && isset($_POST['land'])) {
    $month = $_POST['month'];
    $land = $_POST['land'];

    $sql = "SELECT * FROM bezoekers WHERE MONTH(datum_tijd) = '$month' AND (land = '$land' OR '$land' = '')";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table><tr><th>ID</th><th>Land</th><th>IP-adres</th><th>Provider</th><th>Browser</th><th>Datum/Tijd</th><th>Referer</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["id"]. "</td><td>" . $row["land"]. "</td><td>" . $row["ip_adres"]. "</td><td>" . $row["provider"]. "</td><td>" . $row["browser"]. "</td><td>" . $row["datum_tijd"]. "</td><td>" . $row["referer"]. "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "Geen resultaten gevonden";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Bezoekersgegevens Filteren</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <form action="filter_visits.php" method="post">
        <label for="month">Maand </label>
        <input type="number" id="month" name="month" min="1" max="12" required><br>

        <label for="land">Land:</label>
        <input  type= text id="land" name="land" required>
            <option value="">Alle landen</option>
            
            
