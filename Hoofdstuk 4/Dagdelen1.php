<?php
    // Auteur: Michael Davelaar
    // Functie: 4 verschillende dagdelen

    // main
    $uur = date("H");

    if ($uur >=6 && $uur <= 12) {
        echo"Het is ochtend";
    }elseif ($uur >= 12 && $uur <= 18) {
        echo"Het is middag";
    }elseif ($uur >= 18 && $uur <= 24) {
        echo"Het is avond";
    }elseif ($uur >= 0 && $uur < 6) {
        echo"Het is nacht";
    }

?>