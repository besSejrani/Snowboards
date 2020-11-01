<?php

require (dirname(__DIR__,2) . "/vendor/autoload.php");

use App\Controller\Product\Product;

$router->map(
    'GET',
    '/products',
    function () {
        require (dirname(__DIR__, 2)) . "/src/pages/products/products.php";
    },
    "products"
);

// ========================================================================================================

$router->map(
    'GET',
    '/addProduct',
    function () {
        require __DIR__ . "/../pages/products/addProduct.php";
    },
    "addProduct"
);

// ========================================================================================================
/*
$router->map(
    'POST',
    '/product',
    function () {
        $action = new Product();
        $action->addProduct();
    },
    "addSnowActions"
);
*/
// ========================================================================================================

$router->map(
    'GET',
    '/updateProduct/[a:action]',
    function () {
        require __DIR__ . "/../pages/products/updateProduct.php";
    },
    "snow_update product"
);

// ========================================================================================================

$router->map(
    'GET',
    '/deleteSnowActions/[a:action]',
    function () {
        require __DIR__ . "/../controller/snowActions.php";
        $action = new Product();
        $action->deleteProduct();
    },
    "deleteSnowActions"
);