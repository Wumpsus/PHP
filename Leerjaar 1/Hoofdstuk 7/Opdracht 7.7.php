<?php
        // Auteur: Michael Davelaar
        // Functie: Korting berekenen van een bedrag

        // main
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $startBedrag = isset($_POST['startBedrag']) ? ($_POST['startBedrag']) : 100000;
    $rentePercentage = isset($_POST['rentePercentage']) ? ($_POST['rentePercentage']) : 4;
    $jaarlijkseOpname = isset($_POST['jaarlijkseOpname']) ? ($_POST['jaarlijkseOpname']) : 5000;

    // Bereken de looptijd
    $jaar = 0;
    $bedrag = $startBedrag;
    while ($bedrag > 0) {
        $bedrag *= (1 + $rentePercentage / 100); // Voeg rente toe
        $bedrag -= $jaarlijkseOpname; // Trek opnamebedrag af
        $jaar++;

        // Als het bedrag negatief wordt, stel het op 0
        if ($bedrag < 0) {
            $bedrag = 0;
        }

        // Als de looptijd meer dan 100 jaar is, stop de berekening
        if ($jaar > 100) {
            break;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Looptijd Berekenen</title>
</head>
<body>

<form method="post" action="<?php echo ($_SERVER["PHP_SELF"]); ?>">
    <label for="startBedrag">Startbedrag (in euro's):</label>
    <input type="number" name="startBedrag" value="<?php echo $startBedrag; ?>" br>
    <label for="rentePercentage">Rentepercentage per jaar:</label>
    <input type="number" name="rentePercentage" value="<?php echo $rentePercentage; ?>"br>
    <label for="jaarlijkseOpname">Jaarlijkse opname (in euro's):</label>
    <input type="number" name="jaarlijkseOpname" value="<?php echo $jaarlijkseOpname; ?>" br>
    <input type="submit" name="berekenLooptijd" value="Bereken de looptijd">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "<p>Geert kan het bedrag " . ($jaar <= 100 ? "voor $jaar jaar" : "zijn hele leven") . " opnemen.</p>";
}
?>

</body>
</html>