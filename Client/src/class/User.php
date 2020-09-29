<?php

require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . "model" . DIRECTORY_SEPARATOR . "db.php";

class User
{

    public static function Register(string $username, string $email, string $password, string $confirmPassword)
    {
        try {
            if ($password != $confirmPassword) {
                throw new Error("Password doesn't mtach confirmPassword");
            }

            $hashOptions = [
                'cost' => 10,
            ];
            $hash = password_hash($password, PASSWORD_BCRYPT, $hashOptions);


            $sql = "INSERT INTO users (email, password, username) VALUES('$email', '$hash', '$username')";
            $db = new DB();
            DB::Disconnect();
            $db->executeQuery($sql);

            header("location: http://localhost:8080/");
        } catch (Exception $e) {
            throw new Error($e);
        }
    }

    public static function Login(string $email, string $password)
    {
        try {

            //Get user
            $sql = "SELECT * FROM snows.users where email='$email'";
            $db = new DB();
            DB::Disconnect();
            $user = $db->executeQuery($sql);

            // dump($user);
            //Check if user exists
            if ($email != $user[0]['email']) {
                throw new Error("Invalid Credentials");
            }

            $verify =  password_verify($password, $user[0]['password']);

            if ($verify) {
                $_SESSION['role'] = "admin";
                header("location: http://localhost:8080/");
            } else {
                header("Location: http://localhost:8080/login");
            }
        } catch (Exception $e) {
            throw new Error($e);
        }
    }

    public static function Logout()
    {
        session_destroy();
        header("Location: http://localhost:3000/");
    }
}
