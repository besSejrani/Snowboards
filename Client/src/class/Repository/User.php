<?php

namespace App\Repository;

use App\Model\DB;

class User
{

    public static function Register(string $firstname, string $lastname, string $username, string $email, string $password, string $confirmPassword)
    {
        try {
            if ($password != $confirmPassword) {
                throw new Error("Password doesn't mtach confirmPassword");
            }

            $hashOptions = [
                'cost' => 10,
            ];
            $hash = password_hash($password, PASSWORD_BCRYPT, $hashOptions);

            $sql = "INSERT INTO snows_bes.user (firstname, lastname, email, password, username) VALUES('$firstname', '$lastname', '$email', '$hash', '$username')";
            $db = new DB();
            $db->executeQuery($sql);

            header("location: http://localhost:8000/");
        } catch (Exception $e) {
            throw new Error($e);
        }
    }

    public static function Login(string $email, string $password)
    {
        try {

            //Get user
            $sql = "SELECT * FROM snows_bes.user where email='$email'";
            $db = new DB();
            $user = $db->executeQuery($sql);

            //Check if user exists
            if ($email != $user[0]['email']) {
                throw new Error("Invalid Credentials");
            }

            $verify =  password_verify($password, $user[0]['password']);

            if ($verify) {
                $_SESSION['role'] = "admin";
                header("location: http://localhost:8000/");
            } else {
                header("Location: http://localhost:8000/login");
            }
        } catch (Exception $e) {
            throw new Error($e);
        }
    }

    public static function Logout()
    {
        session_destroy();
        header("Location: http://localhost:8000/");
    }
}