<?php

// User
use App\Repository\UserRepository;
$user = new UserRepository();
$id = $_SESSION['auth']['id'];
$profile = $user->GetUserProfileById($id);
$image = $profile[0]['profile'];

$profileImage = "<img src='$image' alt='user profile' id='userProfile'>";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="/scss/index.css">
    <title><?= $title ?? "Snowboard" ?></title>
</head>

<div id="navContainer">
    <nav class="navbar bg-white fixed-top d-flex justify-content-between" id="nav">
        <a href="/" class="navbar-brand"><img src="/assets/logo.svg" alt=""></a>
        <div class="d-flex justify-content-between">

            <a class="nav-link nav-item" href="/cart">
                <span class="material-icons text-dark">search</span>
            </a>

            <a class="nav-link nav-item" href="/cart">
                <span class="material-icons text-dark">shopping_cart</span>
            </a>

            <div class="d-flex flex-row">
                <a class="nav-link nav-item" href="/">Home</a>
                <a class="nav-link nav-item" href="/events">Events</a>
                <a class="nav-link nav-item" href="/contact">Contact</a>

                <?php if (!isset($_SESSION['auth'])) : ?>
                <a class="nav-link nav-item" href="/signin">Signin</a>
                <?php else : ?>
                <a class="nav-link nav-item" href="/admin/administration">Administration</a>
                <a class="nav-link nav-item" href="http://localhost:3500" target="_blank">Dashboard <span
                        class="sr-only"></span></a>

                <a class="nav-link nav-item" href="/api/users/signout">Signout</a>

                <a class="nav-link nav-item" href="/admin/users">
                    <?php if(!$image) :?>
                    <img src='/assets/unknown.png' alt='user profile' id='userProfile'>
                    <?php else : ?>
                    <?=  $profileImage ?>
                    <?php endif; ?>
                </a>
                <?php endif; ?>

            </div>
        </div>
    </nav>
</div>

<body>


    <?= $content ?>
    <?php if (!isset($_SESSION['auth'])) : ?>
    <footer style="height: 200px;">
        <div class="bg-primary h-100"></div>
    </footer>
    <?php endif; ?>


    <?= $js ?>
    <script src="/js/utils/scrollShowUp.js"></script>
    <script src="/js/utils/toggleSidebar.js"></script>
</body>

</html>