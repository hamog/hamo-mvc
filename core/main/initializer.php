<?php
/**
 * Extend include path directories
 * 
 * @author hashem mo <hashemm364@gmail.com>
 */
class Initializer 
{
    /**
     * Extend include paths
     */
    public static function init() 
    {
        set_include_path(get_include_path() . PATH_SEPARATOR . 'core/libraries');
        set_include_path(get_include_path() . PATH_SEPARATOR . 'app/controllers');
        set_include_path(get_include_path() . PATH_SEPARATOR . 'app/models');
        set_include_path(get_include_path() . PATH_SEPARATOR . 'app/views');
    }
}