<?php

namespace App\Repository;

require (dirname(__DIR__,3) . "/vendor/autoload.php");

use App\Model\Mysql;

class SnowRepository
{
    public function getASnow(string $id)
    {
        $sql = "SELECT * FROM snows WHERE idSnow='$id'";
        $db = new Mysql();
        return $db->executeQuery($sql);
    }

    public function getSnows()
    {
        $sql = "SELECT * FROM snows order by idSnow";
        $db = new Mysql();
        return $db->executeQuery($sql);
    }

    public function addSnow(string $coupon, string $brand, string $boots, string $type, string $availability)
    {
        $sql = "INSERT INTO snows (idSnow, Marque, Boots, Type, Disponibilite) VALUES('$coupon', '$brand', '$boots', '$type', '$availability')";
        $db = new Mysql();
        return $db->executeQuery($sql);
    }

    public function updateSnow()
    {
        // $sql = "DELETE FROM snows where idSnow=$_GET[idSnow]";
        // $result = $this->executeQuery($sql);
        // return $result;
    }

    public function deleteSnow(string $id)
    {

        $sql = "DELETE FROM snows WHERE idSnow='$id'";
        $db = new Mysql();
        return $db->executeQuery($sql);
    }
}