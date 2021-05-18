<?php

/**
 * UI Model
 */
class UIModel extends DModel
{
	
	public function __construct()
	{
		parent::__construct();
	}



   public function UIList($table){

		// return $this->db->select($table);
        $sql  = "select * from $table";
		return $this->db->select($sql);   // $this->db return Database class object, so we  call the database class method select


	}
    

   
    public function updateBackground($table, $data, $cond){
      
     	return $this->db->update($table,$data,$cond); // $this->db return Database class object, so we  call the database class method update

	}


   
   public function deleteUI($table,$cond){
      
		return $this->db->delete($table,$cond); // $this->db return Database class object, so we  call the database class method delete

	}

}
?>