<?php

use App\Form\Form;
use App\Repository\UserRepository;

$uri = $_SERVER['REQUEST_URI'];
$id = explode('/', $uri)[4];

// Users
$user = new UserRepository();
$user = $user->GetUserById($id);
$username = $user[0]['username'];
$firstname = $user[0]['firstname'];
$lastname = $user[0]['lastname'];
$email = $user[0]['email'];

// Profile
$test = new UserRepository();
$profile = $test->GetUserProfile();
$image = $profile[0]['profile'];
$profileImage = "<img src='$image' alt='user profile'>";

?>
<div class="container">
</div>


<div class="d-flex">
    <div id="list-example" class="list-group position-fixed">
        <a class="list-group-item list-group-item-action" href="#list-item-1">Update User Information</a>
        <a class="list-group-item list-group-item-action" href="#list-item-2">Update User Profile</a>
        <a class="list-group-item list-group-item-action" href="#list-item-3">Change User Role</a>
        <a class="list-group-item list-group-item-action" href="#list-item-4">Reset Password</a>
    </div>
</div>



<div class="d-flex flex-column w-100" data-spy="scroll" data-target="#list-example" data-offset="0">

    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="f-flex flex-row">

            <?php if(!$image) :?>
            <?= "<span class='material-icons text-dark'>people</span>" ?>
            <?php else : ?>
            <?=  $profileImage ?>
            <?php endif; ?>

            <div class="w-50" id="list-item-1">
                <?php
                    $form = new Form();
                    $form->startForm("/api/users/update/user/$id", "POST")
                    ->myInput("text", "Username", "username", null, $username)
                    ->myInput("text", "Firstname", "firstname", null, $firstname)
                    ->myInput("text", "Lastname", "lastname", null, $lastname)
                    ->myInput("email", "Email", "email", null, $email)
                    ->mySubmit("myButton")
                    ->endForm();
                    ?>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="w-50" id="list-item-2">
            <?php
                    $form = new Form();
                    $form->startForm("/api/users/update/profile/$id", "POST", "multipart/form-data")
                    ->myFile('ProfileImageUser', 'profile')
                    ->mySubmit("myButton")
                    ->endForm();
                ?>
        </div>
    </div>

    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="w-50" id="list-item-3">
            <?php
                    $form3 = new Form();
                    $form3->startForm("/api/users/update/role/$id", "POST")
                    ->myDropDown("Role", "role", null, "user", "admin")
                    ->mySubmit("myButton")
                    ->endForm();
                ?>
        </div>
    </div>

    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="w-50" id="list-item-4">
            <?php
                    $form2 = new Form();
                    $form2->startForm("/api/users/update/password/$id", "POST")
                    ->myInput("password", "Password", "password", null)
                    ->myInput("password", "Confirm Password", "confirm password", null)
                    ->mySubmit("myButton")
                    ->endForm();
                ?>
        </div>
    </div>
</div>

<?php
$js = '';