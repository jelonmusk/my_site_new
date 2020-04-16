<?php
    require "connect.php";
   session_start();
   if(!isset($_SESSION['login_user'])){
      header("location:http://localhost/my_site_new/backends/backend/index.php");
   }
?>