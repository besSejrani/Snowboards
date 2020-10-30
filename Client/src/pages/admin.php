<?php
ob_start();
$title = "Snowboards | Admin";
?>

<div class="vh-100 d-flex justify-content-center align-items-center">
    <h1>Admin</h1>
</div>

<?php

$content = ob_get_clean();
require(dirname(__DIR__) . "/layout/layout.php");