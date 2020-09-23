<?php

// ========================================================================================================

$router->map(
    'GET',
    '/register',
    function () {
        require __DIR__ . "/../pages/register.php";
    },
    "getRegister"
);

$router->map(
    'POST',
    '/register',
    function () {

        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirmPassword'];

        require_once(dirname(__DIR__)  . DIRECTORY_SEPARATOR . "class" . DIRECTORY_SEPARATOR . "User.php");
        User::Register($username, $email, $password, $confirmPassword);
    },
    "postRegister"
);
// ========================================================================================================

$router->map(
    'GET',
    '/login',
    function () {
        require __DIR__ . "/../pages/login.php";
    },
    "login"
);
$router->map(
    'POST',
    '/login',
    function () {

        $email = $_POST['email'];
        $password = $_POST['password'];

        require_once(dirname(__DIR__)  . DIRECTORY_SEPARATOR . "class" . DIRECTORY_SEPARATOR . "User.php");
        User::Login($email, $password);
    },
    "postLogin"
);

// ========================================================================================================

$router->map(
    'GET',
    '/logout',
    function () {
        require_once(dirname(__DIR__)  . DIRECTORY_SEPARATOR . "class" . DIRECTORY_SEPARATOR . "User.php");
        User::Logout();
    },
    "logout"
);

// ========================================================================================================