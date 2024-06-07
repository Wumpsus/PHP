<?php

require_once 'OOP9.php';

$music1 = new Music(name: 'Bach', genre: 'Klassiek', listen: 3);

echo $music1->getName() . PHP_EOL;

var_dump($music1);
