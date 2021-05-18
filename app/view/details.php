<h1 style="text-align: center;">Post Details</h1><hr>

<article class="postcontent">
	<?php 
	foreach($postbyid as $post){
	 ?>
<div class="details">
	<div class="title">
		<h2><?php echo $post['title']; ?></h2>
		<p>Category : <a href="<?php echo BASE_URL; ?>Index/PostBYCategory/<?php echo $post['category_id']; ?>"><?php echo $post['name']; ?></a></p>
	</div>
	<div class="desc">
		<p><?php echo $post['content']; ?></p>
	</div>
</div>
<?php 
}
?>
</article>