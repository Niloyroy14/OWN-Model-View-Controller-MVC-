<?php 

/**
 * Login Controller
 */
class LoginController extends DController

{
	
	public function __construct()
	{
		
		parent::__construct();
	}
 



    public function Userlogin(){

		Session::sesionStart();

		   	if(Session::get("user_login") == true){

		   	    header("Location:".BASE_URL."Index/Index");
		   	}

		$this->load->view('user_login');
 }


 	public function Adminlogin(){

 		    Session::sesionStart();

		   	if(Session::get("login") == true){

		   	    header("Location:".BASE_URL."AdminController/Index");
		   	}

		$this->load->view('admin/admin_login');
	}




	public function AdminloginAuth(){
        
        $table = "tbl_admin";
        
		$username = $_POST['username'];
		$password = md5($_POST['password']);

        $loginModel = $this->load->model("LoginModel");//$this->load return Load class object, so we call the Load class method model thats return object
        $count = $loginModel->Control($table,$username,$password);
      
        if($count > 0){

         $result = $loginModel->getData($table,$username,$password);

         Session::sesionStart();
         Session::set("login", true);
         Session::set("username", $result[0]['username']);
         Session::set("userid",   $result[0]['id']);
         Session::set("user_role",   $result[0]['level']);

         header("Location:".BASE_URL."AdminController/Index");
        }else{
        	 header("Location:".BASE_URL."LoginController/Adminlogin");
        }
	}
 


    public function UserloginAuth(){
        
        $table = "tbl_user";
        
		$username = $_POST['username'];
		$password = md5($_POST['password']);
        

        $loginModel = $this->load->model("LoginModel");//$this->load return Load class object, so we call the Load class method model thats return object
        $count = $loginModel->Control($table,$username,$password);
      
        if($count > 0){

         $result = $loginModel->getData($table,$username,$password);
        
         Session::sesionStart();
         Session::set("user_login", true);
         Session::set("username", $result[0]['username']);
         Session::set("userid",   $result[0]['id']);

         header("Location:".BASE_URL."Index/Index");
        }else{
        	 header("Location:".BASE_URL."LoginController/Userlogin");
        }
	}


	public function Userlogout(){

		  Session::sesionStart();
		  Session::sesionDestory();

		   header("Location:".BASE_URL."LoginController/Userlogin");
	}


	public function Adminlogout(){

		  Session::sesionStart();
		  Session::sesionDestory();

		   header("Location:".BASE_URL."LoginController/Adminlogin");
	}





}








?>