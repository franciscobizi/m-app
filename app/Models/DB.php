<?php

namespace App\Models;
use mysqli;

abstract class DB
{
   const USER = 'u388355933_umpla';
   const PASS = '$mpla$';
   const HOST = 'mysql.hostinger.pt';
   const DBASE = 'u388355933_mpla';
   private static $instance = null;
   
   private function __construct(){}
   private function __wakeup(){}
   private function __clone(){}
   
   private static function Connection()
   {
       try
       {
            if(self::$instance == null):
                
                self::$instance = new mysqli(self::HOST, self::USER, self::PASS, self::DBASE);
            
            endif;
            
       }
       catch (Exception $ex)
       {
           echo"Error ".$ex->getMassage();
       }
       return self::$instance;
   }
   
   protected static function getConn()
   {
       return self::Connection();
   }
}
