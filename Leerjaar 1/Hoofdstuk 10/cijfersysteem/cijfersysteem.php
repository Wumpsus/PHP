<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cijfers van de klas</title>
    <style>
    table {
      border-collapse: collapse;
      background-color: white;
    }

    table, th, td {
      border: 2px solid black;
      padding: 3px;
    }
    </style>
</head>
<body>

<form action="" method="GET">
    <input type="text" name="zoekterm" placeholder="Zoek een leerling">
    <input type="submit" value="Zoeken">
</form>

<form action="voegtoe.php" method="POST">
    Leerling: <input type="text" name="leerling" required><br>
    Cijfer: <input type="number" step="0.1" name="cijfer" required><br>
    Vak: <input type="text" name="vak" required><br>
    Docent: <input type="text" name="docent" required><br>
    <input type="submit" value="Voeg Toe">
</form>

<?php
include "connect.php";

// Query om alle cijfers op te halen
$sql = "SELECT * FROM cijfer";
if (isset($_GET['zoekterm']) && $_GET['zoekterm'] != '') {
    $zoekterm = $_GET['zoekterm'];
    $sql .= " WHERE leerling LIKE '%$zoekterm%'";
}

$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Query om het gemiddelde cijfer te berekenen
$sql_avg = "SELECT AVG(cijfer) AS gemiddeld_cijfer FROM cijfer";
$stmt_avg = $conn->prepare($sql_avg);
$stmt_avg->execute();
$gemiddeld_cijfer = $stmt_avg->fetch(PDO::FETCH_ASSOC)['gemiddeld_cijfer'];

// Query om het hoogste cijfer te vinden
$sql_max = "SELECT MAX(cijfer) AS hoogste_cijfer FROM cijfer";
$stmt_max = $conn->prepare($sql_max);
$stmt_max->execute();
$hoogste_cijfer = $stmt_max->fetch(PDO::FETCH_ASSOC)['hoogste_cijfer'];

// Query om het laagste cijfer te vinden
$sql_min = "SELECT MIN(cijfer) AS laagste_cijfer FROM cijfer";
$stmt_min = $conn->prepare($sql_min);
$stmt_min->execute();
$laagste_cijfer = $stmt_min->fetch(PDO::FETCH_ASSOC)['laagste_cijfer'];

echo "<br>";
echo "<table border=1px>";
echo "<tr>
<th>Leerling</th>
<th>Cijfer</th>
<th>Vak</th>
<th>Docent</th>
<th>Actie</th>
</tr>";

foreach ($result as $row) {
    echo "<tr>";
    echo "<td>" . $row['leerling'] . "</td>";
    echo "<td>" . $row['cijfer'] . "</td>";
    echo "<td>" . $row['vak'] . "</td>";
    echo "<td>" . $row['docent'] . "</td>";
    echo "<td><a href='verwijder.php?id=".$row['ID']."'>Verwijder</a></td>";
    echo "</tr>";
}

// Voeg rijen toe voor het gemiddelde, hoogste en laagste cijfer
echo "<tr>
<td>Gemiddeld</td>
<td>$gemiddeld_cijfer</td>
<td></td>
<td></td>
<td></td>
</tr>";

echo "<tr>
<td>Hoogste</td>
<td>$hoogste_cijfer</td>
<td></td>
<td></td>
<td></td>
</tr>";

echo "<tr>
<td>Laagste</td>
<td>$laagste_cijfer</td>
<td></td>
<td></td>
<td></td>
</tr>";

echo "</table>";
?>

</body>
</html>
