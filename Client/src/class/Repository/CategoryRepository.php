<?php

namespace App\Repository;

require (dirname(__DIR__,3) . "/vendor/autoload.php");

use App\Model\Mysql;


class CategoryRepository
{
    public static function GetCategories()
    {
        $sql = "SELECT id, name FROM snows_bes.categorie;";
        $db = new Mysql();
        return $db->executeQuery($sql);
    }
}