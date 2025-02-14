<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Korting Calculator</title>
</head>
<body>

<form method="post">
    Geldbedrag: <input type="text" name="geldbedrag" required><br>
    Korting: <input type="text" name="korting" required>%<br>

    <input type="submit" name="uitrekenen" value="Reken het uit">
</form>

<?php
    // Auteur: Michael Davelaar
    // Functie: Korting berekenen van een bedrag

    // main
if(isset($_POST['uitrekenen'])){
    $geldbedrag = floatval($_POST['geldbedrag']);
    $korting = floatval($_POST['korting']);

    // Kortingsbedrag berekenen
    $kortingsbedrag = ($korting / 100) * $geldbedrag;

    // Uiteindelijke berekening van eindbedrag (met korting)
    $eindbedrag = $geldbedrag - $kortingsbedrag;

    // Opmaak
    $eindbedrag2 = number_format($eindbedrag, 2, ',', '.');

    echo "Bedrag met {$korting}% korting: €{$eindbedrag2}";
}
?>

</body>
</html>