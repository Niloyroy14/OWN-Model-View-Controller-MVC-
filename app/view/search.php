

<div class="searchoption">
	<div class="menu">
		<a href="<?php echo BASE_URL; ?>">Home</a>
	    <a href="<?php echo BASE_URL; ?>LoginController/Userlogout">Logout</a>
	</div>
	<div class="search">
		<form action="<?php echo BASE_URL; ?>Index/search" method="POST">
			<input type="text" name="keyword" placeholder="Search Here ...">
			<select class="catsearch" name="category">
				<option>Select Category</option>
				<?php
                  foreach ($categoryList as $category) {
			     ?>
				<option value="<?php echo $category['id']; ?>"><?php echo $category['name'];  ?></option>
				<?php
                  }
				 ?>
			</select>
			<button class="submibtn" type="sumbit">Search</button>
		</form>
	</div>
  
	
</div>