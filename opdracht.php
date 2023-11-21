<?php
  //Auteur: Michael Davelaar
  //Functie: Uitleg datum

  //Initialisatie:
  $datum = date("l d F Y");

  //main

  echo "datum is: $datum";

  echo "<br>";
  echo "Vandaag is het de: " . date("z") . "e dag van het jaar.";
  echo "<br>";
  echo date("l") . " is de " . date("w") . "e dag van de week.";
  echo "<br>";
  echo "De maand " . date("F") . " heeft in totaal " . date("t") . " dagen";
  echo "<br>";
  echo "Het jaar " . date("Y");
  $t = date("L");
  if ($t < "0") {
echo " is een schrikkeljaar.";
}

  if ($t < "1") {
echo " is geen schrikkeljaar.";
}

?>