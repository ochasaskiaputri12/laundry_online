<?php
// mengaktifkan session
session_start();

// cek apakah user telah login, jika belum login maka di alihkan ke halaman login
if($_SESSION['status'] !="login"){
  header('Location: /laundry_online/login.php');
}
?> 
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Laundry</title>
    <link rel="stylesheet" href="css/foundation.css">
  </head>
  <body>
    
   

    <?php include 'includes/jumbotron.php'; ?>
    
    <div class="grid-container fluid">
      <div class="grid-x grid-margin-x" id="content">
        <div class="medium-2 cell card" style="
            padding-left: 20px;
            padding-top: 20px;
            padding-bottom: 20px;
        ">
          <?php include 'includes/sidebar.php'; ?>
        </div>
        <div class="medium-10 cell" style="
            padding-left: 20px;
            padding-top: 20px;
            padding-bottom: 20px;
        ">
          <?php include 'content.php'; ?>
        </div>
      </div>
    </div>
    <!— Start Top Bar —>
    <?php include 'includes/navbar.php'; ?>
    <!— End Top Bar —>

    <script src="js/vendor/jquery.js"></script>
    <script src="js/vendor/foundation.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>