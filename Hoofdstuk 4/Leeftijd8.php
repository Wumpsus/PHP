<?php
    // Auteur: Michael Davelaar
    // Functie: Rijbewijs leeftijd

    // main
$leeftijd = 25;
$heeftStempas = false;

if ($leeftijd >15) {
    echo"je mag praktijkexamen voor je scooterrijbewijs doen.";
} else {
    echo "je mag nog geen praktijd examen doen voor je scooterrijbewijs";
}
echo"<br>";
if ($leeftijd > 17) {
    echo "je mag gaan stemmen want je hebt een stempas";
} else { 
    echo "je mag niet stemmen want";
}
 

if ($heeftStempas) {
    echo " Je hebt al een stempas.";
} else {
    echo " Je hebt nog geen stempas.";
}

?>