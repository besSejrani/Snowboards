<?php 

namespace App\Controller; 
require dirname(__DIR__,3) . "/vendor/autoload.php";

use App\Repository\UserRepository;
use App\Error\RequestValidationError;

class UserController{
    
    
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
            
            $hashOptions = [
                'cost' => 10,
            ];
            $hash = password_hash($password, PASSWORD_BCRYPT, $hashOptions);
            
            $user = new UserRepository();
            $user->InsertUser($email, $username, $firstname, $lastname, $hash);
            
            header("location: http://localhost:8000/signin");

        } catch (RequestValidationError $e) {
            throw new RequestValidationError($e);
        }
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
                $_SESSION['role'] = "admin";
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