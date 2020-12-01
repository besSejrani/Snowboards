<?php

// Users
use App\Repository\UserRepository;
$users = new UserRepository();
$userInformation = $users->GetAllUsers();
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

echo <<<EOT
    <table class="table table-dark container mb-5 table-hover">
    <thead>
    <tr>
    <th>Photo</th>
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


foreach ($userInformation as $user) {
    $image = $user['profile'];
    $profileImage = "<img src='$image' alt='user profile' id='userProfile'>";
    
    echo <<<EOT
                <tr>
                <td>
    EOT;
?>
            <?php if($image) :?>
            <?php echo $profileImage ?>
            <?php else : ?>
            <img src='/assets/unknown.png' alt='user profile' id='userProfile'>
            <?php endif ; ?>

            <?php        
        echo <<<EOT
                        </td>
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

            <?require dirname(__DIR__,3) . "/layout/pagination.php" ?>
        </div>
    </div>
</div>




<?php
$js = '';