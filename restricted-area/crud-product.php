<?php
include_once("validate-sentinel.php");
require_once("../class/Product.php");

$product = new Product();

$product->setProductId($_POST["productId"]);
$product->setProductDesc($_POST["productDesc"]);
$product->setProductName($_POST["productName"]);
$product->setProductImg($_FILES["productImg"]['name']);

$imgName = $_FILES["productImg"]['name'];
$file = $_FILES["productImg"]['tmp_name'];
$imgPath = "../restricted-area/img/product-img/" . $imgName;
move_uploaded_file($file, $imgPath);

if (empty($_POST["productId"]) && !empty($_POST["productDesc"]) && !empty($_POST["productName"]) && !empty($_FILES["productImg"]['name'])) {
    echo $product->register($product);
} else if (!empty($_POST["productId"])) {
    echo $product->edit($product);
} else {
    $product->setProductId($_GET['productId']);
    echo $product->delete($product);
}

header("location:show-product.php");
?>