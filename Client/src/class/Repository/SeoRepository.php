<?php

namespace App\Repository;

use App\Model\Mysql;

class SeoRepository
{    
    /**
     * InsertSeo
     *
     * @return void
     */
    public function InsertSeo($page, $title, $description ){
        $sql = "INSERT INTO snows_bes.seo(page, title, description) VALUES ('$page', '$title', '$description')";       
        $db = new Mysql();
        $db->executeQuery($sql);
    }

    public function GetSeos():iterable{
        $sql = "SELECT * FROM snows_bes.seo";       
        $db = new Mysql();
        return $db->executeQuery($sql);
    }
}