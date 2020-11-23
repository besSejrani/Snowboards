<?php

$title = "Snowboards | Add Snowboard";
use App\Form\Form;
?>

<div class="d-flex ">

    <div class="container vh-100" style="margin-top: 100px;">
        <?php
    $form = new Form();
    $form->startForm("/api/users/add", "POST")
        ->myInput("text", "First Name", "myFirstName")
        ->myInput("text", "Last Name", "myLastName")
        ->myInput("text", "Username", "myUsername")
        ->myInput("email", "Email", "myEmail")
        ->myInput("password", "Password", "myPassword")
        ->myInput("password", "Confirm Password", "myConfirmPassword")
        ->mySubmit("myButton")
        ->endForm();
    ?>

    </div>

    <?php
$js = '';