<?php

$router->map(
    'GET',
    '/admin',
    function () {
        require __DIR__ . "/../pages/admin.php";
    },
    "admin"
);
