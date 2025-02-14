<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <input type="radio" name="kleur" value="rood">Rood
        <input type="radio" name="kleur" value="groen">Groen
        <input type="radio" name="kleur" value="blauw">Blauw
        <input type="radio" name="kleur" value="roze">Roze
        <input type="radio" name="kleur" value="reset">Reset
        <br>
        <input type="submit" name="achtergrond" value="Achtergrond kleur veranderen">
    </form>

<?php
    // Auteur: Michael Davelaar
    // Functie: Achtergrond kleur veranderen

    // main
 if (isset ($_POST["kleur"])) {
    $kleur = $_POST["kleur"];

    if ($kleur == "rood") {
        echo "<style> body{background-color:red;}</style>";
      }  elseif ($kleur == "groen") {
        echo "<style> body{background-color:green;}</style>";
      } elseif ($kleur == "blauw")
        echo "<style> body{background-color:blue;}</style>";
        elseif ($kleur == "roze")
        echo "<style> body{background-color:pink;}</style>";
        elseif ($kleur == "reset")
        echo "<style> body{background-color:white;}</style>";
 }

?>
</body>
</html>