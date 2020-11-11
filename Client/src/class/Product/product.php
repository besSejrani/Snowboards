<?php

namespace App\Controller\Product;

require_once(dirname(__DIR__, 3) . "/vendor/autoload.php");

use App\Repository\SnowRepository;

class Product
{

    public static function addProduct()
    {
        $coupon = $_POST['coupon'];
        $brand = $_POST['brand'];
        $boots = $_POST['boots'];
        $type = $_POST['type'];
        $available = $_POST['available'];

        $db = new SnowRepository();
        $db->addSnow($coupon, $brand, $boots, $type, $available);
        header('Location: http://localhost:8000/products');
    }

    public function deleteProduct()
    {
        // Get URI parameter
        $uri = $_SERVER['REQUEST_URI'];
        $product = explode('/', $uri)[2];

        // Delete product from database
        $db = new SnowRepository();
        $db->deleteSnow($product);

        header('Location: http://localhost:8000/products');
    }

    public static function updateProduct()
    {
        $uri = $_SERVER['REQUEST_URI'];
        $product = explode('/', $uri)[2];

        $db = new SnowRepository();
        return $db->getASnow($product);
    }
}