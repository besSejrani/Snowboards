<?php
ob_start();
$title = "Snowboards | Register";

use App\Form\Form;
?>

<div class="container vh-100" style="margin-top: 100px;">
    <?php
    $form = new Form();
    $form->startForm("/login", "POST")
        ->myInput("text", "First Name", "myFirstName", null)
        ->myInput("text", "Last Name", "myLastName", null)
        ->myInput("text", "Username", "myUsername", null)
        ->myInput("email", "Email", "myEmail", null)
        ->myInput("password", "Password", "myPassword", null)
        ->myInput("password", "Confirm Password", "myConfirmPassword", null)
        ->mySubmit("myButton")
        ->endForm();
    ?>

</div>

<?php

$js = '';
$content = ob_get_clean();
require(dirname(__DIR__) . "/layout/layout.php");