<?php
use App\Form\Seo;

//SEO
$seo = new Seo();
$seo->myTitle("Snowboards | Admin")
    ->myDescription("This is a description")
?>

<div class="vh-100 d-flex justify-content-center align-items-center">
    <div class="justify-content-start  h-100">
        <?php require dirname(__DIR__,2) . "/layout/sidebar.php"?>
    </div>
    <h1>Admin</h1>
</div>

<?php