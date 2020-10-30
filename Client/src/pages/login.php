<?php
ob_start();
$title = "Snowboards | Login";

use App\Form\Form;
?>

<div class="container vh-100" style="margin-top: 100px;">
    <?php
    $form = new Form();
    $form->startForm("/login", "POST")
        ->myInput("text", "Email", "myEmail", null)
        ->myInput("password", "Password", "myPassword", null)
        ->mySubmit("myButton")
        ->endForm();
    ?>

    <div class="d-flex my-5">
        <h6>Not a member ? </h6>
        <a href="/register"> Register</a>
    </div>
</div>

<?php


$js = '';
$content = ob_get_clean();
require(dirname(__DIR__) . "/layout/layout.php");