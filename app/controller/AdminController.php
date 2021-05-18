<?php


/**
 * Admin controller
 */
class AdminController extends DController
{
	
	public function __construct()
	{
		parent::__construct();
		
		Session::checkAdminSession();
	}
   


 public function Index(){
  	$this->home();
  }


  public function home(){
  	$this->load->view('Admin/header');
  	$this->load->view('Admin/sidebar');
  	$this->load->view('Admin/home');
  	$this->load->view('Admin/footer');
  }


  /* For Category*/ 

 public function addCategory(){
 	  $this->load->view('Admin/header');
  	$this->load->view('Admin/sidebar');
  	$this->load->view('Admin/add_category');
  	$this->load->view('Admin/footer');
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
   
   // $url = BASE_URL."AdminController/categoryList?msg=".urlencode(serialize($mdata));
                                 
   // header("Location:$url");

    header("Location:".BASE_URL."AdminController/categoryList"); 
  }

 

  public function categoryList(){

   	$this->load->view('Admin/header');
  	$this->load->view('Admin/sidebar');
  	
    $data=array();
  	$table="category";
  	$catModel= $this->load->model("CategoryModel");//$this->load return Load class object, so we call the Load class method model thats return object
  	$data['cat']=$catModel->CategoryList($table);    //call the catgoryModel method CatList
  	$this->load->view("Admin/category_list",$data);  // $this->load return Load class object, so we call the Load class method view

  	$this->load->view('Admin/footer');

  }





 public function editCategory($id){   // we define id = NULL FOR Ignore Error, when i directly hit mvc/?url=AdminController/editCategory/
    
    $data = array();
    $table = "category";
    
    $this->load->view('Admin/header');
    $this->load->view('Admin/sidebar');


  	$catModel=$this->load->model("CategoryModel"); //$this->load return Load class object, so we call the Load class method model thats return object
  	$data['category']=$catModel->EditCategory($table,$id); //call the catgoryModel method CategoryByID
  	$this->load->view("Admin/edit_category",$data);   // $this->load return Load class object, so we call the Load class method view

    $this->load->view('Admin/footer');
  }





 public function updateCategory($id){  // we define id = NULL FOR Ignore Error, when i directly hit mvc/?url=AdminController/editCategory/
    
   $table = "category";
  
   $name  = $_POST['name'];
   $title = $_POST['title'];

   $cond  = "id = $id";

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
  
     //$url = BASE_URL."AdminController/categoryList?msg=".urlencode(serialize($mdata));
                                 
     //header("Location:$url");

    header("Location:".BASE_URL."AdminController/categoryList"); 

  }




public function deleteCategory($id){

   $table = "category";
   $cond  = "id = $id";

   $catModel = $this->load->model("CategoryModel"); //$this->load return Load class object, so we call the Load class method model thats return object 
   $result = $catModel->DeleteCategory($table,$cond); //call the catgoryModel method UpdateCategory


    if($result==1){
      $mdata['msg'] = "Category Has Deleted Succesfully...";
    }else{
        $mdata['msg'] = "Category Not Deleted ...";
    }
  
     //$url = BASE_URL."AdminController/categoryList?msg=".urlencode(serialize($mdata));
                                 
     //header("Location:$url");

    header("Location:".BASE_URL."AdminController/categoryList"); 
}





/*for Post */ 


public function addPost(){

    $data = array();
    $table_category = "category";

    $this->load->view('Admin/header');
    $this->load->view('Admin/sidebar');
    
    $catModel = $this->load->model("CategoryModel");//$this->load return Load class object, so we call the Load class method model thats return object
    $data['categoryList']= $catModel->CategoryList($table_category);    //call the catgoryModel method CategoryList
    $this->load->view('Admin/add_post',$data);
    $this->load->view('Admin/footer');

}



 public function postList(){
    
    $data = array();
    $table_post="post";
    $table_category="category";

    $this->load->view('Admin/header');
    $this->load->view('Admin/sidebar');
    
    $postModel= $this->load->model("PostModel");//$this->load return Load class object, so we call the Load class method model thats return object
    $data['allpost']=$postModel->getAllPost($table_post);    //call the PostModel method getAllPost

    $catModel= $this->load->model("CategoryModel");//$this->load return Load class object, so we call the Load class method model thats return object
    $data['cat']=$catModel->CategoryList($table_category);    //call the catgoryModel method CatList

    $this->load->view('Admin/post_list',$data);
    $this->load->view('Admin/footer');
  
}


 public function insertPost(){

  if(!($_POST)){
     header("Location:".BASE_URL."AdminController/addPost"); //ignore error for dirext access http://localhost/mvc/?url=AdminController/insertPost  
  }


  //without vallidation

  /* $title        = $_POST['title'];
   $content      = $_POST['content'];
   $category     = $_POST['category'];  */

 
  //for validation
  $vallidator = $this->load->vallidation("DForm"); //$this->load return Load class object, so we call the Load class method vallidation thats return object
  
  $vallidator->post('title')->isEmpty()->length(10 , 500);
  $vallidator->post('content')->isEmpty();
  $vallidator->post('category')->isCatEmpty();

  if ( $vallidator->submit()) {   //  if don not gat any error in validation input field
    
   $title        = $vallidator->values['title'];
   $content      = $vallidator->values['content'];
   $category     = $vallidator->values['category']; 

  
   $data = array(
     'title'         => $title,
     'content'       => $content,
     'category_id'   => $category
   );

    $table = "post";

    $postModel= $this->load->model("PostModel");//$this->load return Load class object, so we call the Load class method model thats return object
    $result = $postModel->InsertPost($table,$data); //call the postModel method InsertPost
    
    $mdata = array();

    if($result==1){
      $mdata['msg'] = "Post Has Added Succesfully...";
    }else{
        $mdata['msg'] = "Post Not Added ...";
    }
   
   // $url = BASE_URL."AdminController/categoryList?msg=".urlencode(serialize($mdata));
                                 
   // header("Location:$url");

    header("Location:".BASE_URL."AdminController/postList"); 

  }else{

    $data["postError"] = $vallidator->errors;
    
    $table_category = "category";

    $this->load->view('Admin/header');
    $this->load->view('Admin/sidebar');
    
    $catModel = $this->load->model("CategoryModel");//$this->load return Load class object, so we call the Load class method model thats return object
    $data['categoryList']= $catModel->CategoryList($table_category);    //call the catgoryModel method CategoryList
    $this->load->view('Admin/add_post',$data);
    $this->load->view('Admin/footer');
  }

 }


public function editPost($id){


    $data = array();
    $table = "post";
    $table_category="category";

    $this->load->view('Admin/header');
    $this->load->view('Admin/sidebar');


     $postModel= $this->load->model("PostModel");//$this->load return Load class object, so we call the Load class method model thats return object
     $data['post'] = $postModel->EditPost($table,$id); //call the postModel method EditPost

    $catModel = $this->load->model("CategoryModel");//$this->load return Load class object, so we call the Load class method model thats return object
    $data['cat']=$catModel->CategoryList($table_category);    //call the catgoryModel method CatList

  
    $this->load->view("Admin/edit_post",$data);   // $this->load return Load class object, so we call the Load class method view

    $this->load->view('Admin/footer');


}

public function updatePost($id){

   $table = "post";
  
   $title        = $_POST['title'];
   $content      = $_POST['content'];
   $category     = $_POST['category'];
   
   $cond  = "id = $id";

   $data = array(
     'title'         => $title,
     'content'       => $content,
     'category_id'   => $category
   );

    $postModel = $this->load->model("PostModel");//$this->load return Load class object, so we call the Load class method model thats return object

    $result = $postModel->UpdatePost($table,$data,$cond); //call the PostModel method UpdatePost
    
    $mdata = array();

    if($result==1){
      $mdata['msg'] = "Post Has Updated Succesfully...";
    }else{
        $mdata['msg'] = "Post Not Updated ...";
    }
  
     //$url = BASE_URL."AdminController/categoryList?msg=".urlencode(serialize($mdata));
                                 
     //header("Location:$url");

    header("Location:".BASE_URL."AdminController/postList"); 


}


public function deletePost($id){
  
   $table = "post";
   $cond  = "id = $id";

    $postModel = $this->load->model("PostModel");//$this->load return Load class object, so we call the Load class method model thats return object

    $result = $postModel->DeletePost($table,$cond); //call the PostModel method DeletePost
    


    if($result==1){
      $mdata['msg'] = "Post Has Updated Succesfully...";
    }else{
        $mdata['msg'] = "Post Not Updated ...";
    }
  
     //$url = BASE_URL."AdminController/categoryList?msg=".urlencode(serialize($mdata));
                                 
     //header("Location:$url");

    header("Location:".BASE_URL."AdminController/postList"); 

}






/*For Sub Admin Role*/ 


 public function createUser(){

    $this->load->view('Admin/header');
    $this->load->view('Admin/sidebar');
    $this->load->view('Admin/add_user');
    $this->load->view('Admin/footer');

   }

  public function insertUser(){

   $table = "tbl_admin";

   $username    = $_POST['username'];
   $password    = md5($_POST['password']);
   $admin_role  = $_POST['admin_role'];
   

   $data = array(

     'username'   => $username,
     'password'   => $password,
     'level'      => $admin_role 
   );

   $userModel = $this->load->model("UserModel"); //$this->load return Load class object, so we call the Load class method model thats return object
    $result = $userModel->InsertUser($table,$data); //call the userModel method InsertUser
    
    $mdata = array();

    if($result==1){
      $mdata['msg'] = "User Has Added Succesfully...";
    }else{
        $mdata['msg'] = "User Not Added ...";
    }
   
   // $url = BASE_URL."AdminController/categoryList?msg=".urlencode(serialize($mdata));
                                 
   // header("Location:$url");

    header("Location:".BASE_URL."AdminController/userList"); 


   }

  public function userList(){
    
    $this->load->view('Admin/header');
    $this->load->view('Admin/sidebar');
    
    $data = array();
    $table = "tbl_admin";
    $userModel = $this->load->model("UserModel");//$this->load return Load class object, so we call the Load class method model thats return object
    $data['userlist'] = $userModel->UserList($table);    //call the userModel method UserList
    $this->load->view("Admin/user_list",$data);  // $this->load return Load class object, so we call the Load class method view

    $this->load->view('Admin/footer');

   }


 public function userDelete($id){
    
   $table = "tbl_admin";
   $cond  = "id = $id";

   $userModel = $this->load->model("UserModel"); //$this->load return Load class object, so we call the Load class method model thats return object 
   $result = $userModel->DeleteUser($table,$cond); //call the userModel method DeleteUser


    if($result==1){
      $mdata['msg'] = "User Has Deleted Succesfully...";
    }else{
        $mdata['msg'] = "User Not Updated ...";
    }
  
     //$url = BASE_URL."AdminController/categoryList?msg=".urlencode(serialize($mdata));
                                 
     //header("Location:$url");

    header("Location:".BASE_URL."AdminController/userList"); 
   
   }




/*change User Interface*/ 

 public function uiOption(){
    
    $data = array();
    $table = "tbl_ui";
    $UIModel = $this->load->model("UIModel");//$this->load return Load class object, so we call the Load class method model thats return object
    $data['color'] =$UIModel->UIList($table);    //call the userModel method  UIList

    $this->load->view('Admin/header',$data);
    $this->load->view('Admin/sidebar');
  
    $this->load->view('Admin/user_interface',$data);
    $this->load->view('Admin/footer');

 }




//update Background Color

public function changeUI(){

  $table = "tbl_ui";
  $id =1; // define not dynamic
  $cond  = "id = $id";

   $color    = $_POST['color'];
  
   

   $data = array(

     'color'   => $color
   );

   $UIModel = $this->load->model("UIModel"); //$this->load return Load class object, so we call the Load class method model thats return object
   $result = $UIModel->updateBackground($table,$data,$cond); //call the UIModel method updateBackground
    
    $mdata = array();

    if($result==1){
      $mdata['msg'] = "Background Color Has Added Succesfully...";
    }else{
        $mdata['msg'] = "Background Color Not Added ...";
    }
   
   // $url = BASE_URL."AdminController/uiOption?msg=".urlencode(serialize($mdata));
                                 
   // header("Location:$url");

    header("Location:".BASE_URL."AdminController/uiOption");

}


public function deleteUI($id){

   $table = "tbl_ui";

   $cond  = "id = $id";

  
   $UIModel = $this->load->model("UIModel"); //$this->load return Load class object, so we call the Load class method model thats return object
   $result =  $UIModel->deleteUI($table,$cond); //call the UIModel method DeleteUI
    

    if($result==1){
      $mdata['msg'] = "Background Color Has Deleted Succesfully...";
    }else{
        $mdata['msg'] = "Background Color Not Updated ...";
    }
  
     //$url = BASE_URL."AdminController/categoryList?msg=".urlencode(serialize($mdata));
                                 
     //header("Location:$url");

    header("Location:".BASE_URL."AdminController/uiOption"); 
  
}


}
?>