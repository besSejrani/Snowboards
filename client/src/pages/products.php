<?php
$title = "Products";
require_once(dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . "vendor" . DIRECTORY_SEPARATOR . "autoload.php");
require_once(dirname(__DIR__) . DIRECTORY_SEPARATOR . "class" . DIRECTORY_SEPARATOR . "Snow.php");
?>


<div class="d-flex flex-column justify-content-center align-items-center vh-100">

    <div class="container px-0">
        <div class="d-flex justify-content-between align-items-center my-4 ">
            <h1>Products</h1>
            <a href="/snow_add">
                <button type="button" class="btn btn-primary">Add Snow</button>
            </a>
        </div>
    </div>

    <?php

    $db = new Snow();
    $snows = $db->getSnows();


    echo <<<EOT
<table class="table table-dark container mb-5">
<thead>
<tr>
<th>ID</th>
<th>Brand</th>
<th>Boots</th>
<th>Type</th>
<th>Available</th>
</tr>
</thead>
<tbody>
EOT;


    foreach ($snows as $snow) {
        echo <<<EOT
       
    <tr>
    <td>$snow[idSnow]</td>
    <td>$snow[Marque]</td>
    <td>$snow[Boots]</td>
    <td>$snow[Type]</td>
    <td>$snow[Disponibilite]</td>
    <td><a href=snow_delete.php?idSnow=$snow[idSnow]>Détruire</a></td>
    <td><a href=snow_update.php?idSnow=$snow[idSnow]>Modifier</a></td>
    </tr>
    
    EOT;
    }

    echo <<<EOT
</tbody>
</table>   
EOT;

    DB::disconnect()
    ?>

    <div class="d-flex align-items-center justify-content-center mt-5">
        <ul class="pagination">
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item active" aria-current="page">
                <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
            </li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#">Next</a>
            </li>
        </ul>
    </div>
</div>