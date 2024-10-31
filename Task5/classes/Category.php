<?php

namespace Task5\classes;

class Category {
    public $name;
    private $products = [];

    public function __construct($name) {
        $this->name = $name;
    }

    public function addProduct(Product $product) {
        $this->products[] = $product;
    }

    public function showProducts() {
        echo "Категорія: {$this->name}\n";
        foreach ($this->products as $product) {
            echo $product->getInfo() . "\n";
        }
    }
}
