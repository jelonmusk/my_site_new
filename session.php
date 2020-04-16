<?php
    session_start();
    if(!isset($_SESSION['login_email'])){
      header("location:http://localhost/my_site/frontend/index.php");
    }
?>