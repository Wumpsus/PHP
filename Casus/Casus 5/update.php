<?php
require 'connect.php';

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
    $scheldwoorden = ['kanker', 'nigger', 'neger'];
    foreach ($scheldwoorden as $word) {
        $text = str_ireplace($word, '***', $text);
    }
    return $text;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = intval($_POST['id']);
    $naam = htmlspecialchars($_POST['naam']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $bericht = htmlspecialchars($_POST['bericht']);

    $bericht = filterScheldwoorden($bericht);
    $bericht = parseBBCode($bericht);
    $bericht = parseSmileys($bericht);

    if (!empty($naam) && !empty($email) && !empty($bericht)) {
        $stmt = $conn->prepare("UPDATE reacties SET naam = :naam, email = :email, bericht = :bericht WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':naam', $naam);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':bericht', $bericht);

        if ($stmt->execute()) {
            echo "Reactie bijgewerkt!";
        } else {
            echo "womp womp een fout";
        }
    } else {
        echo "Je moet alles invullen kut";
    }
} else {
    echo "waar is je aanvraag????";
}
?>
