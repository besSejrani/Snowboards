<?php

// ========================================================================================================

$router->map(
    'GET',
    '/',
    function () {
        require __DIR__ . "/../pages/home.php";
    },
    "home"
);

// ========================================================================================================

$router->map(
    'GET',
    '/contact',
    function () {
        require __DIR__ . "/../pages/contact.php";
    },
    "contact"
);
