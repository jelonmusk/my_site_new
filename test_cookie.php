<?php
    if(isset($_COOKIE['login_email']))
    {
        echo "Cookie has been set. Email: ".$_COOKIE['login_email'];
    }
?>