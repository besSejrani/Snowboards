<?php

$title = "Admin | Insert Event";
use App\Form\Form;
?>

<div class="d-flex ">

    <div class="container vh-100" style="margin-top: 100px;">
        <?php
    $form = new Form();
    $form->startForm("/api/events/add", "POST")
        ->myInput("text", "Name", "name")
        ->myInput("text", "Description", "myDescription")
        ->myInput("text", "Address", "myAddress")
        ->myInput("text", "City", "myCity")
        ->myInput("text", "Zip Code", "myZipCode")
        ->myDate('date', 'Start Date', 'myStartDate')
        ->myDate('date', 'End Date', 'myEndDate')
        ->mySubmit("myButton")
        ->endForm();
    ?>

    </div>

    <?php
$js = '';