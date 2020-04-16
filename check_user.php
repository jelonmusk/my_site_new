<?php
    if(isset($_POST['data']))
    {
        $data = stripslashes($_POST['data']);
        $conn_id=5;
        require 'connect.php';
        $sql="SELECT * from user_details WHERE user_id = '$data'";
        $result = $conn->query($sql);
        $count = mysqli_num_rows($result);
        if($count > 0)
        {
            echo "true";
        }
        else
        {
            echo "false";
        }
    }
    else
    {
        echo "Invalid";
    }
?>