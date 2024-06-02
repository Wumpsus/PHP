<?php

class Product {
    private $name;
    private $price;

    public function __construct($name, $price) {
        $this->name = ucfirst($name);
        $this->price = $price;
    }

    public function getName() {
        return $this->name;
    }

    public function getPrice() {
        return $this->price;
    }

    public function setPrice($price) {
        $this->price = $price;
    }
}

$product1 = new Product("appel", 1.50);
$product2 = new Product("banaan", 0.75);

echo "Product 1: " . $product1->getName() . " - Price: $" . $product1->getPrice() . "\n";
echo "Product 2: " . $product2->getName() . " - Price: $" . $product2->getPrice() . "\n";

?>
