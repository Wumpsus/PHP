<?php

declare(strict_types=1);
require_once 'OOP9.php';
require_once 'ListenList.php';

$music1 = new Music(name: 'Bach', genre: 'Klassiek', listen: 3, extraString: 'Extra info', extraInt: 42, anotherString1: 'String1', anotherString2: 'String2', anotherInt: 100);

$kees = new ListenList();
$kees->addMusic($music1);

$music2 = new Music(name: 'ABC', genre: 'House', listen: 2, extraString: 'Extra info 2', extraInt: 43, anotherString1: 'String3', anotherString2: 'String4', anotherInt: 101);

$kees->addMusic($music2);

$music3 = new Music(name: 'Mozart', genre: 'Classical', listen: 5, extraString: 'Extra info 3', extraInt: 44, anotherString1: 'String5', anotherString2: 'String6', anotherInt: 102);

$kees->addMusic($music3);

foreach ($kees->music as $music) {
    echo $music->getName() . PHP_EOL;
}

var_dump($kees);
