<?php

namespace App\Controller;

use App\Repository\SeoRepository;
use Error;

class SeoController{

    static string $headerLocation ='Location: http://localhost:8000/admin/seo';

    public static function AddSeo()
    {
        // POST values
        $seoName = $_POST['Page'];
        $seoTitle = $_POST['Title'];
        $seoDescription = $_POST['Description'];

        try{
            $event = new SeoRepository();
            $event->InsertSeo($seoName, $seoTitle, $seoDescription);
            header(SeoController::$headerLocation);
        }catch(Error $e){
            echo $e->getMessage();
        }
    }
}