<?php
session_start();
require_once 'Dobbelspel.php';

if (!isset($_SESSION['spel'])) {
    $_SESSION['spel'] = serialize(new Dobbelspel());
}

if (is_string($_SESSION['spel'])) {
    $spel = unserialize($_SESSION['spel']);
    $_SESSION['spel'] = serialize($spel); // keep session up to date
} else {
    $spel = new Dobbelspel();
    $_SESSION['spel'] = serialize($spel);
}

// Check voor POST-verzoeken voor spel setup
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['nieuwSpel'])) {
        // Reset het spel
        $aantalSpelers = $_POST['aantalSpelers'] ?? 1;
        $spel = new Dobbelspel();
        for ($i = 0; $i < $aantalSpelers; $i++) {
            $spel->voegSpelerToe(new Speler());
        }
        $_SESSION['spel'] = serialize($spel);
    } elseif (isset($_POST['werp'])) {
        $spel->werp();
        $_SESSION['spel'] = serialize($spel);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DobbelSpel</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>DobbelSpel</h1>
    <form method="post">
        <select name="aantalSpelers">
            <option value="1">1 Speler</option>
            <option value="2">2 Spelers</option>
        </select>
        <button type="submit" name="nieuwSpel">Start Nieuw Spel</button>
    </form>

    <form method="post">
        <button type="submit" name="werp">Werp Dobbelstenen</button>
    </form>

    <div class="spel-output">
    <?php
    $spel->toonSpelersWorpen();
    $spel->toonScores();
    ?>
    </div>

</body>
</html>