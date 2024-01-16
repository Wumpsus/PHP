<?php
        // Auteur: Michael Davelaar
        // Functie: Korting berekenen van een bedrag

        // main

// Voeg fruit toe aan de sessievariabele
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["addFruit"])) {
    $fruit = $_POST["fruit"];
    $_SESSION["fruit"][] = $fruit;
}

// Sorteer de array van A naar Z
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["sort"])) {
    sort($_SESSION["fruit"]);
}

// Schud de array
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["shuffle"])) {
    shuffle($_SESSION["fruit"]);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fruitsoorten Beheer</title>
</head>
<body>

<form method="post" action="<?php ($_SERVER["PHP_SELF"]); ?>">
    <label for="fruit">Voeg een fruitsoort toe:</label>
    <input type="text" name="fruit" required>
    <input type="submit" name="addFruit" value="Voeg toe">
    <input type="submit" name="sort" value="Sorteren">
    <input type="submit" name="shuffle" value="Schudden">
</form>

<?php
// Toon de inhoud van de sessievariabele
if (isset($_SESSION["fruit"]) && !empty($_SESSION["fruit"])) {
    echo "<h2>Inhoud van de array:</h2>";
    echo "<ul>";
    foreach ($_SESSION["fruit"] as $item) {
        echo "<li>$item</li>";
    }
    echo "</ul>";
} else {
    echo "<p>Er zijn nog geen fruitsoorten toegevoegd.</p>";
}
?>

</body>
</html>