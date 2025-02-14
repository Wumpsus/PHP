<?php

class Product {
    private $name;
    private $price;
    private $category;

    public function __construct($name, $price, $category) {
        $this->setName($name);
        $this->price = $price;
        $this->setCategory($category);
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = ucfirst($name);
    }

    public function getPrice() {
        return $this->price;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    public function getCategory() {
        return $this->category;
    }

    public function setCategory($category) {
        $this->category = strtoupper($category);
    }
}

$product = new Product("appel", 1.50, "fruit");

echo "Name: " . $product->getName() . "\n";
echo "Price: " . $product->getPrice() . "\n";
echo "Category: " . $product->getCategory() . "\n";
?>
