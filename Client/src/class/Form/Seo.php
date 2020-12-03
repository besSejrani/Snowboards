<?php

namespace App\Form;

class Seo {
    
    public function myTitle(string $title){
        echo "<title>$title</title>" ;
        return $this;
    }

    public function myDescription(string $description){
        echo "<meta name=description content='$description'>" ;
        return $this->title;
    }

    public function ogTitle(string $title){
        echo "<meta property=og:title content='$title' />" ;
        return $this;
    }

    public function ogUrl(string $url){
        echo "<meta property=og:url content='$url' />" ;
        return $this;
    }

    public function ogImage(string $imageUrl){
        echo "<meta property=og:image content='$imageUrl' />" ;
        return $this;
    }

    public function ogType(string $type){
        echo "<meta property=og:type content='$type' />" ;
        return $this;
    }

    public function ogLocale(string $locale){
        echo "<meta property=og:locale content=$locale />" ;
        return $this;
    }
}