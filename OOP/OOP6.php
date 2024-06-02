<?php
class Product {
    public $name;
    public $description;
    public $price;
    public $currency;

    public function __construct($name, $description, $price, $currency = '&euro;') {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->currency = $currency;
    }    public function displayProduct() {
        echo "Product Name: " . $this->name . "<br>";
        echo "Description: " . $this->description . "<br>";
        echo "Price: " . $this->currency . $this->price . "<br>";
    }
}

$product1 = new Product("Laptop", "A high-end gaming laptop", 1500, "&euro;");
$product1->displayProduct();

$product3 = new Product("Tablet", "Lightweight and powerful tablet", 600, "$");
$product3->displayProduct();
?>
