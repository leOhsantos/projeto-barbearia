<?php
require_once("Connection.php");

class Product
{
    private $productId;
    private $productName;
    private $productDesc;

    public function getProductId()
    {
        return $this->productId;
    }

    public function getProductName()
    {
        return $this->productName;
    }

    public function getProductDesc()
    {
        return $this->productDesc;
    }

    public function getProductImg()
    {
        return $this->productImg;
    }

    public function setProductId($productId)
    {
        $this->productId = $productId;
    }

    public function setProductName($productName)
    {
        $this->productName = $productName;
    }

    public function setProductDesc($productDesc)
    {
        $this->productDesc = $productDesc;
    }

    public function setProductImg($productImg)
    {
        $this->productImg = $productImg;
    }

    public function register($product)
    {
        $connection = Connection::connect();
        $stmt = $connection->prepare("INSERT INTO producttb (productDesc, productName, productImg) VALUES (?, ?, ?)");
        $stmt->bindValue(1, $product->getProductDesc());
        $stmt->bindValue(2, $product->getProductName());
        $stmt->bindValue(3, $product->getProductImg());
        $stmt->execute();
    }

    public function delete($product)
    {
        $connection = Connection::connect();
        $stmt = $connection->prepare("DELETE FROM producttb WHERE productId = ?");
        $stmt->bindValue(1, $product->getProductId());
        $stmt->execute();
    }

    public function edit($product)
    {
        $connection = Connection::connect();
        $stmt = $connection->prepare("UPDATE producttb SET productDesc = ?, productName = ?, productImg = ? WHERE productId = ?");
        $stmt->bindValue(1, $product->getProductDesc());
        $stmt->bindValue(2, $product->getProductName());
        $stmt->bindValue(3, $product->getProductImg());
        $stmt->bindValue(4, $product->getProductId());
        $stmt->execute();
    }

    public function editWithoutImg($product)
    {
        $connection = Connection::connect();
        $stmt = $connection->prepare("UPDATE producttb SET productDesc = ?, productName = ? WHERE productId = ?");
        $stmt->bindValue(1, $product->getProductDesc());
        $stmt->bindValue(2, $product->getProductName());
        $stmt->bindValue(3, $product->getProductId());
        $stmt->execute();
    }

    public function list()
    {
        $connection = Connection::connect();
        $stmt = $connection->prepare("SELECT * FROM producttb");
        $stmt->execute();
        return $stmt;
    }
}
?>