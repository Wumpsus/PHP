<?php
    // Auteur: Michael Davelaar
    // Funcite: Switch met if/else

    // main
    $uur = date("G");

    $tijd = match(true) {
        $uur >= 6 && $uur < 12 => " ochtend",
        $uur >= 12 && $uur < 18 => "middag",
        $uur >= 18 && $uur < 24 => "avond",
        default => "nacht",
    };

    echo "Het is nu: $tijd";


?>