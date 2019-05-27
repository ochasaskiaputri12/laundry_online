<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>laundry_online | Login</title>
    <link rel="stylesheet" href="css/foundation.css">
  </head>
  <body>
    
    <!-- End Top Bar -->
    <div class="grid-container">
      <div class="grid-x grid-margin-x" style="margin-top: 80px">
        <div class="cell small-3"></div>
        <div class="cell small-6 card" style="padding-top: 16px;">
        <h2 class="text-center">Login | laundry_online </h2>
        <form action="" method="post"  style="padding: 16px auto;">
          <!-- field nama -->
          <div class="grid-x grid-padding-x">
            <div class="small-4 cell">
              <label for="username" class="text-right middle">Username</label>
            </div>
            <div class="small-8 cell">
              <input type="text" name="username" placeholder="Username" required>
            </div>
          </div>
          <!-- field password -->
          <div class="grid-x grid-padding-x">
            <div class="small-4 cell">
              <label for="password" class="text-right middle">Password</label>
            </div>
            <div class="small-8 cell">
              <input type="password" name="password" placeholder="Password" required>
            </div>
          </div>

          <!-- Aksi -->
          <div class="grid-x grid-padding-x">
            <div class="small-4 cell">
              <label for="nama" class="text-right middle"></label>
            </div>
            <div class="small-8 cell">
              <div class="small button-group">
                <button class="button" type="submit" name="submit">Login</button>
                <button class="button" type="reset">Reset</button>
              </div>
            </div>
          </div>
        </form>
        </div>
        <div class="cell small-3"></div>
      </div>
    </div>

    <script src="js/vendor/jquery.js"></script>
    <script src="js/vendor/foundation.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>

<?php 
require_once("database.php");

// check action submit
if(isset($_POST['submit'])){
  $username = $_POST['username'];
  $password = md5($_POST['password']);
  
  $db=new Database();
  $db->select('login','*','','',"username='$username' AND password='$password'");
  $res=$db->getResult();
  var_dump($res[0]);
  if($res[0] > 0){
    session_start();
    $_SESSION['username'] = $username;
    $_SESSION['status'] = "login";
    header('Location: laundry_online/index.php');
  }else{
    header('Location: laundry_online/login.php');
  }
}
?>