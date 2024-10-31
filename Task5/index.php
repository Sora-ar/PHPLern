<?php

use Task5\classes\Product;
use Task5\classes\DiscountedProduct;
use Task5\classes\Category;

require_once __DIR__ . "/classes/Product.php";
require_once __DIR__ . "/classes/DiscountedProduct.php";
require_once __DIR__ . "/classes/Category.php";

$product1 = new Product("Товар 1", 100, "Опис товару 1");
$product2 = new Product("Товар 2", 200, "Опис товару 2");

$discountedProduct1 = new DiscountedProduct("Товар 3", 150, "Опис товару 3", 10);
$discountedProduct2 = new DiscountedProduct("Товар 4", 250, "Опис товару 4", 20);

echo $product1->getInfo();
echo $product2->getInfo();
echo $discountedProduct1->getInfo();
echo $discountedProduct2->getInfo();

$category = new Category("Електроніка");
$category->addProduct($product1);
$category->addProduct($discountedProduct1);
$category->showProducts();
