<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BTW Calculator</title>
</head>
<body>

<form method="post">
    Bedrag exclusief BTW: <input type="text" name="bedrag" required><br>

    BTW-percentage:
    <input type="radio" name="btw" value="9" checked> 9%
    <input type="radio" name="btw" value="21"> 21%<br>

    <input type="submit" name="bereken" value="Uitrekenen">
</form>

<?php
    // Auteur: Michael Davelaar
    // Functie: BTW bedrag berekenen

    // main
if(isset($_POST['bereken'])){
    $ExclBTW = floatval($_POST['bedrag']);
    $Percentage = intval($_POST['btw']);

    $InclBTW = $ExclBTW * (1 + ($Percentage / 100));

    $Resultaat = number_format($InclBTW, 2, ',', '.') . ' €';

    echo "Bedrag inclusief {$Percentage}% BTW: {$Resultaat}";
}
?>

</body>
</html>