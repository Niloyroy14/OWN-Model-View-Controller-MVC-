
<h2>Add New Article</h2> <hr>

<?php
 
 if(isset($postError)){

echo '<div style="color:red;border:1px solid red; padding:5px 10px; margin:5px; height:100px;">';

  foreach ($postError as $key => $value) {
     
     switch ($key) {
       case 'title':
         foreach ($value as $val) {
           echo "Title: ".$val."<br>";
         }
         break;
       case 'content':
        foreach ($value as $val) {
           echo "Content: ".$val."<br>";
         }
         break;
       case 'category':
         foreach ($value as $val) {
           echo "Category: ".$val."<br>";
         }
         break;
       
       default:
         break;
     }
  }
  echo "</div>";
 }

?>
<form action="<?php echo BASE_URL; ?>AdminController/insertPost" method="POST">
  <table>
    <tr>
      <td>Title:</td>
      <td><input type="text" name="title"></td>
    </tr>
    <tr>
      <td>Content:</td>
      <td>
         <textarea name="content"> </textarea>
      </td>
    </tr>
     <tr>
      <td>Category:</td>
      <td>
       <select class="catsearch" name="category">
        <option>Select Category</option>
        <?php
          foreach ($categoryList as $category) {
         ?>
        <option value="<?php echo $category['id']; ?>"><?php echo $category['name'];  ?></option>
        <?php
          }
         ?>
      </select>
      </td>
    </tr>
    <tr>
      <td></td>
      <td><input type="submit" name="submit" value="Add Article"></td>
    </tr>
  </table>
</form>