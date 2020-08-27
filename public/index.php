<?php

$uri = $_SERVER['REQUEST_URI'];

require_once(dirname(__DIR__) . DIRECTORY_SEPARATOR . "src" . DIRECTORY_SEPARATOR . "layout" . DIRECTORY_SEPARATOR . "header.php");

switch ($uri) {

    case "/":
        require_once(dirname(__DIR__) . DIRECTORY_SEPARATOR . "src" . DIRECTORY_SEPARATOR . "products.php");
        break;
    case "/snow_add":
        require_once(dirname(__DIR__) . DIRECTORY_SEPARATOR . "src" . DIRECTORY_SEPARATOR . "snow_add.php");
        break;
    case "/snow_delete":
        require_once(dirname(__DIR__) . DIRECTORY_SEPARATOR . "src" . DIRECTORY_SEPARATOR . "snow_delete.php");
        break;
    case "/snow_update":
        require_once(dirname(__DIR__) . DIRECTORY_SEPARATOR . "src" . DIRECTORY_SEPARATOR . "snow_update.php");
        break;
    default:
        require_once(dirname(__DIR__) . DIRECTORY_SEPARATOR . "src" . DIRECTORY_SEPARATOR . "pages" . DIRECTORY_SEPARATOR . "404.php");
}

require_once(dirname(__DIR__) . DIRECTORY_SEPARATOR . "src" . DIRECTORY_SEPARATOR . "layout" . DIRECTORY_SEPARATOR . "footer.php");