<?php

class Scoreboard {
    private $scores;

    public function __construct() {
        $this->scores = [];
    }

    // Voegt een score toe voor een bepaalde speler

    public function addScore($playerName, $score) {
        if (!isset($this->scores[$playerName])) {
            $this->scores[$playerName] = [];
        }
        $this->scores[$playerName][] = $score;
    }

    // Geeft het scoreboard weer als een HTML-tabel
    public function display() {
        echo "<table border='1'>";
        echo "<tr><th>Speler</th><th>Scores</th><th>Totaal</th></tr>";
        foreach ($this->scores as $playerName => $scores) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($playerName) . "</td>";
            echo "<td>" . implode(", ", $scores) . "</td>";
            echo "<td>" . array_sum($scores) . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }

    public function getWinner() {
        $highestScore = 0;
        $winners = []; // Kan meerdere winnaars hebben bij gelijkspel
        foreach ($this->scores as $playerName => $scores) {
            $totalScore = array_sum($scores);
            if ($totalScore > $highestScore) {
                $highestScore = $totalScore;
                $winners = [$playerName];
            } elseif ($totalScore == $highestScore) {
                $winners[] = $playerName;
            }
        }
        if (count($winners) == 1) {
            return "Winnaar: " . $winners[0] . " met score " . $highestScore;
        } else {
            return "Gelijkspel tussen: " . implode(", ", $winners) . " met score " . $highestScore;
        }
    }
}