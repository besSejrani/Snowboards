<?php

$title = "Admin | Insert Event";
use App\Form\Form;
?>

<div class="d-flex ">

    <div class="container vh-100" style="margin-top: 100px;">
        <?php
    $form = new Form();
    $form->startForm("/api/events/insertProduct", "POST")
        ->myInput("text", "Name", "name")
        ->myInput("text", "Address", "address")
        ->mySubmit("myButton")
        ->endForm();
    ?>

    </div>

    <?php
$js = '';