<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin="" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="/scss/index.css">
    <title><?= $title ?? "Snowboard" ?></title>
</head>

<div id="navContainer">
    <nav class="navbar bg-white fixed-top d-flex justify-content-between" id="nav">
        <a href="/" class="navbar-brand"><img src="/assets/logo.svg" alt=""></a>
        <div class="d-flex justify-content-between ">

            <!-- <form class="form-inline mr-5"> -->
            <!-- <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"> -->
            <!-- <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button> -->
            <!-- </form> -->

            <a class="nav-link nav-item" href="/cart">
                <span class="material-icons text-dark">search</span>
            </a>

            <div class="d-flex flex-row">
                <a class="nav-link nav-item" href="/">Home</a>
                <a class="nav-link nav-item" href="/events">Events</a>
                <a class="nav-link nav-item" href="/contact">Contact</a>

                <?php if (!isset($_SESSION['role'])) : ?>
                <a class="nav-link nav-item" href="/signin">Signin</a>
                <?php else : ?>
                <a class="nav-link nav-item" href="/admin/administration">Administration</a>
                <a class="nav-link nav-item" href="grafana:3500" target="_blank">Dashboard <span
                        class="sr-only"></span></a>
                <a class="nav-link nav-item" href="/api/users/signout">Signout</a>
                <?php endif; ?>

                <a class="nav-link nav-item" href="/cart">
                    <span class="material-icons text-dark">shopping_cart</span>
                </a>

            </div>
        </div>
    </nav>
</div>

<body>


    <?= $content ?>
    <?php if (!isset($_SESSION['role'])) : ?>
    <footer style="height: 200px;">
        <div class="bg-primary h-100"></div>
    </footer>
    <?php endif; ?>
    <?= $js ?>
    <script src="/js/utils/scrollShowUp.js"></script>
</body>

</html>