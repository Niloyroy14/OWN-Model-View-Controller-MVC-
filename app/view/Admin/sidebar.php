
<aside class="adminleft">
	<div class="widget1">
		<h3>Site Option</h3>
		<ul>
			<li><a href="<?php echo BASE_URL; ?>AdminController/Index">Home</a></li>
			<li><a href="<?php echo BASE_URL; ?>AdminController/uiOption">UI Option</a></li>
			<li><a href="<?php echo BASE_URL; ?>LoginController/Adminlogout">Logout</a></li>
		</ul>
	</div>

	<?php if (Session::get('user_role')==1) { ?>
	
	<div class="widget1">
		<h3>Manage User</h3>
		<ul>
			<li><a href="<?php echo BASE_URL; ?>AdminController/createUser">Create Sub Admin </a></li>
			<li><a href="<?php echo BASE_URL; ?>AdminController/UserList">Sub Admin List</a></li>
		</ul>
	</div>

	<?php } ?>

  <?php if (Session::get('user_role')==1 || Session::get('user_role')==2) { ?>

	<div class="widget1">
		<h3>Category Option</h3>
		<ul>
			<li><a href="<?php echo BASE_URL; ?>AdminController/addCategory">Add Category</a></li>
			<li><a href="<?php echo BASE_URL; ?>AdminController/categoryList">Category List</a></li>
		</ul>
	</div>
 <?php } ?>
	<div class="widget1">
		<h3>Post Option</h3>
		<ul>
			<li><a href="<?php echo BASE_URL; ?>AdminController/addPost">Add Article</a></li>
			<li><a href="<?php echo BASE_URL; ?>AdminController/postList">Article List</a></li>
		</ul>
	</div>
</aside>

<article class="adminright">

