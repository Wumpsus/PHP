<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fietsen Toevoegen</title>
</head>
<body>
    <h2>Voeg Fiets Toe</h2>
    <form action="process.php" method="POST">
        <label for="merk">Merk:</label>
        <input type="text" name="merk" required><br>

        <label for="type">Type:</label>
        <input type="text" name="type" required><br>

        <label for="prijs">Prijs:</label>
        <input type="number" name="prijs" required><br>

        <label for="foto">Foto (URL):</label>
        <input type="text" name="foto" required><br>

        <input type="submit" value="Voeg Toe">
    </form>
</body>
</html>

<?php
// process.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "Er is gepost<br>";
    print_r($_POST);
    // Connect database
include "connect.php";

// Maak een query
$sql = "INSERT INTO `fietsen` (`ID`, `Merk`, Type, `Prijs`, `Foto`); 
VALUES (:Merk, :Type, :Prijs, :Foto);";

// Prepare query
$stmt = $conn->prepare($sql);

// Uitvoeren
$stmt->execute(
    [
        ":Merk" =>$_POST["Merk"],
        ":Type" =>$_POST["Type"],
        ":Prijs" =>$_POST["Prijs"],
        ":Foto" =>$_POST["Foto"],
    ]
);

}
?>
