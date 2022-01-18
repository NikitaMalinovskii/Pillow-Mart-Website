<?php 

// Require database connection 
require './database/DBController.php';
require './database/Product.php';
require './database/Cart.php';


// DBController object
$db = new DBController(); 

// Product object
$product = new Product($db);

$product_array = $product->getDataFromTable('product');

// Cart object
$Cart = new Cart($db);

// Calculate subtotal
foreach ($_SESSION['cart'] ?? [] as $item){
    $cart = $product->getProductById($item);
    $subtotal[] = array_map(function ($product) {
        return $product['product_price'];
    }, $cart);
}

$_SESSION['subtotal'] = $Cart->calculateSubtotal($subtotal);