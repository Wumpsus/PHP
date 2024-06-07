<?php
    // Auteur: Michael Davelaar
    // Funcite: OOP8
class Product {
    public $name;
    public $price;
    public $currency;

    public function __construct($name, $price, $currency) {
        $this->name = $name;
        $this->price = $price;
        $this->currency = $currency;
    }

    public function getProduct() {
        return "Het product " . $this->name . " kost " . $this->currency . " " . $this->price;
    }
}

$product1 = new Product("Techo beats", 2, "&euro;");
$product2 = new Product("Classic waves", 15, "&euro;");
$product3 = new Product("Jazz vibes", 10, "&euro;");

echo $product1->getProduct();
echo "\n";
echo $product2->getProduct();
echo "\n";
echo $product3->getProduct();
