<?php

namespace App\Repository;

use App\Model\Mysql;

class UserRepository
{
    
    public function GetUserByEmail(string $email)
    {
        $sql = "SELECT * FROM snows_bes.user where email='$email'";
        $db = new Mysql();
        return $db->executeQuery($sql);
    }
       
    public function InsertUser($email,$username,$firstname,$lastname,$hash){
        $sql = "INSERT INTO snows_bes.user (email, username, firstname, lastname, password) VALUES('$email','$username','$firstname','$lastname','$hash' )";
        $db = new Mysql();
        $db->executeQuery($sql);
    }
}