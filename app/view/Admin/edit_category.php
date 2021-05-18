

<h2>Update Category</h2> <hr>

<?php
 foreach ($category as $cat) {
?>

<form action="<?php echo BASE_URL; ?> AdminController/updateCategory/<?php echo $cat['id'];?>" method="POST">
  <table>
   <input type="hidden" name="id" value="<?php echo $cat['id'];?>">
    <tr>
      <td>Category Name:</td>
      <td><input type="text" name="name" value="<?php echo $cat['name'];?>" required></td>
    </tr>
    <tr>
      <td>Category Title:</td>
      <td><input type="text" name="title" value="<?php echo $cat['title']; ?>" required></td>
    </tr>
    <tr>
      <td></td>
      <td><input type="submit" name="submit" value="Update"></td>
    </tr>
  </table>
</form>

<?php
}
?>