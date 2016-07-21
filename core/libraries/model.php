<?php
/**
 * Model - Base Model Class
 * Connect to Databse in constructor method
 * @author Hashem Moghaddari <hashemm364@gmail.com>
 */
abstract class Model {
	
	protected $db;
	
    public function __construct(){ 	
    	$config = Loader::load('Configs');
        $this->db = new Database($config->dbType, $config->dbHost, $config->dbName, $config->dbCharset, $config->dbUser, $config->dbPassword, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
    }

} 