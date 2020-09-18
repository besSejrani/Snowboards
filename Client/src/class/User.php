<?php

require_once(dirname(__DIR__) . DIRECTORY_SEPARATOR . "model" . DIRECTORY_SEPARATOR . "db.php");

class User
{

    public function register()
    {
        //    password_hash();
        //    password_verify
    }

    public function login()
    {

        // $_SESSION['role'] = "admin";
    }

    public function logout()
    {
        session_destroy();
        header("location: http://localhost:3000/");
    }
}