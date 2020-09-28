<?php

require_once(dirname(__DIR__) . DIRECTORY_SEPARATOR . "class" . DIRECTORY_SEPARATOR . "Snow.php");

ob_start();
$title = "Snowboards | Delete Snowboard";

// Get URI parameter
$uri = $_SERVER['REQUEST_URI'];
$product = explode('/', $uri)[2];

// Delete product from database
$db = new Snow();
$snows = $db->deleteSnow($product);
DB::disconnect();

// Redirection
header('Location:http://localhost:8080/products');
?>

<?php
$js = '';
$content = ob_get_clean();
require(dirname(__DIR__)  . DIRECTORY_SEPARATOR . "layout" . DIRECTORY_SEPARATOR . "layout.php");