<?php

class dbConnect {

/*** Declare instance ***/
private static $db = NULL;

/**
*
* the constructor is set to private so
* so nobody can create a new instance using new
*
*/
private function __construct() {}

/**
*
* Return DB instance or create intitial connection
*
* @return object (PDO)
*
* @access public
*
*/
public static function getInstance() {

 if (!self::$db)
{
self::$db = new PDO('mysql:host=127.0.0.1;dbname=sproos_from_web','root','myname4u2',array('charset'=>'utf8'));;
self::$db-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
self::$db->query("SET CHARACTER SET utf8");
}
return self::$db;
}
private function __clone(){
}

}