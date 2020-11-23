<?php


use App\Repository\UserRepository;

$title = "Snowboards | Products";
?>


<div class="d-flex align-items-center vh-100">
    <div class="justify-content-start  h-100">
        <?php require dirname(__DIR__,3) . "/layout/sidebar.php"?>
    </div>

    <div class="d-flex flex-column justify-content-center align-items-center h-100 w-100">

        <div style="width: 900px;">
            <div class="d-flex flex-row justify-content-between">
                <h1>Users</h1>
                <div class="d-flex justify-content-end align-items-center w-35">
                    <a class="mx-3" href="/api/users/add">
                        <button type="button" style="width:130px;" class="btn btn-primary">
                            <span class="material-icons">
                                add
                            </span>
                            Add User
                        </button>
                    </a>
                </div>


            </div>

            <?php

$db = new UserRepository();
$users = $db->GetAllUsers();


echo <<<EOT
    <table class="table table-dark container mb-5 table-hover">
    <thead>
    <tr>
    <th>Username</th>
    <th>Firstname</th>
    <th>Lastname</th>
    <th>Email</th>
    <th>Role</th>
    <th>Actions</th>
    </tr>
    </thead>
    <tbody>
EOT;



foreach ($users as $user) {
    echo <<<EOT
        <tr>
        <td>$user[username]</td>
        <td>$user[firstname]</td>
        <td>$user[lastname]</td>
        <td>$user[email]</td>
        <td>$user[role]</td>
        <td>
            <a href=/api/users/update/$user[id]>
                <span class="material-icons text-warning">
                    create
                </span></a>
            </a>

            <a href=/api/users/delete/$user[id]>
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