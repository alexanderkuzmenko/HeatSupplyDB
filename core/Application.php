<?php
class Application 
{   
    private $path;
    private $parameters;
    private $controller;
    
    public function __construct()
    {
        
    }
    
    public function run()
    {
        $this->route();
        $this->action();
    }

    protected function route()
    {
        $routes = include(ROOT . "/config/routes.php");
        $uri = trim($_SERVER["REQUEST_URI"], "/");
        $path = "home/page404";
        foreach($routes as $key => $route) {
            if(preg_match("~^$key$~", $uri)) {
                $path = preg_replace("*$key*", $route, $uri);
                break;
            }
        }
        $this->path = $path;
    }
    
    protected function action() 
    {        
        $parts = [];
        $parts = explode("/", $this->path);
        $controllerID = array_shift($parts);
        $controllerClass = ucfirst($controllerID) . "Controller";
        $action = 'action' . ucfirst(array_shift($parts));
        $this->parameters = $parts;
        $this->controller = new $controllerClass($controllerID);
        $this->controller->$action($this->parameters);
    }
    
}
