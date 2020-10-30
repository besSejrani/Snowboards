<?php

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

$router->map(
    'POST',
    '/addSnowActions',
    function () {
        require __DIR__ . "/../controller/snowActions.php";
        $action = new SnowActions();
        $action->addData();
    },
    "addSnowActions"
);
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
        $action = new SnowActions();
        $action->deleteData();
    },
    "deleteSnowActions"
);