<?php
class Kamer {
    private float $lengte;
    private float $breedte;
    private float $hoogte;

    public function __construct(float $lengte, float $breedte, float $hoogte) {
        $this->lengte = $lengte;
        $this->breedte = $breedte;
        $this->hoogte = $hoogte;
    }

    public function getVolume(): float {
        return $this->lengte * $this->breedte * $this->hoogte;
    }

    public function getDetails(): string {
        return "Lengte: {$this->lengte}m Breedte: {$this->breedte}m Hoogte: {$this->hoogte}m";
    }
}

class Huis {
    private array $kamers = [];
    private const PRIJS_PER_M3 = 3000;

    public function addKamer(Kamer $kamer): void {
        $this->kamers[] = $kamer;
    }

    public function getTotaalVolume(): float {
        $totaalVolume = 0;
        foreach ($this->kamers as $kamer) {
            $totaalVolume += $kamer->getVolume();
        }
        return $totaalVolume;
    }

    public function berekenPrijs(): float {
        return $this->getTotaalVolume() * self::PRIJS_PER_M3;
    }

    public function toonDetails(): void {
        echo "<h2>Inhoud Kamers:</h2><ul>";
        foreach ($this->kamers as $kamer) {
            echo "<li>" . $kamer->getDetails() . "</li>";
        }
        echo "</ul>";
        echo "<p><strong>Volume Totaal = " . $this->getTotaalVolume() . "m3</strong></p>";
        echo "<p><strong>Prijs van het huis is= " . number_format($this->berekenPrijs(), 2, ',', '.') . " Euro</strong></p>";
    }
}

// Huis aanmaken
$huis = new Huis();
$huis->addKamer(new Kamer(5.2, 5.1, 5.5));
$huis->addKamer(new Kamer(4.8, 4.6, 4.9));
$huis->addKamer(new Kamer(5.9, 2.5, 3.1));

// Details tonen
$huis->toonDetails();
?>
