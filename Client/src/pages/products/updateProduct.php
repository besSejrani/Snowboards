<?php


use App\Form\Form;
use App\Repository\ProductRepository;
$uri = $_SERVER['REQUEST_URI'];
$id = explode('/', $uri)[4];

$product = new ProductRepository();
$productValue = $product->GetProductById($id);

$productName = $productValue[0]['name'];
$productDescription = $productValue[0]['description'];
$productPrice = $productValue[0]['price'];
$ProductSKU = $productValue[0]['sku'];
$ProductBrand = $productValue[0]['brand'];
?>

<div class="d-flex flex-column">

    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="w-50">
            <?php
        $form = new Form();
        $form->startForm("/api/products/update/$id", "POST")
        ->myInput("text", "Name", "name", null, $productName)
        ->myInput("text", "Description", "description", null, $productDescription)
        ->myInput("number", "Price", "price", null, $productPrice)
        ->myInput("text", "SKU", "sku", null, $ProductSKU)
        ->myDropDown("Brand", "brand", $ProductBrand, "suprem", "addidas")
        ->mySubmit("myButton")
        ->endForm();
        ?>
        </div>
    </div>

    <?php
$js = '';