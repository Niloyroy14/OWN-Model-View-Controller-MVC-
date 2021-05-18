<?php

/**
 * User Model
 */
class UserModel extends DModel
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function UserList($table){

		// return $this->db->select($table);
        $sql  = "select * from $table";
		return $this->db->select($sql);   // $this->db return Database class object, so we  call the database class method select


	}
    

    public function UserById($table,$id){

		
      $sql  = "select * from $table where id=:id";
      $data = array(":id"=>$id);
      return $this->db->select($sql,$data); // $this->db return Database class object, so we  call the database class method select


		// $sql  = "select * from $table where id=:id";
		// $stmt = $this->db->prepare($sql);
       //  $stmt->bindParam(':id', $id);
      //   $stmt->execute();
     //    return $stmt->fetchALL();


	}


	public function InsertUser($table, $data){
      
		return $this->db->insert($table,$data); // $this->db return Database class object, so we  call the database class method insert

	}


    public function EditUser($table,$id){
      $sql  = "select * from $table where id=:id";
      $data = array(":id"=>$id);
      return $this->db->select($sql,$data); // $this->db return Database class object, so we  call the database class method select

	}

   
    public function UpdateUser($table, $data, $cond){
      
     	return $this->db->update($table,$data,$cond); // $this->db return Database class object, so we  call the database class method update

	}


	 public function DeleteUser($table, $cond){
      
		return $this->db->delete($table,$cond); // $this->db return Database class object, so we  call the database class method delete

	}




}


?>