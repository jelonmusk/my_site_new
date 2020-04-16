<?php
    $servername = "localhost";
    $username = "test";
    $password = "password1";        

    if ($conn_id==1){$dbname = "books_db";}             /*BOOKS DB*/
    else if($conn_id==2){$dbname = "e_stuff_db";}       
    else if($conn_id==3){$dbname = "feedback_db";}
    else if($conn_id==4){$dbname = "feedback_estuff_db";}
    else if($conn_id==5){$dbname = "user_db";}
    else if($conn_id==6){$dbname = "order_db";}

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error){
        die("Connection Failed: " . $conn->connect_error);
    }
?>