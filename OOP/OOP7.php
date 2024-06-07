<?php
    // Auteur: Michael Davelaar
    // Funcite: OOP7
class Product {
    public function __construct(
        private string $name, 
        private float $price, 
        private string $currency
    ) {}

    public function getName(): string {
        return $this->name;
    }

    public function setName(string $name): void {
        $this->name = $name;
    }

    public function getPrice(): float {
        return $this->price;
    }

    public function setPrice(float $price): void {
        $this->price = $price;
    }

    public function getCurrency(): string {
        return $this->currency;
    }

    public function setCurrency(string $currency): void {
        $this->currency = $currency;
    }
}

$product = new Product('Laptop', 999.99, 'EUR');
echo $product->getName(); // Laptop
echo $product->getPrice(); // 999.99 (Prijs)
echo $product->getCurrency(); // EUR
