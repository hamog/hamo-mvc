<?php

/**
 * Dispatcher, Heart of my framework
 * 
 * @author hashem mo <hashemm364@gmail.com>
 */
class Dispatcher {
    
    /**
     * Get router and dispatch route parts
     * 
     * @param object $router
     */
    public static function dispatch($router) 
    {
        global $app;
        //Get Controller name from router
        $controller = $router->getController();
        $controllerClass = ucfirst("{$controller}Controller");
        $action = 'action'. $router->getAction();
        $params = $router->getParams();
        $controllerFile = "app/controllers/{$controllerClass}.php";
        //Check existing controller file
        if(!file_exists($controllerFile)){
            throw new Exception("Controller '{$controller}' is not exist!");
        }
       
        require_once $controllerFile;
        $app = new $controllerClass();
        
        //Check existing method in controller class
        if(!method_exists($app, $action)){
            $actionName = substr($action, 6);
            throw new Exception("Action '{$actionName}' not exist!");
        }
        //Call action method
        $app->{$action}($params);
    }
}

