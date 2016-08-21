<?php


/**
 * Description of Db
 *
 * @author Usen
 */
class Db {
    
    public static $dsn="mysql:host=localhost;dbname=sandelik1";
    
    
    public static function DbConnection(){
        $dsn = self::$dsn;
        $db = new PDO($dsn, 'root','');
        return $db;         
    }
    
}
