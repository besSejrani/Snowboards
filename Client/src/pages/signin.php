<?php

$title = "Snowboards | Login";

use App\Form\Form;
?>

<div class="container vh-100" style="margin-top: 100px;">
    <?php
    $form = new Form();
    $form->startForm("/api/users/signin", "POST")
        ->myInput("text", "Email", "myEmail")
        ->myInput("password", "Password", "myPassword")
        ->mySubmit("myButton")
        ->endForm();
    ?>

    <div class="d-flex my-5">
        <h6>Not a member ? </h6>
        <a href="/signup"> Signup</a>
    </div>
</div>

<?php

$js = '';