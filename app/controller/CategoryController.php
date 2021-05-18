<?php

/**
 * category Controller
 */
class CategoryController extends Dcontroller
{
	
	public function __construct()
	{
		parent::__construct();
	}




  public function categoryList(){

  	$data=array();
  	$table="category";
  	$catModel= $this->load->model("CategoryModel");//$this->load return Load class object, so we call the Load class method model thats return object
  	$data['cat']=$catModel->CategoryList($table);    //call the catgoryModel method CatList
  	$this->load->view("category",$data);  // $this->load return Load class object, so we call the Load class method view

  }


//show

   public function categoryByid(){
  	$data = array();
  	$table = "category";
  	$id = 1;
  	$catModel=$this->load->model("CategoryModel");//$this->load return Load class object, so we call the Load class method model thats return object
  	$data['cat']=$catModel->CategoryById($table,$id); //call the catgoryModel method CatList
  	$this->load->view("catbyid",$data);  // $this->load return Load class object, so we call the Load class method view
  }


//add page

  public function addCategory(){
  	$this->load->view('add_category');  // $this->load return Load class object, so we call the Load class method view
  }


  public function insertCategory(){
   
   $table = "category";

   $name  = $_POST['name'];
   $title = $_POST['title'];

   $data = array(
     'name'  => $name,
     'title' => $title
   );

   	$catModel=$this->load->model("CategoryModel"); //$this->load return Load class object, so we call the Load class method model thats return object
  	$result = $catModel->InsertCategory($table,$data); //call the catgoryModel method InsertCategory
    
    $mdata = array();

    if($result==1){
      $mdata['msg'] = "Category Has Added Succesfully...";
    }else{
        $mdata['msg'] = "Category Not Added ...";
    }
    $this->load->view("add_category",$mdata);  // $this->load return Load class object, so we call the Load class method view
  }


//editpage

 public function editCategory(){

   	$data = array();
  	$table = "category";
  	$id = 1;
  	$catModel=$this->load->model("CategoryModel"); //$this->load return Load class object, so we call the Load class method model thats return object
  	$data['cat']=$catModel->CategoryById($table,$id); //call the catgoryModel method CategoryByID
  	$this->load->view("edit_category",$data);   // $this->load return Load class object, so we call the Load class method view
  }

//update

 public function updateCategory(){

   $table = "category";
  
   $id    = $_POST['id'];
   $name  = $_POST['name'];
   $title = $_POST['title'];

   $cond  = "id=$id";

   $data = array(
     'name'  => $name,
     'title' => $title
   );

 	$catModel=$this->load->model("CategoryModel"); //$this->load return Load class object, so we call the Load class method model thats return object
  	$result = $catModel->UpdateCategory($table,$data,$cond); //call the catgoryModel method UpdateCategory
    
     $mdata = array();

    if($result==1){
      $mdata['msg'] = "Category Has Updated Succesfully...";
    }else{
        $mdata['msg'] = "Category Not Updated ...";
    }
    $this->load->view("edit_category",$mdata);   // $this->load return Load class object, so we call the Load class method view


  }




public function deleteCategory(){

   $table = "category";
   $cond  = "id=18";

   $catModel = $this->load->model("CategoryModel"); //$this->load return Load class object, so we call the Load class method model thats return object 
   $catModel->DeleteCategory($table,$cond); //call the catgoryModel method UpdateCategory
}







}

?>