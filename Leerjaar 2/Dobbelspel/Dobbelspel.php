<?php

require_once 'Speler.php';

class Dobbelspel {
    public $spelers = [];
    private $huidigeSpelerIndex = 0;
    private $huidigeRonde = 1; // Eigenschap om de huidige ronde bij te houden

    public function voegSpelerToe($speler) {
        $this->spelers[] = $speler;
    }

public function werp() {
    if (count($this->spelers) > 0) {
        $this->spelers[$this->huidigeSpelerIndex]->werpDobbelstenen();

        // Ga naar de volgende speler
        $this->huidigeSpelerIndex = ($this->huidigeSpelerIndex + 1) % count($this->spelers);

        // Controleer of alle spelers aan de beurt zijn geweest
        if ($this->huidigeSpelerIndex == 0) { // Alle spelers zijn geweest, dus ronde is voltooid
            $this->huidigeRonde++;

            // Na de derde ronde, bepaal de winnaar
            if ($this->huidigeRonde > 3) {
                $this->bepaalWinnaar(); // Deze methode bepaalt de winnaar
                // Na het bepalen van de winnaar kun je ervoor kiezen om het spel te resetten of iets anders
            }
        }
    }
}

private function bepaalWinnaar() {
    if (count($this->spelers) == 0) {
        echo "Er zijn geen spelers in het spel.";
        return;
    }
    $winnaarIndex = 0;
    $hoogsteScore = 0;
    foreach ($this->spelers as $index => $speler) {
        $totaalScore = $speler->getTotaalScore(); // Aanname dat deze methode bestaat
        if ($totaalScore > $hoogsteScore) {
            $hoogsteScore = $totaalScore;
            $winnaarIndex = $index;
        }
    }

    // Toon de winnaar en hun score
    echo "De winnaar is Speler " . ($winnaarIndex + 1) . " met een score van " . $hoogsteScore . ".<br>";
}

public function toonSpelersWorpen() {
    foreach ($this->spelers as $index => $speler) {
        echo "Speler " . ($index +1) . ":<br>";
        echo $speler->genereerSvgVoorWorpen();
        echo "<br>";
    }
}

public function toonScores() {

            foreach ($this->spelers as $index => $speler) {
            echo "Score van Speler " . ($index + 1) . ": ";
            $speler->toonTotaalScore();
            echo "<br>";
        }
    }
}