<?php
    // Auteur: Michael Davelaar
    // Funcite: Sessions

    // main

    session_start();

    // Is dit de eerste keer
    if (isset($_SESSION["Teller"]) == false) {
        // Sessie bestaat niet
        echo"Sessie bestaat NIET<br>";
        $_SESSION["Teller"] = 0;
        $_SESSION["Username"] = "";
    } 
    else {
        echo "Sessie bestaat<br>";

        // Teller ophogen
        $_SESSION["Teller"]++;
    }

    echo $_SESSION["Teller"];
    echo $_SESSION["Username"];


?>