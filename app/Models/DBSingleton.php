<?php

namespace App\Models;

class DBSingleton
{
     private static $instance = null;
     private function __construct(){}
     private function __wakeup(){}
     private function __clone(){}

     public static function getInstance()
     {
        $dsn = 'mysql:host=localhost;dbname=p_mpla';
        $username = 'root';
        $passwd = ''; 
         
         if(self::$instance == null)
         {
             self::$instance = new \PDO($dsn,$username,$passwd);
         }
         return self::$instance ;
     }
}