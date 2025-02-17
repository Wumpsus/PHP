<?php

//* Functie: beschrijving object - class Fruit
//* Auteur: Michael Davelaar

//* Definitie class
class Fruit {

    // PROPERTIES
    public $Name;
    private $Price;

    // Constructor met parameter
    public function __construct($Name, $prijs)
    {
        echo "Object Fruit wordt aangemaakt<br>";
        $this->Name = $Name;
    }

    // Methode om de prijs in te stellen
    public function setPrice($prijs){
        $this->Price = $prijs;
    }

    // Methode om de prijs op te vragen
    public function getPrice(){
        return $this->Price;
    }
}

?>
