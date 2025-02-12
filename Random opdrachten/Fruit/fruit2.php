<?php

//* Functie: beschrijving opject - class Fruit
//* Auteur: Michael Davelaar

//* Definitie class
class Fruit {

    // PROPERTIES
    public $naam;
    private $prijs;
    // Methods

    public function PrintNaam(){

    }
    // Method om de prijs in te stellen
    public function setPrijs($prijs){
        $this->prijs = $prijs;
    }
}

?>