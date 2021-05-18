<h2>User List</h2> <hr>
<?php
 if (!empty($_GET['msg'])) {
 	$msg = unserialize(urldecode($_GET['msg']));
 	foreach ($msg as $key => $value) {
 		
 		echo "<span style='color:green;font-weight:bold'>".$value."</span>";
 	}
 
}

?>

<table class="tblone">
	<tr>
		<th width="20%">No:</th>
		<th width="20%">User Name:</th>
		<th width="20%">Level:</th>
		<th width="20%">Action:</th>
	</tr>

<?php
$i = 0;
 foreach($userlist as  $value){
 	$i++;
 ?>

	<tr>
		<td><?php echo $i; ?></td>
		<td><?php echo $value['username']; ?></td>
		<td>
			<?php
			  if ($value['level']==2) {
			  	 echo "Author";
			  }elseif ($value['level']==3) {
			  	echo "Contributor";
			  }else{
			  	echo "Admin";
			  }
		    ?>
				
		</td> 

		  <?php if ($value['level']!=1) { ?>

		<td>
			<a onclick="return confirm('Are You Sure To Delete !')" href="<?php echo BASE_URL; ?>AdminController/userDelete/<?php echo $value['id'];?>">Delete</a>
		</td>

	 <?php }?>
	 
	</tr>
<?php
}
?>
</table>