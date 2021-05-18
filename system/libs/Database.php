<?php 

/**
 * Database Class
 */
class Database extends PDO
{
	
	public function __construct()
	{


    $dsn  = 'mysql:dbname=db_mvc; host=localhost';
		$user ='root';
		$pass ='';
	
		parent::__construct($dsn, $user, $pass);
	}



	// public function select($table){

 //     $sql    = "select * from $table";
	// 	$stmt   = $this->prepare($sql);
	// 	$stmt->execute();
	// 	return $stmt->fetchALL();
	// }




   public function select($sql, $data=array(),$fetchStyle = PDO::FETCH_ASSOC){

	     $stmt = $this->prepare($sql);

       foreach ($data as $key => $value){
       	$stmt->bindParam($key,$value);
       }
        $stmt->execute();
        return $stmt->fetchALL($fetchStyle);
	}


  public function insert($table, $data){

   $keys   = implode(",", array_keys($data)); //for separate table colum name such as name,title
   $values = "'" .implode("', '",array_values($data))."'"; //for separate bind parameter such as :name, :title
    // $values = ":" .implode(", :",array_keys($data));  
                            //name,title    //:name, :title
 	$sql = "INSERT INTO $table($keys) VALUES($values)";
 	$stmt= $this->prepare($sql);
    
      foreach ($data as $key => $value){   // 	$stmt->bindValue(":name",$name);
       	$stmt->bindValue(":$key", $value);  //   $stmt->bindValue(":title",$title);
       }

       return $stmt->execute();

  }






  public function update($table, $data, $cond){

  	$updateKeys = NULL;

  	foreach ($data as $key => $value){   // 	$stmt->bindValue(":name",$name);
       $updateKeys .= "$key=:$key,";
    }
    $updateKeys = rtrim($updateKeys, ",");

    $sql  = "UPDATE  $table SET $updateKeys  WHERE $cond";
    $stmt = $this->prepare($sql);

    foreach ($data as $key => $value){   // 	$stmt->bindValue(":name",$name);
       	$stmt->bindValue(":$key", $value);  //   $stmt->bindValue(":title",$title);
       }

    return $stmt->execute();
}



  public function delete($table,$cond){

  	$sql = "DELETE FROM $table WHERE $cond";
  	return $this->exec($sql);

  }


  public function affectedRows($sql,$username,$password){

      $stmt = $this->prepare($sql);
      $stmt->execute(array($username,$password));
      return  $stmt->rowCount();

  }


  public function selectAdmin($sql,$username,$password, $fetchStyle = PDO::FETCH_ASSOC){
     
      $stmt = $this->prepare($sql);
      $stmt->execute(array($username,$password));
      return $stmt->fetchALL($fetchStyle);
  }







}

 ?>