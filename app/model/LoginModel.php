<?php


/**
 * 
 */
class LoginModel extends DModel
{
	
	public function __construct()
	{
		parent::__construct();
	}




//admin authentication


   public function Control($table,$username,$password){

       $sql  = "select * from $table where username=? and password=? ";

      return $this->db->affectedRows($sql,$username,$password); // $this->db return Database class object, so we  call the database class method successLogin


   }



   public function getData($table,$username,$password){

    
      $sql  = "select * from $table where username=? and password=? ";

      return $this->db->selectAdmin($sql,$username,$password); // $this->db return Database class object, so we  call the database class method successLogin

   }










}
?>