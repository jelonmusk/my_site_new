<?php
    require '../connect.php';
    
    if( isset($_POST['deletet_id']) )
    {
        $sql = "DELETE FROM type WHERE id = '$_POST[deletet_id]' ";
        if ($conn->query($sql) === TRUE) 
        {    
            echo "Type Deleted Successfully. Redirecting to Manage page in 5 seconds. ";
            header( "refresh:5; url=managet.php" );
        } 
        else 
        {    
            echo "Could not delete type. Redirecting to Manage page in 5 seconds. ";
            header( "refresh:5; url=managet.php" );
        }
    }
    else
    {
        echo "DELETE TYPE ID NOT SET. Redirecting to Manage page in 5 seconds. ";
        header( "refresh:5; url=managet.php" );
    }
?>