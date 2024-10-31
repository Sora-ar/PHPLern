<?php

namespace Task5\classes;

use Exception;

class Product {
    public $name;
    protected $price;
    public $description;

    public function __construct($name, $price, $description) {
        $this->name = $name;
        $this->setPrice($price); // Валідація ціни
        $this->description = $description;
    }

    public function setPrice($price) {
        if ($price >= 0) {
            $this->price = $price;
        } else {
            throw new Exception("Ціна не може бути від'ємною");
        }
    }

    public function getPrice() {
        return $this->price;
    }

    public function getInfo() {
        return "Назва: {$this->name}\nЦіна: {$this->price}\nОпис: {$this->description}\n";
    }
}
