<?php 
session_start();
session_destroy();
header('Location: /laundry_online/login.php');
?>