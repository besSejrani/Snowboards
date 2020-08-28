<?php

$uri = $_SERVER['REQUEST_URI'];


switch ($uri) {

    case "/":
        ob_start();
        require_once(dirname(__DIR__) . DIRECTORY_SEPARATOR . "src" . DIRECTORY_SEPARATOR . "pages" . DIRECTORY_SEPARATOR . "products.php");
        $content = ob_get_clean();
        break;
    case "/snow_add":
        ob_start();
        require_once(dirname(__DIR__) . DIRECTORY_SEPARATOR . "src" . DIRECTORY_SEPARATOR . "pages" . DIRECTORY_SEPARATOR . "snow_add.php");
        $content = ob_get_clean();
        break;
    case "/snow_delete":
        ob_start();
        require_once(dirname(__DIR__) . DIRECTORY_SEPARATOR . "src" . DIRECTORY_SEPARATOR . "pages" . DIRECTORY_SEPARATOR . "snow_delete.php");
        $content = ob_get_clean();
        break;
    case "/snow_update":
        ob_start();
        require_once(dirname(__DIR__) . DIRECTORY_SEPARATOR . "src" . DIRECTORY_SEPARATOR . "pages" . DIRECTORY_SEPARATOR . "snow_update.php");
        $content = ob_get_clean();
        break;
    case "/login":
        ob_start();
        require_once(dirname(__DIR__) . DIRECTORY_SEPARATOR . "src" . DIRECTORY_SEPARATOR . "pages" . DIRECTORY_SEPARATOR . "login.php");
        $content = ob_get_clean();
        break;
    case "/register":
        ob_start();
        require_once(dirname(__DIR__) . DIRECTORY_SEPARATOR . "src" . DIRECTORY_SEPARATOR . "pages" . DIRECTORY_SEPARATOR . "register.php");
        $content = ob_get_clean();
        break;
    case "/admin":
        ob_start();
        require_once(dirname(__DIR__) . DIRECTORY_SEPARATOR . "src" . DIRECTORY_SEPARATOR . "pages" . DIRECTORY_SEPARATOR . "admin.php");
        $content = ob_get_clean();
        break;
    default:
        require_once(dirname(__DIR__) . DIRECTORY_SEPARATOR . "src" . DIRECTORY_SEPARATOR . "pages" . DIRECTORY_SEPARATOR . "404.php");
}

require_once(dirname(__DIR__) . DIRECTORY_SEPARATOR . "src" . DIRECTORY_SEPARATOR . "layout" . DIRECTORY_SEPARATOR . "layout.php");