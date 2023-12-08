<?php
    // Auteur: Michael Davelaar
    // Functie: Random postcode

    // main

    // Willekeurige postcode generaten
    function RandomPostcode() {
        $postcode = mt_rand(1000,9999); // Kan aangepast worden
        return sprintf("%04d", $postcode); // Zorgt ervoor dat er 4 cijfers zijn
    }

    // Toon het op het scherm
    echo "Willekeurige postcode: " . RandomPostcode();
?>