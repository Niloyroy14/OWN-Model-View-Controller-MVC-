<?php 


/**
 * Main Class
 */
class Main
{

	public $url;
	public $controllerName = "Index";  // set  default controller
	public $metodName      = "Index";  // set default controller
	public $controllerPath ="app/controller/";
	public $controller;

	
  public function __construct()
	{
		
		$this->getUrl();
		$this->loadController();
		$this->callMethod();

	}



 

  public function getUrl(){

	 $this->url= isset($_GET['url']) ? $_GET['url'] : NULL ;

	 if( $this->url != NULL){
	   $this->url=rtrim($this->url,'/');
	   $this->url=explode("/", filter_var($this->url,FILTER_SANITIZE_URL));
	 }else{
	   unset($this->url);
	 }

  }




  public function loadController(){

  	if (!isset($this->url[0])) { //if do not get any controller then load default index controoller that was set $controllerName 

	    include $this->controllerPath.$this->controllerName.".php";
  		$this->controller = new $this->controllerName(); // create object of default controller
  		$this->controller->{$this->metodName}();
  	}else{
  		$this->controllerName = $this->url[0];  //if get another controller then  assign to $controllerName
  		$fileName =  $this->controllerPath.$this->controllerName.".php";
  		if (file_exists($fileName )) {
  			include $fileName;

  			if (class_exists($this->controllerName)) {
  				
  				$this->controller = new $this->controllerName(); //create object  of controller
  			}else{
  				echo "controller Class Not Found.!... Error 404 Found ....!";
  			}
  		}else{
  			echo "File Not Exits.!... Error 404 Found .....!";
  		}
  	}

  }


  

   public function callMethod(){

   	if (isset($this->url[2])) {  //if get parameter of any method
  
   	 $this->metodName = $this->url[1];   //mehod assign to $metodName;

   	 if (method_exists($this->controller, $this->metodName)) {

   	   $this->controller->{$this->metodName}($this->url[2]); //call method with parameter
   	 }else{
       //header("Location:".BASE_URL."Index/error");
   	 	echo "Parameter Not Found in controoler Class Method.!... Error 404 Found !.....";
   	 }
   	}else{

   		if (isset($this->url[1])) { //if get method without parameter
   			$this->metodName = $this->url[1];    //mehod assign to $metodName;

		   		if (method_exists($this->controller, $this->metodName)) {
		   	      $this->controller->{$this->metodName}(); //call method 
		   	 }else{
		       header("Location:".BASE_URL."Index");
		   	 //	echo "Method Not Found in controoler Class.!... Error 404 Found !....";
		   	 }
   		}else{

   			  header("Location:".BASE_URL."Index");
   			// echo "Method Not Found !... Error 404 Found !....";
   		}
   	}

   }


	

























}
?>