<?php

$title = "Snowboards | Add Snowboard";
use App\Form\Form;
?>

<div class="d-flex ">

    <div class="container vh-100" style="margin-top: 100px;">
        <?php
    $form = new Form();
    $form->startForm("/api/products/addProduct", "POST")
        ->myInput("text", "Name", "name")
        ->myInput("text", "Description", "description")
        ->myInput("number", "Price", "price")
        ->myInput("text", "SKU", "sku")
        ->myInput("text", "Brand", "brand")
        ->mySubmit("myButton")
        ->endForm();
    ?>

    </div>

    <?php
$js = '';