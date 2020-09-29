<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title><?= $title ?? "Snowboard" ?></title>
</head>


<nav class="navbar navbar-light bg-light fixed-top d-flex justify-content-between">
    <a href="/" class="navbar-brand"><img src="https://www.google.com/images/branding/googlelogo/1x/googlelogo_color_272x92dp.png" alt="bootstrap logo" height="40"></a>
    <div class="d-flex justify-content-between ">
        <form class="form-inline mr-5">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
        </form>
        <div class="d-flex flex-row">
            <a class="nav-link active p-2" href="/">Home <span class="sr-only"></span></a>
            <a class="nav-link active p-2" href="/events">Events <span class="sr-only"></span></a>

            <?php if (!isset($_SESSION['role'])) : ?>
                <a class="nav-link active p-2" href="/login">Login<span class="sr-only"></span></a>
            <?php else : ?>
                <a class="nav-link active p-2" href="/products">Products<span class="sr-only"></span></a>
                <a class="nav-link active p-2" href="/logout">Logout<span class="sr-only"></span></a>
            <?php endif; ?>

        </div>
    </div>
</nav>

<body>


    <?= $content ?>
    <footer style="height: 200px;">
        <div class="bg-primary h-100"></div>
    </footer>
    <?= $js ?>

</body>

</html>