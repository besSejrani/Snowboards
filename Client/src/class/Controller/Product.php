<?php

namespace App\Controller;

require (dirname(__DIR__, 4) . "/vendor/autoload.php");

use App\Repository\Snow;

class Product{

    public function addProduct()
    {
        $coupon = $_POST['coupon'];
        $brand = $_POST['brand'];
        $boots = $_POST['boots'];
        $type = $_POST['type'];
        $available = $_POST['available'];

        $db = new Snow();
        $db->addSnow($coupon, $brand, $boots, $type, $available);
        header('Location: http://localhost:8000/products');
    }

    public function deleteProduct()
    {
        // Get URI parameter
        $uri = $_SERVER['REQUEST_URI'];
        $product = explode('/', $uri)[2];

        // Delete product from database
        $db = new Snow();
        $db->deleteSnow($product);

        header('Location: http://localhost:8000/products');
    }

    public static function updateProduct()
    {
        $uri = $_SERVER['REQUEST_URI'];
        $product = explode('/', $uri)[2];

        $db = new Snow();
        return $db->getASnow($product);
    }
}