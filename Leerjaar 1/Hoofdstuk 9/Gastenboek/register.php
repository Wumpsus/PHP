<?php
include "connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Valideer de gebruikersinvoer
    $gebruikersnaam = htmlspecialchars($_POST['gebruikersnaam']);
    $email = htmlspecialchars($_POST['email']);
    $wachtwoord = password_hash($_POST['wachtwoord'], PASSWORD_DEFAULT); // Wachtwoord hashen

    // Controleer of de gebruikersnaam uniek is
    $stmt = $conn->prepare("SELECT * FROM gebruikers WHERE gebruikersnaam = :gebruikersnaam");
    $stmt->execute([':gebruikersnaam' => $gebruikersnaam]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($row) {
        echo "Gebruikersnaam is al in gebruik.";
    } else {
        // Controleer of het e-mailadres uniek is
        $stmt = $conn->prepare("SELECT * FROM gebruikers WHERE email = :email");
        $stmt->execute([':email' => $email]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            echo "E-mailadres is al in gebruik.";
        } else {
            // Voeg de nieuwe gebruiker toe aan de database
            $stmt = $conn->prepare("INSERT INTO gebruikers (gebruikersnaam, email, wachtwoord) VALUES (:gebruikersnaam, :email, :wachtwoord)");
            $stmt->execute([':gebruikersnaam' => $gebruikersnaam, ':email' => $email, ':wachtwoord' => $wachtwoord]);
            echo "Registratie succesvol!";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registratie</title>
</head>
<body>
    <h2>Registratie</h2>
    <form action="" method="post">
        Gebruikersnaam: <input type="text" name="gebruikersnaam" required><br>
        E-mailadres: <input type="email" name="email" required><br>
        Wachtwoord: <input type="password" name="wachtwoord" required><br>
        <input type="submit" value="Registreren">
    </form>
</body>
</html>
