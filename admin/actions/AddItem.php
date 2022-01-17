<?php 

// Require database connection 
require_once '../../database/DBController.php';
require_once '../../database/Product.php';

// DBController object
$db = new DBController(); 

// Product object
$product = new Product($db);

$name = $_POST['name'];
$price = $_POST['price'];
$brand = $_POST['brand'];
$category = $_POST['category'];
$image = $_FILES['image'];
$color = $_POST['color'];
$info = $_POST['info'];
$type = $_POST['type'];

// Path where images will be stored
$path = "../../img/products/" . $_FILES['image']['name'];

// Move file
move_uploaded_file($_FILES['image']['tmp_name'], $path);

// Database needs path with one dot and one slash so replace first two dots and slash
$image_path = str_replace("../.", '', $path);


$product->addProduct($name, $price, $brand, $category, $image_path, $color, $info, $type);



header('Location: ../dashboard.php');