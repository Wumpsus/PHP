<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poll</title>
</head>
<body>

<h1>Stem op de poll:</h1>

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

// Verwerking van de stemmen
if (isset($_POST['yes'])) {
    $option_name = "Ja";
    $insert_query = "INSERT INTO poll_results (option_name) VALUES ('$option_name')";
    $conn->query($insert_query);
    echo "<p>Bedankt voor uw stem!</p>";
} elseif (isset($_POST['no'])) {
    $option_name = "Nee";
    $insert_query = "INSERT INTO poll_results (option_name) VALUES ('$option_name')";
    $conn->query($insert_query);
    echo "<p>Bedankt voor uw stem!</p>";
}

// Weergave van de poll en stemknoppen
echo "<form method='post'>";
echo "<button type='submit' name='yes'>Ja</button>";
echo "<button type='submit' name='no'>Nee</button>";
echo "</form>";

// Sluiten van de databaseverbinding
$conn->close();
?>

</body>
</html>
