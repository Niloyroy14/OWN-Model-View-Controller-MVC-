
<h1 style="text-align: center;">Category Wise Post</h1><hr>

<article class="postcontent">
	<?php 

	foreach($postbycat as $post){

     ?>
	<div class="post">
		<div class="title">
			<h2><?php echo $post['title']; ?></h2>
			<p>Category : <?php echo $post['name']; ?></p>
	   </div>
		
		<p><?php
          $text = $post['content'];
          if (strlen($text) > 200) {
          	$text = substr($text, 0, 200);
          	
          }
          echo $text;
		  ?>
		</p>
		<div class="readmore"><a href="<?php echo BASE_URL; ?>Index/PostDetails/<?php echo $post['id']; ?>">Read More...</a></div>
	</div>
 <?php
 }
  ?>
</article>









