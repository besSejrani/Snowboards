<?php
require_once(dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . "vendor" . DIRECTORY_SEPARATOR . "autoload.php");
require_once(dirname(__DIR__) . DIRECTORY_SEPARATOR . "class" . DIRECTORY_SEPARATOR . "Snow.php");

class SnowActions
{

    public function addData()
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

    public function deleteData()
    {
        // Get URI parameter
        $uri = $_SERVER['REQUEST_URI'];
        $product = explode('/', $uri)[2];

        // Delete product from database
        $db = new Snow();
        $db->deleteSnow($product);

        header('Location: http://localhost:8000/products');
    }

    public static function UpdateData()
    {
        $uri = $_SERVER['REQUEST_URI'];
        $product = explode('/', $uri)[2];

        $db = new Snow();
        return $db->getASnow($product);
    }
}