<?php
session_start();

// Als gebruiker niet is ingelogd, stuurt het hem terug
if(!isset($_SESSION["user_id"]) || !isset($_SESSION["username"])){
    header("Location: login.php");
    exit;
}

// Ingelogd! laat welkomsbericht zien
$username = $_SESSION["username"];
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welkom</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Hoi <?php echo htmlspecialchars($username); ?>!</h1>
    <p>Er staat hier niks, dus ik geef je wel een foto van een wumpus als minecraft varken</p>
    <img src="wumpusvarken.png"/>
    <p><a href="logout.php">Uitloggen</a></p>
</body>
</html>
