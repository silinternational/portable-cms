<?php 

class Config {
	private static $ini = array();
	
	/**
	 * Load the ini file specified
	 * 
	 * @param string $srcFile The file to read the ini from
	 * @return bool $success
	 */
	private static function loadIni($srcFile)
	{
		$success = false;		
		$result = parse_ini_file($srcFile);
		
		if($result){
			$success = true;
			self::$ini = $result;
		}
		
		return $success;
	}
	
	/**
	 * Sets the default values prior to reading the ini file
	 */
	private static function setDefaults()
	{
		self::$ini['show_newsletter_signup'] = 0;
		self::$ini['admin_password'] = 'admin';
		self::$ini['timezone'] = 'UTC';
	}
	
	/**
	 * Initialize the config
	 * 
	 * @param string $iniFile
	 */
	public static function init($iniFile = '')
	{
		self::setDefaults();		
		if($iniFile){
			// we don't really care if the ini file load fails
			self::loadIni($iniFile);
		}
	}
	
	/**
	 * Get the value for the specified variable
	 * 
	 * @param string $variableName
	 * @return mixed $value The value of the variable, or NULL if not defined
	 */
	public static function getValue($variableName)
	{
		$result = NULL;
		
		if(array_key_exists($variableName, self::$ini)) {
			$result = self::$ini[$variableName];
		}
		
		return $result;
	}
	
	
}
