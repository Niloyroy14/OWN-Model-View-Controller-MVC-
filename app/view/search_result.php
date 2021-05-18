
<h1 style="text-align: center;">Search View</h1><hr>

<article class="postcontent">
	<?php 
	if(isset($postbysearch)){
	foreach( $postbysearch as $post){
     ?>
	<div class="post">
		<h2><a href="<?php echo BASE_URL; ?>Index/PostDetails/<?php echo $post['id']; ?>"><?php echo $post['title']; ?></a></h2>
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
}
  ?>
</article>









