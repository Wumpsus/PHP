<?php
class Product {
    public $name;
    public $price;
    
    public function __construct($name, $price) {
        $this->name = $name;
        $this->price = $price;
    }

    public function formatPrice() {
        return number_format($this->price, 2);
    }
}

$frisdrank1 = new Product("Cola", 1.50);
$frisdrank2 = new Product("Fanta", 1.40);
$frisdrank3 = new Product("Sprite", 1.30);
$frisdrank4 = new Product("7-Up", 1.20);

echo $frisdrank1->name . " kost €" . $frisdrank1->formatPrice() . "<br>";
echo $frisdrank2->name . " kost €" . $frisdrank2->formatPrice() . "<br>";
echo $frisdrank3->name . " kost €" . $frisdrank3->formatPrice() . "<br>";
echo $frisdrank4->name . " kost €" . $frisdrank4->formatPrice() . "<br>";
?>
