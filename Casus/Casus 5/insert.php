<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Gastenboek</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Laat een reactie achter</h2>
    <form action="insert.php" method="POST">
        <label for="naam">Naam:</label>
        <input type="text" id="naam" name="naam" required>
        <br>
        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" required>
        <br>
        <label for="bericht">Bericht:</label>
        <textarea id="bericht" name="bericht" required></textarea>
        <br>
        <input type="submit" value="Plaats reactie">
    </form>
    <?php
require 'connect.php';

// Functie om BBCode, scheldwoorden en smileys te verwerken (waarom doen de smileys het niet)
function parseBBCode($text) {
    $bbcode = [
        '/\[b\](.*?)\[\/b\]/s' => '<strong>$1</strong>',
        '/\[u\](.*?)\[\/u\]/s' => '<u>$1</u>',
        '/\[color=(.*?)\](.*?)\[\/color\]/s' => '<span style="color:$1;">$2</span>',
        '/\[size=(.*?)\](.*?)\[\/size\]/s' => '<span style="font-size:$1px;">$2</span>',
    ];
    foreach ($bbcode as $key => $value) {
        $text = preg_replace($key, $value, $text);
    }
    return $text;
}

function parseSmileys($text) {
    $smileys = [
        ':\)' => '<img src="img/smile.png" alt=":)">',
        ':\(' => '<img src="img/sad.png" alt=":(">',
    ];
    foreach ($smileys as $key => $value) {
        $text = preg_replace('/' . preg_quote($key, '/') . '/', $value, $text);
    }
    return $text;
}

function filterScheldwoorden($text) {
    $scheldwoorden = ['kanker', 'nigger', 'neger']; // 3 scheldwoorden die niet mogen op de website
    foreach ($scheldwoorden as $word) {
        $text = str_ireplace($word, '***', $text);
    }
    return $text;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $naam = htmlspecialchars($_POST['naam']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $bericht = htmlspecialchars($_POST['bericht']);
    
    $bericht = filterScheldwoorden($bericht);
    $bericht = parseBBCode($bericht);
    $bericht = parseSmileys($bericht);

    if (!empty($naam) && !empty($email) && !empty($bericht)) {
        $stmt = $conn->prepare("INSERT INTO reacties (naam, email, bericht) VALUES (:naam, :email, :bericht)");
        $stmt->bindParam(':naam', $naam);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':bericht', $bericht);
        
        if ($stmt->execute()) {
            echo "Reactie succesvol toegevoegd!";
        } else {
            echo "Er is een fout opgetreden. Probeer het opnieuw.";
        }
    } else {
        echo "Alle velden zijn verplicht!";
    }
} else {
    echo "waar is je aanvraag????";
}
?>

</body>
</html>
