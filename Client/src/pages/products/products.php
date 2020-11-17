<?php

use App\Repository\CategoryRepository;
use App\Repository\ProductRepository;

$title = "Snowboards | Products";
?>


<div class="d-flex align-items-center vh-100">
    <div class="justify-content-start  h-100">
        <?php require dirname(__DIR__,2) . "/layout/sidebar.php"?>
    </div>

    <div class="d-flex flex-column justify-content-center align-items-center h-100 w-100">

        <div style="width: 800px;">
            <div class="d-flex flex-row justify-content-between">
                <h1>Products</h1>
                <div class="d-flex justify-content-end align-items-center w-20">
                    <a class="mx-3" href="/addProduct">
                        <button type="button" style="width:100px;" class="btn btn-primary">Add Snow</button>
                    </a>
                    <select class="custom-select" id="inputGroupSelect01">

                        <?php
                    $categories = CategoryRepository::GetCategories();

                    echo <<< EOT
                        <option selected>All</option>
                    EOT;

                    foreach ($categories as $category) {
                        echo <<< EOT
                            <option value=$category[0]>$category[1]</option>
                    EOT;
                    }
                    ?>

                    </select>
                </div>


            </div>

            <?php

$db = new ProductRepository();
$snows = $db->getProducts();


echo <<<EOT
    <table class="table table-dark container mb-5">
    <thead>
    <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Description</th>
    <th>Brand</th>
    <th>SKU</th>
    <th>Price</th>
    <th>Actions</th>
    </tr>
    </thead>
    <tbody>
EOT;



foreach ($snows as $snow) {
    echo <<<EOT
        <tr>
        <td>$snow[id]</td>
        <td>$snow[name]</td>
        <td>$snow[description]</td>
        <td>$snow[brand]</td>
        <td>$snow[sku]</td>
        <td>$snow[price]</td>
        <td>
            <a href=/api/products/deleteProduct/$snow[id]>Détruire</a>
            <a href=/api/products/update/$snow[id]>Modifier</a>
        </td>
        </tr>
    EOT;
}

    echo <<<EOT
        </tbody>
        </table>   
    EOT;

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
    </div>
</div>




<?php
$js = '';