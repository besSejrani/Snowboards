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
    <link rel="stylesheet" href="/scss/index.css">
    <title><?= $title ?? "Snowboard" ?></title>
</head>

<div id="navContainer">
    <nav class="navbar bg-white fixed-top d-flex justify-content-between" id="nav">
        <a href="/" class="navbar-brand"><img src="/assets/logo.svg" alt=""></a>
        <div class="d-flex justify-content-between ">
            <form class="form-inline mr-5">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
            </form>
            <div class="d-flex flex-row">
                <a class="nav-link active p-2" href="/">Home <span class="sr-only"></span></a>
                <a class="nav-link active p-2" href="/events">Events <span class="sr-only"></span></a>
                <a class="nav-link active p-2" href="/contact">Contact <span class="sr-only"></span></a>

                <?php if (!isset($_SESSION['role'])) : ?>
                <a class="nav-link active p-2" href="/signin">Signin<span class="sr-only"></span></a>
                <?php else : ?>
                <a class="nav-link active p-2" href="/products">Products<span class="sr-only"></span></a>
                <a class="nav-link active p-2" href="grafana:3500" target="_blank">Dashboard <span
                        class="sr-only"></span></a>
                <a class="nav-link active p-2" href="/api/users/signout">Signout<span class="sr-only"></span></a>
                <?php endif; ?>

            </div>
        </div>
    </nav>
</div>

<body>


    <?= $content ?>
    <footer style="height: 200px;">
        <div class="bg-primary h-100"></div>
    </footer>
    <?= $js ?>
    <script src="/js/utils/scrollShowUp.js"></script>
</body>

</html>