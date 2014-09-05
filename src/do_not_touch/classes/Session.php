<?php 

class Session {
	private static $sessionID = false;

	/**
	 * read the session id from cookie
	 * and set it in our static variable
	 */
	private static function setFromCookie()
	{		
		if(array_key_exists('sessid', $_COOKIE)) {
			self::$sessionID = $_COOKIE['sessid'];
		}
	}
	
	/**
	 * Create a new session and set it in the cookie
	 */
	private static function createSession()
	{
		self::$sessionID = uniqid();
		// set the cookie for the next year
		setcookie('sessid', self::$sessionID, time() + (3600*24*365));
	}
	
	/**
	 * Attempt to get from cookie, create it if it's not found
	 */
	public static function init()
	{
		self::setFromCookie();
		if(!self::$sessionID){
			self::createSession();
		}
	}
	
	/**
	 * Fetch the session id
	 * @return string $sessionID
	 */
	public static function getID()
	{
		return self::$sessionID;
	}
	
}