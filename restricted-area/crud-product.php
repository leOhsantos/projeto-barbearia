<?php
include_once("validate-sentinel.php");
require_once("../class/Product.php");

$productId = $_POST["productId"];
$productDesc = $_POST["productDesc"];
$productName = $_POST["productName"];
$productImg = $_FILES["productImg"]['name'];

$product = new Product();

$product->setProductId($productId);
$product->setProductDesc($productDesc);
$product->setProductName($productName);
$product->setProductImg($productImg);

if (empty($productId) && !empty($productDesc) && !empty($productName) && !empty($productImg)) {
    $imgName = $productImg;
    $file = $_FILES["productImg"]['tmp_name'];
    $imgPath = "../restricted-area/img/product-img/" . $imgName;
    move_uploaded_file($file, $imgPath);

    echo $product->register($product);
} else if (!empty($productId) && !empty($productDesc) && !empty($productName) && !empty($productImg)) {
    $imgName = $productImg;
    $file = $_FILES["productImg"]['tmp_name'];
    $imgPath = "../restricted-area/img/product-img/" . $imgName;
    move_uploaded_file($file, $imgPath);

    echo $product->edit($product);
} else if (!empty($productId) && !empty($productDesc) && !empty($productName) && empty($productImg)) {
    echo $product->editWithoutImg($product);
} else {
    $product->setProductId($_GET['productId']);
    echo $product->delete($product);
}

header("location:show-product.php");
?>