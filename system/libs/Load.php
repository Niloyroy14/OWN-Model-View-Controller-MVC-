<?php


/**
 * Load Class
 */
class Load
{
	
	public function __construct()
	{
		
	}


	public function view($fileName,$data=false){

         if ($data==true) {
         	extract($data);
         }

		include 'app/view/'.$fileName.'.php';
	}



	public function model($modelName){

		include 'app/model/'.$modelName.'.php';
		return new $modelName();  // return object of every model
	}



  public function vallidation($vallidation){

		include 'app/vallidation/'.$vallidation.'.php';
		return new $vallidation();  // return object of every vallidation
	}




}
?>