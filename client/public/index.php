<?php
require_once(dirname(__DIR__) . DIRECTORY_SEPARATOR . "vendor" . DIRECTORY_SEPARATOR . "autoload.php");
// $whoops = new \Whoops\Run;
// $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
// $whoops->register();

$router = new AltoRouter();
//$router->setBasePath('/public');

$content = null;
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
    'GET',
    '/snow_add_data',
    function () {
        require  __DIR__ . "/../src/pages/snow_add_data.php";
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
    '/snow_update',
    function () {
        require  __DIR__ . "/../src/pages/snow_update.php";
    },
    "snow_update"
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
// dump($match['target']);
// test
if (is_array($match) && is_callable($match['target'])) {
    ob_start();
    call_user_func_array($match['target'], $match['params']);
    $content = ob_get_clean();
    $title = ob_get_clean();

    require(dirname(__DIR__) . DIRECTORY_SEPARATOR . "src" . DIRECTORY_SEPARATOR . "layout" . DIRECTORY_SEPARATOR . "layout.php");
} else {
    // No route was matched
    require(dirname(__DIR__) . DIRECTORY_SEPARATOR . "src" . DIRECTORY_SEPARATOR . "layout" . DIRECTORY_SEPARATOR . "layout.php");
    require_once(dirname(__DIR__) . DIRECTORY_SEPARATOR . "src" . DIRECTORY_SEPARATOR . "pages" . DIRECTORY_SEPARATOR . "404.php");
}