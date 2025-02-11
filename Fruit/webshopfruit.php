<?php

//* Functie: beschrijving opject - class fruit
//* Auteur: Michael Davelaar

// Initialisatie
include_once "fruit2.php";

// Main

// Maak een object banaan op basis van de classdefinitie Fruit
$banaan = new Fruit();
$banaan->naam = "Banaan";
$banaan->setPrijs = 2.0;
var_dump($banaan);
echo "<br>";
// Maak een tweede object appel op basis van de classdefinitie Fruit
$appel = new Fruit();
$appel->naam = "Elstar";
var_dump($appel);
?>