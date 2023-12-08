<?php
    // Auteur: Michael Davelaar
    // Funcite: Zet kachel aan, uit of hoger

    // temp -10 - 0 graden: kachel hoge stand
    // temp 0-18: kachel normale stand
    // temp > 18: kachel uit

    // Initialisatie
    $Kachel = -11; // Pas dit aan met de werkelijke temperatuur

    if ($Kachel >= -10 && $Kachel <= 0) {
        echo "Hoge stand.";
    } elseif ($Kachel > 0 && $Kachel <= 18) {
        echo "Normale stand.";
    } elseif ($Kachel > 18) {
        echo "Kachel uit.";
    } else {
        echo "Ongeldige temperatuur.";
    }
?>
