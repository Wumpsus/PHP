<?php
class Product {
    public $name;
    
    public function __construct($name) {
        $this->name = $name;
    }
}
// Originele naam
$frisdrank1 = new Product("Cola");
$frisdrank2 = new Product("Fanta");
$frisdrank3 = new Product("Sprite");
$frisdrank4 = new Product("7-Up");

echo $frisdrank1->name . "<br>";
echo $frisdrank2->name . "<br>";
echo $frisdrank3->name . "<br>";
echo $frisdrank4->name . "<br>";

// Naam na de wijziging
$frisdrank1->name = "Pepsi";
$frisdrank2->name = "Sisi";
$frisdrank3->name = "Capri-Sun";
$frisdrank4->name = "Zwarte piet";

echo "Na wijziging:<br>";
echo $frisdrank1->name . "<br>";
echo $frisdrank2->name . "<br>";
echo $frisdrank3->name . "<br>";
echo $frisdrank4->name . "<br>";
?>
