<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekenmachine</title>
</head>
<body>

<form method="post">
    1: <input type="text" name="1" required><br>
    2: <input type="text" name="2" required><br>

    <select name="bewerking">
        <option value="optellen">Optellen</option>
        <option value="aftrekken">Aftrekken</option>
        <option value="vermenigvuldigen">Vermenigvuldigen</option>
        <option value="delen">Delen</option>
    </select><br>

    <input type="submit" name="bereken" value="Berekenen">
</form>

<?php
    // Auteur: Michael Davelaar
    // Functie: Rekenmachine

    // main
if(isset($_POST['bereken'])){
    $getal1 = floatval($_POST['getal1']);
    $getal2 = floatval($_POST['getal2']);
    $bewerking = $_POST['bewerking'];

    switch ($bewerking) {
        case 'Optellen':
            $resultaat = $getal1 + $getal2;
            break;
        case 'Aftrekken':
            $resultaat = $getal1 - $getal2;
            break;
        case 'Vermenigvuldigen':
            $resultaat = $getal1 * $getal2;
            break;
        case 'Delen':
            if ($getal2 != 0) {
                $resultaat = $getal1 / $getal2;
            } else {
                $resultaat = "Kan niet delen door nul sukkel";
            }
            break;
        default:
            $resultaat = "Ja dat werkt niet he";
            break;
    }

    echo "Resultaat: {$resultaat}";
}
?>

</body>
</html>