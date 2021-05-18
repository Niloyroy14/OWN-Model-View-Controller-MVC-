
<h2>Add New Category</h2> <hr>
<form action="<?php echo BASE_URL; ?>AdminController/insertCategory" method="POST">
  <table>
    <tr>
      <td>Category Name:</td>
      <td><input type="text" name="name" required></td>
    </tr>
    <tr>
      <td>Category Title:</td>
      <td><input type="text" name="title" required></td>
    </tr>
    <tr>
      <td></td>
      <td><input type="submit" name="submit" value="Save"></td>
    </tr>
  </table>
</form>

