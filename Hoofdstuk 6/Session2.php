<?php
// Auteur: Michael Davelaar
// Funcite: Sessions en Cookies
// Helft is wel met ChatGPT gedaan, maar ik heb gevraagd of het mij kan leren wat het doet.

// main

// Controleren of er een cookie is ingesteld voor de teller
if (isset($_COOKIE["Teller"])) {
    // Cookie bestaat
    echo "Cookie bestaat<br>";

    // Teller ophogen met de waarde van de cookie
    $teller = $_COOKIE["Teller"] + 1;

    // Username ophalen indien beschikbaar
    $username = isset($_COOKIE["Username"]) ? $_COOKIE["Username"] : "";

    // Cookie opnieuw instellen met de bijgewerkte tellerwaarde
    setcookie("Teller", $teller, time() + 3600); // Geldigheid: 1 uur
    setcookie("Username", $username, time() + 3600); // Geldigheid: 1 uur
} else {
    // Cookie bestaat niet
    echo "Cookie bestaat NIET<br>";

    // Teller initialiseren
    $teller = 0;
    $username = "";
    
    // Cookie instellen voor de teller en username
    setcookie("Teller", $teller, time() + 3600); // Geldigheid: 1 uur (kan je zelf aanpassen)
    setcookie("Username", $username, time() + 3600); // Geldigheid: 1 uur (kan je ook zelf aanpassen)
}

echo "Teller: " . $teller . "<br>";
echo "Username: " . $username;
?>
