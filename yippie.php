<?php
    // Auteur: Michael Davelaar
    // Funcite: Zet kachel aan, uit of hoger

    // temp -10 - 0 graden: kachel hoge stand
    // temp 0-18: kachel normale stand
    // temp > 18: kachel uit

    // Initialisatie
    $kachel = 0;

    if ($kachel >= -10 && $kachel <= 0) {
        echo "Hoge stand.";
    } elseif ($kachel > 0 && $kachel <= 18) {
        echo "Normale stand.";
    } else {
        echo "Kachel uit.";
    }
?>
