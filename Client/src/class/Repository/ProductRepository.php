<?php

namespace App\Repository;

use App\Model\Mysql;

class ProductRepository
{
    public function GetProductById(string $id)
    {
        $sql = "SELECT * FROM snows_bes.product WHERE id='$id'";
        $db = new Mysql();
        return $db->executeQuery($sql);
    }

    public function getProducts()
    {
        $sql = "SELECT * FROM snows_bes.product order by id";
        $db = new Mysql();
        return $db->executeQuery($sql);
    }

    public function addProduct(string $name, string $description, int $price, string $sku, string $brand)
    {
        $sql = "INSERT INTO snows_bes.product (name, description, price, sku, brand) VALUES('$name', '$description', '$price', '$sku','$brand' )";
        $db = new Mysql();
        $db->executeQuery($sql);
    }

    public function updateProduct()
    {
        // $sql = "DELETE FROM product where idSnow=$_GET[idSnow]";
        // $result = $this->executeQuery($sql);
        // return $result;
    }

    public function deleteProduct(string $id)
    {

        $sql = "DELETE FROM snows_bes.product WHERE id='$id'";
        $db = new Mysql();
        $db->executeQuery($sql);
    }
}