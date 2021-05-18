<!doctype html>
<html>
<head>
      <title> PHP OOP MVC(Model View Controller) Framwork</title>
      <link rel="stylesheet" href="css/main.css?ver=1.5">
      <script src="js/jquery.js"></script>
      <script src="js/main.js"></script>
</head>
<body>

<div class="project">
      <section class="headeroption">
            <h2> PHP OOP MVC(Model View Controller) Framwork</h2>
      </section>
<section class="maincontent">

<h2>Topics:  PHP OOP MVC(Model View Controller) Framwork</h2>


<div class="content">

<h1 style="text-align:center">Edit Category</h1><br>
<?php

if(isset($msg)){
  echo "<span style='color:green;font-weight:bold'>".$msg."</span>";
}

?>
<form action="http://localhost/mvc/?url=CategoryController/updateCategory" method="POST">
  <table>
   <?php 
   if(isset($cat)){
    foreach($cat as $value){
   ?>

   <input type="hidden" name="id" value="<?php echo $value['id'];?>">
    <tr>
      <td>Category Name:</td>
      <td><input type="text" name="name" value="<?php echo $value['name'];?>" required></td>
    </tr>
    <tr>
      <td>Category Title:</td>
      <td><input type="text" name="title" value="<?php echo $value['title']; ?>" required></td>
    </tr>
    <tr>
      <td></td>
      <td><input type="submit" name="submit" value="Save"></td>
    </tr>
 <?php
  }
}
  ?>
  </table>
</form>
</div>

 </section>

<section class="footeroption">
		<h2><?php echo " PHP OOP MVC(Model View Controller) Framwork"; ?></h2>
</section>


</div>
</body>
</html>
