<?php
        // Auteur: Michael Davelaar
        // Functie: Korting berekenen van een bedrag

        // main
        
// Initialiseer variabelen
$inputText = "";
$outputText = "";

// Verwerk het formulier wanneer op de verzendknop wordt geklikt
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inputText = isset($_POST["inputText"]) ? $_POST["inputText"] : "";
    
    // Controleer de geselecteerde uitvoermethode
    if (isset($_POST["outputMethod"])) {
        $outputMethod = $_POST["outputMethod"];
        
        // Pas de uitvoermethode toe op de ingevoerde tekst
        switch ($outputMethod) {
            case "in hoofdletters":
                $outputText = strtoupper($inputText);
                break;
                
            case "in kleine letters":
                $outputText = strtolower($inputText);
                break;
                
            case "eerste letter van zin hoofdletters":
                $outputText = ucwords(strtolower($inputText));
                break;
                
            case "eerste letter van ieder woord hoofdletter":
                $outputText = strrev($inputText);
                break;
                
            default:
                $outputText = "Ongeldige uitvoermethode geselecteerd.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Text Verwerking</title>
</head>
<body>

<form method="post" action="<?php echo ($_SERVER["PHP_SELF"]); ?>">
    <label for="inputText">Voer tekst in:</label>
    <input type="text" name="inputText" value="<?php echo $inputText; ?>" required>
    <br>
    <input type="radio" name="outputMethod" value="in hoofdletters" checked> in hoofdletters
    <input type="radio" name="outputMethod" value="in kleine letters"> in kleine letters
    <input type="radio" name="outputMethod" value="eerste letter van zin hoofdletters"> eerste letter van zin hoofdletters
    <input type="radio" name="outputMethod" value="eerste letter van ieder woord hoofdletter"> eerste letter van ieder woord hoofdletter
    <br>
    <input type="submit" value="Verzend">
</form>

<?php
// Toon de uitvoer
if ($outputText !== "") {
    echo "<h2>Uitvoer:</h2>";
    echo "<p>$outputText</p>";
}
?>

</body>
</html>