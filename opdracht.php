<?php
  //auteur: Michael Davelaar
  //functie: uitleg datum functie

  //installatie:
  $datum = date("l d F Y");

  //main

  echo "datum is: $datum";

  echo "<br>";
  echo "vandaag is het de: " . date("z") . "e dag van het jaar";
  echo "<br>";
  echo date("l") . " is de " . date("w") . "e dag van de week";
  echo "<br>";
  echo "de maand " . date("F") . " heeft in totaal " . date("t") . " dagen";
  echo "<br>";
  echo "het jaar " . date("Y");
  $t = date("L");
  if ($t < "0") {
echo " is geen schrikkeljaar";
}

  if ($t < "1") {
echo " is een schrikkeljaar";
}

?>