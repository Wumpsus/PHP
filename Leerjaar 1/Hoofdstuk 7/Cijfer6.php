<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>Cijfer:</p> 
    <input type="text" value="cijfer" name="resultaat">
    <br>
    <input type="submit" value="berekenen" name="Toevoegen">

    <?php
        // Auteur: Michael Davelaar
        // Functie: Cijfer berekenen

        // main

        session_start();
        if(isset($_POST["Toevoegen"])) {
            if(isset($_SESSION["Uitrekenen"]) == false) {
                // Geen sessie
                echo "Sessie bestaat niet";

                $_SESSION["Uitrekenen"] = 0;
                $_SESSION["Aantal"] = 0;
            } else {
                // een sessie
                echo "Sessie bestaat";
            }
        }
    ?>
</body>
</html>