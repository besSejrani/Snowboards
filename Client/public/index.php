<?php

require (dirname(__DIR__) . "/vendor/autoload.php");

use App\Controller\AuthController;
use App\Controller\EventController;
use App\Routes\Router;
use App\Controller\ProductController;
use App\Controller\SeoController;
use App\Controller\UserController;

session_start();

$basePath = dirname(__DIR__) .  "/src/pages/";
$router = new Router($basePath);

$router->get("/", "public/home.php")

        ////////////////////////////////////////////////////////////////////
        //PUBLIC
        ////////////////////////////////////////////////////////////////////

        //Contact
        ->get("/contact", "public/contact.php")
        
        
        //Signup
        ->get("/signup", "public/signup.php")
        ->post("/api/users/signup",function(){ AuthController::Signup();})
        

        //Signin
        ->get("/signin", "public/signin.php")
        ->post("/api/users/signin",function(){ AuthController::Signin();})


        //Sign out
        ->get("/api/users/signout",function(){ AuthController::Signout();})

        
        
        ////////////////////////////////////////////////////////////////////
        //ADMIN
        ////////////////////////////////////////////////////////////////////

        //Administration
        ->get("/admin/administration", "admin/admin.php")
        
        // Events
        ->get("/admin/seo", "admin/SEO/listSeo.php")
        ->get("/admin/seo/addSeo", "admin/SEO/addSeo.php")

        ->post("/api/seo/add",function(){ SeoController::AddSeo();})
        
        // Events
        ->get("/events", "public/events.php")
        ->get("/admin/events", "admin/events/listEvents.php")
        ->get("/admin/events/addEvent", "admin/events/addEvent.php")
        ->post("/api/events/add",function(){ EventController::AddEvent();})

        ->get("/api/events/delete/[a:action]",function(){ EventController::DeleteEvent();})

        
        // Users
        ->get("/admin/users", "admin/users/listUsers.php")

        ->get("/api/users/add", "admin/users/addUser.php")
        ->post("/api/users/add",function(){ UserController::AddUser();})

        ->get("/api/users/update/[a:action]", "admin/users/updateUser.php")
        ->post("/api/users/update/user/[a:action]",function(){ UserController::UpdateUserInformation();})
        ->post("/api/users/update/profile/[a:action]",function(){ UserController::UpdateUserProfile();})
        ->post("/api/users/update/role/[a:action]", function(){UserController::UpdateUserRole();})
        ->post("/api/users/update/password/[a:action]", function(){UserController::UpdateUserPassword();})
        
        ->get("/api/users/delete/[a:action]",function(){ UserController::DeleteUser();})


        // Inventory 
        ->get("/admin/inventory", "admin/inventory/listInventory.php")
        ->get("/api/inventory/deleteProduct/[a:action]",function(){ ProductController::DeleteProduct();})

        ->get("/addProduct", "admin/inventory/insertProduct.php")
        ->post("/api/inventory/addProduct",function(){ ProductController::AddProduct();})

        ->get("/api/inventory/update/[a:action]", "admin/inventory/updateProduct.php")
        ->post("/api/inventory/get/[a:action]",function(){ ProductController::GetProductId();})
        ->post("/api/inventory/update/[a:action]",function(){ ProductController::UpdateProduct();})


        // Coupons
        ->get("/admin/coupons", "admin/coupons/listCoupons.php")
        ->get("/admin/coupons/insertCoupon", "admin/coupons/insertCoupon.php")


        // Promotions
        ->get("/admin/promotions", "admin/promotions/listPromotions.php")
        ->get("/admin/promotions/insertCoupon", "admin/promotions/insertPromotion.php")


        // Orders
        ->get("/admin/orders", "admin/orders/listOrders.php")
        ->get("/admin/orders/insertOrder", "admin/orders/insertOrder.php")


        // Suppliers
        ->get("/admin/suppliers", "admin/suppliers/listSuppliers.php")
        ->get("/admin/suppliers/insertCoupon", "admin/suppliers/insertSupplier.php")


        // Options
        ->get("/admin/settings", "admin/settings/listSettings.php")


        ->run();