<?php
// auteur: Michael Davelaar
// functie: Verwijdert product die aangegeven word

include 'functions.php';

// Haalt bier uit de database
if(isset($_GET['id'])){

    // Kijkt of insert goed gelukt is
    if(deleteziek($_GET['id']) == true){
        echo '<script>alert("id: ' . $_GET['id'] . ' is verwijderd!")</script>';
        echo "<script> location.replace('mainn.php'); </script>";
    } else {
        echo '<script>alert("womp womp ziekmelding is niet verwijderd")</script>';
    }
}
?>

