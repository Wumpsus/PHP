<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voeg Poll Toe</title>
</head>
<body>

<h1>Voeg een nieuwe poll toe:</h1>

<form action="voeg_poll_toe.php" method="post">
    <label for="message">Voer uw bericht in:</label><br>
    <textarea id="message" name="message" rows="4" cols="50"></textarea><br>
    <button type="submit">Voeg poll toe</button>
</form>

<?php
// Verbinding maken met de database
$servername = "localhost";
$username = "root";
$password = "";
$database = "polling_db";

$conn = new mysqli($servername, $username, $password, $database);

// Controleren op fouten bij het maken van de verbinding
if ($conn->connect_error) {
    die("Verbinding mislukt: " . $conn->connect_error);
}

// Toevoegen van een nieuwe poll (voorbeeld)
if(isset($_POST['message']) && !empty($_POST['message'])){
    $poll_option = $_POST['message']; // Het bericht van het formulier
    $insert_query = "INSERT INTO poll_results (option_name) VALUES ('$poll_option')";
    if ($conn->query($insert_query) === TRUE) {
        echo "Nieuwe poll-optie succesvol toegevoegd!";
        // Redirect terug naar poll.php na 3 seconden
        header("refresh:3; url=poll.php");
        exit();
    } else {
        echo "Fout bij het toevoegen van nieuwe poll-optie: " . $conn->error;
    }
} else {
    echo "Berichtveld mag niet leeg zijn!";
}

// Sluiten van de databaseverbinding
$conn->close();
?>

</body>
</html>
