<?php
require_once(dirname(__DIR__) . DIRECTORY_SEPARATOR . "vendor" . DIRECTORY_SEPARATOR . "autoload.php");
// ========================================================================================================

// Meta tags SEO
$title = null;
$description = null;

// Keywords

// Google

// Open Graph protocol

// Geo Location

// Language

// Layout
$content = null;
$js = null;

// ========================================================================================================
session_start();
$router = new AltoRouter();

// Routes Available
require_once(dirname(__DIR__)  . DIRECTORY_SEPARATOR . "src" . DIRECTORY_SEPARATOR . "routes" . DIRECTORY_SEPARATOR . "pages.php");
require_once(dirname(__DIR__)  . DIRECTORY_SEPARATOR . "src" . DIRECTORY_SEPARATOR . "routes" . DIRECTORY_SEPARATOR . "events.php");
require_once(dirname(__DIR__)  . DIRECTORY_SEPARATOR . "src" . DIRECTORY_SEPARATOR . "routes" . DIRECTORY_SEPARATOR . "products.php");
require_once(dirname(__DIR__)  . DIRECTORY_SEPARATOR . "src" . DIRECTORY_SEPARATOR . "routes" . DIRECTORY_SEPARATOR . "admin.php");
require_once(dirname(__DIR__)  . DIRECTORY_SEPARATOR . "src" . DIRECTORY_SEPARATOR . "routes" . DIRECTORY_SEPARATOR . "authentication.php");
require_once(dirname(__DIR__)  . DIRECTORY_SEPARATOR . "src" . DIRECTORY_SEPARATOR . "routes" . DIRECTORY_SEPARATOR . "authorization.php");



$match = $router->match();

if (is_array($match) && is_callable($match['target'])) {
    call_user_func_array($match['target'], $match['params']);
} else {
    // No route was matched
    require_once(dirname(__DIR__) . DIRECTORY_SEPARATOR . "src" . DIRECTORY_SEPARATOR . "pages" . DIRECTORY_SEPARATOR . "404.php");
}