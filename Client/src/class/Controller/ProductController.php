<?php

namespace App\Controller;
require (dirname(__DIR__, 3) . "/vendor/autoload.php");

use App\Repository\ProductRepository;
use Error;

class ProductController{

    static string $headerLocation ='Location: http://localhost:8000/products';

    public static function AddProduct()
    {
        // POST values
        $name = $_POST['Name'];
        $description = $_POST['Description'];
        $price = $_POST['Price'];
        $sku = $_POST['SKU'];
        $brand = $_POST['Brand'];

        try{
            $product = new ProductRepository();
            $product->AddProduct($name, $description, $price, $sku, $brand);
            header(ProductController::$headerLocation);
        }catch(Error $e){
            echo $e->getMessage();
        }
    }

    public static function GetProductId()
    {
        // URI parameter
        $uri = $_SERVER['REQUEST_URI'];
        $product = explode('/', $uri)[4];
        
        try{
            $db = new ProductRepository();
            return $db->GetProductById($product);
        }catch(Error $e){
            echo $e->getMessage();
        }
    }

    public static function UpdateProduct()
    {
        // POST values
        $name = $_POST['Name'];
        $description = $_POST['Description'];
        $price = $_POST['Price'];
        $sku = $_POST['SKU'];
        $brand = $_POST['Brand'];

        // URI parameter
        $uri = $_SERVER['REQUEST_URI'];
        $id = explode('/', $uri)[4];
        
        try{   
            $db = new ProductRepository();
            $db->updateProduct($id, $name, $description, $price, $sku, $brand);
            header(ProductController::$headerLocation);
        }catch(Error $e){
            echo $e->getMessage();
        }
    }

    public static function DeleteProduct()
    {
        // URI parameter
        $uri = $_SERVER['REQUEST_URI'];
        $id = explode('/', $uri)[4];
        
        try{
        $product = new ProductRepository();
        $product->deleteProduct($id);

        header(ProductController::$headerLocation);
        }catch(Error $e){
            echo $e->getMessage();
        }
    }
}