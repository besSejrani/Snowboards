<?php

namespace App\Repository;

use App\Model\DB;

class Category
{

    public static function GetCategories()
    {
        $sql = "SELECT id, name FROM snows_bes.categorie;";
        $db = new DB();
        dump($db);
        return $db->executeQuery($sql);
    }
}