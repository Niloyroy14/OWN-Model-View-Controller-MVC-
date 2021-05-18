<?php


/**
 * Main Model
 */
class DModel
{
	
   protected $db = array();

	public function __construct()
	{

		$this->db = new Database();     //return object of Database class
	}
}

?>