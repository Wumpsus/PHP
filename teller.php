<?php 
    // Auteur: Michael Davelaar
    // Functie: for loop

    for ($teller=0; $teller < 100 ; $teller = $teller+100) {
        echo "$teller<br>";
    }

    $a = 0;
    while ($a <= 100) {
        echo "a: $a<br>";
    
    // Als het boven de 10 is gaat het stappen van 10 doen
    
        if ($a >= 10) {
            $a += 10;
        } else {
            $a++;
        }
    }
?>