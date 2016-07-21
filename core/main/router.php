<?php
/**
 * Router
 * 
 * @author hashem <hashemm364@gmail.com>
 *
 */
class Router {
    
    /**
     * Url path
     * 
     * @var string
     */
    private $route;
    
    /**
     * Controller name
     * 
     * @var string
     */
    private $controller;
    
    /**
     * Controller action name
     * 
     * @var string
     */
    private $action;
    
    /**
     * Route parameters
     * 
     * @var array
     */
    private $params;
    
    /**
     * Configs
     * 
     * @var object
     */
    private $config;

    
    /**
     * Get url path , get controller and action name, get route parameters
     * 
     * @throws Exception
     */
    public function __construct() 
    {
        //Get config object
        $this->config =  Loader::load('Configs');
        
        //Get url path
        if(isset($_GET['url'])) {
            $path = $_GET['url'];
        } else {
            $path = $this->config->defaultController;
            if(!$path) {
                $path = 'Site';
            }
        }
        
        //Remove invalid characters in url path
        $this->route = preg_replace($this->config->invalidUrlChars, '', $path);
        //Set route parts in array
        $routeParts = explode('/', $this->route);
        //Get controller name
        $this->controller = $routeParts[0];
        //Get action name
        $this->action = (isset($routeParts[1]) ? $routeParts[1] : 'index');
        //Remove first and second item in routeParts array
        array_shift($routeParts);
        array_shift($routeParts);
        //Remove spaces
        foreach($routeParts as $key => $value) {
            if(trim($value) === '') {
                unset($routeParts[$key]);
            }
        }
        //Set params array for route parameters
        $this->params = array();
        //If the parameters are not in pairs to display an error
        if(count($routeParts) % 2 == 1) {
            throw new Exception('You must specify parameters as \'key/value\' pairs (e.g. type/valid/page/2 means type=valid and page=2).');
        }
        //Determine the key and value parameters
        foreach(array_keys($routeParts) as $key) {
            if($key % 2 == 1) {
                continue;
            }
            $this->params[$routeParts[$key]] = $routeParts[$key + 1];
        }
    }
    
    /**
     * Get Controller action name
     * 
     * @return string 
     */
    public function getAction() 
    {
        return (!empty($this->action) ? $this->action : 'index');
    }
    
    /**
     * Get Controller name
     * 
     * @return string
     */
    public function getController() 
    {
        return (!empty($this->controller) ? $this->controller: 'Site');
    }
    
    /**
     * Get route parameters
     * 
     * @return array
     */
    public function getParams() 
    {
        return (!empty($this->params) ? $this->params: array());
    }
}
