<?php
// Controleer of er een POST-verzoek is ingediend
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Valideer de gebruikersinvoer
    $naam = htmlspecialchars($_POST['naam']);
    $bericht = htmlspecialchars($_POST['bericht']);
    $datum = htmlspecialchars($_POST['datum']);

    // Connect met de database
    include "connect.php";

    // Voeg het bericht toe aan de database
    $sql = "INSERT INTO gastenboekberichten (gebruikers_ID, bericht, datum) VALUES (:gebruikers_ID, :bericht, :datum)";
    $stmt = $conn->prepare($sql);
    $status = $stmt->execute([
        ':gebruikers_ID' => $_SESSION['gebruikers_ID'], // Gebruik de gebruikers-ID uit de sessie
        ':bericht' => $bericht,
        ':datum' => $datum
    ]);

    // Controleer of het toevoegen is gelukt
    if ($status) {
        echo "<script>alert('Bericht toevoegen is gelukt!')</script>";
        echo "<script>window.location.href = 'homepage.php';</script>";
        exit; // Stop met het uitvoeren van verdere code
    } else {
        echo "<script>alert('Bericht toevoegen is niet gelukt.')</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bericht toevoegen</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>Bericht toevoegen</h1>

<form action="" method="post">
    <label for="naam">Naam:</label>
    <input type="text" id="naam" name="naam" required><br>

    <label for="bericht">Bericht:</label>
    <input type="text" id="bericht" name="bericht" required><br>

    <label for="datum">Datum:</label>
    <input type="date" id="datum" name="datum" required><br>

    <input type="submit" value="Toevoegen">
</form>

</body>
</html>
