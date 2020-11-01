<?php

require (dirname(__DIR__) . "/vendor/autoload.php");

use App\Routes\Router;
use App\Controller\Product;
use App\Controller\UserController;

// ========================================================================================================

// Meta tags SEO
$title = null;
$description = null;

// Keywords

// Google

// Open Graph protocol

// Geo Location

// Language



// ========================================================================================================
session_start();

$router = new Router("");
$basePath = dirname(__DIR__) .  "/src/pages/";

$router->get("/", $basePath . "home.php")
        ->get("/events", $basePath . "events.php")
        ->get("/contact", $basePath . "contact.php")

        ->get("/admin",$basePath . "admin.php")
        ->get("/products",$basePath . "products.php")
        ->get("/addProduct", $basePath . "addProduct.php")
        ->post("/api/products/addProduct",function(){ $action = new Product();$action->addProduct();})

        ->get("/signup",$basePath . "signup.php")
        ->post("/api/users/signup",function(){ UserController::Signup();})
        
        ->get("/signin",$basePath . "signin.php")
        ->post("/api/users/signin",function(){ UserController::Signin();})

        ->get("/api/users/signout",function(){ UserController::Signout();})
        ->run();