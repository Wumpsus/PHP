<!DOCTYPE html>
<html lang="en">
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

$sql = "SELECT * FROM cijfer";
if (isset($_GET['zoekterm']) && $_GET['zoekterm'] != '') {
    $zoekterm = $_GET['zoekterm'];
    $sql .= " WHERE leerling LIKE '%$zoekterm%'";
}

$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
    echo "<td>" . $row['ID'] . "</td>";
    echo "<td>" . $row['leerling'] . "</td>";
    echo "<td>" . $row['cijfer'] . "</td>";
    echo "<td>" . $row['vak'] . "</td>";
    echo "<td>" . $row['docent'] . "</td>";
    echo "<td><a href='verwijder.php?id=".$row['ID']."'>Verwijder</a></td>";
    echo "</tr>";
}
echo "</table>";
?>

</body>
</html>
