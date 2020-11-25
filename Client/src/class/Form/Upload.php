<?php

namespace App\Form;

use Cloudinary;
use Cloudinary\Uploader;

class Upload
{
    public function config(){
        Cloudinary::config(array( 
            "cloud_name" => getenv('CLOUDINARY_NAME'), 
            "api_key" => getenv('CLOUDINARY_API_KEY'), 
            "api_secret" => getenv('CLOUDINARY_API_SECRET')
        ));
    }

    public function ProfileImage($image){

    # Upload the received image file to Cloudinary
    $result = Uploader::upload($image, array(
    "tags" => "backend_photo_album",
    "public_id" => rand()));

    return $result;
    }
}