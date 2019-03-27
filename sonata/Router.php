<?php
namespace Sonata;

class Router
{
    protected $routes = [ //protected interdit l'accès a cette variable en dehors de la classe
        'GET' => [],
        'POST' => []
    ];

    public static function load($file)
    {
        $router = new static;

        require $file;

        return $router;
    }

    public function dispatch($requestUri, $requestMethod)
    {
        if (array_key_exists($requestMethod, $this->routes)) {
            //$action = $this->routes[$requestMethod][$requestUri];
            //$actionComponents = explode('@', $action);//explose la chaine pour avoir le nom du controller et de l'autre l'action
            //$controllerName = $actionComponents[0];
            //$actionName = $actionComponents[1];
            //require './app/controllers/' . $controllerName . '.php'; //composer vas effectuer cette action tout seul
            //$controller = new $controllerName; //instancie un nouveau controller
            //$controller->$actionName(); // execute l'action contenue dans action name
            if (array_key_exists($requestUri, $this->routes[$requestMethod])) {
                $action = $this->routes[$requestMethod][$requestUri];
                try {
                    $this->callAction(...explode('@', $action));
                } catch (\Exception $e) {
                    die($e->getMessage());
                }
            }
        } else {
            throw new \Exception("{$requestMethod} n‘est pas une méthode supportée pas le site");
        }
    }

    public function get($uri, $action)
    {
        $this->routes['GET'][$uri] = $action;
    }

    public function post($uri, $action)
    {
        $this->routes['POST'][$uri] = $action;
    }

    private function callAction($controllerName, $actionName)
    {
        $controllerName = 'App\\Controllers\\'. $controllerName;
        $controller = new $controllerName;
        if (method_exists($controller, $actionName)) {
            try {
                $controller->$actionName();
            } catch (\Exception $e) {
                die($e->getMessage());
            }
        } else {
            throw new \Exception("{$actionName} n'est pas une méthode supportée par le site");
        }
    }
}
