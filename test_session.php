<?php
session_start();
    if(isset($_SESSION['login_email']))
       {
           echo $_SESSION['login_email'];
       }
       else
       {
           echo "NOT  SET";
       }
?>