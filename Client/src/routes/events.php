<?php

$router->map(
    'GET',
    '/events',
    function () {
        require __DIR__ . "/../pages/events.php";
    },
    "events"
);