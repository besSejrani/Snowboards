<?php

use App\Form\Seo;
use App\Repository\SeoRepository;

//SEO
$seo = new Seo();
$seo->myTitle("Snowboards | SEO")
    ->myDescription("This is a description");

// Users
$users = new SeoRepository();
$pages = $users->GetSeos();
?>


<div class="d-flex align-items-center vh-100">
    <div class="justify-content-start  h-100">
        <?php require dirname(__DIR__,3) . "/layout/sidebar.php"?>
    </div>

    <div class="d-flex flex-column justify-content-center align-items-center h-100 w-100">

        <div style="width: 900px;">
            <div class="d-flex flex-row justify-content-between">
                <h1>SEO</h1>
                <div class="d-flex justify-content-end align-items-center w-35">
                    <a class="mx-3" href="/admin/seo/addSeo">
                        <button type="button" style="width:130px;" class="btn btn-primary">
                            <span class="material-icons">
                                add
                            </span>
                            Add SEO
                        </button>
                    </a>
                </div>
            </div>

            <?php

echo <<<EOT
    <table class="table table-dark container mb-5 table-hover">
    <thead>
    <tr>
    <th>Page</th>
    <th>Created At</th>
    <th>Actions</th>
    </tr>
    </thead>
    <tbody>
EOT;


foreach ($pages as $page) {
    $image = $user['profile'];
    $profileImage = "<img src='$image' alt='user profile' id='userProfile'>";
    
    echo <<<EOT
                <tr>
                <td>$page[page]</td>
                <td>$page[created_at]</td>
                <td>
                    <a href=/api/seo/update/$page[id]>
                        <span class="material-icons text-warning">
                            create
                        </span></a>
                    </a>
                    <a href=/api/seo/delete/$page[id]>
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