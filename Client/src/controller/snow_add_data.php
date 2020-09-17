<?php
require_once(dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . "vendor" . DIRECTORY_SEPARATOR . "autoload.php");
require_once(dirname(__DIR__) . DIRECTORY_SEPARATOR . "class" . DIRECTORY_SEPARATOR . "Snow.php");
?>

<?php
$coupon = $_POST['coupon'];
$brand = $_POST['brand'];
$boots = $_POST['boots'];
$type = $_POST['type'];
$available = $_POST['available'];

$db = new Snow();
$snow = $db->addSnow($coupon, $brand, $boots, $type, $available);
DB::disconnect();

header('Location: http://localhost:3000/products');
exit;
?>