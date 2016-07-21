<?php
/**
 * Configs 
 * 
 * @author hashem <hashemm364@gmail.com>
 *
 */
class Configs 
{
    /**
     * Get config items
     * 
     * @var array
     */
    private $config;

    /**  
     * Require and Include configs files and set $configs array in $config property
     */
    public function __construct() 
    {
        require_once 'core/config/configs.php';
        @include_once 'app/config/configs.php';
        $this->config = $configs;
    }

    /**
     * Get config value by key
     * 
     * @param string $var
     * @return string $config[$var]
     */
    public function __get($var) 
    {
        return (isset($this->config[$var]) ? $this->config[$var] : null);
    }
}