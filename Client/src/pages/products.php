<?php

require_once(dirname(__DIR__, 2) . "/vendor/autoload.php");

use App\Repository\CategoryRepository;
use App\Repository\ProductRepository;

$title = "Snowboards | Products";
?>

<div class="d-flex flex-column justify-content-center align-items-center vh-100">

    <div class="container px-0">
        <div class="d-flex justify-content-between align-items-center my-4 ">
            <h1>Products</h1>

            <div class="d-flex">
                <a class="mx-3" href="/addProduct">
                    <button type="button" class="btn btn-primary">Add Snow</button>
                </a>

                <div>
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
            <td><a href=/api/products/deleteProduct/$snow[id]>Détruire</a></td>
            <td><a href=/api/products/updateProduct/$snow[id]>Modifier</a></td>
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

<?php
$js = '
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
    integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
</script>
';