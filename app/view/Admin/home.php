


	<h2>Welcome To Admin Panel</h2>
	 

<h1 style="text-align: center; margin-top:50px;"> Welcome..
    <?php
     echo Session::get("username");
     echo "<br>";
     echo "<br>";
     if (Session::get('user_role')==1){
     	echo "You Are Admin";
     }elseif (Session::get('user_role')==2) {
     	echo "You Are Author";
     }else{
     	echo "You Are Contributor";
     }

    ?>
</h1>

<h2 style="text-align: center; margin-top:10px;"><a href="<?php echo BASE_URL;?>Index/Index" target="_blank">Visit Main Site</a></h2>




