<?php
    // Auteur: Michael Davelaar
    // Funcite: Prijzen 

$producten = array(
    "Product A" => 100,
    "Product B" => 160,
    "Product C" => 45,
   
);

foreach ($producten as $product => $prijs) {
    
    if ($prijs > 150) {
    
        $prijs = $prijs + ($prijs * 0.19);
    } elseif ($prijs < 55) {
    
        $prijs = $prijs + ($prijs * 0.11);
    }

   
    echo "$product: €" . number_format($prijs, 2) . "\n";
}

?>
