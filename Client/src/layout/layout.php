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
    <link rel="stylesheet" href="./scss/index.css">
    <title><?= $title ?? "Snowboard" ?></title>
</head>


<nav class="navbar bg-white fixed-top d-flex justify-content-between" id="nav">
    <a href="/" class="navbar-brand"><svg xmlns="http://www.w3.org/2000/svg" width="97.685" height="56.632"
            viewBox="0 0 97.685 56.632">
            <g transform="translate(2527.673 -391)">
                <g transform="translate(-2498.654 398.892)">
                    <path
                        d="M22.661-35.34H20.078L9.442-51.673H9.336q.213,2.875.213,5.271V-35.34H7.459V-54.8h2.556L20.624-38.534h.106q-.027-.359-.12-2.31t-.067-2.789V-54.8h2.117ZM47.222-45.1a10.714,10.714,0,0,1-2.363,7.348,8.307,8.307,0,0,1-6.569,2.676A8.412,8.412,0,0,1,31.654-37.7q-2.336-2.629-2.336-7.421,0-4.752,2.343-7.368a8.471,8.471,0,0,1,6.656-2.616,8.29,8.29,0,0,1,6.549,2.662A10.7,10.7,0,0,1,47.222-45.1Zm-15.508,0a9.237,9.237,0,0,0,1.684,6,5.975,5.975,0,0,0,4.892,2.043,5.917,5.917,0,0,0,4.885-2.037q1.651-2.037,1.651-6a9.29,9.29,0,0,0-1.644-5.957,5.891,5.891,0,0,0-4.865-2.03A6.006,6.006,0,0,0,33.4-51.041,9.142,9.142,0,0,0,31.714-45.1ZM70.864-35.34H68.628L64.7-48.372q-.28-.865-.626-2.183a12.735,12.735,0,0,1-.359-1.584,30.313,30.313,0,0,1-.932,3.847L58.977-35.34H56.741L51.563-54.8h2.4l3.075,12.02a44.7,44.7,0,0,1,.932,4.579,33.07,33.07,0,0,1,1.065-4.766L62.518-54.8h2.4l3.661,11.941A36.3,36.3,0,0,1,69.653-38.2a39.91,39.91,0,0,1,.958-4.606L73.673-54.8h2.4Z"
                        transform="translate(-7.436 55.107)" />
                    <path
                        d="M12.556-21.516H11.173L8.745-29.576q-.173-.535-.387-1.35a7.874,7.874,0,0,1-.222-.98,18.747,18.747,0,0,1-.576,2.379L5.2-21.516H3.822L.62-33.552H2.1L4-26.118a27.647,27.647,0,0,1,.576,2.832,20.452,20.452,0,0,1,.659-2.947l2.157-7.318H8.877l2.264,7.384a22.448,22.448,0,0,1,.667,2.881,24.683,24.683,0,0,1,.593-2.848l1.893-7.417h1.482Zm5.1,0V-33.552h1.4v12.035Zm8.405,0h-1.4V-32.309H20.854v-1.243h9.022v1.243H26.065Zm14.76,0h-1.4V-27.18H33.087v5.664h-1.4V-33.552h1.4v5.12h6.339v-5.12h1.4Z"
                        transform="translate(-0.62 61.495)" />
                    <path
                        d="M13.767-34.581v7.953a4.332,4.332,0,0,1-1.27,3.3,4.869,4.869,0,0,1-3.489,1.2,4.654,4.654,0,0,1-3.434-1.211,4.49,4.49,0,0,1-1.215-3.329v-7.92H5.789v8.021A3.159,3.159,0,0,0,6.629-24.2a3.393,3.393,0,0,0,2.472.824,3.271,3.271,0,0,0,2.4-.828,3.186,3.186,0,0,0,.841-2.375v-8Zm10.19,9.021A3.015,3.015,0,0,1,22.78-23.03a5.1,5.1,0,0,1-3.195.908,8,8,0,0,1-3.363-.563v-1.379a8.853,8.853,0,0,0,1.648.5,8.67,8.67,0,0,0,1.766.185,3.562,3.562,0,0,0,2.152-.542,1.78,1.78,0,0,0,.723-1.509,1.937,1.937,0,0,0-.256-1.047,2.382,2.382,0,0,0-.858-.752,12,12,0,0,0-1.829-.782,5.837,5.837,0,0,1-2.451-1.454,3.211,3.211,0,0,1-.736-2.194,2.729,2.729,0,0,1,1.068-2.262,4.437,4.437,0,0,1,2.825-.841,8.325,8.325,0,0,1,3.371.673L23.2-32.841a7.619,7.619,0,0,0-2.959-.639,2.864,2.864,0,0,0-1.774.488,1.607,1.607,0,0,0-.639,1.354,2.074,2.074,0,0,0,.235,1.047,2.216,2.216,0,0,0,.794.748,9.872,9.872,0,0,0,1.711.752,6.773,6.773,0,0,1,2.661,1.48A2.91,2.91,0,0,1,23.957-25.56Z"
                        transform="translate(44.71 63.026)" />
                </g>
                <g transform="matrix(0.891, 0.454, -0.454, 0.891, -2515.959, 391)">
                    <path d="M0,25.327A12.663,12.663,0,0,0,12.664,12.664,12.664,12.664,0,0,0,0,0Z"
                        transform="translate(12.664 25.327) rotate(180)" fill="#f6495e" />
                    <g transform="translate(12.664 25.327)" fill="none">
                        <path d="M0,0A12.663,12.663,0,0,1,12.664,12.664,12.664,12.664,0,0,1,0,25.327Z" stroke="none" />
                        <path
                            d="M 0.999995231628418 1.041984558105469 L 0.999995231628418 24.28523635864258 C 3.738226890563965 24.05419540405273 6.281969547271729 22.87651252746582 8.247486114501953 20.91095161437988 C 10.45041561126709 18.70798110961914 11.66361618041992 15.77901172637939 11.66361618041992 12.66361141204834 C 11.66361618041992 9.548051834106445 10.45041561126709 6.619041442871094 8.247495651245117 4.416120529174805 C 6.281889915466309 2.450515747070313 3.73847770690918 1.272899627685547 0.999995231628418 1.041984558105469 M -4.76837158203125e-06 1.9073486328125e-06 C 6.994115829467773 1.9073486328125e-06 12.66361618041992 5.669502258300781 12.66361618041992 12.66361141204834 C 12.66361618041992 19.65730094909668 6.994115829467773 25.32722091674805 -4.76837158203125e-06 25.32722091674805 L -4.76837158203125e-06 1.9073486328125e-06 Z"
                            stroke="#000000" />
                    </g>
                </g>
            </g>
        </svg></a>
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
            <a class="nav-link active p-2" href="/login">Login<span class="sr-only"></span></a>
            <?php else : ?>
            <a class="nav-link active p-2" href="/products">Products<span class="sr-only"></span></a>
            <a class="nav-link active p-2" href="http://localhost:4000" target="_blank">Dashboard <span
                    class="sr-only"></span></a>
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
    <script src="./js/utils/scrollShowUp.js"></script>
</body>

</html>