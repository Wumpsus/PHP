<?php

require 'vendor/autoload.php';

use MijnProject\Gebruiker;

$gebruiker = new Gebruiker("John Doe");
echo "Gebruiker: " . $gebruiker->getNaam();