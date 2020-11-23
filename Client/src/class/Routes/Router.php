<?php

namespace App\Routes;

require (dirname(__DIR__, 3)) . "/vendor/autoload.php";

class Router 
{
    private $viewPath;
    private $router;

    public function __construct(string $viewPath)
    {
        $this->viewPath = $viewPath;
        $this->router = new \AltoRouter();
    }

    public function get(string $url, $view, $name = null)
    {
        $this->router->map('GET', $url, $view, $name);
        return $this;
    }

    public function post(string $url, $view, $name = null)
    {

        $this->router->map('POST', $url, $view, $name);
        return $this;
    }


    public function run()
    {
        $match = $this->router->match();
        $target = $match['target'];
        
        if(is_array($match) && is_callable($match['target'])) {
            call_user_func_array($match['target'], $match['params'] );       
        }
        elseif(!$match){
            require dirname(__DIR__,2) .'/pages/404.php';
        }
        
        if($match){
            ob_start();
            include $this->viewPath . DIRECTORY_SEPARATOR . $target;
            $content = ob_get_clean();
        }
        
        require dirname(__DIR__,2) .'/layout/layout.php';
        return $this;
    }

}