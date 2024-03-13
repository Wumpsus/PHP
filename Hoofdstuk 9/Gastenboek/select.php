<?php
// Connect database
include "connect.php";

// Maak een query
$sql = "SELECT * FROM gasten";

// Prepare query
$stmt = $conn->prepare($sql);

// Uitvoeren
$stmt->execute();

// Ophalen alle data
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo "<br>";

// Print de data in een rij
echo "<table border=1px>";
foreach ($result as $row) {
    echo "<tr>";
    echo "<td>". $row['ID'] . "</td>";
    echo "<td>" . $row['naam'] . "</td>";
    echo "<td>" . $row['bericht'] . "</td>";
    echo "<td>" . $row['datum'] . "</td>";
    echo "<td><a href='edit.php?id=" . $row['ID'] . "'>" . "Wijzigen</a></td>";
    echo "<td><a href='delete.php?id=" . $row['ID'] . "'>" . "Verwijder</a></td>";
}
echo "</table>";
?>
