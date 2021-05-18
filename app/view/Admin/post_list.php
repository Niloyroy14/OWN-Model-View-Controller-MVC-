<h2>Post List</h2> <hr>
<?php
 if (!empty($_GET['msg'])) {
 	$msg = unserialize(urldecode($_GET['msg']));
 	foreach ($msg as $key => $value) {
 		
 		echo "<span style='color:green;font-weight:bold'>".$value."</span>";
 	}
 
}

  // if (isset($msg)) {
  //   echo "<span style='color:green;font-weight:bold'>".$msg."</span>";
 	// }

?>

<table class="tblone">
	<tr>
		<th width="5%">No:</th>
		<th width="30%"> Title:</th>
		<th width="50%"> Content:</th>
		<th width="15%"> Category </th>
		<th width="25%"> Action:</th>
	</tr>

<?php
$i = 0;
 foreach($allpost as  $value){
 	$i++;
 ?>

	<tr>
		<td><?php echo $i; ?></td>
		<td><?php echo $value['title']; ?></td>
		<td>
			<?php
              
          $text = $value['content'];
          if (strlen($text) > 40) {
          	$text = substr($text, 0, 40);
          	  echo $text;
             }
		   ?>
		</td>
		<td>
			<?php 
               
               foreach ($cat as  $category) {
                 if ($category['id']== $value['category_id'] ) {
                 	echo $category['name'];
                 }
               }
		    ?>
		</td>

		<?php if (Session::get('user_role')==1) { ?>

		<td>
			<a href="<?php echo BASE_URL;?>AdminController/editPost/<?php echo $value['id'];?>">Edit</a> ||
			<a onclick="return confirm('Are You Sure To Delete !')" href="<?php echo BASE_URL; ?>AdminController/deletePost/<?php echo $value['id'];?>">Delete</a>
		</td>

	<?php }else{ ?>

		<td>Not Permitted</td>
	<?php } ?>

	</tr>
<?php
}
?>
</table>