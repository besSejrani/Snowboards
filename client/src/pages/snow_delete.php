<?php
ob_start();
$title = "Snowboards | Delete Snowboard";
?>

<?php
$js = '';
$content = ob_get_clean();
require(dirname(__DIR__)  . DIRECTORY_SEPARATOR . "layout" . DIRECTORY_SEPARATOR . "layout.php");