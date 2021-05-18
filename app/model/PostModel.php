<?php

/**
 * Post Model
 */


class PostModel extends DModel
{
  
  public function __construct()
  {
    parent::__construct();
  }

  public function getAllPost($table){
    $sql  = "select * from $table order by id asc";
    return $this->db->select($sql);   // $this->db return Database class object, so we  call the database class method select
  }




 public function getPostByID($tablepost, $tablecategory, $id)
 {
   
    $sql  = "select $tablepost.*,$tablecategory.name from $tablepost inner join $tablecategory on $tablecategory.id = $tablepost.category_id where $tablepost.id= $id";
    return $this->db->select($sql);   // $this->db return Database class object, so we  call the database class method select
 }    





 public function getPostByCat($tablepost, $tablecategory, $id)
 {
   
    $sql  = "select $tablepost.*,$tablecategory.name from $tablepost inner join $tablecategory on $tablecategory.id = $tablepost.category_id where $tablecategory.id= $id";
    return $this->db->select($sql);   // $this->db return Database class object, so we  call the database class method select
 }





  public function getLatestPost($table)
  {
   
     $sql  = "select * from $table order by id asc limit 5";
     return $this->db->select($sql);   // $this->db return Database class object, so we  call the database class method select
  }






    public function getPostBysearch($table_post, $search_keyword, $search_option)
    {

       if (empty($search_keyword) && ($search_option==0)) {
        
            header("Location:".BASE_URL."Index/home");
       }




      if (isset($search_keyword) && !empty($search_keyword)) {

        $sql  = "select * from $table_post where title like '%$search_keyword%' or content like  '%$search_keyword%' ";
        // return $this->db->select($sql); 
      }elseif (isset($search_option)) {
        
          $sql  = "select * from $table_post where category_id = $search_option";
          // return $this->db->select($sql);
      }

         return $this->db->select($sql);  //$this->db return Database class object, so we  call the database class method select
        
    }



    public function InsertPost($table,$data){
      
       return $this->db->insert($table,$data); // $this->db return Database class object, so we  call the database class method insert

    }


    public function EditPost($table,$id){

      $sql  = "select * from $table where id=:id";
      $data = array(":id"=>$id);
      return $this->db->select($sql,$data); // $this->db return Database class object, so we  call the database class method select
    }
   
    
   public function UpdatePost($table, $data, $cond){
      
      return $this->db->update($table,$data,$cond); // $this->db return Database class object, so we  call the database class method update

   }


   public function DeletePost($table, $cond){
      
    return $this->db->delete($table,$cond); // $this->db return Database class object, so we  call the database class method delete

  }





}
?>