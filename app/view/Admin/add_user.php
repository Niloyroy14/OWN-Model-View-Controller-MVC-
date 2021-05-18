
<h2>Add New Admin Role</h2> <hr>
<form action="<?php echo BASE_URL; ?>AdminController/insertUser" method="POST">
  <table>
    <tr>
      <td>User Name:</td>
      <td><input type="text" name="username" required></td>
    </tr>
    <tr>
      <td>Password:</td>
      <td><input type="text" name="password" required></td>
    </tr>
     <tr>
      <td>User Role:</td>
      <td>
        <select name="admin_role" class="catsearch">
          <option>Select Admin Role</option>
          <option value="2">Author</option>
          <option value="3">Contributor</option>
        </select>
      </td>
    </tr>
    <tr>
      <td></td>
      <td><input type="submit" name="submit" value="Save"></td>
    </tr>
  </table>
</form>

