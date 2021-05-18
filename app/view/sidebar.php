<aside class="sidebar">
	<div class="widget">
		<h2>Category</h2>
		<ul>
			<?php
              foreach ($categoryList as $category) {
			 ?>
			<li><a href="<?php echo BASE_URL; ?>Index/PostBYCategory/<?php echo $category['id']; ?>"><?php echo $category['name']; ?></a></li>
			<?php
		      }
			?>
		</ul>
	</div>
	<div class="widget">
		<h2>Latest Post</h2> 
		<ul>
			<?php
              foreach ($latestpost as $post) {
			 ?>
			<li><a href="<?php echo BASE_URL; ?>Index/PostDetails/<?php echo $post['id']; ?>"><?php echo $post['title']; ?></a></li>
			<?php
		      }
			?>
		</ul>
	</div>
</aside>
