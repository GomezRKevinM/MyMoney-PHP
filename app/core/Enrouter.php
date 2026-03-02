<?php

class Enrouter {
    private $routes = ['Home','Error'];

    public function route($controllerName) {
        $url = explode('/', trim($_SERVER['REQUEST_URI'], '/'));

        if (in_array($controllerName, $this->routes)) {
            $controllerClass = $controllerName . 'Controller';
            require_once __DIR__ . '/../controllers/' . $controllerClass . '.php';
            $controller = new $controllerClass();
            $controller->index();
        } else {
            echo "Controller not found: " . $controllerName;
        }
    }

    public function getRoute(){
        $url = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
        $controllerName = !empty($url[0]) ? $url[0] : 'Home';
        return ['controller' => $controllerName];
    }

    public function validateRoute($controllerName){
        if(in_array($controllerName, $this->routes)){
            return true;
        }        return false;
    }




}