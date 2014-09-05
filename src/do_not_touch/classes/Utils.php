<?php

class Utils
{
    /**
     * Class will eventually dynamically load translated text from appropriate
     * file if the file exists, otherwise it will fallback to default "en_US".
     *
     * @param string $string String of text to translate.
     * @param mixed $lang Target language.
     * @return string Translated string.
     */
    public static function t($string, $lang=false)
    {
        if(!$lang){
            // get lang from request headers
        }

        return $string;
    }

    /**
     * Get the value of a request parameter if defined, otherwise return
     * provided default.
     *
     * @param string $name
     * @param mixed $default
     * @return mixed
     */
    public static function getParam($name, $default=null)
    {
        $method = strtoupper($_SERVER['REQUEST_METHOD']);

        if($method == 'GET'){
            if(isset($_GET[$name])){
                return $_GET[$name];
            }
        } elseif ($method == 'POST') {
            if(isset($_POST[$name])){
                return $_POST[$name];
            }
        }

        return $default;
    }
    
    /**
     * Log access for this page
     */
    public static function logAccess() 
    {
    	$data = array(date("Y-m-d H:i:s T"), Session::getID(), 
    			$_SERVER['REQUEST_URI'], $_SERVER['HTTP_USER_AGENT']);
    	$fh = fopen(__DIR__.'/../../accesslog.csv','a+');
    	$fp = fputcsv($fh, $data);
    	fclose($fh);
    }
    
    /**
     * Logs download requests
     * @param string $filename
     */
    public static function logDownload($filename)
    {
    	$data = array(date("Y-m-d H:i:s T"), Session::getID(), $filename); 
    	$fh = fopen(__DIR__.'/../../downloads.csv','a+');
    	$fp = fputcsv($fh, $data);
    	fclose($fh);
    }
}
