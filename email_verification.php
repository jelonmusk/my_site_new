<?php
    $conn_id=5;
    require 'connect.php';
    if(isset($_GET['email']))
    {
        echo "New Record Created Successfully";
    }
    else
    {
        header("location: index.php");
    }
?>