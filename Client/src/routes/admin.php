<?php

$router->map(
    'GET',
    '/admin',
    function () {
        require __DIR__ . "/../src/pages/admin.php";
    },
    "admin"
);