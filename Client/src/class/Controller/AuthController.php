<?php

namespace App\Controller; 

use App\Repository\UserRepository;
use App\Error\RequestValidationError;
use Error;

class AuthController {
    public static function Signup()
    {
            $firstname = $_POST['First_Name'];
            $lastname = $_POST['Last_Name'];
            $username = $_POST['Username'];
            $email = $_POST['Email'];
            $password = $_POST['Password'];
            $confirmPassword = $_POST['Confirm_Password'];

        try {
            if ($password != $confirmPassword) {
                throw new RequestValidationError("Password doesn't match confirmPassword");               
            }

            $hash = AuthController::HashPassword($password);
            
            $user = new UserRepository();
            $user->InsertUser($email, $username, $firstname, $lastname, $hash);
            
            header("location: http://localhost:8000/signin");

        } catch (RequestValidationError $e) {
            throw new RequestValidationError($e);
        }
    }

    public static function HashPassword(string $password): string {
        $hashOptions = [
            'cost' => 10,
        ];
        return password_hash($password, PASSWORD_BCRYPT, $hashOptions);
    }

    public static function Signin(){

        $email = $_POST['Email'];
        $password = $_POST['Password'];

        try {
            //Check if user exists
            $user = new UserRepository();
            $user = $user->GetUserByEmail($email);

            if ($email != $user[0]['email']) {
                throw new RequestValidationError("Invalid Credentials");
            }

            $verify =  password_verify($password, $user[0]['password']);


            if ($verify) {
                $_SESSION['auth'] = array('id' => $user[0]['id'], 'email'=> $user[0]['email']);
                header("location: http://localhost:8000/");
            } else {
                header("Location: http://localhost:8000/signin");
            }
        } catch (RequestValidationError $e) {
            throw new RequestValidationError($e);
        }
        
    }

    public static function Signout()
    {
        session_destroy();
        header("Location: http://localhost:8000/");
    }
}