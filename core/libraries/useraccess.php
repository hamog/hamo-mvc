<?php
/**
 *useraccess - check a user access for page
*
* @author Hashem Moghaddari <hashemm364@gmail.com>
*/
class UserAccess {
	/**
	 * userController - Check login user
	 * @return if loggedIn session variable not exist redirect login page
	 */
	public static function userController(){
		$session= Loader::load('Session');
		$login= $session->get('loggedIn');
		if($login==FALSE )
		{
			$session->destroy();
			Base::redirect('site/login');
			exit;
		}
	}
	
}