<?php

$title = "Snowboards | Add Snowboard";
use App\Form\Form;
?>

<div class="d-flex ">

    <div class="container vh-100" style="margin-top: 100px;">
        <?php
    $form = new Form();
    $form->startForm("/api/seo/add", "POST")
        ->myInput("text", "Page", "myPage")
        ->myInput("text", "Title", "myTitle")
        ->myInput("text", "Description", "myDescription")
        ->mySubmit("myButton")
        ->endForm();
    ?>

    </div>

    <?php
$js = '';