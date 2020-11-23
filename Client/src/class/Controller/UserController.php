<?php 

namespace App\Controller; 
require dirname(__DIR__,3) . "/vendor/autoload.php";

use App\Repository\UserRepository;
use App\Error\RequestValidationError;
use Error;

class UserController{

    static string $headerLocation ='Location: http://localhost:8000/admin/users';

    public static function AddUser()
    {
        // Get POST values
        $firstname = $_POST['First_Name'];
        $lastname = $_POST['Last_Name'];
        $username = $_POST['Username'];
        $email = $_POST['Email'];
        $password = $_POST['Password'];

        try{
            $hash = AuthController::HashPassword($password);
            $user = new UserRepository();
            $user->InsertUser($email, $username, $firstname, $lastname, $hash);
            header(UserController::$headerLocation);
        }catch(Error $e){
            echo $e->getMessage();
        }
    }

    public static function GetUserId()
    {
        // Get URI parameter
        $uri = $_SERVER['REQUEST_URI'];
        $id = explode('/', $uri)[4];
        
        try{
            $db = new UserRepository();
            return $db->GetUserById($id);
        }catch(Error $e){
            echo $e->getMessage();
        }
    }

    public static function UpdateUser()
    {
        // POST values
        $email = $_POST['Email'];
        $username = $_POST['Username'];
        $firstname = $_POST['Firstname'];
        $lastname = $_POST['Lastname'];

        // URI parameter
        $uri = $_SERVER['REQUEST_URI'];
        $id = explode('/', $uri)[5];

        try{            
            $user = new UserRepository();
            $user->UpdateUser($email,$username,$firstname,$lastname, $id);
            header(UserController::$headerLocation);
        }catch(Error $e){
            echo $e->getMessage();
        }
    }

    public static function UpdateUserRole()
    {
        // POST values
        $role = $_POST['Role'];
        
        // URI parameter
        $uri = $_SERVER['REQUEST_URI'];
        $id = explode('/', $uri)[5];
        
        try{ 
            $user = new UserRepository();
            $user->UpdateUserRole($role, $id);
            header(UserController::$headerLocation);
        }catch(Error $e){
            echo $e->getMessage();
        }
    }

    public static function UpdateUserPassword()
    {
        // POST values
        $password = $_POST['Password'];
        $confirmPassword = $_POST['Confirm_Password'];
        
        // URI parameter
        $uri = $_SERVER['REQUEST_URI'];
        $id = explode('/', $uri)[5];
        
        try{

            if($password !== $confirmPassword){
               throw new RequestValidationError("sorry invalid credentials");
            }

            $hash = AuthController::HashPassword($password);

            $user = new UserRepository();
            $user->UpdateUserPassword($hash, $id);
            header(UserController::$headerLocation);
        }catch(Error $e){
            echo $e->getMessage();
        }
    }

    public static function DeleteUser()
    {
        // Get URI parameter
        $uri = $_SERVER['REQUEST_URI'];
        $id = explode('/', $uri)[4];
        
        try{
        $user = new UserRepository();
        $user->DeleteUserById($id);

        header(UserController::$headerLocation);
        }catch(Error $e){
            echo $e->getMessage();
        }
    }


}