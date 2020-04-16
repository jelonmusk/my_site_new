<?php
    require '../connect.php';
    
    if( isset($_POST['deletes_id']) )
    {
        $sql = "DELETE FROM stocks WHERE id = '$_POST[deletes_id]'";
        if ($conn->query($sql) === TRUE) 
        {    
            echo "Stock Deleted Successfully. Redirecting to Manage page in 5 seconds. ";
            header( "refresh:5; url=managese.php" );
        } 
        else 
        {    
            echo "Could not delete Stock. Redirecting to Manage page in 5 seconds. ";
            header( "refresh:5; url=managese.php" );
        }
    }
    else
    {
        echo "DELETE Stock ID NOT SET. Redirecting to Manage page in 5 seconds. ";
        header( "refresh:5; url=managese.php" );
    }
?>