<?php
    // Auteur: Michael Davelaar
    // Funcite: Olifant met info
class Animal {
    private $naam;

    public function __construct($naam) {
        $this->naam = $naam;
        echo "Nieuw dik beest is geboren.\n";
    }

    public function Info() {
        echo "Naam: " . $this->naam . "\n";
    }

    public function Eat() {
        echo "Dikzak is aan het eten\n";
    }

    public function Sleep() {
        echo "Dikzak is aan het slapen\n";
    }
}

// Het dier
$dier = new Animal("Olifant");

// Info, Eat en Sleep
$dier->Info();
echo "<br>";
$dier->Eat();
echo "<br>";
$dier->Sleep();
?>