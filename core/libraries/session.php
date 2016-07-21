<?php
/**
 * Session Class
 * @author Hashem Moghaddari <hashemm364@gmail.com>
 */
class Session {
	/**
	 * session start
	 */
	public static function init(){
		if(!isset($_SESSION)){
			session_start();
		}
	}
	/**
	 * Register a new session variable
	 * @param string $name
	 * @param string $value
	 */
	public static function set($name, $value){
		self::init();
		$_SESSION[$name] = $value;
	}
	/**
	 * Get a session variable
	 * if exsist session varible return TRUE else return FALSE
	 * @param string $name
	 * @return boolean
	 */
	public static function get($name){
		self::init();
		if(isset($_SESSION[$name])){
			return $_SESSION[$name];
		}else{
			return false;
		}
	}
	/**
	 * Session regenertae Id
	 * usage for security issues
	 */

	public static function sessionRegID() {
		session_regenerate_id();
	}
	/**
	 * UnsetSession - give a session variable name and unset
	 * @param string $name
	 */
	public static function UnsetSession($name){
		self::init();
		unset($_SESSION[$name]);
	}
	/**
	 * Destroy all session variable in web application
	 */
	public static function destroy(){
		self::init();
		return session_destroy();
	}
}