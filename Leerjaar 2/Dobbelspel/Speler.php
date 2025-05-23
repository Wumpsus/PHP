<?php

class Speler {
    private $score = 0;
    private $worpen = []; // Bewaart de worpresultaten

    public function werpDobbelstenen() {
        $worp = [];
        for ($i = 0; $i < 5; $i++) {
            $worp[] = rand(1, 6); // Willekeurige waarde tussen 1 en 6
        }
        $this->worpen[] = $worp;
        $this->berekenScore($worp);

    }

    private function berekenScore($worp) {
        $waardenTelling = array_count_values($worp);
        $basisScore = 0;
        $extraScore = 0;

        foreach ($waardenTelling as $waarde => $aantal) {
            if ($aantal > 1) {
                // Extra punten voor 2 of meer dezelfde
                $extraScore += ($waarde * $aantal) * $aantal;
            }
        }

        $this->score += $basisScore + $extraScore;
    }
    public function genereerSvgVoorWorpen() {
        $svgOutput = '';
        foreach ($this->worpen as $worp) {
            foreach ($worp as $dobbelsteen) {
                $svgOutput .= $this->genereerSvgVoorWorp($dobbelsteen);
            }
            $svgOutput .= "<br>"; // Voeg een break toe na elke worp
        }
        return $svgOutput;
    }

    private function genereerSvgVoorWorp($waarde) {
        $svg = "<svg width='60' height='60' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg' style='margin:5px; border: 1px solid #000;'>";
        $svg .= "<rect width='100' height='100' style='fill:white;'/>";
           $ogenPosities = [
            1 => [[50, 50]],
            2 => [[30, 30], [70, 70]],
            3 => [[30, 30], [50, 50], [70, 70]],
            4 => [[30, 30], [30, 70], [70, 30], [70, 70]],
            5 => [[30, 30], [30, 70], [50, 50], [70, 30], [70, 70]],
            6 => [[30, 30], [30, 50], [30, 70], [70, 30], [70, 50], [70, 70]],
           ];
           foreach ($ogenPosities[$waarde] as $positie) {
               $svg .= "<circle cx='{$positie[0]}' cy='{$positie[1]}' r='8' style='fill:black;'/>";
           }
           $svg .= "</svg>";
        return $svg;
    }

    public function getTotaalScore() {
        return $this->score;
    }

    // Optioneel: Toon de totaalscore van de speler
    public function toonTotaalScore() {
        echo "Totaal score: " . $this->getTotaalScore() . "<br/>";
    }
}