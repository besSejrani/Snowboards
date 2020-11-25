<?php

use App\Repository\ProductRepository;

$title = "Admin | Events";
?>


<div class="d-flex align-items-center vh-100">
    <div class="justify-content-start  h-100">
        <?php require dirname(__DIR__,3) . "/layout/sidebar.php"?>
    </div>

    <div class="d-flex flex-column justify-content-center align-items-center h-100 w-100">

        <div style="width: 900px;">
            <div class="d-flex flex-row justify-content-between">
                <h1>Events</h1>
                <div class="d-flex justify-content-end align-items-center w-35">
                    <a class="mx-3" href="/admin/events/addEvent">
                        <button type="button" style="width:130px;" class="btn btn-primary">
                            <span class="material-icons">
                                add
                            </span>
                            Add Event
                        </button>
                    </a>
                </div>


            </div>

            <?php

$db = new ProductRepository();
$snows = $db->getProducts();


echo <<<EOT
    <table class="table table-dark container mb-5 table-hover">
    <thead>
    <tr>
    <th>Name</th>
    <th>Address</th>
    <th>Participants</th>
    <th>Start Date</th>
    <th>End Date</th>
    </tr>
    </thead>
    <tbody>
EOT;



foreach ($snows as $snow) {
    echo <<<EOT
        <tr>
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