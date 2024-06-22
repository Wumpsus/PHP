<?php
class Animal {
    private static $count = 0;


    public function __construct() {
        self::$count++;
    }


    public static function getCount() {
        return self::$count;
    }
}


$animal1 = new Animal();
$animal2 = new Animal();
$animal3 = new Animal();

echo "Aantal Animal instanties: " . Animal::getCount();
?>