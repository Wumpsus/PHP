<?php
include 'config.php';

// Basisfuncties
function optellen($a, $b) {
    return $a + $b;
}

function aftrekken($a, $b) {
    return $a - $b;
}

function vermenigvuldigen($a, $b) {
    return $a * $b;
}

function delen($a, $b) {
    if ($b == 0) {
        throw new Exception("Delen door nul is niet toegestaan.");
    }
    return $a / $b;
}

// Geavanceerde functies
function machtsverheffen($a, $b) {
    return pow($a, $b);
}

function modulo($a, $b) {
    if ($b == 0) {
        throw new Exception("Modulo door nul is niet toegestaan.");
    }
    return $a % $b;
}

function worteltrekken($a) {
    if ($a < 0) {
        throw new Exception("Wortel van een negatief getal is niet gedefinieerd.");
    }
    return sqrt($a);
}

function afronden($a, $nauwkeurigheid) {
    return round($a, $nauwkeurigheid);
}

function berekenReeks($invoer, $nauwkeurigheid = 2) {
    // Verwijder alle ongeldige tekens om de invoer te valideren
    $invoer = preg_replace('#[^0-9+\-*/(). ]#', '', $invoer);
    if (empty($invoer)) {
        throw new Exception("Ongeldige invoer bij de som.");
    }

    // Controleer of de invoer een deling door nul bevat
    if (strpos($invoer, '/0') !== false) {
        throw new Exception("Delen door nul is niet toegestaan.");
    }

    try {
        // Verwerk de invoer en voer de berekeningen uit
        echo "Te evalueren expressie: " . $invoer . "<br>";
        $resultaat = eval('return ' . $invoer . ';');
        if ($resultaat === false) {
            throw new Exception("Ongeldige invoer bij de som.");
        }
        return afronden($resultaat, $nauwkeurigheid);
    } catch (ParseError $e) {
        throw new Exception("Ongeldige invoer bij de som.");
    }
    
}

function haalBerekeningenOp($conn) {
    $stmt = $conn->query("SELECT * FROM " . CRUD_TABLE);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function slaBerekeningOp($conn, $som, $nauwkeurigheid, $antwoord) {
    $stmt = $conn->prepare("INSERT INTO " . CRUD_TABLE . " (som, nauwkeurigheid, antwoord) VALUES (?, ?, ?)");
    $stmt->execute([$som, $nauwkeurigheid, $antwoord]);
}
?>
