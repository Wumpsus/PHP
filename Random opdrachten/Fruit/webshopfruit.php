<?php

//* Functie: beschrijving object - class Fruit
//* Auteur: Michael Davelaar

// Initialisatie
include_once "fruit2.php";

// Main

// Maak een object banaan op basis van de classdefinitie Fruit
$banaan = new Fruit("Banaan", 2.0);
//$banaan->setPrice(2.0);
var_dump($banaan);
echo"<br>";
// Print naam
echo "De naam is: " . $banaan->Name . "<br>";

// Print prijs
echo "De prijs is: " . $banaan->getPrice() . "<br>";
echo"<br>";

// Maak een tweede object appel op basis van de classdefinitie Fruit
$appel = new Fruit("Elstar", 2.0);
$appel->setPrice(1.5);
var_dump($appel);

?>
