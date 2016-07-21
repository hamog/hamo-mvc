<?php

require_once 'core/ini.php';
	
try {
    Initializer::init();
    $router = Loader::load('Router');
    Dispatcher::dispatch($router);
	
} catch (Exception $e){
    $exception = Loader::load('ExceptionHandler');
    $exception->render($e->getMessage());
}



