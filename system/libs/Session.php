<?php

/**
 * Session Class
 */
class Session 
{
	
	public function __construct()
	{
		
	}

   

   public static function sesionStart(){

   	  session_start();

   } 


   public static function set($key, $value){

   	$_SESSION[$key] = $value;

   }


   public static function get($key){

   	if (isset($_SESSION[$key])) {
   		
   		return $_SESSION[$key];
   	}else{
   		return false;
   	}
   }


   public static function checkAdminSession(){

   	self::sesionStart();
       
     //for admin

   	if(self::get("login")== false){
   		self::sesionDestory();
   	    header("Location:".BASE_URL."LoginController/Adminlogin");
   	}
   	
   }



      public static function checkUserSession(){

      self::sesionStart();
       
      //for user

      if(self::get("user_login")== false){
         self::sesionDestory();
          header("Location:".BASE_URL."LoginController/Userlogin");
      }
      
   }


   public static function sesionDestory(){

   	  session_destroy();

   } 


}































?>