<?php

namespace App\Controller;
require (dirname(__DIR__, 3) . "/vendor/autoload.php");

use App\Repository\ProductRepository;
use Error;

class ProductController{


    public static function AddProduct()
    {

        $name = $_POST['Name'];
        $description = $_POST['Description'];
        $price = $_POST['Price'];
        $sku = $_POST['SKU'];
        $brand = $_POST['Brand'];

        try{
            $product = new ProductRepository();
            $product->AddProduct($name, $description, $price, $sku, $brand);
            header('Location: http://localhost:8000/products');

        }catch(Error $e){
            echo $e->getMessage();
        }

       
    }

    public static function DeleteProduct()
    {
        try{
        // Get URI parameter
        $uri = $_SERVER['REQUEST_URI'];
        $id = explode('/', $uri)[4];

        $product = new ProductRepository();
        $product->deleteProduct($id);

        header('Location: http://localhost:8000/products');
        }catch(Error $e){
            echo $e->getMessage();
        }
    }

    public static function UpdateProduct()
    {
        $uri = $_SERVER['REQUEST_URI'];
        $product = explode('/', $uri)[4];

        $db = new ProductRepository();
        return $db->GetProductById($product);
    }
}