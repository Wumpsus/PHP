<?php
  //auteur: Michael Davelaar
  //functie: uitleg datum functie

  //installatie:
  $datum = date("l d F Y");

  //main

  echo "Datum is $datum.";
  echo "<br>";
  echo "Vandaag is het de " . date("z") . "e dag van het jaar.";
  echo "<br>";
  echo date("l") . " is de " . date("w") . "e dag van de week.";
  echo "<br>";
  echo "De maand " . date("F") . "heeft in totaal " . date("t") . " dagen.";
  echo "<br>";
  echo "Het jaar " . date("Y") . " is geen " . date("L");
?>