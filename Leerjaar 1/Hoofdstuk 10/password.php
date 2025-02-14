<?php
// auteur: Michael Davelaar
// functie: Random wachtwoord generator
function generate_password($length, $use_uppercase, $use_special_chars) {
    $lowercase_characters = 'abcdefghijklmnopqrstuvwxyz';
    $uppercase_characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $digits = '0123456789';
    $special_characters = '!@#$%^&*()-_+=';

    $characters = $lowercase_characters;
    if ($use_uppercase) {
        $characters .= $uppercase_characters;
    }
    $characters .= $digits;
    if ($use_special_chars) {
        $characters .= $special_characters;
    }

    $password = '';
    $char_length = strlen($characters);

    for ($i = 0; $i < $length; $i++) {
        $index = rand(0, $char_length - 1);
        $password .= $characters[$index];
    }

    return $password;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["length"])) {
        $length = $_POST["length"];
        $use_uppercase = isset($_POST["use_uppercase"]) && $_POST["use_uppercase"] == "on";
        $use_special_chars = isset($_POST["use_special_chars"]) && $_POST["use_special_chars"] == "on";
        $password = generate_password($length, $use_uppercase, $use_special_chars);
        echo "Wachtwoord:<br> " . $password;
    } else {
        echo "womp womp lengte niet gegeven.";
    }
}

?>
