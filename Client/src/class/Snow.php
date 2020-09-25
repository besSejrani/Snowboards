<?php

require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . "model" . DIRECTORY_SEPARATOR . "db.php";

class Snow
{
    public function getASnow(string $id)
    {
        $sql = "SELECT * FROM snows WHERE idSnow='$id'";
        $db = new DB();

        return $db->executeQuerySelect($sql);
    }

    public function getSnows()
    {
        $sql = "SELECT * FROM snows order by idSnow";
        $db = new DB();
        return $db->executeQuerySelect($sql);
    }

    public function addSnow(string $coupon, string $brand, string $boots, string $type, string $availability)
    {
        $sql = "INSERT INTO snows (idSnow, Marque, Boots, Type, Disponibilite) VALUES('$coupon', '$brand', '$boots', '$type', '$availability')";
        $db = new DB();
        return $db->executeQuerySelect($sql);
    }

    public function updateSnow()
    {
        // $sql = "DELETE FROM snows where idSnow=$_GET[idSnow]";
        // $result = $this->executeQuerySelect($sql);
        // return $result;
    }

    public function deleteSnow(string $id)
    {

        $sql = "DELETE FROM snows WHERE idSnow='$id'";
        $db = new DB();

        return $db->executeQuerySelect($sql);
    }
}