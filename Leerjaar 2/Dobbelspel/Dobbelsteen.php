<?php
/* 
 * Dobbelsteen.php
 * Dit bestand bevat de klasse Dobbelsteen die een dobbelsteen simuleert.
 * De werp() functie genereert een willekeurig getal tussen 1 en 6.
 */
class Dobbelsteen {
    public function werp() {
        return rand(1, 6);
    }
}
?>