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
          <h1 style="text-align:center">User Login</h1><br>
          <!-- <?php
          if(isset($msg)){
          echo "<span style='color:green;font-weight:bold'>".$msg."</span>";
          }
          ?> -->
          <div class="loginform">
            <form action="http://localhost/mvc/?url=LoginController/UserloginAuth" method="POST">
              <table>
                <tr>
                  <td>UserName:</td>
                  <td><input type="text" name="username" required></td>
                </tr>
                <tr>
                  <td>Password:</td>
                  <td><input type="password" name="password" required></td>
                </tr>
                <tr>
                  <td></td>
                  <td><input type="submit" name="submit" value="Login"></td>
                </tr>
              </table>
            </form>
          </div>
        </div>
      </section>
      <section class="footeroption">
        <h2><?php echo " PHP OOP MVC(Model View Controller) Framwork"; ?></h2>
      </section>
    </div>
  </body>
</html>