<?php

namespace App\Repository;

use App\Model\Mysql;

class UserRepository
{
        
    /**
     * GetUserByEmail
     *
     * @param  mixed $email
     * @return void
     */
    public function GetUserByEmail(string $email)
    {
        $sql = "SELECT * FROM snows_bes.user where email='$email'";
        $db = new Mysql();
        return $db->executeQuery($sql);
    }
    
    /**
     * GetUserById
     *
     * @param  mixed $id
     * @return void
     */
    public function GetUserById(string $id)
    {
        $sql = "SELECT * FROM snows_bes.user where id='$id'";
        $db = new Mysql();
        return $db->executeQuery($sql);
    }
    
    /**
     * GetAllUsers
     *
     * @return iterable
     */
    public function GetAllUsers():iterable{
        $sql="SELECT users.id as id, users.username as username, users.firstname as firstname, users.lastname as lastname, users.email as email, roles.name as role
        FROM snows_bes.user as users
        LEFT JOIN snows_bes.role as roles
        on roles.id_users = users.id";
        
        $db = new Mysql();
        return $db->executeQuery($sql);
    }

    public function getUserProfile():iterable{
        $sql="SELECT profile from snows_bes.user where id='1'";
        $db = new Mysql();
        return $db->executeQuery($sql);
    }
    
    /**
     * DeleteUserById
     *
     * @param  mixed $id
     * @return void
     */
    public function DeleteUserById(string $id){
        $sql = "DELETE FROM snows_bes.user WHERE id='$id'";
        $db = new Mysql();
        $db->executeQuery($sql);
    }
    
    /**
     * UpdateUser
     *
     * @param  mixed $email
     * @param  mixed $username
     * @param  mixed $firstname
     * @param  mixed $lastname
     * @param  mixed $hash
     * @param  mixed $id
     * @return void
     */
    public function UpdateUser($email,$username,$firstname,$lastname, $id){
        $sql = "UPDATE snows_bes.user SET email='$email', username='$username', firstname='$firstname', lastname='$lastname' WHERE id='$id'";
        $db = new Mysql();
        $db->executeQuery($sql);
    }

    public function UpdateUserProfile($profileImage, $id){
        $sql = "UPDATE snows_bes.user SET profile='$profileImage' WHERE id='$id'";
        $db = new Mysql();
        $db->executeQuery($sql);
    }

    
    /**
     * UpdateUserRole
     *
     * @return void
     */
    public function UpdateUserRole($role, $id){
        $sql= "UPDATE snows_bes.role SET name='$role', id_users='$id' where id='$id'";
        $db = new Mysql();
        $db->executeQuery($sql);
    }

    
    /**
     * UpdateUserPassword
     *
     * @param  mixed $role
     * @param  mixed $id
     * @return void
     */
    public function UpdateUserPassword($hash, $id){
        $sql= "UPDATE snows_bes.user SET password='$hash'where id='$id'";
        $db = new Mysql();
        $db->executeQuery($sql);
    }
    
           
    /**
     * InsertUser
     *
     * @param  mixed $email
     * @param  mixed $username
     * @param  mixed $firstname
     * @param  mixed $lastname
     * @param  mixed $hash
     * @return void
     */
    public function InsertUser($email,$username,$firstname,$lastname,$hash){
        $sql = "INSERT INTO snows_bes.user (email, username, firstname, lastname, password)
                VALUES('$email','$username','$firstname','$lastname','$hash')";
        
        $db = new Mysql();
        $db->executeQuery($sql);
    }

}