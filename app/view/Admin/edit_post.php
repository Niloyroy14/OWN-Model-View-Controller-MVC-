
<h2>Update Post</h2> <hr>

<?php
 foreach ($post as $post) {
?>

<form action="<?php echo BASE_URL; ?> AdminController/updatePost/<?php echo $post['id'];?>" method="POST">
  <table>
    <tr>
      <td>Title:</td>
      <td><input type="text" name="title"  value="<?php echo $post['title'];?> "></td>
    </tr>
    <tr>
      <td>Content:</td>
      <td>
         <textarea name="content"> <?php echo $post['content']; ?> </textarea>
      </td>
    </tr>
     <tr>
      <td>Category:</td>
      <td>
       <select class="catsearch" name="category">
        <option>Select Category</option>
        <?php
          foreach ($cat as $category) {
         ?>
        <option 
        <?php
        if($post['category_id'] == $category['id'] ){ ?>
        
            selected = 'selected'
        <?php
         }
        ?>
        
        value="<?php echo $category['id'];?> "><?php echo $category['name'];  ?></option>
        <?php
          }
         ?>
      </select>
      </td>
    </tr>
    <tr>
      <td></td>
      <td><input type="submit" name="submit" value="Update Article"></td>
    </tr>
  </table>
</form>

<?php
}
?>