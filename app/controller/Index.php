<?php




/**
 * Index Controller
 */
class Index extends DController
{
	
  public function __construct()
	{
		parent::__construct();

		Session::checkUserSession();
	}


  public function Index(){
  	$this->home();
  }


  public function home(){

  	$data=array();
  	$table_post="post";
    $table_category="category";

  	$this->load->view("header");

  	$catModel= $this->load->model("CategoryModel");//$this->load return Load class object, so we call the Load class method model thats return object
  	$data['categoryList']=$catModel->CategoryList($table_category);    //call the catgoryModel method CategoryList
  	$this->load->view("search",$data);
    
    
  	$postModel= $this->load->model("PostModel");//$this->load return Load class object, so we call the Load class method model thats return object
  	$data['allpost']=$postModel->getAllPost($table_post);    //call the PostModel method getAllPost
  
  	$this->load->view("content",$data);  // $this->load return Load class object, so we call the Load class method view
    
    //for sidebar
   
  	
  	//$data['categoryList']=$catModel->CategoryList($table_category);    //call the catgoryModel method CategoryList
    $data['latestpost']=$postModel->getLatestPost($table_post);    //call the PostModel method getLatestPost
  	$this->load->view("sidebar",$data);
  	$this->load->view("footer");
  }

  public function PostDetails($id){
    
    $data=array();
  	$table_post="post";
    $table_category="category";

    $this->load->view("header");

    $catModel= $this->load->model("CategoryModel");//$this->load return Load class object, so we call the Load class method model thats return object
  	$data['categoryList']=$catModel->CategoryList($table_category);    //call the catgoryModel method CategoryList
  	$this->load->view("search",$data);

  
  	$postModel= $this->load->model("PostModel");//$this->load return Load class object, so we call the Load class method model thats return object
  	$data['postbyid']=$postModel->getPostByID($table_post, $table_category, $id);    //call the PostModel method getPostByID
  	
  	$this->load->view("details",$data);  // $this->load return Load class object, so we call the Load class method view

  	//for sidebar
  //	$catModel= $this->load->model("CategoryModel");//$this->load return Load class object, so we call the Load class method model thats return object
  //	$data['categoryList']=$catModel->CategoryList($tablecategory);    //call the catgoryModel method CategoryList
    $data['latestpost']=$postModel->getLatestPost($table_post);    //call the PostModel method getLatestPost
  	$this->load->view("sidebar",$data);
  	$this->load->view("footer");
  }

  public function PostBYCategory($id){
    
    $data=array();
  	$table_post="post";
    $table_category="category";

    $this->load->view("header");
    
    $catModel= $this->load->model("CategoryModel");//$this->load return Load class object, so we call the Load class method model thats return object
  	$data['categoryList']=$catModel->CategoryList($table_category);    //call the catgoryModel method CategoryList
  	$this->load->view("search",$data);


 
  	$postModel= $this->load->model("PostModel");//$this->load return Load class object, so we call the Load class method model thats return object
  	$data['postbycat']=$postModel->getPostByCat($table_post, $table_category, $id);    //call the PostModel method CatList

    $this->load->view("post_by_category",$data); // $this->load return Load class object, so we call the Load class method view
    

  	//for sidebar
  //	$catModel= $this->load->model("CategoryModel");//$this->load return Load class object, so we call the Load class method model thats return object
  	//$data['categoryList']=$catModel->CategoryList($table_category);    //call the catgoryModel method CategoryList
    $data['latestpost']=$postModel->getLatestPost($table_post);    //call the PostModel method getLatestPost
  	$this->load->view("sidebar",$data);
  	$this->load->view("footer");
  }



  public function search(){
     
    $search_keyword = $_POST['keyword'];

    $search_option  = $_POST['category'];

  	$data = array();

  	$table_post="post";
    $table_category="category";

    $this->load->view("header");
    
    $catModel= $this->load->model("CategoryModel");//$this->load return Load class object, so we call the Load class method model thats return object
  	$data['categoryList']=$catModel->CategoryList($table_category);    //call the catgoryModel method CategoryList
  	$this->load->view("search",$data);


 
  	$postModel= $this->load->model("PostModel");//$this->load return Load class object, so we call the Load class method model thats return object
  	$data['postbysearch']=$postModel->getPostBysearch($table_post, $search_keyword, $search_option);    //call the PostModel method searchs

    $this->load->view("search_result",$data); // $this->load return Load class object, so we call the Load class method view
    

  	//for sidebar
  //	$catModel= $this->load->model("CategoryModel");//$this->load return Load class object, so we call the Load class method model thats return object
  	//$data['categoryList']=$catModel->CategoryList($table_category);    //call the catgoryModel method CategoryList
    $data['latestpost']=$postModel->getLatestPost($table_post);    //call the PostModel method getLatestPost
  	$this->load->view("sidebar",$data);
  	$this->load->view("footer");

  }



public function error(){

echo "Method Not Found in controoler Class.!... Error 404 Found !....";
	
}









}
?>