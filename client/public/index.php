<?php
require_once(dirname(__DIR__) . DIRECTORY_SEPARATOR . "vendor" . DIRECTORY_SEPARATOR . "autoload.php");
// $whoops = new \Whoops\Run;
// $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
// $whoops->register();

$router = new AltoRouter();
//$router->setBasePath('/public');

$content = null;
$js = null;
$title = null;

$router->map(
    'GET',
    '/',
    function () {
        require __DIR__ . "/../src/pages/home.php";
    },
    "home"
);
$router->map(
    'GET',
    '/events',
    function () {
        require __DIR__ . "/../src/pages/events.php";
    },
    "events"
);
$router->map(
    'GET',
    '/products',
    function () {
        require __DIR__ . "/../src/pages/products.php";
    },
    "products"
);
$router->map(
    'GET',
    '/snow_add',
    function () {
        require  __DIR__ . "/../src/pages/snow_add.php";
    },
    "snow_add"
);
$router->map(
    'POST',
    '/snow_data_add',
    function () {
        require  __DIR__ . "/../src/controller/snow_add_data.php";
    },
    "snow_add_data"
);
$router->map(
    'GET',
    '/snow_delete',
    function () {
        require  __DIR__ . "/../src/pages/snow_delete.php";
    },
    "snow_delete"
);
$router->map(
    'GET',
    '/snow_update/[a:action]',
    function () {
        require  __DIR__ . "/../src/pages/snow_update.php";
    },
    "snow_update product"
);
$router->map(
    'GET',
    '/snow_delete/[a:action]',
    function () {
        require  __DIR__ . "/../src/pages/snow_delete.php";
    },
    "snow_delete product"
);
$router->map(
    'GET',
    '/login',
    function () {
        require  __DIR__ . "/../src/pages/login.php";
    },
    "login"
);
$router->map(
    'GET',
    '/register',
    function () {
        require  __DIR__ . "/../src/pages/register.php";
    },
    "register"
);
$router->map(
    'GET',
    '/admin',
    function () {
        require  __DIR__ . "/../src/pages/admin.php";
    },
    "admin"
);


$match = $router->match();
// dump($match);
//dump($match['target']);
// test
if (is_array($match) && is_callable($match['target'])) {
    call_user_func_array($match['target'], $match['params']);
} else {
    // No route was matched
    require_once(dirname(__DIR__) . DIRECTORY_SEPARATOR . "src" . DIRECTORY_SEPARATOR . "pages" . DIRECTORY_SEPARATOR . "404.php");
}