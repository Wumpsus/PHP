<?php
// Connect database
include "connect.php";

// Maak een query met JOIN-operatie
$sql = "SELECT gastenboekberichten.ID, gebruikers.gebruikersnaam, gastenboekberichten.bericht, gastenboekberichten.datum 
        FROM gastenboekberichten 
        LEFT JOIN gebruikers ON gastenboekberichten.gebruikers_ID = gebruikers.ID";

// Prepare query
$stmt = $conn->prepare($sql);

// Uitvoeren
$stmt->execute();

// Ophalen alle data
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Controleer of er resultaten zijn
if (count($result) > 0) {
    echo "<br>";

    // Print de data in een rij
    echo "<table border=1px>";
    echo "<tr><th>ID</th><th>Gebruikersnaam</th><th>Bericht</th><th>Datum</th><th>Wijzigen</th><th>Verwijder</th></tr>";
    foreach ($result as $row) {
        echo "<tr>";
        echo "<td>". $row['ID'] . "</td>";
        echo "<td>" . $row['gebruikersnaam'] . "</td>";
        echo "<td>" . $row['bericht'] . "</td>";
        echo "<td>" . $row['datum'] . "</td>";
        echo "<td><a href='edit.php?id=" . $row['ID'] . "'>" . "Wijzigen</a></td>";
        echo "<td><a href='delete.php?id=" . $row['ID'] . "'>" . "Verwijder</a></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Geen berichten gevonden.";
}
?>
