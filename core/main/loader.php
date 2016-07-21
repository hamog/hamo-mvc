<?php
/**
 * Loader (Singleton Architecture)
 * 
 * @author hashem mo <hashemm364@gmail.com>
 *
 */
class Loader 
{
    
    /**
     * Loaded objects 
     * 
     * @var array $loaded
     */
    private static $loaded = array();
    
    /**
     * Valid classes name
     * 
     * @var array
     */
    private static $valid = array(
        'Configs',
        'Router',
        'GUMP',
        'UserAccess',
        'Session',
        'Hash',
        'ExceptionHandler',
    );

    /**
     * Load Or Create object from a valid class
     * 
     * @param string $object
     * @throws Exception - if $object is not exist in valid array
     */
    public static function load($object) 
    {
        //Check valid classes
        if(!in_array($object, self::$valid)) {
            $config = self::load('Configs');
            throw new Exception("'{$object}' is not a valid object to load.");
        }
        //create new object
        if(empty(self::$loaded[$object])) {
            self::$loaded[$object] = new $object();
        }
        return self::$loaded[$object];
    }

    /**
     * Display all loaded objects by var_dump
     */
    public static function inspect() 
    {
        Base::pre(array_keys(self::$loaded));
    }
}