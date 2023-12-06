<?php
    // Auteur: Michael Davelaar
    // Functie: Spaargeld

$spaargeld = 800;


$telefoonPrijs = 1000;


$tekort = $telefoonPrijs - $spaargeld;
if ($spaargeld >= $telefoonPrijs) {

    $overVoorHoesje = $spaargeld - $telefoonPrijs;
    echo "Gefeliciteerd! Je kunt de telefoon kopen. Je hebt €" . number_format($overVoorHoesje, 2) . " over voor een hoesje.";
} elseif ($tekort > 250) {

    echo "Helaas, je hebt niet genoeg geld en het tekort is €" . number_format($tekort, 2) . ". Overweeg om een baantje te zoeken.";
} else {
    
    echo "Je hebt bijna genoeg geld! Het tekort is €" . number_format($tekort, 2) . ". Nog even sparen!";
}

?>