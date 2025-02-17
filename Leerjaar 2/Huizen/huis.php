<?php
class Huis {
    private int $aantalVerdiepingen;
    private int $aantalKamers;
    private float $breedte;
    private float $hoogte;
    private float $diepte;
    private float $volume;
    private const PRIJS_PER_M3 = 1500;

// Constructie van  
    public function __construct(int $aantalVerdiepingen, int $aantalKamers, float $breedte, float $hoogte, float $diepte) {
        $this->aantalVerdiepingen = $aantalVerdiepingen;
        $this->aantalKamers = $aantalKamers;
        $this->breedte = $breedte;
        $this->hoogte = $hoogte;
        $this->diepte = $diepte;
        $this->berekenVolume();
    }

    // Method voor volume berekenen
    private function berekenVolume(): void {
        $this->volume = $this->breedte * $this->hoogte * $this->diepte;
    }

    // Method voor prijs berekenen
    public function berekenPrijs(): float {
        return $this->volume * self::PRIJS_PER_M3;
    }

    // Method om alle details te laten zien
    public function toonDetails(): void {
        echo "Huis details:\n";
        echo "Aantal verdiepingen: {$this->aantalVerdiepingen}\n";
        echo "Aantal kamers: {$this->aantalKamers}\n";
        echo "Afmetingen: {$this->breedte}m x {$this->hoogte}m x {$this->diepte}m\n";
        echo "Volume: {$this->volume} m³\n";
        echo "Prijs: €" . number_format($this->berekenPrijs(), 2, ',', '.') . "\n";
        echo "<br>-----------------------------\n";
        echo "<br>";
    }
}

// 3 huizen maken met verschillende verdiepingen, kamers en breedte
$huis1 = new Huis(2, 5, 10.5, 6.0, 8.2);
$huis2 = new Huis(3, 8, 12.0, 7.5, 10.0);
$huis3 = new Huis(1, 3, 8.0, 4.5, 6.5);

// Alle details printen van elk huis
$huis1->toonDetails();
$huis2->toonDetails();
$huis3->toonDetails();