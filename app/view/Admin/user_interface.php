
<h2>User Interface Option</h2> <hr>
<form action="<?php echo BASE_URL; ?>AdminController/changeUI" method="POST">
  <table class="tblone">
    <tr>
      <td>Change Background Color:</td>
      <td><input type="color" name="color" required></td>
    </tr>
    <tr>
      <td></td>
      <td><input type="submit" name="submit" value="Save"></td>
    </tr>
  </table>
</form>

<br>

<h4> Background Color List</h4>

<table class="tblone">
  <tr>
    <th width="20%">No:</th>
    <th width="20%">Color:</th>
    <th width="20%">Action:</th>
  </tr>

<?php
$i = 0;
 foreach($color as  $value){
  $i++;
 ?>

  <tr>
    <td><?php echo $i; ?></td>
    <td><?php echo $value['color']; ?></td> 
    <td>
      <a onclick="return confirm('Are You Sure To Delete !')" href="<?php echo BASE_URL; ?>AdminController/deleteUI/<?php echo $value['id'];?>">Delete</a>
    </td>   
  </tr>
<?php
}
?>
</table>

