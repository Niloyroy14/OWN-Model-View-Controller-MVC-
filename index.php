


<?php 
/*
include_once  "system/libs/Main.php";
include_once  "system/libs/DController.php";
include_once  "system/libs/Load.php";
include_once  "system/libs/DModel.php";
include_once  "system/libs/Database.php";  */

spl_autoload_register(function($className){       //autoload all class 

  include_once  "system/libs/".$className.".php";
});

include_once  "app/config/config.php";    // for base url



$main = new Main();  // object create of all class



/*    

// Modify this work in Main.php file

 $url= isset($_GET['url']) ? $_GET['url'] : NULL ;

 if( $url != NULL){
   $url=rtrim($url,'/');
   $url=explode("/", filter_var($url,FILTER_SANITIZE_URL));
 }else{
   unset($url);
 }



 if (isset($url[0])) {  //if get controller
   
    include 'app/controller/'.$url[0].'.php';

    $ctlr = new $url[0]();    //create controller object

    if (isset($url[2])) {   //if get parameter
       $string = str_replace('"', " ", $url[1]);   //convert array to string
       $ctlr->$string($url[2]); //call method with parameter

    }else{  //if do not get parameter

      if (isset($url[1])) {  //if get method
         $string = str_replace('"', " ", $url[1]);   //convert array to string
         $ctlr->$string(); //call method
      }

    }
 }else{    // if do not get any controller then load index controller

    include 'app/controller/Index.php';
    $ctlr= new Index();
    $ctlr->home();
 }



*/



 

 

 
 ?>




