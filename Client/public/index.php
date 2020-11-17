<?php

require (dirname(__DIR__) . "/vendor/autoload.php");

use App\Routes\Router;
use App\Controller\ProductController;
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


session_start();

$basePath = dirname(__DIR__) .  "/src/pages/";
$router = new Router($basePath);

$router->get("/", "home.php")
        ->get("/events", "events.php")
        ->get("/contact", "contact.php")
        ->get("/admin", "admin.php")


        ->get("/products", "products/products.php")
        ->get("/api/products/deleteProduct/[a:action]",function(){ ProductController::DeleteProduct();})

        ->get("/addProduct", "products/addProduct.php")
        ->post("/api/products/addProduct",function(){ ProductController::AddProduct();})

        ->get("/api/products/update/[a:action]", "products/updateProduct.php")
        ->post("/api/products/get/[a:action]",function(){ ProductController::GetProductId();})
        ->post("/api/products/update/[a:action]",function(){ ProductController::UpdateProduct();})

        ->get("/signup", "signup.php")
        ->post("/api/users/signup",function(){ UserController::Signup();})
        
        ->get("/signin", "signin.php")
        ->post("/api/users/signin",function(){ UserController::Signin();})

        ->get("/api/users/signout",function(){ UserController::Signout();})
        ->run();