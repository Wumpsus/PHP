<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cijfers Verwerken</title>
</head>
<body>
    <h2>Voer een cijfer in (tussen 1,0 en 10,0):</h2>
    <form method="post">
        <input type="text" name="cijfer" placeholder="Voer een cijfer in">
        <input type="submit" name="verzend" value="Verzend">
    </form>

    <?php
        // Auteur: Michael Davelaar
        // Functie: Korting berekenen van een bedrag

        // main

    // Verwerk het ingevoerde cijfer
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Controleer of het cijfer is ingevoerd en valide is
        if (isset($_POST["cijfer"]) && is_numeric($_POST["cijfer"])) {
            $cijfer = floatval($_POST["cijfer"]);

            // Controleer of het cijfer binnen het geldige bereik ligt
            if ($cijfer >= 1.0 && $cijfer <= 10.0) {
                session_start();

                // Voeg het cijfer toe aan de reeks
                if (!isset($_SESSION["cijfers"])) {
                    $_SESSION["cijfers"] = [];
                }

                $_SESSION["cijfers"][] = $cijfer;
            } else {
                echo "<p>Ongeldig cijfer. Voer een cijfer in tussen 1,0 en 10,0.</p>";
            }
        }
    }

    // Toon het aantal ingevoerde cijfers en het gemiddelde
    if (isset($_SESSION["cijfers"]) && count($_SESSION["cijfers"]) > 0) {
        $aantalCijfers = count($_SESSION["cijfers"]);
        $gemiddelde = round(array_sum($_SESSION["cijfers"]) / $aantalCijfers, 1);

        echo "<p>Aantal ingevoerde cijfers: $aantalCijfers</p>";
        echo "<p>Gemiddelde: $gemiddelde</p>";
    }
    ?>
</body>
</html>