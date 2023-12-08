<?php
    // Auteur: Michael Davelaar
    // Functie: print kleur van stoplicht
    // print rood als kleurcode = 0
    // print oranje als kleurcode = 1
    // print groen als kleurcode = 2

    // initialisatie

    $kleur = 0; // Hier de kleur die je wilt

    if ($kleur == 0) {
        // Print rood
        echo "Stoplicht wordt rood.";
    } elseif ($kleur == 1) {
        // Print oranje
        echo "Stoplicht wordt oranje.";
    } elseif ($kleur == 2) {
        // Print groen
        echo "Stoplicht wordt groen.";
    } else {
        // Foutmelding als er ongeldige kleur is
        echo "Ongeldige kleurcode.";
    }
?>
