<?php

$router->map(
    'GET',
    '/products',
    function () {
        require __DIR__ . "/../pages/products.php";
    },
    "products"
);

$router->map(
    'GET',
    '/snow_add',
    function () {
        require __DIR__ . "/../pages/snow_add.php";
    },
    "snow_add"
);
$router->map(
    'POST',
    '/snowActions',
    function () {
        require __DIR__ . "/../controller/snowActions.php";
        $action = new SnowActions();
        $action->addData();
    },
    "snowActions"
);
$router->map(
    'GET',
    '/snow_delete',
    function () {
        require __DIR__ . "/../pages/snow_delete.php";
    },
    "snow_delete"
);
$router->map(
    'GET',
    '/snow_update/[a:action]',
    function () {
        require __DIR__ . "/../pages/snow_update.php";
    },
    "snow_update product"
);
$router->map(
    'GET',
    '/snow_delete/[a:action]',
    function () {
        require __DIR__ . "/../pages/snow_delete.php";
    },
    "snow_delete product"
);