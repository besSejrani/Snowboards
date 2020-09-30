<?php
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . "model" . DIRECTORY_SEPARATOR . "db.php";

class Category
{

    public static function GetCategories()
    {
        $sql = "SELECT id, name FROM snows_bes.categorie;";
        $db = new DB();
        return $db->executeQuery($sql);
    }
}
