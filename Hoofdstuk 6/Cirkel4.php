<?php
    // Auteur: Michael Davelaar
    // Funcite Oppervlakte en Omtrek van cirkel berekenen

    // Functie voor CirkelOmtrek
    function CirkelOmtrek($straal) {
        // Inhoud van functie
        $omtrek = round((2 * pi() * $straal), 1);
        return $omtrek;
    }
    // main

    // Bereken omtrek
    CirkelOmtrek(7);

    echo "De omtrek van een cirkel is: " . CirkelOmtrek(7) . "<br>";

?>