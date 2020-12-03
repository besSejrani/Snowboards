<?php

use App\Form\Seo;
use App\Repository\CategoryRepository;
use App\Repository\ProductRepository;

// SEO
$seo = new Seo();
$seo->myTitle("Snowboards | Promotions")
    ->myDescription("This is a description");
?>


<div class="d-flex align-items-center vh-100">
    <div class="justify-content-start  h-100">
        <?php require dirname(__DIR__,3) . "/layout/sidebar.php"?>
    </div>

    <div class="d-flex flex-column justify-content-center align-items-center h-100 w-100">

        <div style="width: 900px;">
            <div class="d-flex flex-row justify-content-between">
                <h1>Promotions</h1>
                <div class="d-flex justify-content-end align-items-center w-35">
                    <a class="mx-3" href="/addProduct">
                        <button type="button" style="width:150px;" class="btn btn-primary">
                            <span class="material-icons">
                                add
                            </span>
                            Add Promotion
                        </button>
                    </a>
                    <select class="custom-select" id="inputGroupSelect01">

                        <?php
                    $categories = CategoryRepository::GetCategories();

                    echo <<< EOT
                        <option selected>Category</option>
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
    <table class="table table-dark container mb-5 table-hover">
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
            <a href=/api/products/update/$snow[id]>
                <span class="material-icons text-warning">
                    create
                </span></a>
            </a>
            <a href=/api/products/deleteProduct/$snow[id]>
                <span class="material-icons text-danger">
                    delete
                </span>
            </a>
        </td>
        </tr>
    EOT;
}

    echo <<<EOT
        </tbody>
        </table>   
    EOT;

?>

            <?require dirname(__DIR__,3) . "/layout/pagination.php" ?>
        </div>
    </div>
</div>




<?php
$js = '';