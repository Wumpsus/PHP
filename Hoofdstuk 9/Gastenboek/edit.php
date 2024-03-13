<?php
// Connect database
include "connect.php";

// Initialiseer $result met lege waarden
$result = ['ID' => '', 'naam' => '', 'bericht' => '', 'datum' => ''];

// Controleer of er een ID is ingesteld via GET
if (isset($_GET['ID'])) {
    // Maak een query om gegevens op te halen voor de specifieke ID
    $sql = "SELECT * FROM gasten WHERE ID = :ID";
    // Bereid de query voor
    $stmt = $conn->prepare($sql);
    // Voer de query uit
    $stmt->execute([':ID' => $_GET['ID']]);
    // Haal de gegevens op
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
}

// Als het bewerkingsformulier is ingediend
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Update de gegevens in de database
    $sql = "UPDATE gasten SET naam = :naam, bericht = :bericht, datum = :datum WHERE ID = :ID";
    // Bereid de query voor
    $stmt = $conn->prepare($sql);
    // Voer de query uit
    $status = $stmt->execute([
        ':ID' => $_POST['id'],
        ':naam' => $_POST['naam'],
        ':bericht' => $_POST['bericht'],
        ':datum' => $_POST['datum']
    ]);
    // Controleer of de update is geslaagd
    if ($status) {
        // Redirect naar de startpagina
        header("Location: homepage.php");
        exit; // Stop met het uitvoeren van verdere code
    } else {
        echo "<script>alert('Bewerken is niet gelukt.')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berichten bewerken</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Bericht bewerken</h1>

<form action="" method="post">
    <label for="ID">ID:</label>
    <input type="text" id="id" name="id" required value="<?php echo $result['ID']; ?>"><br>

    <label for="naam">Naam:</label>
    <input type="text" id="naam" name="naam" required value="<?php echo $result['naam']; ?>"><br>

    <label for="bericht">Bericht:</label>
    <input type="text" id="bericht" name="bericht" required value="<?php echo $result['bericht']; ?>"><br>

    <label for="datum">Datum:</label>
    <input type="date" id="datum" name="datum" required value="<?php echo $result['datum']; ?>"><br>

    <input type="submit" value="Bewerken">
</form>

</body>
</html>
