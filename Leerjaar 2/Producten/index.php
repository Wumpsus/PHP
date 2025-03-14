<?php

// Abstracte class product
abstract class Product {
    protected string $name;
    protected float $purchasePrice;
    protected int $tax;
    protected string $description;
    protected float $profit;
    protected string $category;

    public function __construct($name, $purchasePrice, $tax, $profit, $description) {
        $this->name = $name;
        $this->purchasePrice = $purchasePrice;
        $this->tax = $tax;
        $this->profit = $profit;
        $this->description = $description;
    }

    public function getSalesPrice(): float {
        return $this->purchasePrice + $this->profit + ($this->purchasePrice * $this->tax / 100);
    }

    abstract public function getInfo(): array;

    public function getCategory(): string {
        return $this->category;
    }

    public function getName(): string {
        return $this->name;
    }
}

// Subclass music, movie  & games

class Music extends Product {
    private string $artist;
    private array $numbers;

    public function __construct($name, $purchasePrice, $tax, $profit, $description, $artist, $numbers) {
        parent::__construct($name, $purchasePrice, $tax, $profit, $description);
        $this->artist = $artist;
        $this->numbers = $numbers;
        $this->category = "Music";
    }

    public function getInfo(): array {
        return ["Artiest" => $this->artist, "Nummers" => $this->numbers];
    }
}

class Movie extends Product {
    private string $quality;

    public function __construct($name, $purchasePrice, $tax, $profit, $description, $quality) {
        parent::__construct($name, $purchasePrice, $tax, $profit, $description);
        $this->quality = $quality;
        $this->category = "Movie";
    }

    public function getInfo(): array {
        return ["Kwaliteit" => $this->quality];
    }
}

class Game extends Product {
    private string $genre;
    private array $requirements;

    public function __construct($name, $purchasePrice, $tax, $profit, $description, $genre, $requirements) {
        parent::__construct($name, $purchasePrice, $tax, $profit, $description);
        $this->genre = $genre;
        $this->requirements = $requirements;
        $this->category = "Game";
    }

    public function getInfo(): array {
        return ["Genre" => $this->genre, "Vereisten" => $this->requirements];
    }
}

class ProductList {
    private array $products = [];

    public function addProduct(Product $product) {
        $this->products[] = $product;
    }

    public function getProducts(): array {
        return $this->products;
    }
}

// Voegt voorbeeld data toe
$productList = new ProductList();
$productList->addProduct(new Music("Test1", 5.00, 21, 1.50, "Music album", "Artiest 1", ["nummer 1", "nummer 2"]));
$productList->addProduct(new Movie("Starwars 1", 10.00, 21, 3.00, "Science fiction film", "DVD"));
$productList->addProduct(new Game("Call of Duty 1", 6.00, 21, 1.87, "Shooter game", "FPS", ["8GB RAM", "970 GTX"]));

// HTML
echo "<table border='1'>";
echo "<tr><th>Categorie</th><th>Naam product</th><th>Verkoopprijs</th><th>Info</th></tr>";
foreach ($productList->getProducts() as $product) {
    echo "<tr>";
    echo "<td>" . $product->getCategory() . "</td>";
    echo "<td>" . $product->getName() . "</td>";
    echo "<td>" . number_format($product->getSalesPrice(), 2) . "</td>";
    echo "<td><ul>";
    foreach ($product->getInfo() as $key => $value) {
        if (is_array($value)) {
            echo "<li>$key<ul>";
            foreach ($value as $item) {
                echo "<li>$item</li>";
            }
            echo "</ul></li>";
        } else {
            echo "<li>$key: $value</li>";
        }
    }
    echo "</ul></td>";
    echo "</tr>";
}
echo "</table>";
?>
